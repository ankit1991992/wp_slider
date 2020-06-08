<?php

/*
  Plugin Name: Simple Dynamic Slider
  Plugin URI:  http://xcodeweb.com
  Description: Simple Dynamic Slider
  Version:     1.5
  Author:      XcodeWeb
  Author URI:  http://xcodeweb.com
  License:     GPL2
  License URI: http://www.google.com
  Domain Path: /languages
 */

define('SDS_PATH', plugin_dir_path(__FILE__));

require_once(SDS_PATH . '/include/sds-register-post-type.php');
require_once(SDS_PATH . '/include/sds-register-meta-boxes.php');
require_once(SDS_PATH . '/include/sds-register-shortcode-meta-box.php');
require_once(SDS_PATH . '/include/sds-register-slider-setting-meta.php');
require_once(SDS_PATH . '/include/sds-register-slider-responsive-setting-meta.php');
require_once(SDS_PATH . '/include/sds-register-slider-navigation-arrow-meta.php');

/* * ************************************ Activation And Deactivation Hook  Begin ************************************* */
register_activation_hook(__FILE__, function () {
    update_option('active_sds', 'active');
});
register_deactivation_hook(__FILE__, function () {
    update_option('active_sds', 'deactive');
});

function sds_uninstall_hook() {
    delete_option('active_sds');
}

register_uninstall_hook(__FILE__, 'sds_uninstall_hook');
/* * ************************************ Activation And Deactivation Hook End ************************************* */

// Register style sheet Begin.
function sds_load_css_js() {
    $plugin_url = plugin_dir_url(__FILE__);
    wp_enqueue_style('sds_style', $plugin_url . 'assets/css/style.css');
    wp_enqueue_script('sds_script', $plugin_url . 'assets/js/sds_main.js');
}

add_action('admin_print_styles', 'sds_load_css_js');

// Register style sheet End.

function awesome_css() {
    wp_enqueue_style("owl-css", plugin_dir_url(__FILE__).'assets/css/owl.carousel.css');
    wp_enqueue_style("owl-theme", plugin_dir_url(__FILE__).'assets/css/owl.theme.default.css');
    wp_enqueue_style("owl-transitions", plugin_dir_url(__FILE__).'assets/css/owl.transitions.css');
    wp_enqueue_style("owl-animate", plugin_dir_url(__FILE__).'assets/css/animate.min.css');
    wp_enqueue_script("owl-js", plugin_dir_url(__FILE__).'assets/js/owl.carousel.js', false);
    wp_enqueue_style("owl-fontawesome",  '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
}
add_action('wp_enqueue_scripts', 'awesome_css',11);
