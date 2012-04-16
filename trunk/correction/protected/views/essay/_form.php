<?
	$catemodel = Category::model()->findAll('fid=0');
	$catedata = CHtml::listData($catemodel,'c_id','name');
	
	$subcatemodel = Category::model()->findAll();
	$subcatedata = CHTML::listData($subcatemodel,'c_id','name');
?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'essay-form',
	'enableAjaxValidation'=>false,
)); ?>
	<?php echo $form->errorSummary($model); ?>
	<h3>Step 1. Choose a test:</h3>
	<div class="row">
		<?php echo $form->dropDownList($model,'cateid',$catedata,array('id'=>'catelist')); ?>
		<?php echo $form->error($model,'cateid'); ?>
		&nbsp;&nbsp;
		<?php echo $form->dropDownList($model,'subcateid',$subcatedata,array('id'=>'subcatelist')); ?>
		<?php echo $form->error($model,'subcateid'); ?>
	</div>
	<h3>Step 2. Choose a subject or custom one:</h3>
	<div class="row">
		<?php echo $form->textField($model,'questionid'); ?>
		<?php echo $form->error($model,'questionid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'customquestion'); ?>
		<?php echo $form->textArea($model,'customquestion',array('rows'=>6, 'cols'=>50)); ?>
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
		<?php echo $form->hiddenField($model,'uid',array('value'=>$userinfo['uid']))?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->