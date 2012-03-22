$( document ).ready( function(){
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
	$( "input:button,input:submit" ).button();
	$('#cancelsign').click(function(){
		$( "#signwindow" ).dialog( "close" );
		return false;
	});
	$('#signsubmit').click(function(){
		var username = $('#username').val();
		var password = $('#password').val();
		var rememberme = ($('#rememberme').is(':checked'))?1:0;
		$('#error').html("");
		if(username == "" || password == ""){
			$('#error').html("username or password is blank!");
			$('#username').focus();
			return;
		}
		$.ajax({
			url:"/site/login",
			data:"username="+username+"&password="+password+"&rememberMe="+rememberme,
			success:function(data){
				if(data == "login success"){
					window.location.reload();
				}else{
					$('#error').html("Incorrect username or password!");
				}
			}
		});
	});
	
	$('#signout').click(function(){
		window.location.href="/site/logout";
	});
	
	$('#register').click(function(){
		window.location.href="/user/register";
	});
});