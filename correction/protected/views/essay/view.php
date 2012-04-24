<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.qtip-1.0.0-rc3.min.js"></script>
<script type="text/javascript">
$(function(){
	var xOffset = 10;
	var yOffset = 20;
	var w = $(window).width();
	$('span[custom="ann"],span[custom="com"]').each(function(index,domEle){
		$(this).qtip({ style: { name: 'cream', tip: true } })
		$(this).css('cursor',"pointer");
	});
	$( "#menulist" ).accordion();
});
</script>
<style>
	b{color:darkblue;font-size:14px;}
</style>
<div class="form">
	<div class="row">
		<b>Test Category:</b><br/> <?=$model->cate->name?>&nbsp;&nbsp;&nbsp;&nbsp;<?if($model->subcate != null)echo $model->subcate->name?>
		<br/>
		<br/>
		<b>Question:</b><br/>
		<p>
		<?if($model->questionid > 1){?>
			<?=$model->question->title?><br/><?=$model->question->content?>
		<?}else{?>
			<?=$model->customquestion?>
		<?}?>
		</p><br/>
	</div>
	<b>Content:</b><br/>
	<div class="row">
		<div id="markedcontent">
		    <?if($model->status<3){echo $model->content;}else{echo $mark->markedcontent;}?>
		</div>
	</div>
	<br/>
	<?if($model->status == 3){?>
	<div class="row">
		<b>Total Score:</b>&nbsp;&nbsp;<?=$mark->score?>
		<br/>
		<table width="740">
			<tr>
				<td width="200">Item</td>
				<td width="440">Explanation</td>
				<td width="50">Score</td>
			</tr>
			<?foreach($grade as $g){
				$name = $g->gradename;
				echo "<tr>";
				echo "<td width='200'>".$g->caption."</td>";
				echo "<td width='440'>".$g->explain."</td>";
					$criteria = new CDbCriteria();
					$criteria->select = $name;
					$criteria->condition = "m_id=:m_id";
					$criteria->params = array(':m_id'=>$mark->m_id);
					$value = EssayGradescore::model()->find($criteria);
				echo "<td width='50'>".$value->$name."</td>";
				echo "</tr>";
			}?>
		</table>
	</div>
	<br/>
	<div class="row">
		<b>Feedback:</b><br/><textarea style="width:740px;height:200px;background-color:transparent;border:none;" readonly="true"><?=$mark->feedback?></textarea>
	</div>
	<?}?>
</div>
