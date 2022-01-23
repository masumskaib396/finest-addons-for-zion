<?php

use ZionBuilder\Plugin;
use ZionBuilder\Install;
use ZionBuilder\Elements\Widget\Widget;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

final class Finest_ZionBuilder_Extension {

	const VERSION = '1.0.0';
	const MINIMUM_ELEMENTOR_VERSION = '2.6.0';
	const MINIMUM_PHP_VERSION = '5.6';


	private static $_instance = null;

	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}


	public function __construct() {

		add_action( 'init', [ $this, 'i18n' ] );
		add_action( 'plugins_loaded', [ $this, 'init' ] );

	}

	public function i18n() {
		load_plugin_textdomain( 'finest-zionbuilder' );
	}



	public function init() {
		add_filter( 'zionbuilder/elements/categories', [ $this, 'fzb_elements_categories' ] );
        add_action( 'zionbuilder/elements_manager/register_elements', [ $this, 'fzb_register_elements' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'fzb_enqueue_scripts' ] );

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}
	}

	// Enqueue Script
	public function fzb_enqueue_scripts(){
		// css enqueue

		wp_enqueue_style(
			'finest-zionbuilder-style',
			FZB_ASSETS_PUBLIC .'/frontend/css/widget-style.css',
			null, FZB_VERSION
		);

		wp_enqueue_style(
			'animated',
			FZB_ASSETS_PUBLIC .'/frontend/css/animate.css',
			null, FZB_VERSION
		);





		// css javascript
		wp_enqueue_script(
			'jstyped',
			FZB_ASSETS_PUBLIC .'/frontend/js/typed.min.js',
			['jquery'], FZB_VERSION, true
		);

		wp_enqueue_script(
			'finest-zionbuilder',
			FZB_ASSETS_PUBLIC .'/frontend/js/widget.js',
			['jquery'], time(), true
		);



	}

	public function fzb_elements_categories( $categories ) {
        $finest_plugin_category = [
          [
             'id'       => 'finest-category',
             'name'     => __( 'Finest Addons', 'finest-zionbuilder' ),
             'priority' => 10,
          ],
        ];

        return array_merge( $categories, $finest_plugin_category  );
    }

	public function fzb_register_elements( $elements_manager ) {

		require_once( FZB_WIDGET_DIR . 'Iconbox/widget.php');
		require_once( FZB_WIDGET_DIR . 'AnimateText/widget.php');
		require_once( FZB_WIDGET_DIR . 'Testimonial/widget.php');
		require_once( FZB_WIDGET_DIR . 'GradientHeading/widget.php');
		require_once( FZB_WIDGET_DIR . 'DualHeading/widget.php');
		require_once( FZB_WIDGET_DIR . 'TeamMembar/widget.php');

    }
	public $elements_manager = null;



	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'finest-zionbuilder' ),
			'<strong>' . esc_html__( 'Finest Zionbuilder  Extension', 'finest-zionbuilder' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'finest-zionbuilder' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}
}
Finest_ZionBuilder_Extension::instance();
