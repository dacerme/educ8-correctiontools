<script type="text/javascript">
$(function(){
	var xOffset = 10;
	var yOffset = 20;
	var w = $(window).width();
	$('span[custom="ann"],span[custom="com"]').each(function(index,domEle){
		
		$(this).css('cursor',"pointer");
		$(this).mouseover(function(e){
			$("body").append("<div id='preview'><div>"+$(this).attr('title')+"</div></div>");
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
		
	});
	
	$( "#menulist" ).accordion();
});
</script>
<div class="form">
	<div id="markedcontent" style="background-color:#EEEFFF">
	    <?=$mark->markedcontent?>
	</div>
	<div class="row">
		<b>Total Score:</b>&nbsp;&nbsp;<input type="text" id="totalsocre" name="totalscore" value="<?=$mark->score?>"/>
		<br/>
		<table width="740">
			<tr>
				<td width="200">Item</td>
				<td width="440">Explanation</td>
				<td width="50">Score</td>
			</tr>
			<?foreach($grade as $g){
				echo "<tr>";
				echo "<td width='200'>".$g->caption."</td>";
				echo "<td width='440'>".$g->explain."</td>";
					/*$criteria = new CDbCriteria();
					$criteria->select = $g->gradename;
					$criteria->condition = "m_id=:m_id";
					$criteria->params = array(':m_id'=>$model->m_id);
					$value = EssayGradescore::model()->find($criteria);*/
				$value = 0;
				echo "<td width='50'><input type='text' name='".$g->gradename."' id='".$g->gradename."' value='".$value."'/></td>";
				echo "</tr>";
			}?>
		</table>
	</div>
	<div class="row">
		<label>Feedback:</label><?=$mark->feedback?>
	</div>
</div>
