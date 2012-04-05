<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'essay-marked-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'e_id'); ?>
		<?php echo $form->textField($model,'e_id'); ?>
		<?php echo $form->error($model,'e_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'markedcontent'); ?>
		<?php echo $form->textArea($model,'markedcontent',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'markedcontent'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'marktime'); ?>
		<?php echo $form->textField($model,'marktime'); ?>
		<?php echo $form->error($model,'marktime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tid'); ?>
		<?php echo $form->textField($model,'tid'); ?>
		<?php echo $form->error($model,'tid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'feedback'); ?>
		<?php echo $form->textArea($model,'feedback',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'feedback'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'score'); ?>
		<?php echo $form->textField($model,'score'); ?>
		<?php echo $form->error($model,'score'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->