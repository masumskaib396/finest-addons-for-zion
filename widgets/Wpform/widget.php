<?php

namespace Finest\Elements;
use ZionBuilder\Elements\Element;
use ZionBuilder\Utils;

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
	return;
}

/**
 * Class Text
 *
 */
class Finest_Wpform extends Element {
	/**
	 * Get type
	 *
	 * Returns the unique id for the element
	 *
	 * @return string The element id/type
	 */
	public function get_type() {
		return 'finest-wp-form';
	}

	/**
	 * Get name
	 *
	 * Returns the name for the element
	 *
	 * @return string The element name
	 */
	public function get_name() {
		return esc_html__( 'Finest WpForm ', 'finest-zionbuilder' );
	}




    public function get_category() {
		return 'finest-category';
	}

	/**
	 * Get keywords
	 *
	 * Returns the keywords for this element
	 *
	 * @return array<string> The list of element keywords
	 */
	public function get_keywords() {
		return [ 'form', 'contact', 'wp'];
	}

	/**
	 * Get Element Icon
	 *
	 * Returns the icon used in add elements panel for this element
	 *
	 * @return string The element icon
	 */
	public function get_element_icon() {
		return 'element-icon';
	}

	/**
	 * Registers the element options
	 *
	 * @return void
	 */

	public function options( $options ) {

        $options->add_option(
			'finest_wp_form_shortcode',
            [
				'type'        => 'text',
				'title'       => __( 'Input Your Wpform Shortcode', 'finest-zionbuilder' ),
				'placeholder' => __( '[wpforms id="2107" title="false"]', 'finest-zionbuilder' ),
				'dynamic'     => [
					'enabled' => true,
				],
			]
		);



	}

    /**
	 * Get style elements
	 *
	 * Returns a list of elements/tags that for which you
	 * want to show style options
	 *
	 * @return void
	 */
	public function on_register_styles() {

		$this->register_style_options_element(
			'input_label',
			[
				'title'      => esc_html__( 'Label Style', 'finest-zionbuilder' ),
				'selector'   => '{{ELEMENT}} .wpforms-field-container label.wpforms-field-label',
			]
		);

		$this->register_style_options_element(
			'input_placeholder',
			[
				'title'      => esc_html__( 'Placeholder Style', 'finest-zionbuilder' ),
				'selector'   => '{{ELEMENT}} ::-webkit-input-placeholder, ::-moz-placeholder, ::-ms-input-placeholder',
			]
		);

		$this->register_style_options_element(
			'input_text',
			[
				'title'      => esc_html__( 'Input Style', 'finest-zionbuilder' ),
				'selector'   => '{{ELEMENT}} .wpforms-field input',
			]
		);

		$this->register_style_options_element(
			'input_textarea',
			[
				'title'      => esc_html__( 'Textarea Style', 'finest-zionbuilder' ),
				'selector'   => '{{ELEMENT}} .wpforms-field-textarea textarea',
			]
		);

		$this->register_style_options_element(
			'subtitle_style',
			[
				'title'      => esc_html__( 'Sub Title Style', 'finest-zionbuilder' ),
				'selector'   => '{{ELEMENT}} .wpforms-field-sublabel',
			]
		);

		$this->register_style_options_element(
			'button_style',
			[
				'title'      => esc_html__( 'Button Style', 'finest-zionbuilder' ),
				'selector'   => '{{ELEMENT}} .wpforms-submit',
			]
		);

	}

	/**
	 * Renders the element based on options
	 *
	 * @return void
	 */
	public function render($options) {

        $finest_wp_form_shortcode = $options->get_value('finest_wp_form_shortcode');

        ?>
        <div class="fzb__wp-wraper">
              <?php echo do_shortcode( $finest_wp_form_shortcode ); ?>
        </div>
        <?php


	}
}
$elements_manager->register_element( new \Finest\Elements\Finest_Wpform() );