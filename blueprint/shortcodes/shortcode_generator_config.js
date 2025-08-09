function insertAtCursor(myField, myValue) {
  if (document.selection) {
    myField.focus();
    sel = document.selection.createRange();
    sel.text = myValue;
  }
  else if (myField.selectionStart || myField.selectionStart == '0') {
    var startPos = myField.selectionStart;
    var endPos = myField.selectionEnd;
    myField.value = myField.value.substring(0, startPos)
                  + myValue
                  + myField.value.substring(endPos, myField.value.length);
  } else {
    myField.value += myValue;
  }
}

$j = jQuery.noConflict();

var currentContent = "";
var shortcode = "";

if (!current_editor) var current_editor = "editor";

$j(document).ready(function () {

$j(window).mousemove(function() {

	currentContent = $j(" textarea#content ").val();

});

var shortcode_config_panels = $j("div.sg_panels > div");

shortcode_config_panels.hide(0);

$j('.target').change(function() {

	shortcode_config_panels.slideUp(400);
	
	shortcode = $j(this).find("option:selected").attr("value");
	
	if (shortcode == "text_color") {
	
		$j(" div.text_color ").slideDown(400);
	
	}
	
	if (shortcode == "text_highlight") {
	
		$j(" div.text_highlight ").slideDown(400);
	
	}

	if (shortcode == "single_lightbox") {
	
		$j(" div.single_lightbox ").slideDown(400);
	
	}
	
	if (shortcode == "single_lightbox") {
	
		$j(" div.single_lightbox ").slideDown(400);
	
	}

	if (shortcode == "single_youtube") {
	
		$j(" div.single_youtube ").slideDown(400);
	
	}

	if (shortcode == "single_vimeo") {
	
		$j(" div.single_vimeo ").slideDown(400);
	
	}
	
	if (shortcode == "single_shv") {
	
		$j(" div.single_shv ").slideDown(400);	
	
	}	

	if (shortcode == "circle_list" || shortcode == "square_list" || shortcode == "numbered_list") {
	
		$j(" div.lists ").slideDown(400);	
	
	}	
	
	if (shortcode == "dropcap") {
	
		$j(" div.dropcap ").slideDown(400);			
	
	}

	if (shortcode == "scbutton") {
	
		$j(" div.scbutton ").slideDown(400);			
	
	}

	if (shortcode == "scimageleft" || shortcode == "scimageright") {
	
		$j(" div.scimage ").slideDown(400);			
	
	}
										
});

$j(" span.generate ").click(function () {

var insert_target = "";

$j(window).mousemove();

if (current_editor == "editor") {

insert_target = document.getElementById('content');

} else { 

insert_target = document.getElementById("bp_editor_content");

};

generateShortcode(shortcode, insert_target);

});

});

