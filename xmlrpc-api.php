<?php
/*
   Plugin Name: XML-RPC Post Meta
   Plugin URI:
   Description: Add XML-RPC methods to get and edit post meta
   Version: 0.5.2.3
   Author: Dan Conley
   Author URI: http://www.danconley.net
   License: Kopyleft
   */

function get_meta($args) {
	global $wp_xmlrpc_server;
	$wp_xmlrpc_server->escape($args);

	$blog_id = $args[0]; // this is useless
	$username = $args[1];
	$password = $args[2];
	$postID = $args[3];
	$content = $args[4];

	if (!$user = $wp_xmlrpc_server->login($username, $password) || !$args[3]) return $wp_xmlrpc_server->error;

	if ($content) {
		foreach ($content['custom_fields'] as $meta) {
			$return[] = get_post_meta($postID, $meta, TRUE);
		}
	} else {
		$return = get_post_meta($postID);
	}
	return $return;
}

function edit_meta($args) {
	global $wp_xmlrpc_server;
	$wp_xmlrpc_server->escape($args);

	$blog_id = $args[0]; // this is useless
	$username = $args[1];
	$password = $args[2];
	$postID = $args[3];
	$content = $args[4];

	if (!$user = $wp_xmlrpc_server->login($username, $password) || !$args[3] || !$args[4]) return $wp_xmlrpc_server->error;

	return "um this doesn't do anything yet";
}

function add_new_xmlrpc_methods($methods) {
	$methods['wp.getPostMeta'] = 'get_meta';
	$methods['wp.editPostMeta'] = 'edit_meta';

	return $methods;
}
add_filter('xmlrpc_methods', 'add_new_xmlrpc_methods');
?>
