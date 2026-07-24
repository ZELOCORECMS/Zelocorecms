<?php return array(
	'a11y/index.js' => array(
		'dependencies' => array(
			
		),
		'version' => '1c371cb517a97cdbcb9f'
	),
	'abilities/index.js' => array(
		'dependencies' => array(
			'zc-data',
			'zc-i18n'
		),
		'version' => 'f3475bc77a30dcc5b38d'
	),
	'block-editor/utils/fit-text-frontend.js' => array(
		'dependencies' => array(
			
		),
		'module_dependencies' => array(
			array(
				'id' => '@zelocorecms/interactivity',
				'import' => 'static'
			)
		),
		'version' => '383c7a8bd24a1f2fd9b9'
	),
	'block-library/accordion/view.js' => array(
		'dependencies' => array(
			
		),
		'module_dependencies' => array(
			array(
				'id' => '@zelocorecms/interactivity',
				'import' => 'static'
			)
		),
		'version' => '2af01b43d30739c3fb8d'
	),
	'block-library/file/view.js' => array(
		'dependencies' => array(
			
		),
		'module_dependencies' => array(
			array(
				'id' => '@zelocorecms/interactivity',
				'import' => 'static'
			)
		),
		'version' => '7d4d261d10dca47ebecb'
	),
	'block-library/form/view.js' => array(
		'dependencies' => array(
			
		),
		'version' => '5542f8ad251fe43ef09e'
	),
	'block-library/image/view.js' => array(
		'dependencies' => array(
			
		),
		'module_dependencies' => array(
			array(
				'id' => '@zelocorecms/interactivity',
				'import' => 'static'
			)
		),
		'version' => '25ee935fd6c67371d0f3'
	),
	'block-library/navigation/view.js' => array(
		'dependencies' => array(
			
		),
		'module_dependencies' => array(
			array(
				'id' => '@zelocorecms/interactivity',
				'import' => 'static'
			)
		),
		'version' => '96a846e1d7b789c39ab9'
	),
	'block-library/playlist/view.js' => array(
		'dependencies' => array(
			
		),
		'module_dependencies' => array(
			array(
				'id' => '@zelocorecms/interactivity',
				'import' => 'static'
			)
		),
		'version' => '99f747d731f80246db11'
	),
	'block-library/query/view.js' => array(
		'dependencies' => array(
			
		),
		'module_dependencies' => array(
			array(
				'id' => '@zelocorecms/interactivity',
				'import' => 'static'
			),
			array(
				'id' => '@zelocorecms/interactivity-router',
				'import' => 'dynamic'
			)
		),
		'version' => '7a4ec5bfb61a7137cf4b'
	),
	'block-library/search/view.js' => array(
		'dependencies' => array(
			
		),
		'module_dependencies' => array(
			array(
				'id' => '@zelocorecms/interactivity',
				'import' => 'static'
			)
		),
		'version' => '38bd0e230eaffa354d2a'
	),
	'block-library/tabs/view.js' => array(
		'dependencies' => array(
			
		),
		'module_dependencies' => array(
			array(
				'id' => '@zelocorecms/interactivity',
				'import' => 'static'
			)
		),
		'version' => '1f60dd5e3fa56c6b2e2e'
	),
	'boot/index.js' => array(
		'dependencies' => array(
			'react',
			'react-dom',
			'react-jsx-runtime',
			'zc-commands',
			'zc-components',
			'zc-compose',
			'zc-core-data',
			'zc-data',
			'zc-editor',
			'zc-element',
			'zc-html-entities',
			'zc-i18n',
			'zc-keyboard-shortcuts',
			'zc-keycodes',
			'zc-notices',
			'zc-primitives',
			'zc-private-apis',
			'zc-theme',
			'zc-url'
		),
		'module_dependencies' => array(
			array(
				'id' => '@zelocorecms/a11y',
				'import' => 'static'
			),
			array(
				'id' => '@zelocorecms/lazy-editor',
				'import' => 'dynamic'
			),
			array(
				'id' => '@zelocorecms/route',
				'import' => 'static'
			)
		),
		'version' => '54bb5a420026a61c7e4f'
	),
	'connectors/index.js' => array(
		'dependencies' => array(
			'react-jsx-runtime',
			'zc-components',
			'zc-data',
			'zc-element',
			'zc-i18n',
			'zc-private-apis'
		),
		'version' => '274797868955a828dfdc'
	),
	'core-abilities/index.js' => array(
		'dependencies' => array(
			'zc-api-fetch',
			'zc-url'
		),
		'module_dependencies' => array(
			array(
				'id' => '@zelocorecms/abilities',
				'import' => 'static'
			)
		),
		'version' => '012760fd849397dd0031'
	),
	'edit-site-init/index.js' => array(
		'dependencies' => array(
			'react-jsx-runtime',
			'zc-data',
			'zc-element',
			'zc-primitives'
		),
		'module_dependencies' => array(
			array(
				'id' => '@zelocorecms/boot',
				'import' => 'static'
			)
		),
		'version' => 'e57f44d1a9f69e75d2d9'
	),
	'interactivity/index.js' => array(
		'dependencies' => array(
			
		),
		'version' => 'efaa5193bbad9c60ffd1'
	),
	'interactivity-router/full-page.js' => array(
		'dependencies' => array(
			
		),
		'module_dependencies' => array(
			array(
				'id' => '@zelocorecms/interactivity-router',
				'import' => 'dynamic'
			)
		),
		'version' => '5c07cd7a12ae073c5241'
	),
	'interactivity-router/index.js' => array(
		'dependencies' => array(
			
		),
		'module_dependencies' => array(
			array(
				'id' => '@zelocorecms/a11y',
				'import' => 'dynamic'
			),
			array(
				'id' => '@zelocorecms/interactivity',
				'import' => 'static'
			)
		),
		'version' => '71aa17bac91628a0f874'
	),
	'latex-to-mathml/index.js' => array(
		'dependencies' => array(
			
		),
		'version' => 'e5fd3ae6d2c3b6e669da'
	),
	'latex-to-mathml/loader.js' => array(
		'dependencies' => array(
			
		),
		'module_dependencies' => array(
			array(
				'id' => '@zelocorecms/latex-to-mathml',
				'import' => 'dynamic'
			)
		),
		'version' => '4f37456af539bd3d2351'
	),
	'lazy-editor/index.js' => array(
		'dependencies' => array(
			'react-jsx-runtime',
			'zc-block-editor',
			'zc-blocks',
			'zc-components',
			'zc-core-data',
			'zc-data',
			'zc-editor',
			'zc-element',
			'zc-i18n',
			'zc-private-apis',
			'zc-style-engine'
		),
		'version' => '30ab62f45bfe9f971ea0'
	),
	'route/index.js' => array(
		'dependencies' => array(
			'react',
			'react-dom',
			'react-jsx-runtime',
			'zc-private-apis'
		),
		'version' => 'c5843b6c5e84b352f43b'
	),
	'workflow/index.js' => array(
		'dependencies' => array(
			'react',
			'react-dom',
			'react-jsx-runtime',
			'zc-components',
			'zc-data',
			'zc-element',
			'zc-i18n',
			'zc-keyboard-shortcuts',
			'zc-primitives',
			'zc-private-apis'
		),
		'module_dependencies' => array(
			array(
				'id' => '@zelocorecms/abilities',
				'import' => 'static'
			)
		),
		'version' => '13556bc597bbf2a8d620'
	)
);