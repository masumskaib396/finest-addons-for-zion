<?php
/**
 * Meta Output
 *
 * @since 1.0
 *
 * @return array
 */
if ( ! function_exists( 'fzb_get_meta' ) ) {
    function fzb_get_meta( $data ) {
        global $wp_embed;
        $content = $wp_embed->autoembed( $data );
        $content = $wp_embed->run_shortcode( $content );
        $content = do_shortcode( $content );
        $content = wpautop( $content );
        return $content;
    }
}


if ( !function_exists( 'fzb_addons_get_cf7_forms' ) ) {
	function fzb_addons_get_cf7_forms() {
		$forms = get_posts( [
			'post_type'      => 'wpcf7_contact_form',
			'post_status'    => 'publish',
			'posts_per_page' => -1,
			'orderby'        => 'title',
			'order'          => 'ASC',
		] );

		if ( !empty( $forms ) ) {
			return wp_list_pluck( $forms, 'post_title', 'ID' );
		}
		return [];
	}
}

if ( !function_exists( 'fzb_addons_do_shortcode' ) ) {
	function fzb_addons_do_shortcode( $tag, array $atts = array(), $content = null ) {
		global $shortcode_tags;
		if ( !isset( $shortcode_tags[$tag] ) ) {
			return false;
		}
		return call_user_func( $shortcode_tags[$tag], $atts, $content, $tag );
	}
}


// function fzb_addons_get_cf7_forms() {
//     // if ( function_exists( 'wpcf7' ) ) {
//         $wpcf7_form_list = get_posts(array(
//             'post_type' => 'wpcf7_contact_form',
//             'showposts' => 999,
//         ));
//         $options = array();
//         $options[0] = esc_html__( 'Select a Form', 'exclusive-addons-elementor' );
//         if ( ! empty( $wpcf7_form_list ) && ! is_wp_error( $wpcf7_form_list ) ){
//             foreach ( $wpcf7_form_list as $post ) {
//                 $options[ $post->ID ] = $post->post_title;
//             }
//         } else {
//             $options[0] = esc_html__( 'Create a Form First', 'exclusive-addons-elementor' );
//         }
//         return $options;
//     // }
// }