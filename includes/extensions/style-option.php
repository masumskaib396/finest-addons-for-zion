<?php


class Finest_Custom_Style_Option
{
	private static $_instance = null;
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function __construct()
	{

		// Add new controls to advanced tab globally
		add_action( 'zionbuilder/schema/style_options', [ $this, 'finest_add_style_options' ] );

	}


    public function finest_add_style_options( $options ) {
		// Display
		$display_accordion = $options->get_option( '_styles.pseudo_selectors.display' );
		if ( $display_accordion ) {

			// Add filter options
			$this->attach_display_options( $display_accordion );
		}

		//Box Shadow
		$box_shadow_group = $options->get_option( '_styles.pseudo_selectors.borders.box-shadow-group' );
		if ( $box_shadow_group ) {

			// Add transition options
			$this->attach_box_shadow_options( $box_shadow_group );
		}

		// Transitions
		// $transitions_accordion = $options->get_option( '_styles.pseudo_selectors.transitions' );
		// if ( $transitions_accordion ) {
		// 	// Add transition options
		// 	$this->attach_transitions_options( $transitions_accordion );
		// }

		// Transform
		$transform_accordion = $options->get_option( '_styles.pseudo_selectors.transform' );
		if ( $transform_accordion ) {
			// Add transition options
			$this->attach_transform_options( $transform_accordion );
		}

		// // Filters
		$filters_accordion = $options->get_option( '_styles.pseudo_selectors.filters' );
		if ( $filters_accordion ) {
			$this->attach_filters_options( $filters_accordion );
		}

	}


	public static function attach_box_shadow_options( $options ) {
		$options->add_option(
			'box-shadow',
			[
				'type'        => 'shadow',
				'title'       => __( 'Box Shadow', 'zionbuilder-pro' ),
				'description' => __( 'Set the desired box shadow.', 'finest-zionbuilder' ),
				'shadow_type' => 'box-shadow',
			]
		);
	}

