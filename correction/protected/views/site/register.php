<script type="text/javascript">
	$(function(){
		$('#signsubmit2').click(function(){
			var username = $('#username2').val();
			var password = $('#password2').val();
			var rememberme = ($('#rememberme2').is(':checked'))?1:0;
			$('#error').html("");
			if(username == "" || password == ""){
				$('#error2').html("username or password is blank!");
				$('#username2').focus();
				return;
			}
			$.ajax({
				url:"/site/login",
				data:"username="+username+"&password="+password+"&rememberMe="+rememberme,
				success:function(data){
					if(data == "login success"){
						window.location.href='/site/icorrection';
					}else{
						$('#error2').html("Incorrect username or password!");
					}
				}
			});
		});
	});
</script>
<div id="main">
	<div class="shell">
		<div style="float:left;display:block;width:50%">
			<h1>Register</h1>
			<br/>
			<?php echo $this->renderPartial('/site/_regform', array('model'=>$model)); ?>
		</div>
		<div style="float:left;display:block;width:40%;padding-left:50px;">
			<h1>Sign In</h1>
			<br/>
			<div class="form">
				<p>Username:</p><input type="text" id="username2"  style="width:200px" placeholder="username..."/><br/>
				<p>Password:</p><input type="password" id="password2" style="width:200px"  placeholder="password..."/><br/>
				<br/><input type="checkbox" id="rememberme2" />&nbsp;Remember Me<br/>
				<span id="error2" style="color:red"></span>
				<br/><br/>
				<input type="button" value="Sign In" id="signsubmit2"/>
			</div>
			
		</div>
		<div style="clear:both"></div>
	</div>
</div>