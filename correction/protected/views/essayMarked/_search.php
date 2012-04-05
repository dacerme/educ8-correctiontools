<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'m_id'); ?>
		<?php echo $form->textField($model,'m_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'e_id'); ?>
		<?php echo $form->textField($model,'e_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'markedcontent'); ?>
		<?php echo $form->textArea($model,'markedcontent',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'marktime'); ?>
		<?php echo $form->textField($model,'marktime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tid'); ?>
		<?php echo $form->textField($model,'tid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'feedback'); ?>
		<?php echo $form->textArea($model,'feedback',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'score'); ?>
		<?php echo $form->textField($model,'score'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->