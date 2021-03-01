<?php
/*
Plugin Name: Security Headers Plugin
Description: HTTP Security Headers
Tags: security, HTTP headers, HSTS, HTTPS, CSP
Version: 1.0.0
Author: sopleb
Author URI: https://bot.rip
License: GPL2
Text Domain: http-security
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

require( 'include/functions.php' );
if (! get_option( 'http_security_htaccess_flag' ) )
	require( 'include/http-headers.php' );
require( 'include/settings.php' );

if ( is_admin() ){ // admin actions
  add_action( 'network_admin_menu', 'http_security_network_options_page' );
  add_action( 'admin_menu', 'http_security_options_page' );
  add_action( 'admin_init', 'register_http_security_settings' );
  add_action( 'wpmu_new_blog', 'http_security_copy_main_site_options', 10, 6 );
}