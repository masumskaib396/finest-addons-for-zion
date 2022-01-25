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
class Finest_Team_Member extends Element {
	/**
	 * Get type
	 *
	 * Returns the unique id for the element
	 *
	 * @return string The element id/type
	 */
	public function get_type() {
		return 'finest-team-member';
	}

	/**
	 * Get name
	 *
	 * Returns the name for the element
	 *
	 * @return string The element name
	 */
	public function get_name() {
		return esc_html__( 'Finest Team Member', 'finest-zionbuilder' );
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
		return [ 'team', 'member', 'card', 'testimonial'];
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
			'member_style',
			[
				'type'             => 'select',
				'title'            => esc_html__( 'Select Style', 'finest-zionbuilder' ),
				'options'          => [
					[
						'name' => esc_html__( 'Style 01', 'finest-zionbuilder' ),
						'id'   => 'style-one',
					],
					[
						'name' => esc_html__( 'Style 02', 'finest-zionbuilder' ),
						'id'   => 'style-two',
					],
					[
						'name' => esc_html__( 'Style 03', 'finest-zionbuilder' ),
						'id'   => 'style-three',
					],
					[
						'name' => esc_html__( 'Style 04', 'finest-zionbuilder' ),
						'id'   => 'style-four',
					],
				],
				'default'          => 'style-one',
			]
		);

        $options->add_option(
			'image',
			[
				'type'        => 'image',
				'description' => 'Choose the desired member photo.',
				'title'       => esc_html__( 'Member Photo', 'finest-zionbuilder' ),
				'show_size'   => false,
				'default'     => $this->get_url( 'empty-profile-photo.svg' ),
			]
		);

        $options->add_option(
			'name',
			[
				'type'        => 'text',
				'title'       => __( 'Member name', 'finest-zionbuilder' ),
				'description' => __( 'Set the desired Member name.', 'finest-zionbuilder' ),
				'placeholder' => __( 'Member name', 'finest-zionbuilder' ),
				'default'     => esc_html__( 'Robert Fox', 'finest-zionbuilder' ),
				'dynamic'     => [
					'enabled' => true,
				],
			]
		);

		$options->add_option(
			'designation',
            [
				'type'        => 'text',
				'title'       => __( 'Designation', 'finest-zionbuilder' ),
				'description' => __( 'Set the client Designation.', 'finest-zionbuilder' ),
				'placeholder' => __( 'Designation', 'finest-zionbuilder' ),
				'default'     => __( "Founder at Brain.co", 'finest-zionbuilder' ),
				'dynamic'     => [
					'enabled' => true,
				],
			]
		);

		$options->add_option(
			'show_member_social_links',
			[
				'type'    => 'checkbox_switch',
				'title'   => esc_html__( 'Show Social Links', 'finest-zionbuilder' ),
				'default' => false,
				'layout'  => 'inline',
			]
		);

		$icons = $options->add_option(
			'icons',
			[
				'type'               => 'repeater',
				'title'              => __( 'Social Links', 'finest-zionbuilde' ),
				'add_button_text'    => __( 'Add new list item', 'finest-zionbuilde' ),
				'item_title'         => 'text',
				'default_item_title' => 'item %s',
				'default'            => [
					[
						'text' => 'Icon #1',
						'icon' => [
							'family'  => 'Font Awesome 5 Brands Regular',
							'name'    => 'facebook-f',
							'unicode' => 'uf39e',
						],
					],
					[
						'text' => 'Icon #2',
						'icon' => [
							'family'  => 'Font Awesome 5 Brands Regular',
							'name'    => 'twitter',
							'unicode' => 'uf099',
						],
					],
					[
						'text' => 'Icon #3',
						'icon' => [
							'family'  => 'Font Awesome 5 Brands Regular',
							'name'    => 'linkedin-in',
							'unicode' => 'uf0e1',
						],
					],
				],
				'dependency'   => [
					[
						'option' => 'show_member_social_links',
						'value'  => [true],
					],
				],
			]
		);

		$icons->add_option(
			'icon',
			[
				'type'        => 'icon_library',
				'id'          => 'icon',
				'title'       => esc_html__( 'Icon', 'finest-zionbuilde' ),
				'description' => esc_html__( 'Choose an icon', 'finest-zionbuilde' ),
			]
		);

		$icons->add_option(
			'link',
			[
				'type'        => 'link',
				'description' => 'This is the element content',
				'title'       => __( 'Link', 'finest-zionbuilde' ),
			]
		);

		$icons->add_option(
			'icon_color',
			[
				'type'        => 'colorpicker',
				'title'       => __( 'Icon Color', 'finest-zionbuilde' ),
				'description' => __( 'Select the color of the icon', 'finest-zionbuilde' ),
				'default'     => '#006dd2',
				'css_style'   => [
					[
						'selector' => '{{ELEMENT}} .fzb__member-item--{{INDEX}} .fzb__member-itemIcon',
						'value'    => 'color: {{VALUE}}',
					],
				],
			]
		);

		$icons->add_option(
			'icon_bg_color',
			[
				'type'        => 'colorpicker',
				'title'       => __( 'Icon Background Color', 'finest-zionbuilde' ),
				'description' => __( 'Select the Background color of the icon', 'finest-zionbuilde' ),
				'default'     => '#ddd',
				'css_style'   => [
					[
						'selector' => '{{ELEMENT}} .fzb__member-item--{{INDEX}} .fzb__member-itemIcon',
						'value'    => 'background-color: {{VALUE}}',
					],
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
			'member_box_image',
			[
				'title'      => esc_html__( 'Member Image', 'finest-zionbuilder' ),
				'selector'   => '{{ELEMENT}} .fzb__member-image img',
			]
		);

		$this->register_style_options_element(
			'member_name_styles',
			[
				'title'      => esc_html__( 'Name', 'finest-zionbuilder' ),
				'selector'   => '{{ELEMENT}} .fzb__member-name',
			]
		);

		$this->register_style_options_element(
			'member_designation_styles',
			[
				'title'      => esc_html__( 'Member Designation', 'finest-zionbuilder' ),
				'selector'   => '{{ELEMENT}} .fzb__member-designation',
			]
		);

		$this->register_style_options_element(
			'member_box_styles',
			[
				'title'      => esc_html__( 'Box', 'finest-zionbuilder' ),
				'selector'   => '{{ELEMENT}} .fzb__member-wraper',
			]
		);

		$this->register_style_options_element(
			'member_content_box_styles',
			[
				'title'      => esc_html__( 'Content Box', 'finest-zionbuilder' ),
				'selector'   => '{{ELEMENT}} .fzb-member-info',
			]
		);

		$this->register_style_options_element(
			'member_social_styles',
			[
				'title'      => esc_html__( 'Social Links', 'finest-zionbuilder' ),
				'selector'   => '{{ELEMENT}} .fzb__member-social-links .fzb__member-itemIcon',
			]
		);


	}

	/**
	 * Renders the element based on options
	 *
	 * @return void
	 */
	public function render($options) {

		$member_style = $options->get_value('member_style');
		$image = $options->get_value('image');
        $name = $options->get_value('name');
        $designation = $options->get_value('designation');
        $show_member_social_links = $options->get_value('show_member_social_links');


		$icons = $options->get_value( 'icons', [] );
		$index = 0;

		?>

		<div class="fzb__member-wraper <?php echo esc_attr( $member_style ); ?>">
				<?php if ($member_style) {
					include('version/' . $member_style . '.php');
				} ?>
		</div>

		<?php

	}

}
$elements_manager->register_element( new \Finest\Elements\Finest_Team_Member() );