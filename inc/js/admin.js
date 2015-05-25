;jQuery(function($){
	
	$('.menu_delete').click(function(e){
		
		var con = confirm( data.confirm_message );
		if( con ) return true;
		
		return false;
	});
	
	$('#save_location').click(function(e){
		
		if($('#dmm_menu_location').val() == '' || $('#dmm_menu_desc').val() == '') {
			alert(data.alert_msg);
			return false;
		}
		
	});
	
});