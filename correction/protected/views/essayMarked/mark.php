<script type="text/javascript">
$(function(){
	$( "#menulist" ).accordion();
});

	
function submitmark(){
	var eid = $('#eid').val();
	var feedback = $('#feedback').val();
	var score = $('#totalscore').val();
	var content = CKEDITOR.instances.markcontent.getData();
	var datarr = "e_id="+eid+"&markcontent="+content+"&feedback="+feedback+"&score="+score;
	$.ajax({
		'url':baseurl+"/essaymarkd/create",
		'async':true,
		'type':'post',
		'data':datarr
	});
}
</script>
<h2>Essay Marking</h2>
<div class="form">
<form action="<?echo Yii::app()->request->baseUrl."/essaymarked/create"?>" method="post">
	<h3>Step 1. Check prompt:</h3>
	<div class="row">
		<label>Test Category:</label> <?=$essay->cate->name?><br/><?if($essay->subcate != null)echo $essay->subcate->name?>
		<br/>
		<label>Question:</label>
		<?if($essay->questionid > 1){?>
			<?=$essay->question->title?><br/><?=$essay->question->content?>
		<?}else{?>
			<?=$essay->customquestion?>
		<?}?>
	</div>
		
	<h3>Step 2. Mark it:</h3>
	<div class="row">
		<textarea id="markcontent" name="markcontent">
			<?if($_GET['type']=="new"){echo $essay->content;}else{echo $model->markedcontent;}?>
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
		<b>Total Score:</b>&nbsp;&nbsp;<input type="text" id="totalsocre" name="totalscore" value="<?if($_GET['type']!="new"){echo $model->score;}?>"/>
		<br/>
		<table width="740">
			<tr>
				<td width="200">Item</td>
				<td width="440">Explanation</td>
				<?if(in_array($essay->cateid, array(1,2,3))){?>
				<td width="50">Rate</td>
				<?}?>
				<td width="50">Score</td>
			</tr>
			<?foreach($grade as $g){
				$name = $g->gradename;
				echo "<tr>";
				echo "<td width='200'>".$g->caption."</td>";
				echo "<td width='440'>".$g->explain."</td>";
				if($g->category >0){
					echo "<td width='50''>".($g->rate*100)."%</td>";
				}
				if($_GET['type']=="new"){
					echo "<td width='50'><input type='text' name='".$name."' id='".$name."'/></td>";
				}else{
					$criteria = new CDbCriteria();
					$criteria->select = $name;
					$criteria->condition = "m_id=:m_id";
					$criteria->params = array(':m_id'=>$model->m_id);
					$value = EssayGradescore::model()->find($criteria);
					
					echo "<td width='50'><input type='text' name='".$name."' id='".$name."' value='".$value->$name."'/></td>";
				}
				echo "</tr>";
			}?>
		</table>
	</div>
	
	<div class="row">
		<label>Feedback:</label><textarea id="feedback" name="feedback" style="width:740px;height:200px"><?if($_GET['type']!="new"){echo $model->feedback;}?></textarea>
	</div>
	
	<div class="row buttons">
		<input type="hidden" id="eid" name="eid" value="<?=$essay->id?>"/>
		<?if($_GET['type']!="new"){?>
		<input type="hidden" id="mid" name="mid" value="<?=$model->m_id?>"/>
		<?}?>
		<input type="submit" value="Submit" name="submit"/>
		<input type="submit" value="Save as Draft" name="draft"/>
	</div>
</form>
</div>