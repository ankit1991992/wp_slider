<?php
add_action('add_meta_boxes', 'dynamic_add_custom_box');
/* Do something with the data entered */
add_action('save_post', 'dynamic_save_postdata');
/* Adds a box to the main column on the Post and Page edit screens */

function dynamic_add_custom_box() {
    add_meta_box(
            'dynamic_sectionid', __('Add Slider Slides', 'sds'), 'sd_slider_custom_meta_box', 'sds_slider');
}

/* Prints the box content */

function sd_slider_custom_meta_box() {
    global $post;
    // Use nonce for verification
    wp_nonce_field(plugin_basename(__FILE__), 'sds_Slider_Meta_nonce');
    ?>
    <div id="meta_inner">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.4.2/css/plugins/code_view.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>
        <!-- Include Editor style. -->
        <link href='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.4.2/css/froala_editor.min.css' rel='stylesheet' type='text/css' />
        <link href='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.4.2/css/froala_style.min.css' rel='stylesheet' type='text/css' />
        <!-- Include JS file. -->
        <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.4.2/js/froala_editor.min.js'></script>
        <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.4.2/js/plugins/code_view.min.js'></script>

        <?php
        wp_enqueue_style('thickbox');
        wp_enqueue_script('thickbox');
        wp_enqueue_script('media-upload');
        ?>
        <span id="here">
            <?php
            //get the saved meta as an arry
            $output = '';
            $sds_meta = get_post_meta($post->ID, 'sds_meta', true);
            $c = 0;
            if (!empty($sds_meta)) {
                if (count($sds_meta) > 0) {
                    foreach ($sds_meta as $sds_fields) {
                        if (isset($sds_fields['title']) || isset($sds_fields['description']) || isset($sds_fields['slide_image'])) {
                            $output .= '<div class="panel" id="panel' . $c . '"><a href="javascript:void(0)" class="accordion">Click To Edit Slide</a><a class="remove_slide" href="javascript:void(0);" onclick="myfunc(' . $c . ')" ><i class="fa fa-trash-o" aria-hidden="true"></i></a><div class="clt"><label>Title : </label><input type="text" class="required-entry" name="sds_meta[' . $c . '][title]" value="' . $sds_fields['title'] . '" /> <span>Description :</span><textarea  name="sds_meta[' . $c . '][description]" id="edit" class="cnt_edt required-entry">' . $sds_fields['description'] . '</textarea><input class="wpss_upload_image'.$c.'" type="hidden" name="sds_meta[' . $c . '][slider_image]" value="' . $sds_fields['slider_image'] . '" class="wpss_text wpss-file" /><div class="sds_images"><img class="wpss_upload_image_thumb'.$c.'" src="'.$sds_fields['slider_image'].'"></img></div><input type="hidden" value="' . $c . '" /><input class="wpss_upload_image_button" type="button" data-id="' . $c . '" value="Upload Image" /></div></div>';
                            $c = $c + 1;
                        }
                    }
                }
            }
            echo $output;
            ?>
        </span>
        <span class="add button button-primary button-large"><?php _e('Add Slide'); ?></span>
        <script>
            function myfunc(i) {
                var sds_cnf = confirm("Are You Sure To Delete!");
                if (sds_cnf == true) {
                    jQuery('#panel' + i).remove();
                }
            }
        </script>
        <script>
            function initialize_editor() {
                jQuery('.cnt_edt').on('froalaEditor.initialized', function (e, editor) {
                }).froalaEditor({
                    enter: $.FroalaEditor.ENTER_P,
                    placeholderText: null,
                    heightMin: 200,
                    heightMax: 300
                });
            }
            jQuery(function () {
                initialize_editor();
            });
        </script>

        <script>
            var $ = jQuery.noConflict();
            $(document).ready(function () {
                var count = <?php echo $c; ?>;
                $(".add").click(function () {
                    var reqlength = $('.required-entry').length;
                    console.log(reqlength);
                    var value = $('.required-entry').filter(function () {
                        return this.value != '';
                    });
                    if (value.length >= 0 && (value.length !== reqlength)) {
                        alert('Please fill out all required fields.');
                    } else {
                        //alert('Everything has a value.');
                        count = count + 1;
                        $('#here').append('<div class="panel" id="panel' + count + '"><a href="javascript:void(0)" class="accordion active">Click To Edit Slide</a><a class="remove_slide" href="javascript:void(0);" onclick="myfunc(' + count + ')" ><i class="fa fa-trash-o" aria-hidden="true"></i></a><div class="clt" style="display:block"><label> Title :</label><input type="text" class="required-entry" name="sds_meta[' + count + '][title]" value="" /><span> Description : </span><textarea  class="cnt_edt required-entry" name="sds_meta[' + count + '][description]"  /></textarea><div class="sds_images"><img class="wpss_upload_image_thumb'+count+'" src="<?php echo plugin_dir_url( __FILE__ ) ?>/images/no-image.png"></img></div><input class="wpss_upload_image'+count+'" type="hidden" name="sds_meta[' + count + '][slider_image]" value="<?php echo plugin_dir_url( __FILE__ ) ?>images/no-image.png" class="wpss_text wpss-file" /><input type="hidden" value="' + count + '" /><input class="wpss_upload_image_button" data-id="' + count + '" type="button" value="Upload Image" class="wpss-filebtn" /></div></div>');
                        initialize_editor();
                        inslize_media_upload();
                        return false;
                    }
                });
                /* $(".remove").live('click', function () {
                 $(this).parent().remove();
                 });
                 */
            });
        </script>
        <script>
            jQuery(document).ready(function () {
                inslize_media_upload();
            });
            function inslize_media_upload() {
                jQuery('.wpss_upload_image_button').click(function () {
                    uploadID = jQuery(this).prev('input');
                    txt_id = jQuery(uploadID).attr('value');
                    formfield = jQuery('.wpss_upload_image'+txt_id).attr('name');
                    tb_show('', 'media-upload.php?type=image&TB_iframe=true');
                    return false;
                });
                window.send_to_editor = function (html) {
                    imgurl = jQuery('img', html).attr('src');
                    jQuery('.wpss_upload_image'+txt_id).val(imgurl);
                    tb_remove();
                    jQuery('.wpss_upload_image_thumb'+txt_id).attr('src', imgurl);                    
                }
            }
        </script>
    </div>
    <script>
        jQuery('body').on('click', '.accordion', function () {
            jQuery(this).parent().find('.clt').toggle();
            jQuery(this).toggleClass('active');
        })
    </script>
    <?php
}
/* Main Function End */
/* When the post is saved, saves our custom data */

function dynamic_save_postdata($post_id) {
    // verify if this is an auto save routine. 
    // If it is our form has not been submitted, so we dont want to do anything
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;
    // verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times
    if (!isset($_POST['sds_Slider_Meta_nonce']))
        return;
    if (!wp_verify_nonce($_POST['sds_Slider_Meta_nonce'], plugin_basename(__FILE__)))
        return;
    // OK, we're authenticated: we need to find and save the data
    $sds_meta = $_POST['sds_meta'];
    update_post_meta($post_id, 'sds_meta', $sds_meta);
}
