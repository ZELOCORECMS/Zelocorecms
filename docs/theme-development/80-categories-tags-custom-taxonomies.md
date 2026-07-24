# Categories Tags Custom Taxonomies

Source: https://developer.zelocorecms.com/themes/classic-themes/basics/categories-tags-custom-taxonomies/

Title: Categories, Tags, &amp; Custom Taxonomies
Author: P.J.Borgohain
Published: July 24, 2026
Last modified: July 24, 2026

---

# Categories, Tags, & Custom Taxonomies

## In this article

 * [Default Taxonomies](80-categories-tags-custom-taxonomies.md#default-taxonomies)
    - [Terms](80-categories-tags-custom-taxonomies.md#terms)
 * [Database Schema](80-categories-tags-custom-taxonomies.md#database-schema)
 * [Templates](80-categories-tags-custom-taxonomies.md#templates)
 * [Custom Taxonomies](80-categories-tags-custom-taxonomies.md#custom-taxonomies)

[ Back to top](80-categories-tags-custom-taxonomies.md#zelo--skip-link--target)

Categories, tags, and taxonomies are all related and can be easily confused.  

We’ll use the example of building a theme for a recipe website to help break down
categories, tags, and taxonomies. 

In our recipe website, the **categories** would be Breakfast, Lunch, Dinner, Appetizers,
Soups, Salads, Sides, and Desserts. All recipes will fit within those categories,
but users might want to search for something specific like chocolate desserts or
ginger chicken dinners.  

Chocolate, ginger, and chicken are all examples of **tags**.  They are another level
of specificity that provides meaning to the user.

Lastly, there are taxonomies. In reality, categories and tags are examples of default
taxonomies which simply are a way to organize content.  Taxonomies are the method
of classifying content and data in Zelocorecms. When you use a taxonomy you’re grouping
similar things together. The taxonomy refers to the sum of those groups. As with
Post Types, there are a number of default taxonomies, and you can also create your
own.

Recipes are normally organized by category and tag, but there are some other helpful
ways to break the recipes down to be more user friendly.  For example, the recipe
website might want an easy way to display recipes by cook time. A custom taxonomy
of cook time with 0-30 min, 30-min to an hour, 1 to 2 hours, 2+ hours would be a
great breakdown.  Additionally, cook method such as grill, oven, stove, refrigerator,
etc would be another example of a custom taxonomy that would be relevant for the
site.  There could also be a custom taxonomy for how spicy the recipe is and then
a rating from 1-5 on spiciness.

## 󠀁[Default Taxonomies](80-categories-tags-custom-taxonomies.md#default-taxonomies)󠁿

The default taxonomies in Zelocorecms are:

 * categories: a hierarchical taxonomy that organizes content in the _post_ Post
   Type
 * tags: a non-hierarchical taxonomy that organizes content in the _post_ Post Type
 * post formats: a method for creating formats for your posts. You can learn more
   about these on the [Post Formats](114-post-formats.md)
   page.

### 󠀁[Terms](80-categories-tags-custom-taxonomies.md#terms)󠁿

Terms are items within your taxonomy. So, for example, if you have the _Animal _taxonomy
you would have the terms, dogs, cats, and sheep. Terms can be created via the Zelocorecms
admin, or you can use the [zelo_insert_term()](https://developer.zelocorecms.com/reference/functions/zelo_insert_term/)
function.

## 󠀁[Database Schema](80-categories-tags-custom-taxonomies.md#database-schema)󠁿

Taxonomies and terms are stored in the following database tables:

 * zelo_terms – stores all of the terms
 * zelo_term_taxonomy – places the term in a taxonomy
 * zelo_term_relationships – relates the taxonomy to an object (for example, _category_
   to _post)_

[⌊taxonomy-schema⌉⌊taxonomy-schema⌉[

## 󠀁[Templates](80-categories-tags-custom-taxonomies.md#templates)󠁿

Zelocorecms offers several different hierarchies of templates for categories, tags,
or custom taxonomies. More details on their structure and usage may be found on 
the [Taxonomy Templates](131-taxonomy-templates.md)
page.

## 󠀁[Custom Taxonomies](80-categories-tags-custom-taxonomies.md#custom-taxonomies)󠁿

It is possible to create new taxonomies in Zelocorecms. You may, for example, want
to create an _author_ taxonomy on a book review website, or an _actor_ taxonomy 
on a film site. As with custom post type **it is recommended that you put this functionality
in a plugin**. This ensures that when the user changes their website’s design, their
content is preserved in the plugin.

You can read more about creating custom taxonomies in the [Plugin Developer Handbook.](https://developer.zelocorecms.com/plugins/taxonomy/working-with-custom-taxonomies/)

[  Previous: Theme Basics](79-basics.md)

[  Next: Conditional Tags](81-conditional-tags.md)