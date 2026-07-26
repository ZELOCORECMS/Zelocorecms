/**
 * @output zc-includes/js/customize-views.js
 */

(function( $, zc, _ ) {

	if ( ! zc || ! zc.customize ) { return; }
	var api = zc.customize;

	/**
	 * zc.customize.HeaderTool.CurrentView
	 *
	 * Displays the currently selected header image, or a placeholder in lack
	 * thereof.
	 *
	 * Instantiate with model zc.customize.HeaderTool.currentHeader.
	 *
	 * @memberOf zc.customize.HeaderTool
	 * @alias zc.customize.HeaderTool.CurrentView
	 *
	 * @constructor
	 * @augments zc.Backbone.View
	 */
	api.HeaderTool.CurrentView = zc.Backbone.View.extend(/** @lends zc.customize.HeaderTool.CurrentView.prototype */{
		template: zc.template('header-current'),

		initialize: function() {
			this.listenTo(this.model, 'change', this.render);
			this.render();
		},

		render: function() {
			this.$el.html(this.template(this.model.toJSON()));
			this.setButtons();
			return this;
		},

		setButtons: function() {
			var elements = $('#customize-control-header_image .actions .remove');
			var addButton = $('#customize-control-header_image .actions .new');

			if (this.model.get('choice')) {
				elements.show();
				addButton.removeClass('upload-button');
			} else {
				elements.hide();
				addButton.addClass('upload-button');
			}
		}
	});


	/**
	 * zc.customize.HeaderTool.ChoiceView
	 *
	 * Represents a choosable header image, be it user-uploaded,
	 * theme-suggested or a special Randomize choice.
	 *
	 * Takes a zc.customize.HeaderTool.ImageModel.
	 *
	 * Manually changes model zc.customize.HeaderTool.currentHeader via the
	 * `select` method.
	 *
	 * @memberOf zc.customize.HeaderTool
	 * @alias zc.customize.HeaderTool.ChoiceView
	 *
	 * @constructor
	 * @augments zc.Backbone.View
	 */
	api.HeaderTool.ChoiceView = zc.Backbone.View.extend(/** @lends zc.customize.HeaderTool.ChoiceView.prototype */{
		template: zc.template('header-choice'),

		className: 'header-view',

		events: {
			'click .choice,.random': 'select',
			'click .close': 'removeImage'
		},

		initialize: function() {
			var properties = [
				this.model.get('header').url,
				this.model.get('choice')
			];

			this.listenTo(this.model, 'change:selected', this.toggleSelected);

			if (_.contains(properties, api.get().header_image)) {
				api.HeaderTool.currentHeader.set(this.extendedModel());
			}
		},

		render: function() {
			this.$el.html(this.template(this.extendedModel()));

			this.toggleSelected();
			return this;
		},

		toggleSelected: function() {
			this.$el.toggleClass('selected', this.model.get('selected'));
		},

		extendedModel: function() {
			var c = this.model.get('collection');
			return _.extend(this.model.toJSON(), {
				type: c.type
			});
		},

		select: function() {
			this.preventJump();
			this.model.save();
			api.HeaderTool.currentHeader.set(this.extendedModel());
		},

		preventJump: function() {
			var container = $('.zc-full-overlay-sidebar-content'),
				scroll = container.scrollTop();

			_.defer(function() {
				container.scrollTop(scroll);
			});
		},

		removeImage: function(e) {
			e.stopPropagation();
			this.model.destroy();
			this.remove();
		}
	});


	/**
	 * zc.customize.HeaderTool.ChoiceListView
	 *
	 * A container for ChoiceViews. These choices should be of one same type:
	 * user-uploaded headers or theme-defined ones.
	 *
	 * Takes a zc.customize.HeaderTool.ChoiceList.
	 *
	 * @memberOf zc.customize.HeaderTool
	 * @alias zc.customize.HeaderTool.ChoiceListView
	 *
	 * @constructor
	 * @augments zc.Backbone.View
	 */
	api.HeaderTool.ChoiceListView = zc.Backbone.View.extend(/** @lends zc.customize.HeaderTool.ChoiceListView.prototype */{
		initialize: function() {
			this.listenTo(this.collection, 'add', this.addOne);
			this.listenTo(this.collection, 'remove', this.render);
			this.listenTo(this.collection, 'sort', this.render);
			this.listenTo(this.collection, 'change', this.toggleList);
			this.render();
		},

		render: function() {
			this.$el.empty();
			this.collection.each(this.addOne, this);
			this.toggleList();
		},

		addOne: function(choice) {
			var view;
			choice.set({ collection: this.collection });
			view = new api.HeaderTool.ChoiceView({ model: choice });
			this.$el.append(view.render().el);
		},

		toggleList: function() {
			var title = this.$el.parents().prev('.customize-control-title'),
				randomButton = this.$el.find('.random').parent();
			if (this.collection.shouldHideTitle()) {
				title.add(randomButton).hide();
			} else {
				title.add(randomButton).show();
			}
		}
	});


	/**
	 * zc.customize.HeaderTool.CombinedList
	 *
	 * Aggregates zc.customize.HeaderTool.ChoiceList collections (or any
	 * Backbone object, really) and acts as a bus to feed them events.
	 *
	 * @memberOf zc.customize.HeaderTool
	 * @alias zc.customize.HeaderTool.CombinedList
	 *
	 * @constructor
	 * @augments zc.Backbone.View
	 */
	api.HeaderTool.CombinedList = zc.Backbone.View.extend(/** @lends zc.customize.HeaderTool.CombinedList.prototype */{
		initialize: function(collections) {
			this.collections = collections;
			this.on('all', this.propagate, this);
		},
		propagate: function(event, arg) {
			_.each(this.collections, function(collection) {
				collection.trigger(event, arg);
			});
		}
	});

})( jQuery, window.zc, _ );
