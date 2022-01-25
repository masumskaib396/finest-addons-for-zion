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
class Finest_Image_Comparison extends Element {
	/**
	 * Get type
	 *
	 * Returns the unique id for the element
	 *
	 * @return string The element id/type
	 */
	public function get_type() {
		return 'finest-image-comparison';
	}

	/**
	 * Get name
	 *
	 * Returns the name for the element
	 *
	 * @return string The element name
	 */
	public function get_name() {
		return esc_html__( 'Finest Image Comparison', 'finest-zionbuilder' );
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
		return [ 'iamge', 'before', 'after', 'comparison'];
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
			'before_image',
			[
				'type'        => 'image',
				'description' => 'Choose the desired Before image',
				'title'       => esc_html__( 'Before Image', 'finest-zionbuilder' ),
				'show_size'   => false,
				'default'     => $this->get_url( 'empty-profile-photo.svg' ),
			]
		);

		$options->add_option(
			'after_image',
			[
				'type'        => 'image',
				'description' => 'Choose the desired after image',
				'title'       => esc_html__( 'After Image', 'finest-zionbuilder' ),
				'show_size'   => false,
				'default'     => $this->get_url( 'empty-profile-photo.svg' ),
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


	}

	/**
	 * Renders the element based on options
	 *
	 * @return void
	 */
	public function render($options) {

		$before_image = $options->get_value('before_image');
		$after_image = $options->get_value('after_image');

        ?>
            <div id="container1">


                <!-- The before image is first -->
                <div class="fzb__before-image">
					<img src="<?php echo esc_url( $before_image ); ?>" />
				</div>

                <!-- The after image is last -->
				<div class="fzb__before-image">
                	<img src="<?php echo esc_url( $after_image ); ?>" />
				</div>
            </div>
        <?php
	}
}
$elements_manager->register_element( new \Finest\Elements\Finest_Image_Comparison() );