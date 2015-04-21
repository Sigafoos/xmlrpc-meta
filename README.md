# Wordpress XML-RPC Post Meta
By Dan Conley (dan.j.conley@gmail.com)

Wordpress' [XML-RPC API](http://codex.wordpress.org/XML-RPC_WordPress_API) can be pretty nifty, but you can only add/edit *custom* fields, not post *meta* fields. I needed to be able to do that, so now you can.

## Installation
Put in your `wp-content/plugins` directory and activate it. You probably knew that already.

## wp.getPostMeta
### Parameters
* int `blog_id` (which is dumb and useless, just set to 1)
* string `username`
* string `password`
* int `post_id`
* array `fields`: Optional. List of meta fields to return. If `null` then all fields will be returned

### Returns
* array of structs

## wp.EditPostMeta
### Parameters
* int `blog_id` (which is dumb and useless, just set to 1)
* string `username`
* string `password`
* int `post_id`
* array `fields`: An array of structs of the format `key=>value`

### Returns
* `true`
