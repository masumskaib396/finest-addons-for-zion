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
class Finest_Cf7 extends Element {
	/**
	 * Get type
	 *
	 * Returns the unique id for the element
	 *
	 * @return string The element id/type
	 */
	public function get_type() {
		return 'finest-cf7-box';
	}

	/**
	 * Get name
	 *
	 * Returns the name for the element
	 *
	 * @return string The element name
	 */
	public function get_name() {
		return esc_html__( 'Finest Contact Form 7', 'finest-zionbuilder' );
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
		return [ 'form', 'contact', 'cf7'];
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
			'finest_cf7_form_shortcode',
            [
				'type'        => 'text',
				'title'       => __( 'Input Your Contact Form 7 Shortcode', 'finest-zionbuilder' ),
				'placeholder' => __( '[contact-form-7 id="2065" title="Contact form 1"]', 'finest-zionbuilder' ),
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
				'selector'   => '{{ELEMENT}} .fzb__cf7-wraper label',
			]
		);

		$this->register_style_options_element(
			'input_text_style',
			[
				'title'      => esc_html__( 'Input Field Style', 'finest-zionbuilder' ),
				'selector'   => '{{ELEMENT}} .fzb__cf7-wraper .wpcf7-form-control:not(.wpcf7-submit)',
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
			'input_textarea',
			[
				'title'      => esc_html__( 'Textarea Style', 'finest-zionbuilder' ),
				'selector'   => '{{ELEMENT}} .fzb__cf7-wraper .wpcf7-textarea',
			]
		);
		$this->register_style_options_element(
			'input_button',
			[
				'title'      => esc_html__( 'Button Style', 'finest-zionbuilder' ),
				'selector'   => '{{ELEMENT}} .fzb__cf7-wraper .wpcf7-submit',
			]
		);

	}

	/**
	 * Renders the element based on options
	 *
	 * @return void
	 */
	public function render($options) {

        $finest_cf7_form_shortcode = $options->get_value('finest_cf7_form_shortcode');

        ?>
        <div class="fzb__cf7-wraper">
              <?php echo do_shortcode( $finest_cf7_form_shortcode ); ?>
        </div>
        <?php


	}
}
$elements_manager->register_element( new \Finest\Elements\Finest_Cf7() );