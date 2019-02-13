<?php

namespace Arvernus\Apple_Maps_Gutenberg_Block;


function register_block_assets() {

	$editor_js_path = '/assets/js/editor.blocks.js';
	wp_register_script(
		'arvernus-apple-maps-block',
		_get_plugin_url() . $editor_js_path,
		[ 'wp-i18n', 'wp-element', 'wp-blocks', 'wp-components', 'wp-editor' ],
		filemtime( _get_plugin_directory() . $editor_js_path )
	);

	$editor_style_path = '/assets/css/blocks.editor.css';
	wp_register_style(
		'arvernus-apple-maps-block-editor-style',
		_get_plugin_url() . $editor_style_path,
		[ 'wp-blocks' ],
		filemtime( _get_plugin_directory() . $editor_style_path )
	);

	$frontend_js_path = '/assets/js/frontend.blocks.js';
	wp_register_script(
		'arvernus-apple-maps-block-script',
		_get_plugin_url() . $frontend_js_path,
		[ 'wp-i18n', 'wp-dom-ready' ],
		filemtime( _get_plugin_directory() . $frontend_js_path )
	);

	$frontend_style_path = '/assets/css/blocks.style.css';
	wp_register_style(
		'arvernus-apple-maps-block-style',
		_get_plugin_url() . $frontend_style_path,
		null,
		filemtime( _get_plugin_directory() . $frontend_style_path )
	);

	wp_set_script_translations( 'arvernus-apple-maps-block', 'arvernus', _get_plugin_directory() . 'languages/' );

	register_block_type( 'arvernus/apple-maps-block', array(
		'editor_script' => 'arvernus-apple-maps-block',
		'editor_style' => 'arvernus-apple-maps-block-editor-style',
		// 'script' => 'arvernus-apple-maps-block-script',
		'style' => 'arvernus-apple-maps-block-style',
	) );
}

add_action('init', __NAMESPACE__.'\register_block_assets');