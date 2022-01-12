<?php
/*
Plugin Name: Finest Addons For zionbuilder
Plugin URI: https://github.com/masumskaib396/FZB-for-elementor
Description: The finest addons is an Elementor helping plugin that will make your designing work easier.
Our specialities are custom CSS, Nested section, Creative Buttons.
Version: 1.0.0
Author: finest-addons
Author URI: https://profiles.wordpress.org/finest-addons
License: GPLv2 or later
Text Domain: finest-zionbuilder
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

//Set plugin version constant.
define( 'FZB_VERSION', '1.0.0');

/* Set constant path to the plugin directory. */
define( 'FZB_WIDGET', trailingslashit( plugin_dir_path( __FILE__ ) ) );
// Plugin Function Folder Path
define( 'FZB_WIDGET_INC', plugin_dir_path( __FILE__ ) . 'includes/' );

// Plugin Extensions Folder Path
define( 'FZB_WIDGET_EXTENSIONS', plugin_dir_path( __FILE__ ) . 'extensions/' );

// Plugin Widget Folder Path
define( 'FZB_WIDGET_DIR', plugin_dir_path( __FILE__ ) . 'widgets/' );

// Assets Folder URL
define( 'FZB_ASSETS_PUBLIC', plugins_url( 'assets', __FILE__ ) );

// Assets Folder URL
define( 'FZB_ASSETS_VERDOR', plugins_url( 'assets/vendor', __FILE__ ) );


require_once( FZB_WIDGET_INC . 'helper-function.php');
require_once( FZB_WIDGET . 'base.php' );
require_once( FZB_WIDGET_INC . 'extensions/style-option.php');

?>
