// JavaScript Document
jQuery(document).ready(function() {

	var header_clicked = false;

	jQuery('#buscar_miniatura').click(function() {
	 formfield = jQuery('#ventana_miniatura').attr('name');
	 tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
	 header_clicked = true;
	 return false;
	});

	window.original_send_to_editor = window.send_to_editor;

	window.send_to_editor = function(html) {
		if (header_clicked) {
			imgurl = jQuery('img',html).attr('src');
			jQuery('#ventana_miniatura').val(imgurl);
			header_clicked = false;
		 	tb_remove();
		} else {
			window.original_send_to_editor(html);
		}
	}

});