function generateShortcode (shortcode, target) {

	var current_editor_text = currentContent;
	var shortcode_content = "";
		
	if (shortcode == "two_column") {
	
		shortcode_content = "[two_column] First Column Content [/two_column] [two_column_last] Second Column Content [/two_column_last]";
			
		insertAtCursor(target, shortcode_content);
	
	}

	if (shortcode == "three_column") {
	
		shortcode_content = "[three_column] First Column Content [/three_column] [three_column] Second Column Content [/three_column] [three_column_last] Third Column Content [/three_column_last]";
	
		insertAtCursor(target, shortcode_content);
	
	}

	if (shortcode == "four_column") {
	
		shortcode_content = "[four_column] First Column Content [/four_column] [four_column] Second Column Content [/four_column] [four_column] Third Column Content [/four_column] [four_column_last] Fourth Column Content [/four_column_last]";
			
		insertAtCursor(target, shortcode_content);
	
	}

	if (shortcode == "five_column") {
	
		shortcode_content = "[five_column] First Column Content [/five_column] [five_column] Second Column Content [/five_column] [five_column] Third Column Content [/five_column] [five_column] Third Column Content [/five_column] [five_column_last] Fourth Column Content [/five_column_last]";
	
		insertAtCursor(target, shortcode_content);
	
	}

	if (shortcode == "col_two_third_right") {
	
		shortcode_content = "[two_third_column_right] First Column Content [/two_third_column_right] [two_third_column_right_last] Second Column Content [/two_third_column_right_last]";
	
		insertAtCursor(target, shortcode_content);
		
	}

	if (shortcode == "col_two_third_left") {
	
		shortcode_content = "[two_third_column_left] First Column Content [/two_third_column_left] [two_third_column_left_last] Second Column Content [/two_third_column_left_last]";
	
		insertAtCursor(target, shortcode_content);
	
	}

	if (shortcode == "text_bold") {
	
		shortcode_content = "[textbold] First Column Content [/textbold]";
	
		insertAtCursor(target, shortcode_content);
	
	}
	
	if (shortcode == "text_italic") {
	
		shortcode_content = "[textitalic] First Column Content [/textitalic]";
	
		insertAtCursor(target, shortcode_content);
	
	}
	
	if (shortcode == "text_color") {
	
		shortcode_content = '[textcolor color="' + $j(' .text_color_value ').val() + '"]  [/textcolor]';
	
		insertAtCursor(target, shortcode_content);
	
	}
	
	if (shortcode == "text_highlight") {
	
		shortcode_content = '[highlight color="' + $j(' .text_highlight_color ').val() + '" background_color="' + $j(' .text_highlight_bg_color ').val() + '"] [/highlight]';
		
		insertAtCursor(target, shortcode_content);
	
	}
	
	if (shortcode == "single_lightbox") {
	
		shortcode_content = '[single_lightbox url="' + $j(' .single_lightbox_url ').val() + '" image_url="' + $j(' .single_lightbox_image_url ').val() + '" image_width="' + $j(' .single_lightbox_width ').val() + '" image_height="' + $j(' .single_lightbox_height ').val() + '" title="' + $j(' .single_lightbox_title ').val() + '"]';
		
		insertAtCursor(target, shortcode_content);	
		
	}
	
	if (shortcode == "success_message") {
		
		shortcode_content = "[success_box]  [/success_box]";
		
		insertAtCursor(target, shortcode_content);	
	
	}

	if (shortcode == "error_message") {
		
		shortcode_content = "[error_box]  [/error_box]";
		
		insertAtCursor(target, shortcode_content);	
	
	}

	if (shortcode == "alert_message") {
		
		shortcode_content = "[alert_box]  [/alert_box]";
		
		insertAtCursor(target, shortcode_content);	
	
	}	
	
	if (shortcode == "download_message") {
		
		shortcode_content = "[download_box]  [/download_box]";
		
		insertAtCursor(target, shortcode_content);	
	
	}	

	if (shortcode == "single_youtube") {
	
		shortcode_content = '[single_youtube video_id="' + $j(' .single_youtube_id ').val() + '" video_width="' + $j(' .single_youtube_width ').val() + '" video_height="' + $j(' .single_youtube_height ').val() + '"]';
		
		insertAtCursor(target, shortcode_content);	
		
	}

	if (shortcode == "single_vimeo") {
	
		shortcode_content = '[single_vimeo video_id="' + $j(' .single_vimeo_id ').val() + '" video_width="' + $j(' .single_vimeo_width ').val() + '" video_height="' + $j(' .single_vimeo_height ').val() + '"]';
		
		insertAtCursor(document.getElementById("content"), shortcode_content);	
		
	}

	if (shortcode == "single_shv") {
	
		shortcode_content = '[single_shv video_url="' + $j(' .single_shv_id ').val() + '" video_width="' + $j(' .single_shv_width ').val() + '" video_height="' + $j(' .single_shv_height ').val() + '"]';
		
		insertAtCursor(target, shortcode_content);	
		
	}
	
	if (shortcode == "circle_list") {
	
		shortcode_content = "[list_circle]";
		
		var list_item_val = parseInt($j(" .no_of_list_items ").val());
				
		for (var i = 0; i < list_item_val; i++) {
		
			shortcode_content += " <li>Content here...</li> ";
		
		}
		
		shortcode_content += "[/list_circle]";
		
		insertAtCursor(target, shortcode_content);			
	
	}

	if (shortcode == "square_list") {
	
		shortcode_content = "[list_square]";
		
		var list_item_val = parseInt($j(" .no_of_list_items ").val());
				
		for (var i = 0; i < list_item_val; i++) {
		
			shortcode_content += " <li>Content here...</li> ";
		
		}
		
		shortcode_content += "[/list_square]";
		
		insertAtCursor(target, shortcode_content);			
	
	}

	if (shortcode == "numbered_list") {
	
		shortcode_content = "[list_numbered]";
		
		var list_item_val = parseInt($j(" .no_of_list_items ").val());
				
		for (var i = 0; i < list_item_val; i++) {
		
			shortcode_content += " <li>Content here...</li> ";
		
		}
		
		shortcode_content += "[/list_numbered]";
		
		insertAtCursor(target, shortcode_content);			
	
	}
	
	if (shortcode == "dropcap") {
	
		shortcode_content = '[dropcap color="' + $j(" .dropcap_text_color ").val() + '" background_color="' +  $j(" .dropcap_bg_color ").val() + '"]' + '  [/dropcap]';
		
		insertAtCursor(target, shortcode_content);				
	
	}
	
	if (shortcode == "pullquote_left") {
	
		shortcode_content = "[pull_quote_left]  [/pull_quote_left]";
		
		insertAtCursor(target, shortcode_content);				
	
	}
	
	if (shortcode == "pullquote_right") {
	
		shortcode_content = "[pull_quote_right]  [/pull_quote_right]";
		
		insertAtCursor(target, shortcode_content);				
	
	}

	if (shortcode == "scbutton") {
	
		shortcode_content = '[button link="' + $j(" .scbutton_link ").val() + '" color="' + $j(" .scbutton_text_color ").val() + '" text_color="' + $j(" .scbutton_bg_color ").val() + '"]Button Label[/button]';
		
		insertAtCursor(target, shortcode_content);				
	
	}

	if (shortcode == "scimageleft") {
	
		shortcode_content = '[image_left image_url="' + $j(" .scimage_url ").val() + '"]';
		
		insertAtCursor(target, shortcode_content);				
	
	}

	if (shortcode == "scimageright") {
	
		shortcode_content = '[image_right image_url="' + $j(" .scimage_url ").val() + '"]';
		
		insertAtCursor(target, shortcode_content);				
	
	}
						
}
