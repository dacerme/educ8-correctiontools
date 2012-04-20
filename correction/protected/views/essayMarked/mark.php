<script type="text/javascript">
$(function(){
	$( "#menulist" ).accordion();
});
</script>
<h2>Essay Marking</h2>
<div class="form">
<form>
	<h3>Step 1. Check prompt:</h3>
	<div class="row"></div>
		
	<h3>Step 2. Mark it:</h3>
	<div class="row">
		<textarea id="markcontent">
			<?echo $essay->content?>
		</textarea>
	</div>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/ckeditor/ckeditor.js"></script>
	<script type="text/javascript">
			var annodata;
		    $.ajax({
		    	url:baseurl+'/essaymarked/getannotations',
		    	dataType:'json',
		    	success:function(data){
		    		annodata = data;
		    		CKEDITOR.replace( 'markcontent',{width:740,height:400,extraPlugins:'annotation'});
		    	}
		    });
	</script>

	<h3>Step 3. Give score and feedback:</h3>

	<div class="row">
	</div>
	
	<div class="row buttons">
		<input type="button" value="Submit"/>
	</div>
</form>
</div>