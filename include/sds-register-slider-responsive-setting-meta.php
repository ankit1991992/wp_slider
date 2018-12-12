<?php

function add_responsive_setting_meta_box() {
    add_meta_box("slider_responsive_setting_metabox", "Slider Responsive Breaks", "sd_slider_responsive_settings_meta", "sds_slider", "side", "low", null);
}

add_action("add_meta_boxes", "add_responsive_setting_meta_box");

function sd_slider_responsive_settings_meta($object) {
    wp_nonce_field(basename(__FILE__), "meta-box-nonce_responsive_setting");
    ?>
    <div class="slider_setting_main">

        <div class="main_setting">
            <div class="left-col">
                <label for="sd_res_mobile">Mobile Slide :</label>
            </div>
            <div class="right-col">
                <select name="sd_res_mobile">
                    <?php
                    $sd_mobile_option = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10');

                    foreach ($sd_mobile_option as $key => $value) {
                        if ($value == get_post_meta($object->ID, "sd_res_mobile", true)) {
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
                <label for="sd_res_tablet">Tablet Slide :</label>
            </div>
            <div class="right-col">
                <select name="sd_res_tablet">
                    <?php
                    $sd_tablet_option = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10');

                    foreach ($sd_tablet_option as $key => $value) {
                        if ($value == get_post_meta($object->ID, "sd_res_tablet", true)) {
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
                <label for="sd_res_desktop">Desktop Slide :</label>
            </div>
            <div class="right-col">
                <select name="sd_res_desktop">
                    <?php
                    $sd_dasktop_option = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10');

                    foreach ($sd_dasktop_option as $key => $value) {
                        if ($value == get_post_meta($object->ID, "sd_res_desktop", true)) {
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


    </div>
    <?php
}

function save_custom_responsive_setting_meta_box($post_id, $post, $update) {
    if (!isset($_POST["meta-box-nonce_responsive_setting"]) || !wp_verify_nonce($_POST["meta-box-nonce_responsive_setting"], basename(__FILE__)))
        return $post_id;

    if (!current_user_can("edit_post", $post_id))
        return $post_id;

    if (defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return $post_id;

    $slug = "sds_slider";
    if ($slug != $post->post_type)
        return $post_id;


    $sd_mobile_value = "";
    $sd_tablet_value = "";
    $sd_desktop_value = "";


    if (isset($_POST["sd_res_mobile"])) {
        $sd_mobile_value = $_POST["sd_res_mobile"];
    }
    update_post_meta($post_id, "sd_res_mobile", $sd_mobile_value);
    
    if (isset($_POST["sd_res_tablet"])) {
        $sd_tablet_value = $_POST["sd_res_tablet"];
    }
    update_post_meta($post_id, "sd_res_tablet", $sd_tablet_value);
    
    if (isset($_POST["sd_res_desktop"])) {
        $sd_desktop_value = $_POST["sd_res_desktop"];
    }
    update_post_meta($post_id, "sd_res_desktop", $sd_desktop_value);
}

add_action("save_post", "save_custom_responsive_setting_meta_box", 10, 3);
