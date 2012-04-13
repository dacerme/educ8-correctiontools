<script type="text/javascript">
$(function(){
	var xOffset = 10;
	var yOffset = 20;
	var w = $(window).width();
	$('#flow1').css('cursor',"pointer");
	$('#flow1')
	.mouseover(function(e){
		$("body").append("<div id='preview'><div>"+$(this).attr('custom')+"</div></div>");
		$("#preview").css({
					position:"absolute",
					padding:"4px",
					border:"1px solid #f3f3f3",
					backgroundColor:"#ffEEEE",
					top:(e.pageY - yOffset) + "px",
					zIndex:1000
				});
				$("#preview > div").css({
					padding:"5px",
					backgroundColor:"#cccccc",
					border:"1px solid #cccccc"
				});
				if(e.pageX < w/2){
					$("#preview").css({
						left: e.pageX + xOffset + "px",
						right: "auto"
					}).fadeIn("fast");
				}else{
					$("#preview").css("right",(w - e.pageX + yOffset) + "px").css("left", "auto").fadeIn("fast");	
				}
	})
	.mouseout(function(e){
		$("#preview").remove();
	})
	.mousemove(function(e){
		$("#preview").css("top",(e.pageY - xOffset) + "px")
		if(e.pageX < w/2){
			$("#preview").css("left",(e.pageX + yOffset) + "px").css("right","auto");
		}else{
			$("#preview").css("right",(w - e.pageX + yOffset) + "px").css("left","auto");
		}		
	}); 
	
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
		 <div>
			<span custom="advice:com;value:-0.1;" id="flow1">righthere<sup>COM</sup></span>
		 </div>
		</textarea>
	</div>
	<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
	<script type="text/javascript">
		CKEDITOR.replace( 'markcontent',{width:740,height:400});
	</script>

	<h3>Step 3. Give score and feedback:</h3>

	<div class="row">
		
	</div>
	
	<div class="row buttons">
		<input type="button" value="Submit"/>
	</div>
</form>
</div>