	// Filte Style
    public static function attach_display_options( $options ) {
		$display_group = $options->add_group(
			'display-group',
			[
				'type'  => 'panel_accordion',
				'title' => __( 'Display options', 'finest-zionbuilder' ),
			]
		);

		$display_group->add_option(
			'display',
			[
				'type'        => 'custom_selector',
				'title'       => __( 'Display', 'finest-zionbuilder' ),
				'description' => __( 'Display css properties', 'finest-zionbuilder' ),
				'columns'     => 3,
				'search_tags' => [ 'flex', 'block', 'inline', 'none' ],
				'options'     => [
					[
						'name' => __( 'flex', 'finest-zionbuilder' ),
						'id'   => 'flex',
					],
					[
						'name' => __( 'block', 'finest-zionbuilder' ),
						'id'   => 'block',
					],
					[
						'name' => __( 'inline', 'finest-zionbuilder' ),
						'id'   => 'inline',
					],
					[
						'name' => __( 'inline-flex', 'finest-zionbuilder' ),
						'id'   => 'inline-flex',
					],
					[
						'name' => __( 'inline-block', 'finest-zionbuilder' ),
						'id'   => 'inline-block',
					],
					[
						'name' => __( 'none', 'finest-zionbuilder' ),
						'id'   => 'none',
					],
				],
			]
		);

		$display_group->add_option(
			'visibility',
			[
				'type'        => 'custom_selector',
				'title'       => __( 'Visibility', 'finest-zionbuilder' ),
				'description' => __( 'Set visibility option for element', 'finest-zionbuilder' ),
				'columns'     => 2,
				'options'     => [
					[
						'name' => 'visible',
						'id'   => 'visible',
					],
					[
						'name' => 'hidden',
						'id'   => 'hidden',
					],
				],
			]
		);

		$display_group->add_option(
			'overflow',
			[
				'type'        => 'custom_selector',
				'title'       => __( 'Overflow', 'finest-zionbuilder' ),
				'description' => __( 'Set overflow for element.', 'finest-zionbuilder' ),
				'columns'     => 3,
				'options'     => [
					[
						'name' => 'visible',
						'id'   => 'visible',
					],
					[
						'name' => 'hidden',
						'id'   => 'hidden',
					],
					[
						'name' => 'auto',
						'id'   => 'auto',
					],
				],
			]
		);

		$flex_container_group = $options->add_group(
			'flexbox-container-group',
			[
				'type'      => 'panel_accordion',
				'title'     => __( 'Flexbox container options', 'finest-zionbuilder' ),
				// 'dependency'  => [
				// 	[
				// 		'option' => 'display',
				// 		'value'  => [ 'flex', 'inline-flex' ],
				// 	],
				// ],
				'collapsed' => true,
			]
		);

		$flex_container_group->add_option(
			'flex-direction',
			[
				'type'    => 'custom_selector',
				'width'   => 60,
				'options' => [
					[
						'name' => __( 'vertical', 'finest-zionbuilder' ),
						'id'   => 'column',
					],
					[
						'name' => __( 'horizontal', 'finest-zionbuilder' ),
						'id'   => 'row',
					],
				],
				'title'   => __( 'Flex direction', 'finest-zionbuilder' ),
			]
		);

		$flex_container_group->add_option(
			'flex-reverse',
			[
				'type'    => 'custom_selector',
				'width'   => 40,
				'options' => [
					[
						'name' => __( 'flex-reverse', 'finest-zionbuilder' ),
						'icon' => 'reverse',
						'id'   => true,
					],
				],
				'title'   => __( 'Flex reverse', 'finest-zionbuilder' ),
			]
		);

		$flex_container_group->add_option(
			'align-items',
			[
				'type'        => 'custom_selector',
				'title'       => __( 'Align items', 'finest-zionbuilder' ),
				'description' => __( 'Set align items', 'finest-zionbuilder' ),
				'options'     => [
					[
						'name' => __( 'flex-start', 'finest-zionbuilder' ),
						'id'   => 'flex-start',
						'icon' => 'align-start',
					],
					[
						'name' => __( 'center', 'finest-zionbuilder' ),
						'id'   => 'center',
						'icon' => 'align-center',
					],
					[
						'name' => __( 'flex-end', 'finest-zionbuilder' ),
						'id'   => 'flex-end',
						'icon' => 'align-end',
					],
					[
						'name' => __( 'stretch', 'finest-zionbuilder' ),
						'id'   => 'stretch',
						'icon' => 'align-stretch',
					],
					[
						'name' => __( 'baseline', 'finest-zionbuilder' ),
						'id'   => 'baseline',
						'icon' => 'align-baseline',
					],
				],
			]
		);

		$flex_container_group->add_option(
			'justify-content',
			[
				'type'        => 'custom_selector',
				'title'       => __( 'Justify', 'finest-zionbuilder' ),
				'description' => __( 'Set float option for element', 'finest-zionbuilder' ),
				'columns'     => 5,
				'options'     => [
					[
						'name' => __( 'flex-start', 'finest-zionbuilder' ),
						'id'   => 'flex-start',
						'icon' => 'justify-start',
					],
					[
						'name' => __( 'center', 'finest-zionbuilder' ),
						'id'   => 'center',
						'icon' => 'justify-center',
					],
					[
						'name' => __( 'flex-end', 'finest-zionbuilder' ),
						'id'   => 'flex-end',
						'icon' => 'justify-end',
					],
					[
						'name' => __( 'space-between', 'finest-zionbuilder' ),
						'id'   => 'space-between',
						'icon' => 'justify-sp-btw',
					],
					[
						'name' => __( 'space-around', 'finest-zionbuilder' ),
						'id'   => 'space-around',
						'icon' => 'justify-sp-around',
					],
				],
			]
		);

		$flex_container_group->add_option(
			'flex-wrap',
			[
				'type'        => 'custom_selector',
				'grow'        => '5',
				'title'       => __( 'Wrap', 'finest-zionbuilder' ),
				'description' => __( 'Set wrap for element', 'finest-zionbuilder' ),
				'options'     => [
					[
						'name' => __( 'wrap', 'finest-zionbuilder' ),
						'id'   => 'wrap',
					],
					[
						'name' => __( 'nowrap', 'finest-zionbuilder' ),
						'id'   => 'nowrap',
					],
					[
						'name' => __( 'wrap-reverse', 'finest-zionbuilder' ),
						'id'   => 'wrap-reverse',
						'icon' => 'reverse',
					],
				],
			]
		);

		$flex_container_group->add_option(
			'align-content',
			[
				'type'        => 'custom_selector',
				'title'       => __( 'Align content', 'finest-zionbuilder' ),
				'description' => __( 'Set align content', 'finest-zionbuilder' ),
				'columns'     => 5,
				'options'     => [
					[
						'name' => __( 'flex-start', 'finest-zionbuilder' ),
						'id'   => 'flex-start',
						'icon' => 'content-start',
					],
					[
						'name' => __( 'center', 'finest-zionbuilder' ),
						'id'   => 'center',
						'icon' => 'content-center',
					],
					[
						'name' => __( 'flex-end', 'finest-zionbuilder' ),
						'id'   => 'flex-end',
						'icon' => 'content-end',
					],
					[
						'name' => __( 'space-between', 'finest-zionbuilder' ),
						'id'   => 'space-between',
						'icon' => 'content-space-btw',
					],
					[
						'name' => __( 'space-around', 'finest-zionbuilder' ),
						'id'   => 'space-around',
						'icon' => 'content-space-around',
					],
					[
						'name' => __( 'strech', 'finest-zionbuilder' ),
						'id'   => 'stretch',
						'icon' => 'content-stretch',
					],
				],
			]
		);

		$flex_child_group = $options->add_group(
			'flexbox-child-group',
			[
				'type'      => 'panel_accordion',
				'title'     => __( 'Flexbox child options', 'finest-zionbuilder' ),
				'collapsed' => true,
			]
		);

		$flex_child_group->add_option(
			'flex-grow',
			[
				'type'  => 'number',
				'width' => 33.3,
				'title' => __( 'Flex Grow', 'finest-zionbuilder' ),
			]
		);

		$flex_child_group->add_option(
			'flex-shrink',
			[
				'type'  => 'number',
				'width' => 33.3,
				'title' => __( 'Flex Shrink', 'finest-zionbuilder' ),
			]
		);

		$flex_child_group->add_option(
			'flex-basis',
			[
				'type'  => 'number_unit',
				'width' => 33.3,
				'title' => __( 'Flex Basis', 'finest-zionbuilder' ),
				'units' => [
					'px',
					'pt',
					'rem',
					'vh',
					'%',
				],
			]
		);

		$flex_child_group->add_option(
			'align-self',
			[
				'type'        => 'custom_selector',
				'title'       => __( 'Align self', 'finest-zionbuilder' ),
				'description' => __( 'Set align self', 'finest-zionbuilder' ),
				'options'     => [
					[
						'name' => __( 'flex-start', 'finest-zionbuilder' ),
						'id'   => 'flex-start',
						'icon' => 'self-start',
					],
					[
						'name' => __( 'center', 'finest-zionbuilder' ),
						'id'   => 'center',
						'icon' => 'self-center',
					],
					[
						'name' => __( 'flex-end', 'finest-zionbuilder' ),
						'id'   => 'flex-end',
						'icon' => 'self-end',
					],
					[
						'name' => __( 'stretch', 'finest-zionbuilder' ),
						'id'   => 'stretch',
						'icon' => 'self-stretch',
					],
					[
						'name' => __( 'baseline', 'finest-zionbuilder' ),
						'id'   => 'baseline',
						'icon' => 'self-baseline',
					],
				],
			]
		);

		$flex_child_group->add_option(
			'custom-order',
			[
				'type'    => 'custom_selector',
				'title'   => __( 'Order', 'finest-zionbuilder' ),
				'width'   => 60,
				'options' => [
					[
						'name' => __( 'first', 'finest-zionbuilder' ),
						'id'   => -1,
					],
					[
						'name' => __( 'last', 'finest-zionbuilder' ),
						'id'   => 99,
					],
				],
			]
		);

		$flex_child_group->add_option(
			'order',
			[
				'type'  => 'number',
				'title' => __( 'Custom Order', 'finest-zionbuilder' ),
				'width' => 40,
			]
		);

		$position_group = $options->add_group(
			'position-group',
			[
				'type'      => 'panel_accordion',
				'title'     => __( 'Position options', 'finest-zionbuilder' ),
				'collapsed' => true,
			]
		);

		$position_group->add_option(
			'position',
			[
				'type'        => 'custom_selector',
				'title'       => __( 'Position', 'finest-zionbuilder' ),
				'description' => __( 'Set element position', 'finest-zionbuilder' ),
				'columns'     => 4,
				'options'     => [
					[
						'name' => __( 'static', 'finest-zionbuilder' ),
						'id'   => 'static',
					],
					[
						'name' => __( 'relative', 'finest-zionbuilder' ),
						'id'   => 'relative',
					],
					[
						'name' => __( 'absolute', 'finest-zionbuilder' ),
						'id'   => 'absolute',
					],
					[
						'name' => __( 'fixed', 'finest-zionbuilder' ),
						'id'   => 'fixed',
					],
					[
						'name' => __( 'sticky', 'finest-zionbuilder' ),
						'id'   => 'sticky',
					],
				],
			]
		);

		$position_group->add_option(
			'top',
			[
				'type'        => 'number_unit',
				'title'       => __( 'Top', 'finest-zionbuilder' ),
				'placeholder' => '0px',
				'width'       => '25',
				'units'       => [
					'px',
					'pt',
					'rem',
					'vh',
					'%',
					'auto',
				],
			]
		);

		$position_group->add_option(
			'bottom',
			[
				'type'        => 'number_unit',
				'title'       => __( 'Bottom', 'finest-zionbuilder' ),
				'placeholder' => '0px',
				'width'       => '25',
				'units'       => [
					'px',
					'pt',
					'rem',
					'vh',
					'%',
					'auto',
				],
			]
		);

		$position_group->add_option(
			'left',
			[
				'type'        => 'number_unit',
				'title'       => __( 'Left', 'finest-zionbuilder' ),
				'placeholder' => '0px',
				'width'       => '25',
				'units'       => [
					'px',
					'pt',
					'rem',
					'vh',
					'%',
					'auto',
				],
			]
		);

		$position_group->add_option(
			'right',
			[
				'type'        => 'number_unit',
				'title'       => __( 'Right', 'finest-zionbuilder' ),
				'placeholder' => '0px',
				'width'       => '25',
				'units'       => [
					'px',
					'pt',
					'rem',
					'vh',
					'%',
					'auto',
				],
			]
		);

		$object_fit = $options->add_group(
			'object-fit',
			[
				'type'      => 'panel_accordion',
				'title'     => __( 'Object fit', 'finest-zionbuilder' ),
				'collapsed' => true,
			]
		);

		// Object fit
		$object_fit->add_option(
			'object-fit',
			[
				'type'        => 'select',
				'title'       => __( 'Object fit', 'finest-zionbuilder' ),
				'description' => __( 'Object fit is used to specify how an <img> or <video> should be resized to fit its container.', 'finest-zionbuilder' ),
				'default'     => 'fill',
				'options'     => [
					[
						'id'   => 'fill',
						'name' => __( 'fill', 'finest-zionbuilder' ),
					],
					[
						'id'   => 'contain',
						'name' => __( 'contain', 'finest-zionbuilder' ),
					],
					[
						'id'   => 'cover',
						'name' => __( 'cover', 'finest-zionbuilder' ),
					],
					[
						'id'   => 'none',
						'name' => __( 'none', 'finest-zionbuilder' ),
					],
					[
						'id'   => 'scale-down',
						'name' => __( 'scale-down', 'finest-zionbuilder' ),
					],
				],
			]
		);

		$object_fit->add_option(
			'object-position',
			[
				'type'        => 'text',
				'title'       => __( 'Object fit position', 'finest-zionbuilder' ),
				'description' => __( 'Object fit is used to specify how an <img> or <video> should be resized to fit its container.', 'finest-zionbuilder' ),
			]
		);

		$floating_group = $options->add_group(
			'floating-group',
			[
				'type'      => 'panel_accordion',
				'title'     => __( 'Floating options', 'finest-zionbuilder' ),
				'collapsed' => true,
			]
		);

		$floating_group->add_option(
			'float',
			[
				'type'        => 'custom_selector',
				'title'       => __( 'Float', 'finest-zionbuilder' ),
				'description' => __( 'Set float option for element', 'finest-zionbuilder' ),
				'columns'     => 3,
				'options'     => [
					[
						'name' => __( 'left', 'finest-zionbuilder' ),
						'id'   => 'left',
					],
					[
						'name' => __( 'right', 'finest-zionbuilder' ),
						'id'   => 'right',
					],
					[
						'name' => __( 'none', 'finest-zionbuilder' ),
						'id'   => 'none',
					],
				],
			]
		);

		$alignment_group = $options->add_group(
			'alignment-group',
			[
				'type'      => 'panel_accordion',
				'title'     => __( 'Alignment options', 'finest-zionbuilder' ),
				'collapsed' => true,
			]
		);

		$alignment_group->add_option(
			'text-align',
			[
				'type'        => 'custom_selector',
				'title'       => __( 'Text Align', 'finest-zionbuilder' ),
				'columns'     => 3,
				'options'     => [
					[
						'name' => __( 'left', 'finest-zionbuilder' ),
						'id'   => 'left',
					],
					[
						'name' => __( 'center', 'finest-zionbuilder' ),
						'id'   => 'center',
					],
					[
						'name' => __( 'right', 'finest-zionbuilder' ),
						'id'   => 'right',
					],
				],
			]
		);

		$floating_group->add_option(
			'clear',
			[
				'type'        => 'custom_selector',
				'title'       => __( 'Clear', 'finest-zionbuilder' ),
				'description' => __( 'Set clear option for element', 'finest-zionbuilder' ),
				'columns'     => 3,
				'options'     => [

					[
						'name' => 'left',
						'id'   => 'left',
					],
					[
						'name' => 'right',
						'id'   => 'right',
					],
					[
						'name' => 'both',
						'id'   => 'both',
					],
				],
			]
		);
	}
	// End Display

