jQuery(document).ready(function(){
	jQuery('.post-type-sds_slider').on('click','.sds_txt_shortcode',function(){
	 jQuery(this).select();
});

jQuery('.post-type-sds_slider').on('click','#publish',function(){
	var txt_publish =  jQuery('#title').val();
    if (txt_publish == "") {
        alert('Slider Title is Required');
		return false;
    }
	});
});
