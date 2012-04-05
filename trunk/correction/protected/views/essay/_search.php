<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'uid'); ?>
		<?php echo $form->textField($model,'uid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'content'); ?>
		<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'questionid'); ?>
		<?php echo $form->textField($model,'questionid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'customquestion'); ?>
		<?php echo $form->textArea($model,'customquestion',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'submittime'); ?>
		<?php echo $form->textField($model,'submittime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'markstatus'); ?>
		<?php echo $form->textField($model,'markstatus'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'marktime'); ?>
		<?php echo $form->textField($model,'marktime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cateid'); ?>
		<?php echo $form->textField($model,'cateid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'subcateid'); ?>
		<?php echo $form->textField($model,'subcateid'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->