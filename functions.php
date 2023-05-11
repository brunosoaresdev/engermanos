<?php
	// Define theme constants
	define('BS_PARTIALS_PATH', get_stylesheet_directory() . '/partials/');

	// Defines funcionts of the framework
	require_once ('functions/_setup.php');
	require_once ('functions/_custom.php');
	require_once ('functions/_navwalker.php');

	// Defines functions about wp-admin
	require_once ('functions/_admin.php');

	// Defines custom functions
	require_once ('functions/_options.php');
	
	// disable gutenberg editor
	add_filter('use_block_editor_for_post', '__return_false', 10);
	add_filter('wpcf7_autop_or_not', '__return_false');

	add_filter('wpcf7_form_elements', function($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);
    return $content;
	});