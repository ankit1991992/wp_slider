<?php
add_action('init', 'sds_slider_post_type_register');
/* * ***************************   Register Custom Post Type For the SDS Sider Begin   ****************************************** */

function sds_slider_post_type_register() {
    $labels = array(
        'name' => _x('SD Slider', 'post type general name', 'sds_slider'),
        'singular_name' => _x('SD Slider', 'post type singular name', 'sds_slider'),
        'menu_name' => _x('SD Slider', 'admin menu', 'sds_slider'),
        'name_admin_bar' => _x('Slider', 'add new on admin bar', 'sds_slider'),
        'add_new' => _x('Add New Slider', 'sds_slider', 'sds_slider'),
        'add_new_item' => __('Add New Silder', 'sds_slider'),
        'new_item' => __('New Slider', 'sds_slider'),
        'edit_item' => __('Edit Slider', 'sds_slider'),
        'view_item' => __('View Slider', 'sds_slider'),
        'all_items' => __('All Slider', 'sds_slider'),
        'search_items' => __('Search Slider', 'sds_slider'),
        'parent_item_colon' => __('Parent Slider:', 'sds_slider'),
        'not_found' => __('No Slider found.', 'sds_slider'),
        'not_found_in_trash' => __('No Slider found in Trash.', 'sds_slider')
    );

    $args = array(
        'labels' => $labels,
        'description' => __('Description.', 'sds_slider'),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'sds_slider'),
        'capability_type' => 'post',
        'menu_icon' => 'dashicons-screenoptions',
        'has_archive' => true,
        'hierarchical' => true,
        'menu_position' => null,
        'supports' => array('title')
    );
    register_post_type('sds_slider', $args);
}

/* * **************************   Register Custom Post Type For the SDS Sider End   ****************************************** */

add_filter('manage_edit-sds_slider_columns', 'my_edit_sds_slider_columns');
