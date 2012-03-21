$(function(){
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
		$( "#signwindow" ).dialog( "hide" );
		return false;
	});
	
});
