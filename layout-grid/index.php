<?php
/**
 * Plugin Name: Layout Grid
 * Description: Let any blocks align to a global grid
 * Version:     1.6
 * Author:      Automattic
 * Author URI:  https://automattic.com
 * License:     GPL v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

// Register Block Scripts
add_action( 'init', function() {
	$asset_file   = __DIR__ . '/index.asset.php';
	$asset        = file_exists( $asset_file ) ? require_once $asset_file : null;
	$dependencies = isset( $asset['dependencies'] ) ? $asset['dependencies'] : [];
	$version      = isset( $asset['version'] ) ? $asset['version'] : filemtime( __DIR__ . '/index.js' );

	// Block JS
	wp_register_script(
		'jetpack-layout-grid',
		plugins_url( 'index.js', __FILE__ ),
		$dependencies,
		$version,
		true
	);

	// Block front end style
	wp_register_style(
		'jetpack-layout-grid',
		plugins_url( 'style.css', __FILE__ ),
		[],
		filemtime( __DIR__ . '/style.css' )
	);

	// Block editor style
	wp_register_style(
		'jetpack-layout-grid-editor',
		plugins_url( 'editor.css', __FILE__ ),
		[],
		filemtime( __DIR__ . '/editor.css' )
	);
} );

/**
 * AUTO-GENERATED blocks will be added here
 */

include_once __DIR__ . '/blocks/layout-grid.php';
