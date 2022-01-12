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
class Finest_IconBox extends Element {
	/**
	 * Get type
	 *
	 * Returns the unique id for the element
	 *
	 * @return string The element id/type
	 */
	public function get_type() {
		return 'finest-icon-box';
	}

	/**
	 * Get name
	 *
	 * Returns the name for the element
	 *
	 * @return string The element name
	 */
	public function get_name() {
		return esc_html__( 'Finest Icon Box', 'finest-zionbuilder' );
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
		return [ 'icon', 'iconbox', 'finest'];
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
			'icon',
			[
				'type'        => 'icon_library',
				'id'          => 'icon',
				'title'       => esc_html__( 'Icon', 'finest-zionbuilder' ),
				'description' => esc_html__( 'Choose an icon', 'finest-zionbuilder' ),
				'default'     => [
					'family'  => 'Font Awesome 5 Free Regular',
					'name'    => 'star',
					'unicode' => 'uf005',
				],
			]
		);

		$options->add_option(
			'icon_style',
			[
				'type'             => 'select',
				'title'            => esc_html__( 'Icon Box Style', 'finest-zionbuilder' ),
				'options'          => [
					[
						'name' => esc_html__( 'Default', 'finest-zionbuilder' ),
						'id'   => 'style__default',
					],
					[
						'name' => esc_html__( 'Style 01', 'finest-zionbuilder' ),
						'id'   => 'style__one',
					],
					[
						'name' => esc_html__( 'Style 02', 'finest-zionbuilder' ),
						'id'   => 'style__two',
					],
					[
						'name' => esc_html__( 'Style 03', 'finest-zionbuilder' ),
						'id'   => 'style__there',
					],
				],
				'default'          => 'style__default',
			]
		);

		$options->add_option(
			'icon_view',
			[
				'type'             => 'select',
				'title'            => esc_html__( 'Icon View', 'finest-zionbuilder' ),
				'options'          => [
					[
						'name' => esc_html__( 'Default', 'finest-zionbuilder' ),
						'id'   => 'icon_default',
					],
					[
						'name' => esc_html__( 'Stock', 'finest-zionbuilder' ),
						'id'   => 'icon_stock',
					],
					[
						'name' => esc_html__( 'Framed', 'finest-zionbuilder' ),
						'id'   => 'icon_framed',
					],
				],
				'default'          => 'icon_framed',
			]
		);

		$options->add_option(
			'icon_shape',
			[
				'type'             => 'select',
				'title'            => esc_html__( 'Shape', 'finest-zionbuilder' ),
				'options'          => [
					[
						'name' => esc_html__( 'Square', 'finest-zionbuilder' ),
						'id'   => 'icon_square',
					],
					[
						'name' => esc_html__( 'Circle', 'finest-zionbuilder' ),
						'id'   => 'icon_circle',
					],
				],
				'default'          => 'icon_circle',
			]
		);


		$options->add_option(
			'icon_box_text',
			[
				'type'        => 'text',
				'title'       => __( 'Heading', 'finest-zionbuilder' ),
				'default'     => __( 'Finest Icon Heading', 'finest-zionbuilder' ),
				'dynamic'     => [
					'enabled' => true,
				],
			]
		);

		$options->add_option(
			'icon_box_dis',
			[
				'type'        => 'editor',
				'title'       => __( 'Content', 'finest-zionbuilder' ),
				'default'     => __( 'Many desktop publishing packages and web page editors now use for them.', 'finest-zionbuilder' ),
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
		// $this->register_style_options_element(
		// 	'icon_box_warper',
		// 	[
		// 		'title'      => esc_html__( 'Icon Box Wraper Custom', 'finest-zionbuilder' ),
		// 		'selector'   => '{{ELEMENT}} .finest__icon-box',
		// 	]
		// );

		$this->register_style_options_element(
			'icon_styles',
			[
				'title'      => esc_html__( 'Icon styles', 'finest-zionbuilder' ),
				'selector'   => '{{ELEMENT}} .finest__icon span',
			]
		);

		$this->register_style_options_element(
			'heading_styles',
			[
				'title'      => esc_html__( 'Heading styles', 'finest-zionbuilder' ),
				'selector'   => '{{ELEMENT}} .finest__icon-title',
			]
		);

		$this->register_style_options_element(
			'discription_styles',
			[
				'title'      => esc_html__( 'Discription styles', 'finest-zionbuilder' ),
				'selector'   => '{{ELEMENT}} .finest__icon-discription',
			]
		);

	}

	/**
	 * Renders the element based on options
	 *
	 * @return void
	 */
	public function render($options) {

		$icon_style  = $options->get_value( 'icon_style');
		$icon_shape  = $options->get_value( 'icon_shape');
		$icon_view  = $options->get_value( 'icon_view');
		$icon  = $options->get_value( 'icon');
		$heading  = $options->get_value( 'icon_box_text');
		$discription  = $options->get_value( 'icon_box_dis');

		?>
			<div class="finest__icon-box <?php echo esc_attr( $icon_style); ?>" >
				<?php if($icon): ?>
					<div class="finest__icon <?php echo esc_attr( $icon_shape . ' ' . $icon_view) ?>">
						<?php
							$this->attach_icon_attributes('icon', $icon);
							$this->render_tag(
								'span',
								'icon',
								'',
							);
						?>
					</div>
				<?php endif; ?>

				<div class="finest__icon-content">
					<h2 class="finest__icon-title">
						<?php echo esc_html($heading) ?>
					</h2>
					<span class="finest__icon-discription">
						<?php echo fzb_get_meta($discription) ?>
					</span>
				</div>
			</div>
		<?php
	}
}
$elements_manager->register_element( new \Finest\Elements\Finest_IconBox() );