<?php
/*
Plugin Name: Wordpress Multiple Contributors
Description: Plugin is used to add multiple contributors to the post and show that in frontend along with content and gravatar of contributors.
Author: Rathod Madhuri
Author URI: https://rathodmadhuri.wordpress.com/
Version: 1.0
*/

//Start : plugin activation functionality
function pluginprefix_setup_post_type() {
	//add,edit and save contributor metabox 
    include "includes/metabox.php";
}

add_action( 'init', 'pluginprefix_setup_post_type' );
 
function pluginprefix_install() {
    // trigger our function that creates contributor metabox
    pluginprefix_setup_post_type();
}
register_activation_hook( __FILE__, 'pluginprefix_install' );
//End : plugin activation functionality

//Start : plugin de-activation functionality
register_deactivation_hook( __FILE__, 'wp_multiple_contributer_deactivation' );
function wp_multiple_contributer_deactivation() {
	remove_meta_box( 'post_meta_box' , 'post' , 'normal' ); 

}   
//End : plugin de-activation functionality

/**
 * wmc_stylesheet() function includes required css files.
 *
 */
function wmc_stylesheet() {
    wp_register_style( 'main-style', plugins_url('assets/css/main.css', __FILE__) );
    wp_enqueue_style( 'main-style' );
    
}

add_action( 'wp_enqueue_scripts', 'wmc_stylesheet' ); 