<?php

function add_setting_meta_box() {
    add_meta_box("slider_setting_metabox", "Slider General Settings", "sd_slider_settings_meta", "sds_slider", "side", "default", null);
}

add_action("add_meta_boxes", "add_setting_meta_box");

function sd_slider_settings_meta($object) {
    wp_nonce_field(basename(__FILE__), "meta-box-nonce_setting");
    ?>
    <div class="slider_setting_main">
        <div class="main_setting">
            <div class="left-col">
                <label for="sd-navigation-checkbox">Navigation : </label>
            </div>
            <div class="right-col">
                <div class="onoffswitch">
                    <?php $nav_value = get_post_meta($object->ID, "sd-navigation-checkbox", true); ?>
                    <?php
                    if ($nav_value == "true") {
                        $nav_value_check = "checked";
                    } else {
                        $nav_value_check = "";
                    }
                    ?>
                    <input type="checkbox" name="sd-navigation-checkbox" value="true" <?php echo $nav_value_check; ?> class="onoffswitch-checkbox" id="myonoffswitch" style="display: none;">
                    <label class="onoffswitch-label" for="myonoffswitch">
                        <span class="onoffswitch-inner"></span>
                        <span class="onoffswitch-switch"></span>
                    </label>
                </div>
            </div>
        </div>

        <div class="main_setting">
            <div class="left-col">
                <label for="sd-bullets-checkbox">Bullets : </label>
            </div>
            <div class="right-col">
                <div class="onoffswitch">
                    <?php $bullets_value = get_post_meta($object->ID, "sd-bullets-checkbox", true); ?>
                    <?php
                    if ($bullets_value == "true") {
                        $bul_value_check = "checked";
                    } else {
                        $bul_value_check = "";
                    }
                    ?>
                    <input type="checkbox" name="sd-bullets-checkbox" <?php echo $bul_value_check; ?> value="true" class="onoffswitch-checkbox" id="myonoffswitch1" style="display: none;">
                    <label class="onoffswitch-label" for="myonoffswitch1">
                        <span class="onoffswitch-inner"></span>
                        <span class="onoffswitch-switch"></span>
                    </label>
                </div>
            </div>
        </div>



        <div class="main_setting">
            <div class="left-col">
                <label for="sd-autoplay-checkbox">Auto Play : </label>
            </div>
            <div class="right-col">
                <div class="onoffswitch">
                    <?php $autoplay_value = get_post_meta($object->ID, "sd-autoplay-checkbox", true); ?>
                    <?php
                    if ($autoplay_value == "true") {
                        $autoplay_value_check = "checked";
                    } else {
                        $autoplay_value_check = "";
                    }
                    ?>
                    <input type="checkbox" name="sd-autoplay-checkbox" <?php echo $autoplay_value_check; ?> value="true" class="onoffswitch-checkbox" id="myonoffswitch2" style="display: none;">
                    <label class="onoffswitch-label" for="myonoffswitch2">
                        <span class="onoffswitch-inner"></span>
                        <span class="onoffswitch-switch"></span>
                    </label>
                </div>
            </div>
        </div>



        <div class="main_setting">
            <div class="left-col">
                <label for="sd-lazyload-checkbox">Lazy Load : </label>
            </div>
            <div class="right-col">
                <div class="onoffswitch">
                    <?php $lazyload_value = get_post_meta($object->ID, "sd-lazyload-checkbox", true); ?>
                    <?php
                    if ($lazyload_value == "true") {
                        $lazyload_value_check = "checked";
                    } else {
                        $lazyload_value_check = "";
                    }
                    ?>
                    <input type="checkbox" name="sd-lazyload-checkbox" <?php echo $lazyload_value_check; ?> value="true" class="onoffswitch-checkbox" id="myonoffswitchlazyload" style="display: none;">
                    <label class="onoffswitch-label" for="myonoffswitchlazyload">
                        <span class="onoffswitch-inner"></span>
                        <span class="onoffswitch-switch"></span>
                    </label>
                </div>
            </div>
        </div>



        <div class="main_setting">
            <div class="left-col">
                <label for="sd-stoponhover-checkbox">Stop on Hover : </label>
            </div>
            <div class="right-col">
                <div class="onoffswitch">
                    <?php $stoponhover_value = get_post_meta($object->ID, "sd-stoponhover-checkbox", true); ?>
                    <?php
                    if ($stoponhover_value == "true") {
                        $stoponhover_value_check = "checked";
                    } else {
                        $stoponhover_value_check = "";
                    }
                    ?>
                    <input type="checkbox" name="sd-stoponhover-checkbox" <?php echo $stoponhover_value_check; ?> value="true" class="onoffswitch-checkbox" id="myonoffswitchatoponhover" style="display: none;">
                    <label class="onoffswitch-label" for="myonoffswitchatoponhover">
                        <span class="onoffswitch-inner"></span>
                        <span class="onoffswitch-switch"></span>
                    </label>
                </div>
            </div>
        </div>




        <div class="main_setting">
            <div class="left-col">
                <label for="sd-autoheight-checkbox">Auto Height : </label>
            </div>
            <div class="right-col">
                <div class="onoffswitch">
                    <?php $autoheight_value = get_post_meta($object->ID, "sd-autoheight-checkbox", true); ?>
                    <?php
                    if ($autoheight_value == "true") {
                        $autoheight_value_check = "checked";
                    } else {
                        $autoheight_value_check = "";
                    }
                    ?>
                    <input type="checkbox" name="sd-autoheight-checkbox" <?php echo $autoheight_value_check; ?> value="true" class="onoffswitch-checkbox" id="autoheight" style="display: none;">
                    <label class="onoffswitch-label" for="autoheight">
                        <span class="onoffswitch-inner"></span>
                        <span class="onoffswitch-switch"></span>
                    </label>
                </div>
            </div>
        </div>



        <div class="main_setting">
            <div class="left-col">
                <label for="sd-loop-checkbox">Loop : </label>
            </div>
            <div class="right-col">
                <div class="onoffswitch">
                    <?php $loop_value = get_post_meta($object->ID, "sd-loop-checkbox", true); ?>
                    <?php
                    if ($loop_value == "true") {
                        $loop_value_check = "checked";
                    } else {
                        $loop_value_check = "";
                    }
                    ?>
                    <input type="checkbox" name="sd-loop-checkbox" <?php echo $loop_value_check; ?> value="true" class="onoffswitch-checkbox" id="loop" style="display: none;">
                    <label class="onoffswitch-label" for="loop">
                        <span class="onoffswitch-inner"></span>
                        <span class="onoffswitch-switch"></span>
                    </label>
                </div>
            </div>
        </div>




        <div class="main_setting">
            <div class="left-col">
                <label for="sd-singleitem-checkbox">Single Item : </label>
            </div>
            <div class="right-col">
                <div class="onoffswitch">
                    <?php $singleitem_value = get_post_meta($object->ID, "sd-singleitem-checkbox", true); ?>
                    <?php
                    if ($singleitem_value == "true") {
                        $singleitem_value_check = "checked";
                    } else {
                        $singleitem_value_check = "";
                    }
                    ?>
                    <input type="checkbox" name="sd-singleitem-checkbox" <?php echo $singleitem_value_check; ?> value="true" class="onoffswitch-checkbox" id="singleitem" style="display: none;">
                    <label class="onoffswitch-label" for="singleitem">
                        <span class="onoffswitch-inner"></span>
                        <span class="onoffswitch-switch"></span>
                    </label>
                </div>
            </div>
        </div>



        <div class="main_setting">
            <div class="left-col">
                <label for="sd_transitionStyle">Slide In Effect:</label>
            </div>
            <div class="right-col">
                <select name="sd_transitionStyle">
                    <?php
                    $transition_option = array('bounce', 'flash', 'pulse', 'rubberBand', 'shake', 'swing', 'swing', 'tada', 'wobble', 'jello', 'bounceIn', 'bounceInDown', 'bounceInLeft', 'bounceInRight', 'bounceInUp', 'bounceOut', 'bounceOutDown', 'bounceOutLeft', 'bounceOutRight', 'bounceOutUp', 'bounceOut', 'bounceOutDown', 'bounceOutLeft', 'bounceOutRight', 'bounceOutUp', 'fadeIn', 'fadeInDown', 'fadeInDownBig', 'fadeInLeft', 'fadeInLeftBig', 'fadeInRight', 'fadeInRightBig', 'fadeInUp', 'fadeInUpBig', 'fadeOut', 'fadeOutDown', 'fadeOutDownBig', 'fadeOutLeft', 'fadeOutLeftBig', 'fadeOutRight', 'fadeOutRightBig', 'fadeOutUp', 'fadeOutUpBig', 'flip', 'flipInX', 'flipInY', 'flipOutX', 'lightSpeedIn', 'lightSpeedOut', 'rotateIn', 'rotateInDownLeft', 'rotateInDownRight', 'rotateInUpLeft', 'rotateInUpRight', 'rotateOut', 'rotateOutDownLeft', 'rotateOutDownRight', 'rotateOutUpLeft', 'rotateOutUpRight', 'slideInUp', 'slideInDown', 'slideInLeft', 'slideInRight', 'slideOutUp', 'slideOutDown', 'slideOutLeft', 'slideOutRight', 'zoomIn', 'zoomInDown', 'zoomInLeft', 'zoomInRight', 'zoomInUp', 'zoomOut', 'zoomOutDown', 'zoomOutLeft', 'zoomOutRight', 'zoomOutUp', 'hinge', 'rollIn', 'rollOut');

                    foreach ($transition_option as $key => $value) {
                        if ($value == get_post_meta($object->ID, "sd_transitionStyle", true)) {
                            ?>
                            <option selected><?php echo $value; ?></option>
                            <?php
                        } else {
                            ?>
                            <option><?php echo $value; ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </div>
        </div>




        <div class="main_setting">
            <div class="left-col">
                <label for="sd_transitionStyle1">Slide Out Effect:</label>
            </div>
            <div class="right-col">
                <select name="sd_transitionStyle1">
                    <?php
                    $transition_option1 = array('bounce', 'flash', 'pulse', 'rubberBand', 'shake', 'swing', 'swing', 'tada', 'wobble', 'jello', 'bounceIn', 'bounceInDown', 'bounceInLeft', 'bounceInRight', 'bounceInUp', 'bounceOut', 'bounceOutDown', 'bounceOutLeft', 'bounceOutRight', 'bounceOutUp', 'bounceOut', 'bounceOutDown', 'bounceOutLeft', 'bounceOutRight', 'bounceOutUp', 'fadeIn', 'fadeInDown', 'fadeInDownBig', 'fadeInLeft', 'fadeInLeftBig', 'fadeInRight', 'fadeInRightBig', 'fadeInUp', 'fadeInUpBig', 'fadeOut', 'fadeOutDown', 'fadeOutDownBig', 'fadeOutLeft', 'fadeOutLeftBig', 'fadeOutRight', 'fadeOutRightBig', 'fadeOutUp', 'fadeOutUpBig', 'flip', 'flipInX', 'flipInY', 'flipOutX', 'lightSpeedIn', 'lightSpeedOut', 'rotateIn', 'rotateInDownLeft', 'rotateInDownRight', 'rotateInUpLeft', 'rotateInUpRight', 'rotateOut', 'rotateOutDownLeft', 'rotateOutDownRight', 'rotateOutUpLeft', 'rotateOutUpRight', 'slideInUp', 'slideInDown', 'slideInLeft', 'slideInRight', 'slideOutUp', 'slideOutDown', 'slideOutLeft', 'slideOutRight', 'zoomIn', 'zoomInDown', 'zoomInLeft', 'zoomInRight', 'zoomInUp', 'zoomOut', 'zoomOutDown', 'zoomOutLeft', 'zoomOutRight', 'zoomOutUp', 'hinge', 'rollIn', 'rollOut');

                    foreach ($transition_option1 as $key => $value) {
                        if ($value == get_post_meta($object->ID, "sd_transitionStyle1", true)) {
                            ?>
                            <option selected><?php echo $value; ?></option>
                            <?php
                        } else {
                            ?>
                            <option><?php echo $value; ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
        
        
        <div class="main_setting">
            <div class="left-col">
                <label for="sd-autoplayTimeout-txt">Slide Time: </label>
            </div>
            <div class="right-col">
                <div class="onoffswitch">
                    <?php
                    $slider_speed_def = get_post_meta($object->ID, "sd-autoplayTimeout-txt", true);
                    if(!empty($slider_speed_def)){
                        $slider_speed_val = $slider_speed_def;
                    }else{
                        $slider_speed_val = '1000';
                    }
                    ?>
                    <input name="sd-autoplayTimeout-txt" type="text" value="<?php echo $slider_speed_val; ?>">                   
                </div>
            </div>
        </div>
      
        
        
        
        
        


    </div>
    <?php
}

function save_custom_setting_meta_box($post_id, $post, $update) {
    if (!isset($_POST["meta-box-nonce_setting"]) || !wp_verify_nonce($_POST["meta-box-nonce_setting"], basename(__FILE__)))
        return $post_id;

    if (!current_user_can("edit_post", $post_id))
        return $post_id;

    if (defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return $post_id;

    $slug = "sds_slider";
    if ($slug != $post->post_type)
        return $post_id;

    $transition_dropdown_value = "";
    $transition_dropdown_value1 = "";
    $sd_navigation_value = "";
    $sd_bullets_value = "";
    $sd_autoplay_value = "";
    $sd_lazyload_value = "";
    $sd_stoponhover_value = "";
    $sd_autoheight_value = "";
    $sd_loop_value = "";
    $sd_single_value = "";
    $sd_slide_time_value = "";



    if (isset($_POST["sd-autoplayTimeout-txt"])) {
        $sd_slide_time_value = $_POST["sd-autoplayTimeout-txt"];
    }
    update_post_meta($post_id, "sd-autoplayTimeout-txt", $sd_slide_time_value);

    if (isset($_POST["sd_transitionStyle"])) {
        $transition_dropdown_value = $_POST["sd_transitionStyle"];
    }
    update_post_meta($post_id, "sd_transitionStyle", $transition_dropdown_value);

    if (isset($_POST["sd_transitionStyle1"])) {
        $transition_dropdown_value1 = $_POST["sd_transitionStyle1"];
    }
    update_post_meta($post_id, "sd_transitionStyle1", $transition_dropdown_value1);

    if (isset($_POST["sd-navigation-checkbox"])) {
        $sd_navigation_value = $_POST["sd-navigation-checkbox"];
    }
    update_post_meta($post_id, "sd-navigation-checkbox", $sd_navigation_value);

    if (isset($_POST["sd-bullets-checkbox"])) {
        $sd_bullets_value = $_POST["sd-bullets-checkbox"];
    }
    update_post_meta($post_id, "sd-bullets-checkbox", $sd_bullets_value);

    if (isset($_POST["sd-autoplay-checkbox"])) {
        $sd_autoplay_value = $_POST["sd-autoplay-checkbox"];
    }
    update_post_meta($post_id, "sd-autoplay-checkbox", $sd_autoplay_value);

    if (isset($_POST["sd-lazyload-checkbox"])) {
        $sd_lazyload_value = $_POST["sd-lazyload-checkbox"];
    }
    update_post_meta($post_id, "sd-lazyload-checkbox", $sd_lazyload_value);

    if (isset($_POST["sd-stoponhover-checkbox"])) {
        $sd_stoponhover_value = $_POST["sd-stoponhover-checkbox"];
    }
    update_post_meta($post_id, "sd-stoponhover-checkbox", $sd_stoponhover_value);

    if (isset($_POST["sd-autoheight-checkbox"])) {
        $sd_autoheight_value = $_POST["sd-autoheight-checkbox"];
    }
    update_post_meta($post_id, "sd-autoheight-checkbox", $sd_autoheight_value);

    if (isset($_POST["sd-loop-checkbox"])) {
        $sd_loop_value = $_POST["sd-loop-checkbox"];
    }
    update_post_meta($post_id, "sd-loop-checkbox", $sd_loop_value);

    if (isset($_POST["sd-singleitem-checkbox"])) {
        $sd_single_value = $_POST["sd-singleitem-checkbox"];
    }
    update_post_meta($post_id, "sd-singleitem-checkbox", $sd_single_value);
}

add_action("save_post", "save_custom_setting_meta_box", 10, 3);
