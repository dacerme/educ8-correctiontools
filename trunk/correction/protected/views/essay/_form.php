<?
	$catemodel = Category::model()->findAll('fid=0');
	$catedata = CHtml::listData($catemodel,'c_id','name');
	
	$subcatemodel = Category::model()->findAll('fid=1');
	$subcatedata = CHTML::listData($subcatemodel,'c_id','name');
?>
<script type="text/javascript">
	$(function(){
		if($('#cateid').val() == 11){
			$('#subcateid').hide();
		}
	});
	function getSubcate(){
		var cateid = $('#cateid').val();
		if(cateid == 11){
			$('#subcateid').hide();
		}else{
			$('#subcateid').show();
			$.ajax({
				url:baseurl+'/category/getcat',
				type:'post',
				data:'fid='+cateid,
				success:function(data){
					$('#subcateid').html(data);
				}
			});	
		}
	}
</script>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'essay-form',
	'enableAjaxValidation'=>false,
)); ?>
	<?php echo $form->errorSummary($model); ?>
	<h3>Step 1. Choose a test:</h3>
	<div class="row">
		<?php echo $form->dropDownList($model,'cateid',$catedata,array('id'=>'cateid','onchange'=>'getSubcate()')); ?>
		<?php echo $form->error($model,'cateid'); ?>
		&nbsp;&nbsp;
		<?php echo $form->dropDownList($model,'subcateid',$subcatedata,array('id'=>'subcateid')); ?>
		<?php echo $form->error($model,'subcateid'); ?>
	</div>
	<!--<h3>Step 2. Choose a subject or custom one:</h3>-->
	<h3>Step 2. Prompt:</h3>
	<!--<div class="row">
		<?php echo $form->textField($model,'questionid'); ?>
		<?php echo $form->error($model,'questionid'); ?>
	</div>-->

	<div class="row">
		<?php echo $form->labelEx($model,'customquestion'); ?>
		<?php echo $form->textArea($model,'customquestion',array('rows'=>6, 'cols'=>100)); ?>
		<?php echo $form->error($model,'customquestion'); ?>
	</div>
	<h3>Step 3. Write:</h3>

	<div class="row">
		<?php echo $form->textArea($model,'content',array('id'=>"essaycontent"))?>
		<?php echo $form->error($model,'content'); ?>
	</div>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/ckeditor/ckeditor.js"></script>
	<script type="text/javascript">
		CKEDITOR.replace( 'essaycontent',{width:740,height:400});
	</script>
	
	<div class="row">
		<?php
			$userinfo = Yii::app()->user->getState('userinfo'); 
			echo $form->hiddenField($model,'uid',array('value'=>$userinfo['uid']));
		?>
	</div>
	
	<div class="row buttons">
		<input type="submit" value="Submit" name="submit"/>
		<input type="submit" value="Save as Draft" name="draft"/>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->