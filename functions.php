<?php
/**
 * DevMe
 *
 * @package			WordPress
 * @subpackage		DevMe
 * @author			RogerTM
 * @license			license.txt
 * @link			https://themingisprose.com/
 * @since 			DevMe 1.0
 */

/**
 * DevMe Setup
 *
 * @since DevMe 1.0
 */
function devme_setup(){
	// Make DevMe available for translation.
	load_child_theme_textdomain( 'devme', get_stylesheet_directory() . '/languages' );

	// Hooks
	remove_action( 't_em_action_site_info_right', 't_em_display_user_social_network' );
	add_action( 't_em_action_static_header_inner_after', 't_em_display_user_social_network' );
}
add_action( 'after_setup_theme', 'devme_setup' );

/**
 * Enqueue and register all css and js
 *
 * @since DevMe 1.0
 */
function devme_enqueue(){
	wp_register_style( 'devme', t_em_get_css( 'theme', T_EM_CHILD_THEME_DIR_PATH .'/assets/dist/css', T_EM_CHILD_THEME_DIR_URL .'/assets/dist/css' ), '', t_em_theme( 'Version' ), 'all' );
	wp_enqueue_style( 'devme' );
}
add_action( 'wp_enqueue_scripts', 'devme_enqueue' );

/**
 * Dequeue styles form parent theme
 *
 * @since DevMe 1.0
 */
function devme_dequeue(){
	wp_dequeue_style( 'twenty-em-style' );
	wp_deregister_style( 'twenty-em-style' );
}
add_action( 'wp_enqueue_scripts', 'devme_dequeue', 999 );

/**
 * NULL
 */
function t_em_copy_right(){
	return;
}
?>
