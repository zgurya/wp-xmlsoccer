<?php
/*
 Plugin Name: WP XMLSoccer
 Plugin URI: http://xmlsoccer.com/
 Description: Plugin which generate football data shortcodes (results, standings, livescores, odds)
 Version: 0.1
 Author: Zgurya Andrey
 Author URI: https://www.facebook.com/a.zgurya
 Text Domain: wp-xmlsoccer
 License: GNU General Public License v2 or later
 */
define( 'XMLSOCCER_DIR', __FILE__ );
require_once ('includes/api.php');
require_once ('includes/shortcodes.php');

add_action( 'plugins_loaded', 'wp_xmlsoccer_textdomain' );
function wp_xmlsoccer_textdomain() {
	load_plugin_textdomain( 'wp-xmlsoccer', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}

add_action('admin_menu', 'wp_xmlsoccer');
function wp_xmlsoccer(){
	add_menu_page( __('XMLSoccer settings', 'wp-xmlsoccer'), __('XMLSoccer','wp-xmlsoccer'), 'manage_options', 'wp_xmlsoccer', 'wp_xmlsoccer_init', 'dashicons-groups',51 );
	add_submenu_page('wp_xmlsoccer', __('Your shortcode', 'wp-xmlsoccer'), __('Your shortcode','wp-xmlsoccer'),'manage_options','wp_xmlsoccer', 'wp_xmlsoccer_init');
	add_submenu_page('wp_xmlsoccer', __('Translate Teams. Select League', 'wp-xmlsoccer'), __('Translate Teams','wp-xmlsoccer'), 'manage_options','wp_xmlsoccer_teams', 'wp_xmlsoccer_teams_init');
	add_submenu_page('wp_xmlsoccer', __('Translate Players. Select League and Team', 'wp-xmlsoccer'), __('Translate Players','wp-xmlsoccer'), 'manage_options','wp_xmlsoccer_players', 'wp_xmlsoccer_players_init');
}

function wp_xmlsoccer_init(){
	echo '<h1>'.__('Generate your shortcode', 'wp-xmlsoccer').'</h1>';
	require_once ('includes/form_shortcode.php');
}

function wp_xmlsoccer_teams_init(){
	echo '<h1>'.__('Translate Teams. Select League', 'wp-xmlsoccer').'</h1>';
	require_once ('includes/form_teams.php');
}
function wp_xmlsoccer_players_init(){
	echo '<h1>'.__('Translate Players. Select League and Team', 'wp-xmlsoccer').'</h1>';
	require_once ('includes/form_players.php');
}
?>