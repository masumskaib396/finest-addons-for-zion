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
class Finest_Dual_Heading extends Element {
	/**
	 * Get type
	 *
	 * Returns the unique id for the element
	 *
	 * @return string The element id/type
	 */
	public function get_type() {
		return 'finest-dual-heading';
	}

	/**
	 * Get name
	 *
	 * Returns the name for the element
	 *
	 * @return string The element name
	 */
	public function get_name() {
		return esc_html__( 'Finest Dual Heading', 'finest-zionbuilder' );
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
		return [ 'heading', 'dual', 'finest', 'multi', 'title'];
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
			'finest-dual-heading-before',
			[
				'type'        => 'text',
				'title'       => __( 'Before Heading', 'finest-zionbuilder' ),
				'default'     => __( 'BEFORE', 'finest-zionbuilder' ),
				'dynamic'     => [
					'enabled' => true,
				],
			]
		);
		$options->add_option(
			'd-before-block',
			[
				'type'    => 'checkbox_switch',
				'title'   => esc_html__( 'Before Text Block', 'finest-zionbuilder' ),
				'default' => false,
				'layout'  => 'inline',
			]
		);
        $options->add_option(
			'finest-dual-heading-middle',
			[
				'type'        => 'text',
				'title'       => __( 'Middle Heading', 'finest-zionbuilder' ),
				'default'     => __( 'MIDDLE', 'finest-zionbuilder' ),
				'dynamic'     => [
					'enabled' => true,
				],
			]
		);
		$options->add_option(
			'd-middle-block',
			[
				'type'    => 'checkbox_switch',
				'title'   => esc_html__( 'Middle Text Block', 'finest-zionbuilder' ),
				'default' => false,
				'layout'  => 'inline',
			]
		);
        $options->add_option(
			'finest-dual-heading-after',
			[
				'type'        => 'text',
				'title'       => __( 'After Heading', 'finest-zionbuilder' ),
				'default'     => __( 'AFTER', 'finest-zionbuilder' ),
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
			'dual_heading_before_style',
			[
				'title'      => esc_html__( 'Before styles', 'finest-zionbuilder' ),
				'selector'   => '{{ELEMENT}} .fzb__duul-headding-before',
			]
		);

        $this->register_style_options_element(
			'dual_heading_middle_style',
			[
				'title'      => esc_html__( 'Middle styles', 'finest-zionbuilder' ),
				'selector'   => '{{ELEMENT}} .fzb__duul-headding-middle',
			]
		);

        $this->register_style_options_element(
			'dual_heading_after_style',
			[
				'title'      => esc_html__( 'After styles', 'finest-zionbuilder' ),
				'selector'   => '{{ELEMENT}} .fzb__duul-headding-after',
			]
		);



	}

	/**
	 * Renders the element based on options
	 *
	 * @return void
	 */
	public function render($options) {
        $heading_before   = $options->get_value('finest-dual-heading-before');
        $heading_middle   = $options->get_value('finest-dual-heading-middle');
        $heading_after   = $options->get_value('finest-dual-heading-after');

        $d_before_block   = $options->get_value('d-before-block');
        $d_middle_block   = $options->get_value('d-middle-block');

		if( true == $d_before_block ){
			$before_block = 'before-block';
		}else{
			$before_block ='';
		};

		if( true == $d_middle_block ){
			$middle_block = 'middle-block';
		}else{
			$middle_block = '';
		};



        ?>
            <h1 class="fzb__duul-headding-wrap">
                <?php if($heading_before): ?>
                    <span class="fzb__duul-headding-before <?php echo esc_attr( $before_block ); ?>">
                        <?php echo esc_html( $heading_before ); ?>
                    </span>
                <?php endif; ?>

                <?php if($heading_middle): ?>
                    <span class="fzb__duul-headding-middle <?php echo esc_attr( $middle_block ); ?>">
                        <?php echo esc_html( $heading_middle ); ?>
                    </span>
                <?php endif; ?>

                <?php if($heading_after): ?>
                    <span class="fzb__duul-headding-after">
                        <?php echo esc_html( $heading_after ); ?>
                    </span>
                <?php endif; ?>
            </h1>
        <?php


	}
}
$elements_manager->register_element( new \Finest\Elements\Finest_Dual_Heading() );