	public function attach_transitions_options( $options ) {
		// Transition property
		$options->add_option(
			'transition-property',
			[
				'type'        => 'text',
				'title'       => __( 'Transition property', 'finest-zionbuilder' ),
				'description' => __( 'Add desired transition properties separated by comma', 'finest-zionbuilder' ),
				'placeholder' => __( 'all', 'finest-zionbuilder' ),
				'dynamic'     => false,
			]
		);

		// Transition duration
		$options->add_option(
			'transition-duration',
			[
				'type'        => 'slider',
				'title'       => __( 'Transition Duration', 'finest-zionbuilder' ),
				'description' => __( 'Set the desired transition duration.', 'finest-zionbuilder' ),
				'default'     => 0,
				'min'         => 0,
				'max'         => 10000,
				'step'        => 50,
				'content'     => 'ms',
			]
		);

		// Transition delay
		$options->add_option(
			'transition-delay',
			[
				'type'        => 'slider',
				'title'       => __( 'Transition Delay', 'finest-zionbuilder' ),
				'description' => __( 'Set the desired transition delay.', 'finest-zionbuilder' ),
				'default'     => 0,
				'min'         => 0,
				'max'         => 10000,
				'step'        => 50,
				'content'     => 'ms',
			]
		);

		// Transition timing
		$options->add_option(
			'transition-timing-function',
			[
				'type'        => 'select',
				'default'     => 'linear',
				'title'       => __( 'Timing function', 'finest-zionbuilder' ),
				'description' => __( 'Set the desired timing function for the transition. Start typing to add a Custom transition', 'finest-zionbuilder' ),
				'options'     => [
					[
						'name' => __( 'linear', 'finest-zionbuilder' ),
						'id'   => 'linear',
					],
					[
						'name' => __( 'ease', 'finest-zionbuilder' ),
						'id'   => 'ease',
					],
					[
						'name' => __( 'ease-in', 'finest-zionbuilder' ),
						'id'   => 'ease-in',
					],
					[
						'name' => __( 'ease-out', 'finest-zionbuilder' ),
						'id'   => 'ease-out',
					],
					[
						'name' => __( 'ease-in-out', 'finest-zionbuilder' ),
						'id'   => 'ease-in-out',
					],
				],
				'filterable'  => true,
				'addable'     => true,
			]
		);
	}
	// End Transition

