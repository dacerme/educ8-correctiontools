<div class="form">
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'register-form',
				'enableAjaxValidation'=>false
			)); ?>
			
				<p class="note">Fields with <span class="required">*</span> are required.</p>
			
				<?php echo $form->errorSummary($model); ?>
	
				<div class="row">
					<?php echo $form->labelEx($model,'email'); ?>
					<?php echo $form->textField($model,'email',array('size'=>40,'maxlength'=>100)); ?>
					<?php echo $form->error($model,'email'); ?>
				</div>
				
				<div class="row">
					<?php echo $form->labelEx($model,'username'); ?>
					<?php echo $form->textField($model,'username',array('size'=>30,'maxlength'=>20)); ?>
					<?php echo $form->error($model,'username'); ?>
				</div>
			
				<div class="row">
					<?php echo $form->labelEx($model,'password'); ?>
					<?php echo $form->passwordField($model,'password',array('size'=>30,'maxlength'=>50)); ?>
					<?php echo $form->error($model,'password'); ?>
				</div>
				
				<div class="row">
					<?php echo $form->labelEx($model,'cpassword'); ?>
					<?php echo $form->passwordField($model,'cpassword',array('size'=>30,'maxlength'=>50)); ?>
					<?php echo $form->error($model,'cpassword'); ?>
				</div>
				
				<div class="row buttons">
					<?php echo CHtml::submitButton('Submit'); ?>
				</div>
			
			<?php $this->endWidget(); ?>
			
			</div><!-- form -->