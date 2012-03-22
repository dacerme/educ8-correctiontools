$( document ).ready( function(){
	$('.slides ul').jcarousel({
		scroll: 1,
		wrap: 'both',
		initCallback: _init_carousel,
		buttonNextHTML: null,
		buttonPrevHTML: null
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
		var rememberme = ($('#rememberme').is(':checked'))?1:0;
		$.ajax({
			url:"/correction/index.php/site/login",
			data:"username="+username+"&password="+password+"&rememberMe="+rememberme,
			success:function(data){
				if(data == "login success"){
					window.location.reload();
				}
			}
		});
	});
	$('#signout').click(function(){f
		window.location.href="/correction/index.php/site/logout";
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
};
