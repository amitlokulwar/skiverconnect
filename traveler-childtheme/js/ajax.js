jQuery( document ).ready(function() {
	var site = jQuery('.site').val();    
	jQuery("#book_hotel").click(function(){
	var id = jQuery(".post_id").val(); 
	
	jQuery.ajax({
	url: site+"/wp-admin/admin-ajax.php",
	type: 'POST',
	data:{
	id : id,
	action:'get_booking'
	},
	success: function(msg) {
	//jQuery('#city').html(msg);
	//alert(msg+" Amit");
	window.location = site+"/checkout";
	}
	});
	});
});