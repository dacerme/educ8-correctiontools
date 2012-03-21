$( document ).ready( function(){
	$('.slides ul').jcarousel({
		scroll: 1,
		wrap: 'both',
		initCallback: _init_carousel,
		buttonNextHTML: null,
		buttonPrevHTML: null
	});
});

function _init_carousel(carousel) {
	$('.slider-nav .next').bind('click', function() {
		carousel.next();
		return false;
	});
	
	$('.slider-nav .prev').bind('click', function() {
		carousel.prev();
		return false;
	});
	
	$.fx.speeds._default = 500;
	$( "#signwindow" ).dialog({
		autoOpen: false,
		show: "blind",
		hide: "blind",
		position:'top',
		draggable:false,
		resizable:false
	});
	$( "#signin" ).click(function() {
		$( "#signwindow" ).dialog( "open" );
		return false;
	});
	$( "input:button" ).button();
	$('#cancelsign').click(function(){
		$( "#signwindow" ).dialog( "close" );
		return false;
	});
	$('#signsubmit').click(function(){
		var username = $('#username').val();
		var password = $('#password').val();
		var remeberme = ($('#remeberme').is(':checked'))?1:0;
		$.ajax({
			url:"/index.php/site/login",
			data:"username="+username+"&password="+password+"&remeberme="+remeberme,
			success:function(data){
				
			}
		});
	});
};
