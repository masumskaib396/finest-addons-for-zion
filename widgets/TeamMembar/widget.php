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
class Finest_Team_Membar extends Element {
	/**
	 * Get type
	 *
	 * Returns the unique id for the element
	 *
	 * @return string The element id/type
	 */
	public function get_type() {
		return 'finest-team-membar';
	}

	/**
	 * Get name
	 *
	 * Returns the name for the element
	 *
	 * @return string The element name
	 */
	public function get_name() {
		return esc_html__( 'Finest Team Membar', 'finest-zionbuilder' );
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
		return [ 'team', 'membar', 'card', 'testimonial'];
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
			'image',
			[
				'type'        => 'image',
				'description' => 'Choose the desired membar photo.',
				'title'       => esc_html__( 'Membar Photo', 'finest-zionbuilder' ),
				'show_size'   => false,
				'default'     => $this->get_url( 'empty-profile-photo.svg' ),
			]
		);

        $options->add_option(
			'name',
			[
				'type'        => 'text',
				'title'       => __( 'Membar name', 'finest-zionbuilder' ),
				'description' => __( 'Set the desired Membar name.', 'finest-zionbuilder' ),
				'placeholder' => __( 'Membar name', 'finest-zionbuilder' ),
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
			'show_membar_social_links',
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
				'title'              => __( 'List items', 'zionbuilder' ),
				'add_button_text'    => __( 'Add new list item', 'zionbuilder' ),
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
						'option' => 'show_membar_social_links',
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
				'title'       => esc_html__( 'Icon', 'zionbuilder' ),
				'description' => esc_html__( 'Choose an icon', 'zionbuilder' ),
			]
		);

		$icons->add_option(
			'link',
			[
				'type'        => 'link',
				'description' => 'This is the element content',
				'title'       => __( 'Link', 'zionbuilder' ),
			]
		);

		$icons->add_option(
			'icon_color',
			[
				'type'        => 'colorpicker',
				'title'       => __( 'Icon Color', 'zionbuilder' ),
				'description' => __( 'Select the color of the icon', 'zionbuilder' ),
				'default'     => '#006dd2',
				'css_style'   => [
					[
						'selector' => '{{ELEMENT}} .fzb__membar-item--{{INDEX}} .fzb__membar-itemIcon',
						'value'    => 'color: {{VALUE}}',
					],
				],
			]
		);

		$icons->add_option(
			'icon_bg_color',
			[
				'type'        => 'colorpicker',
				'title'       => __( 'Icon Background Color', 'zionbuilder' ),
				'description' => __( 'Select the Background color of the icon', 'zionbuilder' ),
				'default'     => '#ddd',
				'css_style'   => [
					[
						'selector' => '{{ELEMENT}} .fzb__membar-item--{{INDEX}} .fzb__membar-itemIcon',
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



	}

	/**
	 * Renders the element based on options
	 *
	 * @return void
	 */
	public function render($options) {

		$image = $options->get_value('image');
        $name = $options->get_value('name');
        $designation = $options->get_value('designation');

		$icons = $options->get_value( 'icons', [] );
		$index = 0;

		?>

		<div class="fzb__membar-wraper">

			<div class="fzb__membar-image">
				<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_html( $name ); ?>">
			</div>

			<div class="fzb-membar-info">
				<?php if( $name ): ?>
					<h3 class="fzb__membar-name">
						<?php echo esc_html( $name ); ?>
					</h3>
				<?php endif; ?>

				<?php if( $designation ): ?>
					<span class="fzb__membar-designation">
						<?php echo esc_html( $designation ); ?>
					</span>
				<?php endif; ?>


				<div class="fzb__membar-social-links">
					<?php
						foreach ( $icons as $key => $config ) {
							$icon_html        = '';
							$text_html        = '';
							$html_tag         = 'span';
							$link             = ! empty( $config['link'] ) ? $config['link'] : false;

							$item_index_class = sprintf( 'fzb__membar-item fzb__membar-item--%s', $key);

							$combined_icon_attr = $this->render_attributes->get_combined_attributes( 'icon_styles', [ 'class' => 'fzb__membar-itemIcon' ] );
							$combined_text_attr = $this->render_attributes->get_combined_attributes( 'text_styles', [ 'class' => 'fzb__membar-itemText' ] );
							$combined_item_attr = $this->render_attributes->get_combined_attributes( 'item_styles', [ 'class' => $item_index_class ] );
							if ( ! empty( $link['link'] ) ) {
								$this->attach_link_attributes( 'item' . $index, $link );
								$html_tag = 'a';
							}
							if ( ! empty( $config['icon'] ) ) {
								$this->attach_icon_attributes( 'icon', $config['icon'] );
								$icon_html = $this->get_render_tag(
									'span',
									'icon',
									'',
									$combined_icon_attr
								);
							}
							$this->render_tag(
								$html_tag,
								'item' . $index, [ $icon_html, $text_html ],
								$combined_item_attr
							);

						};
					?>
				</div>
			</div>

		</div>

		<?php

	}

}
$elements_manager->register_element( new \Finest\Elements\Finest_Team_Membar() );