	public static function attach_transform_options( $options ) {
		$transform = $options->add_option(
			'transform',
			[
				'type'               => 'repeater',
				'add_button_text'    => __( 'Add new transform property', 'finest-zionbuilder' ),
				'item_title'         => 'property',
				'default_item_title' => 'item %s',
				'reset_group'        => [
					'option' => 'property',
				],
				'title'              => __( 'Transform properties', 'finest-zionbuilder' ),
			]
		);

		$transform->add_option(
			'property',
			[
				'type'    => 'select',
				'title'   => __( 'Property', 'finest-zionbuilder' ),
				'default' => 'translate',
				'options' => [
					[
						'id'   => 'translate',
						'name' => __( 'Translate', 'finest-zionbuilder' ),
					],
					[
						'id'   => 'scale',
						'name' => __( 'Scale', 'finest-zionbuilder' ),
					],
					[
						'id'   => 'rotate',
						'name' => __( 'Rotate', 'finest-zionbuilder' ),
					],
					[
						'id'   => 'skew',
						'name' => __( 'Skew', 'finest-zionbuilder' ),
					],
					[
						'id'   => 'perspective',
						'name' => __( 'Perspective', 'finest-zionbuilder' ),
					],
				],
			]
		);

		$translate = $transform->add_option(
			'translate',
			[
				'type'           => 'group',
				'options-layout' => 'full',
				'dependency'     => [
					[
						'option' => 'property',
						'value'  => [ 'translate' ],
					],
				],
			]
		);

		$translate->add_option(
			'translateX',
			[
				'type'        => 'dynamic_slider',
				'title'       => __( 'Translate X', 'finest-zionbuilder' ),
				'description' => __( 'Set translate property for X dimension.', 'finest-zionbuilder' ),
				'options'     => [
					[
						'unit' => 'px',
						'min'  => -999,
						'max'  => 999,
						'step' => 1,
					],
					[
						'unit' => '%',
						'min'  => -100,
						'max'  => 100,
						'step' => 1,
					],
					[
						'unit' => 'pt',
						'min'  => -999,
						'max'  => 999,
						'step' => 1,
					],
					[
						'unit' => 'em',
						'min'  => -999,
						'max'  => 999,
						'step' => 1,
					],
					[
						'unit' => 'rem',
						'min'  => -999,
						'max'  => 999,
						'step' => 1,
					],
				],
			]
		);

		$translate->add_option(
			'translateY',
			[
				'type'        => 'dynamic_slider',
				'title'       => __( 'Translate Y', 'finest-zionbuilder' ),
				'description' => __( 'Set translate property for Y dimension.', 'finest-zionbuilder' ),
				'options'     => [
					[
						'unit' => 'px',
						'min'  => -999,
						'max'  => 999,
						'step' => 1,
					],
					[
						'unit' => '%',
						'min'  => -100,
						'max'  => 100,
						'step' => 1,
					],
					[
						'unit' => 'pt',
						'min'  => -999,
						'max'  => 999,
						'step' => 1,
					],
					[
						'unit' => 'em',
						'min'  => -999,
						'max'  => 999,
						'step' => 1,
					],
					[
						'unit' => 'rem',
						'min'  => -999,
						'max'  => 999,
						'step' => 1,
					],
				],
			]
		);

		$translate->add_option(
			'translateZ',
			[
				'type'        => 'dynamic_slider',
				'title'       => __( 'Translate Z', 'finest-zionbuilder' ),
				'description' => __( 'Set translate property for Z dimension.', 'finest-zionbuilder' ),
				'options'     => [
					[
						'unit' => 'px',
						'min'  => -999,
						'max'  => 999,
						'step' => 1,
					],
					[
						'unit' => '%',
						'min'  => -100,
						'max'  => 100,
						'step' => 1,
					],
				],
			]
		);

		$scale = $transform->add_option(
			'scale',
			[
				'type'           => 'group',
				'options-layout' => 'full',
				'dependency'     => [
					[
						'option' => 'property',
						'value'  => [ 'scale' ],
					],
				],
			]
		);

		$scale->add_option(
			'scaleX',
			[
				'type'        => 'slider',
				'min'         => -5,
				'max'         => 5,
				'default'     => 1,
				'step'        => 0.05,
				'shift_step'  => 0.1,
				'title'       => __( 'Scale X', 'finest-zionbuilder' ),
				'description' => __( 'Set scale property for X dimension.', 'finest-zionbuilder' ),
			]
		);

		$scale->add_option(
			'scaleY',
			[
				'type'         => 'slider',
				'min'          => -5,
				'max'          => 5,
				'default'      => 1,
				'step'        => 0.05,
				'shift_step'  => 0.1,
				'title'        => __( 'Scale Y', 'finest-zionbuilder' ),
				'default_unit' => 'unitless',
				'description'  => __( 'Set scale property for Y dimension.', 'finest-zionbuilder' ),
			]
		);

		$scale->add_option(
			'scaleZ',
			[
				'type'        => 'slider',
				'min'         => -5,
				'max'         => 5,
				'default'     => 1,
				'step'        => 0.05,
				'shift_step'  => 0.1,
				'title'       => __( 'Scale Z', 'finest-zionbuilder' ),
				'description' => __( 'Set scale property for Z dimension.', 'finest-zionbuilder' ),
			]
		);

		$rotate = $transform->add_option(
			'rotate',
			[
				'type'           => 'group',
				'options-layout' => 'full',
				'dependency'     => [
					[
						'option' => 'property',
						'value'  => [ 'rotate' ],
					],
				],
			]
		);

		$rotate->add_option(
			'rotate',
			[
				'type'        => 'dynamic_slider',
				'title'       => __( 'Rotate', 'finest-zionbuilder' ),
				'description' => __( 'Set rotation property.', 'finest-zionbuilder' ),
				'options'     => [
					[
						'unit' => 'deg',
						'min'  => -360,
						'max'  => 360,
						'step' => 1,
					],
				],
			]
		);

		$rotate->add_option(
			'rotateX',
			[
				'type'        => 'dynamic_slider',
				'title'       => __( 'Rotate X', 'finest-zionbuilder' ),
				'description' => __( 'Set rotation property for X dimension.', 'finest-zionbuilder' ),
				'options'     => [
					[
						'unit' => 'deg',
						'min'  => -360,
						'max'  => 360,
						'step' => 1,
					],
				],
			]
		);

		$rotate->add_option(
			'rotateY',
			[
				'type'        => 'dynamic_slider',
				'title'       => __( 'Rotate Y', 'finest-zionbuilder' ),
				'description' => __( 'Set rotation property for Y dimension.', 'finest-zionbuilder' ),
				'options'     => [
					[
						'unit' => 'deg',
						'min'  => -360,
						'max'  => 360,
						'step' => 1,
					],
				],
			]
		);

		$rotate->add_option(
			'rotateZ',
			[
				'type'         => 'dynamic_slider',
				'default_unit' => 'deg',
				'title'        => __( 'Rotate Z', 'finest-zionbuilder' ),
				'description'  => __( 'Set rotation property for Z dimension.', 'finest-zionbuilder' ),
				'options'      => [
					[
						'unit' => 'deg',
						'min'  => -360,
						'max'  => 360,
						'step' => 1,
					],
				],
			]
		);

		$skew = $transform->add_option(
			'skew',
			[
				'type'           => 'group',
				'options-layout' => 'full',
				'dependency'     => [
					[
						'option' => 'property',
						'value'  => [ 'skew' ],
					],
				],
			]
		);

		$skew->add_option(
			'skewX',
			[
				'type'         => 'dynamic_slider',
				'title'        => __( 'Skew X', 'finest-zionbuilder' ),
				'description'  => __( 'Set skew property for X dimension.', 'finest-zionbuilder' ),
				'default_unit' => 'deg',
				'options'      => [
					[
						'unit' => 'deg',
						'min'  => -180,
						'max'  => 180,
						'step' => 1,
					],
				],
			]
		);

		$skew->add_option(
			'skewY',
			[
				'type'         => 'dynamic_slider',
				'title'        => __( 'Skew Y', 'finest-zionbuilder' ),
				'description'  => __( 'Set skew property for Y dimension.', 'finest-zionbuilder' ),
				'default_unit' => 'deg',
				'options'      => [
					[
						'unit' => 'deg',
						'min'  => -180,
						'max'  => 180,
						'step' => 1,
					],
				],
			]
		);

		$perspective = $transform->add_option(
			'perspective',
			[
				'type'           => 'group',
				'options-layout' => 'full',
				'dependency'     => [
					[
						'option' => 'property',
						'value'  => [ 'perspective' ],
					],
				],
			]
		);

		$perspective->add_option(
			'perspective_value',
			[
				'type'        => 'dynamic_slider',
				'title'       => __( 'Perspective value', 'finest-zionbuilder' ),
				'description' => __( 'Set perspective property.', 'finest-zionbuilder' ),
				'options'     => [
					[
						'unit' => 'px',
						'min'  => 0,
						'max'  => 999,
						'step' => 1,
					],
					[
						'unit' => 'pt',
						'min'  => -999,
						'max'  => 999,
						'step' => 1,
					],
					[
						'unit' => 'em',
						'min'  => -999,
						'max'  => 999,
						'step' => 1,
					],
					[
						'unit' => 'rem',
						'min'  => -999,
						'max'  => 999,
						'step' => 1,
					],
				],
			]
		);

		$perspective->add_option(
			'perspective_origin_x_axis',
			[
				'type'        => 'dynamic_slider',
				'title'       => __( 'Perspective origin x-axis', 'finest-zionbuilder' ),
				'description' => __( 'Set perspective property.', 'finest-zionbuilder' ),
				'options'     => [
					[
						'unit' => '%',
						'min'  => -100,
						'max'  => 100,
						'step' => 10,
					],
					[
						'unit' => 'left',
					],
					[
						'unit' => 'center',
					],
					[
						'unit' => 'right',
					],
				],
				'default'     => '50%',
			]
		);

		$perspective->add_option(
			'perspective_origin_y_axis',
			[
				'type'        => 'dynamic_slider',
				'title'       => __( 'Perspective origin y-axis', 'finest-zionbuilder' ),
				'description' => __( 'Set perspective property.', 'finest-zionbuilder' ),
				'options'     => [
					[
						'unit' => '%',
						'min'  => -100,
						'max'  => 100,
						'step' => 10,
					],
					[
						'unit' => 'left',
					],
					[
						'unit' => 'center',
					],
					[
						'unit' => 'right',
					],
				],
				'default'     => '50%',
			]
		);

		$options->add_option(
			'perspective',
			[
				'type'        => 'dynamic_slider',
				'id'          => 'perspective',
				'title'       => __( 'Perspective', 'finest-zionbuilder' ),
				'description' => __( 'Set perspective property.', 'finest-zionbuilder' ),
				'options'     => [
					[
						'unit' => 'px',
						'min'  => 0,
						'max'  => 5000,
						'step' => 10,
					],
					[
						'unit' => 'initial',
					],
					[
						'unit' => 'inherit',
					],
					[
						'unit' => 'unset',
					],
				],
			]
		);

		$options->add_option(
			'transform_origin_x_axis',
			[
				'type'        => 'dynamic_slider',
				'id'          => 'transform_origin_x_axis',
				'title'       => __( 'Transform origin X axis', 'finest-zionbuilder' ),
				'description' => __( 'Set horizontal position of the transform origin', 'finest-zionbuilder' ),
				'options'     => [
					[
						'unit' => '%',
						'min'  => -100,
						'max'  => 100,
						'step' => 1,
					],
					[
						'unit' => 'left',
					],
					[
						'unit' => 'center',
					],
					[
						'unit' => 'right',
					],
				],
				'default'     => '50%',
			]
		);

		$options->add_option(
			'transform_origin_y_axis',
			[
				'type'        => 'dynamic_slider',
				'id'          => 'transform_origin_y_axis',
				'title'       => __( 'Transform origin Y axis', 'finest-zionbuilder' ),
				'description' => __( 'Set vertical position of the transform origin', 'finest-zionbuilder' ),
				'options'     => [
					[
						'unit' => '%',
						'min'  => -100,
						'max'  => 100,
						'step' => 1,
					],
					[
						'unit' => 'left',
					],
					[
						'unit' => 'center',
					],
					[
						'unit' => 'right',
					],
				],
				'default'     => '50%',
			]
		);

		$options->add_option(
			'transform_origin_z_axis',
			[
				'type'        => 'dynamic_slider',
				'id'          => 'transform_origin_z_axis',
				'title'       => __( 'Transform origin Z axis', 'finest-zionbuilder' ),
				'description' => __( 'Set the Z offset of the transform origin', 'finest-zionbuilder' ),
				'options'     => [
					[
						'unit' => 'px',
						'min'  => -100,
						'max'  => 100,
						'step' => 1,
					],
				],

			]
		);

		$options->add_option(
			'transform_style',
			[
				'type'        => 'select',
				'id'          => 'transform_style',
				'title'       => __( 'Transform style', 'finest-zionbuilder' ),
				'description' => __( 'Specifies that child elements will preserve its 3D position', 'finest-zionbuilder' ),
				'default'     => 'flat',
				'options'     => [
					[
						'id'   => 'flat',
						'name' => __( 'Flat', 'finest-zionbuilder' ),
					],
					[
						'id'   => 'preserve-3d',
						'name' => __( 'Preserve 3d', 'finest-zionbuilder' ),
					],
					[
						'id'   => 'initial',
						'name' => __( 'Initial', 'finest-zionbuilder' ),
					],
					[
						'id'   => 'inherit',
						'name' => __( 'Inherit', 'finest-zionbuilder' ),
					],
				],

			]
		);

		$origin = $transform->add_option(
			'transform-origin',
			[
				'type'           => 'group',
				'options-layout' => 'full',
				'dependency'     => [
					[
						'option' => 'property',
						'value'  => [ 'transform-origin' ],
					],
				],
			]
		);
		$origin->add_option(
			'x_axis',
			[
				'type'        => 'dynamic_slider',
				'id'          => 'x_axis',
				'title'       => __( 'X axis', 'finest-zionbuilder' ),
				'description' => __( 'Set X axis origin property.', 'finest-zionbuilder' ),
				'options'     => [
					[
						'unit' => 'px',
						'min'  => -1000,
						'max'  => 1000,
						'step' => 1,
					],
					[
						'unit' => '%',
						'min'  => -100,
						'max'  => 100,
						'step' => 1,
					],
					[
						'unit' => 'left',
					],
					[
						'unit' => 'center',
					],
					[
						'unit' => 'right',
					],
				],
			]
		);
		$origin->add_option(
			'y_axis',
			[
				'type'        => 'dynamic_slider',
				'id'          => 'y_axis',
				'title'       => __( 'Y axis', 'finest-zionbuilder' ),
				'description' => __( 'Set Y axis origin property.', 'finest-zionbuilder' ),
				'options'     => [
					[
						'unit' => 'px',
						'min'  => -1000,
						'max'  => 1000,
						'step' => 1,
					],
					[
						'unit' => '%',
						'min'  => -100,
						'max'  => 100,
						'step' => 1,
					],
					[
						'unit' => 'top',
					],
					[
						'unit' => 'center',
					],
					[
						'unit' => 'bottom',
					],
				],
			]
		);
		$origin->add_option(
			'z_axis',
			[
				'type'        => 'dynamic_slider',
				'id'          => 'z_axis',
				'title'       => __( 'Z axis', 'finest-zionbuilder' ),
				'description' => __( 'Set Z axis origin property.', 'finest-zionbuilder' ),
				'options'     => [
					[
						'unit' => 'px',
						'min'  => -1000,
						'max'  => 1000,
						'step' => 1,
					],
				],
			]
		);
	}


