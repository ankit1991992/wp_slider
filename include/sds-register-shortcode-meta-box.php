<?php
/* Shortcode custom metabox Begin */

function add_sds_slider_meta_box() {
    add_meta_box("shortcode_metabox", "Slider Shortcode", "sds_slider_shortcode", "sds_slider", "side", "high", null);
}

add_action("add_meta_boxes", "add_sds_slider_meta_box");

function sds_slider_shortcode($object) {
    wp_nonce_field(basename(__FILE__), "meta-box-nonce");
    ?>
    <div>
        <label for="txt_sds_shortcode"></label>
        <input name="txt_sds_shortcode" type="text" class="sds_txt_shortcode" readonly="true" value="<?php echo get_post_meta($object->ID, "txt_sds_shortcode", true); ?>">
    </div>
    <?php
}

function save_custom_meta_box($post_id, $post, $update) {
    if (!isset($_POST["meta-box-nonce"]) || !wp_verify_nonce($_POST["meta-box-nonce"], basename(__FILE__)))
        return $post_id;

    if (!current_user_can("edit_post", $post_id))
        return $post_id;

    if (defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return $post_id;

    $slug = "sds_slider";
    if ($slug != $post->post_type)
        return $post_id;

    if (isset($_POST["txt_sds_shortcode"])) {
        $meta_box_text_value = "[SD_SLIDER ID=" . $post_id . ']';
    }
    update_post_meta($post_id, "txt_sds_shortcode", $meta_box_text_value);
}

add_action("save_post", "save_custom_meta_box", 10, 3);

/**
 * Register all shortcodes
 *
 * @return null
 */
function register_shortcodes() {
    add_shortcode('SD_SLIDER', 'shortcode_mostra_produtos');
}

add_action('init', 'register_shortcodes');

function shortcode_mostra_produtos($atts) {
    global $wp_query,
    $post;
    $output = '';

    $atts = shortcode_atts(array(
        'id' => ''), $atts);
    //echo $atts['id'];
    $sds_post = get_post($atts['id']);
    $sds_post_id = $sds_post->ID;
    $sds_get_slider_meta_slide = get_post_meta($sds_post_id, 'sds_meta', true);
    if (!empty($sds_get_slider_meta_slide)) {
        sds_load_css_js();
        $sds_navigation = get_post_meta($sds_post_id, 'sd-navigation-checkbox', true);
        $sds_bullets_navigation = get_post_meta($sds_post_id, 'sd-bullets-checkbox', true);
        $sds_transition = get_post_meta($sds_post_id, 'sd_transitionStyle', true);
        $sds_transition1 = get_post_meta($sds_post_id, 'sd_transitionStyle1', true);
        $sds_autoplay = get_post_meta($sds_post_id, 'sd-autoplay-checkbox', true);
        $sds_lazyload = get_post_meta($sds_post_id, 'sd-lazyload-checkbox', true);
        $sds_stoponhover = get_post_meta($sds_post_id, 'sd-stoponhover-checkbox', true);
        $sds_autoheight = get_post_meta($sds_post_id, 'sd-autoheight-checkbox', true);
        $sds_loop = get_post_meta($sds_post_id, 'sd-loop-checkbox', true);
        $sds_singleitem = get_post_meta($sds_post_id, 'sd-singleitem-checkbox', true);
        $sds_responsive_mobile = get_post_meta($sds_post_id, 'sd_res_mobile', true);
        $sds_responsive_tablet = get_post_meta($sds_post_id, 'sd_res_tablet', true);
        $sds_responsive_desktop = get_post_meta($sds_post_id, 'sd_res_desktop', true);
        $sds_slidetimeout_desktop = get_post_meta($sds_post_id, 'sd-autoplayTimeout-txt', true);
        $sds_left_arrow = get_post_meta($sds_post_id, 'navigation_arrow_left-arrow', true);
        $sds_right_arrow = get_post_meta($sds_post_id, 'navigation_arrow_right-arrow', true);
        if(!empty($sds_left_arrow)){
            $left= $sds_left_arrow;
        }else{
           $left= plugins_url( '/images/arrow-left.png', __FILE__ );
        }
        if(!empty($sds_right_arrow)){
            $right= $sds_right_arrow;
        }else{
           $right= plugins_url( '/images/arrow-right.png', __FILE__ );
        }
        /* ################## SCRIPT BEGIN #################### */

        $output .= '<script>jQuery(document).ready(function () {jQuery(".owl-demo' . $sds_post_id . '").owlCarousel({';
        if (!empty($sds_navigation)) {
            $output .= 'nav: true,';
            $output .='navText : ["<img src='.$left.'></img>","<img src='.$right.'></img>"],';
        }
        if (!empty($sds_bullets_navigation)) {
            $output .= ' dots : true,';
        } else {
            $output .= ' dots : false,';
        }
        $output .='animateOut: "' . $sds_transition . '",';
        $output .='animateIn: "' . $sds_transition1 . '",';
        if (!empty($sds_autoplay)) {
            $output .='autoplay : true,';
            $output .='autoplayTimeout : '.$sds_slidetimeout_desktop.',';
        }
        if (!empty($sds_lazyload)) {
            $output .='lazyLoad : true,';
        }
        if (!empty($sds_stoponhover)) {
            $output .='autoplayHoverPause : true,';
        }
        if (!empty($sds_autoheight)) {
            $output .='autoHeight : true,';
            $output .='autoHeightClass : "owl-height",';
        }
        if (!empty($sds_loop)) {
            $output .='loop : true,';
        } else {
            $output .='loop : false,';
        }
        if ($sds_singleitem == 'true') {
            $output .='items: 1,';
        } else {
            $output .='margin:10,';
            $output .='responsiveClass:true,';
            $output .='responsive:{0:{items:' . $sds_responsive_mobile . '},480:{items:' . $sds_responsive_tablet . '},768:{items:' . $sds_responsive_desktop . '}}';
        }
        
        /* MORE OPTION HERE 
          LIKE : $output .='loop : false,';
          MORE OPTION END */

        $output .= '});});</script>';


        /* ################## END SCRIPT #################### */

        /* ################## SHORTCODE HTML #################### */

        $output .= '<div class="owl-carousel owl-theme owl-demo' . $sds_post_id . '" >';

        foreach ($sds_get_slider_meta_slide as $sds_slide) {
            // print_r( $sds_slide);
            $output .= '<div class="item"><img src="' . $sds_slide['slider_image'] . '" alt="Slide Not Found">';
            $output .='<div class="slider_title animate">' . $sds_slide['title'] . '</div>';
            $output .='<div class="slider_desc">' . $sds_slide['description'] . '</div>';
            $output .='</div>';
        }
        $output .= '</div>';
    } else {
        $output = "Please Add Minimum 1 Slide";
    }
    wp_reset_postdata();
    /* ################## SHORTCODE END HTML #################### */
    return $output;
}
