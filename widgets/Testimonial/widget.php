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
class Finest_Zion_Testimonial extends Element {
	/**
	 * Get type
	 *
	 * Returns the unique id for the element
	 *
	 * @return string The element id/type
	 */
	public function get_type() {
		return 'finest-testimonial';
	}

	/**
	 * Get name
	 *
	 * Returns the name for the element
	 *
	 * @return string The element name
	 */
	public function get_name() {
		return esc_html__( 'Finest Testimonial', 'finest-zionbuilder' );
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
		return [ 'testimonila', 'reviw', 'rating', 'client'];
	}

	/**
	 * Get Element Icon
	 *
	 * Returns the icon used in add elements panel for this element
	 *
	 * @return string The element icon
	 */
	public function get_element_icon() {
		return 'element-testimonial';
	}

	/**
	 * Registers the element options
	 *
	 * @return void
	 */

	public function options( $options ) {


		$options->add_option(
			'testimonial_style',
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
						'id'   => 'style-theree',
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
			'content',[
				'type'    => 'editor',
				'title'   => esc_html__( 'Testimonial content', 'finest-zionbuilder' ),
				'default' => __( 'I really like that I can have all in one place: I can send emails and text messages,', 'finest-zionbuilder' ),
				'dynamic' => [
					'enabled' => true,
				],
			],
        );

        $options->add_option(
			'image',
			[
				'type'        => 'image',
				'description' => 'Choose the desired client photo.',
				'title'       => esc_html__( 'Client Photo', 'finest-zionbuilder' ),
				'show_size'   => false,
				'default'     => $this->get_url( 'empty-profile-photo.svg' ),
			]
		);

		$options->add_option(
			'heading',
			[
				'type'        => 'text',
				'title'       => __( 'Heading', 'finest-zionbuilder' ),
				'description' => __( 'Set the desired Client Heading.', 'finest-zionbuilder' ),
				'placeholder' => __( 'Client Heading', 'finest-zionbuilder' ),
				'default'     => esc_html__( 'The best UI Kit for developers. So easy to implement and publish.', 'finest-zionbuilder' ),
				'dynamic'     => [
					'enabled' => true,
				],
				'dependency'   => [
					[
						'option' => 'testimonial_style',
						'value'  => [ 'style-four'],
					],
				],
			]
		);

        $options->add_option(
			'name',
			[
				'type'        => 'text',
				'title'       => __( 'Client name', 'finest-zionbuilder' ),
				'description' => __( 'Set the desired Client name.', 'finest-zionbuilder' ),
				'placeholder' => __( 'Client name', 'finest-zionbuilder' ),
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
			'icon',
			[
				'type'        => 'icon_library',
				'id'          => 'icon',
				'title'       => esc_html__( 'Icon', 'finest-zionbuilder' ),
				'description' => esc_html__( 'Choose an icon', 'finest-zionbuilder' ),
				'default'     => [
					'family'  => 'Font Awesome 5 Brands Regular',
					'name'    => 'twitter',
					'unicode' => 'uf099',
				],
				'dependency'   => [
					[
						'option' => 'testimonial_style',
						'value'  => [ 'style-theree'],
					],
				],
			]
		);

		$options->add_option(
			'stars',
			[
				'type'    => 'select',
				'title'   => __( 'Stars', 'finest-zionbuilder' ),
				'default' => '5',
				'options' => [
					[
						'name' => __( 'Do not show stars', 'finest-zionbuilder' ),
						'id'   => 'no_stars',
					],
					[
						'name' => __( '1 star', 'finest-zionbuilder' ),
						'id'   => 1,
					],
					[
						'name' => __( '2 stars', 'finest-zionbuilder' ),
						'id'   => 2,
					],
					[
						'name' => __( '3 stars', 'finest-zionbuilder' ),
						'id'   => 3,
					],
					[
						'name' => __( '4 stars', 'finest-zionbuilder' ),
						'id'   => 4,
					],
					[
						'name' => __( '5 stars', 'finest-zionbuilder' ),
						'id'   => 5,
					],
				],
				'dependency'   => [
					[
						'option' => 'testimonial_style',
						'value'  => [ 'style-two', 'style-four'],
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
			'image_styles',
			[
				'title'      => esc_html__( 'Image styles', 'finest-zionbuilder' ),
				'selector'   => '{{ELEMENT}} .fzb__testimonial-image img',
			]
		);

		$this->register_style_options_element(
			'title_styles',
			[
				'title'      => esc_html__( 'Title styles', 'finest-zionbuilder' ),
				'selector'   => '{{ELEMENT}} .fzb__testimonial-heading',
			]
		);

		$this->register_style_options_element(
			'name_styles',
			[
				'title'      => esc_html__( 'Name styles', 'finest-zionbuilder' ),
				'selector'   => '{{ELEMENT}} .fzb__testimonial-wrap.style-one .fzb__testimonial-name,
				.fzb__testimonial-wrap.style-two .fzb__testimonial-name,
				.fzb__testimonial-wrap.style-theree .fzb__testimonial-name,
				.fzb__testimonial-wrap.style-four .fzb__testimonial-name',
			]
		);

		$this->register_style_options_element(
			'designation_styles',
			[
				'title'      => esc_html__( 'Designation styles', 'finest-zionbuilder' ),
				'selector'   => '{{ELEMENT}} .fzb__testimonial-wrap.style-one .fzb__testimonial-designation,
				.fzb__testimonial-wrap.style-two .fzb__testimonial-designation,
				.fzb__testimonial-wrap.style-theree .fzb__testimonial-designation,
				.fzb__testimonial-wrap.style-four .fzb__testimonial-designation',
			]
		);

		$this->register_style_options_element(
			'discription_styles',
			[
				'title'      => esc_html__( 'Discription styles', 'finest-zionbuilder' ),
				'selector'   => '{{ELEMENT}} .fzb__testimonial-wrap.style-one .fzb__testimonial-discription,
				.fzb__testimonial-wrap.style-two .fzb__testimonial-discription,
				.fzb__testimonial-wrap.style-theree .fzb__testimonial-discription,
				.fzb__testimonial-wrap.style-four .fzb__testimonial-discription',
			]
		);


		$this->register_style_options_element(
			'rating_styles',
			[
				'title'      => esc_html__( 'Rating styles', 'finest-zionbuilder' ),
				'selector'   => '{{ELEMENT}} .fzb__testimonial-wrap.style-two .fzb__testimonial-rating span,
				.fzb__testimonial-wrap.style-four .fzb__testimonial-rating span',
			]
		);

		$this->register_style_options_element(
			'icon_styles',
			[
				'title'      => esc_html__( 'Icon styles', 'finest-zionbuilder' ),
				'selector'   => '{{ELEMENT}} .fzb__testimonial-quote-icon',
			]
		);

		$this->register_style_options_element(
			'card_styles',
			[
				'title'      => esc_html__( 'Card Styles', 'finest-zionbuilder' ),
				'selector'   => '{{ELEMENT}} .fzb__testimonial-wrap',
			]
		);






	}


	/**
	 * Renders the element based on options
	 *
	 * @return void
	 */
	public function render($options) {



        $content = $options->get_value('content');
        $heading = $options->get_value('heading');
        $image = $options->get_value('image');
        $name = $options->get_value('name');
        $designation = $options->get_value('designation');
		$testimonial_style = $options->get_value('testimonial_style');
		$icon  = $options->get_value( 'icon');

		$stars = $options->get_value( 'stars' );

		$stars_full = [
			'family'  => 'Font Awesome 5 Free Solid',
			'name'    => 'star',
			'unicode' => 'uf005',
		];

		$stars_empty = [
			'family'  => 'Font Awesome 5 Free Regular',
			'name'    => 'star',
			'unicode' => 'uf005',
		];



		?>
            <div class="fzb__testimonial-wrap <?php echo esc_attr( $testimonial_style ) ?>" >
				<?php if ($testimonial_style) {
					include('version/' . $testimonial_style . '.php');
				} ?>
            </div>
		<?php
	}
}
$elements_manager->register_element( new \Finest\Elements\Finest_Zion_Testimonial() );