	public function attach_filters_options( $options ) {
		$filters_group = $options->add_group(
			'filters-group',
			[
				'type'      => 'panel_accordion',
				'title'     => __( 'Filter options', 'finest-zionbuilder' ),
				'collapsed' => false,
			]
		);

		// Mix blend mode
		$filters_group->add_option(
			'mix-blend-mode',
			[
				'type'        => 'select',
				'title'       => __( 'Mix Blend Mode', 'finest-zionbuilder' ),
				'description' => __( 'Set the desired mix blend mode.', 'finest-zionbuilder' ),
				'default'     => 'normal',
				'options'     => [
					[
						'id'   => 'normal',
						'name' => __( 'normal', 'finest-zionbuilder' ),
					],
					[
						'id'   => 'multiply',
						'name' => __( 'multiply', 'finest-zionbuilder' ),
					],
					[
						'id'   => 'screen',
						'name' => __( 'screen', 'finest-zionbuilder' ),
					],
					[
						'id'   => 'overlay',
						'name' => __( 'overlay', 'finest-zionbuilder' ),
					],
					[
						'id'   => 'darken',
						'name' => __( 'darken', 'finest-zionbuilder' ),
					],
					[
						'id'   => 'lighten',
						'name' => __( 'lighten', 'finest-zionbuilder' ),
					],
					[
						'id'   => 'color-dodge',
						'name' => __( 'color-dodge', 'finest-zionbuilder' ),
					],
					[
						'id'   => 'color-burn',
						'name' => __( 'color-burn', 'finest-zionbuilder' ),
					],
					[
						'id'   => 'hard-light',
						'name' => __( 'hard-light', 'finest-zionbuilder' ),
					],
					[
						'id'   => 'soft-light',
						'name' => __( 'soft-light', 'finest-zionbuilder' ),
					],
					[
						'id'   => 'difference',
						'name' => __( 'difference', 'finest-zionbuilder' ),
					],
					[
						'id'   => 'exclusion',
						'name' => __( 'exclusion', 'finest-zionbuilder' ),
					],
					[
						'id'   => 'hue',
						'name' => __( 'hue', 'finest-zionbuilder' ),
					],
					[
						'id'   => 'saturation',
						'name' => __( 'saturation', 'finest-zionbuilder' ),
					],
					[
						'id'   => 'color',
						'name' => __( 'color', 'finest-zionbuilder' ),
					],
					[
						'id'   => 'luminosity',
						'name' => __( 'luminosity', 'finest-zionbuilder' ),
					],
					[
						'id'   => 'initial',
						'name' => __( 'initial', 'finest-zionbuilder' ),
					],
					[
						'id'   => 'inherit',
						'name' => __( 'inherit', 'finest-zionbuilder' ),
					],
					[
						'id'   => 'unset',
						'name' => __( 'unset', 'finest-zionbuilder' ),
					],
				],
			]
		);

		$filters_group->add_option(
			'grayscale',
			[
				'type'        => 'slider',
				'title'       => __( 'Grayscale', 'finest-zionbuilder' ),
				'description' => __( 'Set the desired grayscale css filter.', 'finest-zionbuilder' ),
				'default'     => 0,
				'min'         => 0,
				'max'         => 100,
				'content'     => '%',
			]
		);

		$filters_group->add_option(
			'sepia',
			[
				'type'        => 'slider',
				'title'       => __( 'Sepia', 'finest-zionbuilder' ),
				'description' => __( 'Set the desired sepia css filter.', 'finest-zionbuilder' ),
				'default'     => 0,
				'min'         => 0,
				'max'         => 100,
				'content'     => '%',
			]
		);

		$filters_group->add_option(
			'blur',
			[
				'type'        => 'slider',
				'title'       => __( 'Blur', 'finest-zionbuilder' ),
				'description' => __( 'Set the desired blur css filter.', 'finest-zionbuilder' ),
				'default'     => 0,
				'min'         => 0,
				'max'         => 200,
				'content'     => 'px',
			]
		);

		$filters_group->add_option(
			'brightness',
			[
				'type'        => 'slider',
				'title'       => __( 'Brightness', 'finest-zionbuilder' ),
				'description' => __( 'Set the desired brightness css filter.', 'finest-zionbuilder' ),
				'default'     => 100,
				'min'         => 0,
				'max'         => 100,
				'content'     => '%',
			]
		);

		$filters_group->add_option(
			'hue-rotate',
			[
				'type'        => 'slider',
				'title'       => __( 'Hue Rotate', 'finest-zionbuilder' ),
				'description' => __( 'Set the desired hue rotate css filter.', 'finest-zionbuilder' ),
				'default'     => 0,
				'min'         => 0,
				'max'         => 360,
				'content'     => 'deg',
			]
		);

		$filters_group->add_option(
			'saturate',
			[
				'type'        => 'slider',
				'title'       => __( 'Saturate', 'finest-zionbuilder' ),
				'description' => __( 'Set the desired saturate css filter.', 'finest-zionbuilder' ),
				'default'     => 100,
				'min'         => 0,
				'max'         => 200,
				'content'     => '%',
			]
		);

		$filters_group->add_option(
			'opacity',
			[
				'type'        => 'slider',
				'title'       => __( 'Opacity', 'finest-zionbuilder' ),
				'description' => __( 'Set the desired opacity for the element.', 'finest-zionbuilder' ),
				'default'     => 100,
				'min'         => 0,
				'max'         => 100,
				'content'     => '%',
			]
		);

		$filters_group->add_option(
			'contrast',
			[
				'type'        => 'slider',
				'title'       => __( 'Contrast', 'finest-zionbuilder' ),
				'description' => __( 'Set the desired contrast for the element.', 'finest-zionbuilder' ),
				'default'     => 100,
				'min'         => 0,
				'max'         => 100,
				'content'     => '%',
			]
		);

		$filters_group->add_option(
			'invert',
			[
				'type'        => 'slider',
				'title'       => __( 'Invert', 'finest-zionbuilder' ),
				'description' => __( 'Set the desired invert filter for the element.', 'finest-zionbuilder' ),
				'default'     => 0,
				'min'         => 0,
				'max'         => 100,
				'content'     => '%',
			]
		);
	}

}
Finest_Custom_Style_Option::instance();

