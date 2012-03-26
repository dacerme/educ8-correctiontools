<div id="main">
	<div class="shell">
		<div id="registerpart" style="width:50%;float:left;">
			<h1>Register</h1> 
			<br/>
			<div class="form">

			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'user-form',
				'enableAjaxValidation'=>false,
			)); ?>
			
				<?php echo $form->errorSummary($model); ?>
			
			
				<div class="row">
					<?php echo $form->labelEx($model,'email'); ?>
					<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>100)); ?>
					<?php echo $form->error($model,'email'); ?>
				</div>
				
				<div class="row">
					<?php echo $form->labelEx($model,'username'); ?>
					<?php echo $form->textField($model,'username',array('size'=>20,'maxlength'=>20)); ?>
					<?php echo $form->error($model,'username'); ?>
				</div>
			
				<div class="row">
					<?php echo $form->labelEx($model,'password'); ?>
					<?php echo $form->passwordField($model,'password',array('size'=>50,'maxlength'=>50)); ?>
					<?php echo $form->error($model,'password'); ?>
				</div>
				
				<div class="row">
					<?php echo $form->labelEx($model,'password'); ?>
					<?php echo $form->passwordField($model,'password',array('size'=>50,'maxlength'=>50)); ?>
					<?php echo $form->error($model,'password'); ?>
				</div>

				<div class="row buttons">
					<?php echo CHtml::submitButton('Submit'); ?>
				</div>
			
			<?php $this->endWidget(); ?>
			
			</div><!-- form -->
		</div>
		<div id="signinpart" style="width:50%;float:left;">
			<h1>Sign In</h1> 
			<br/> 
			<div class="form">

			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'user-form',
				'enableAjaxValidation'=>false,
			)); ?>
			
				<?php echo $form->errorSummary($model); ?>
				
				<div class="row">
					<?php echo $form->labelEx($model,'username'); ?>
					<?php echo $form->textField($model,'username',array('size'=>20,'maxlength'=>20)); ?>
					<?php echo $form->error($model,'username'); ?>
				</div>
			
				<div class="row">
					<?php echo $form->labelEx($model,'password'); ?>
					<?php echo $form->passwordField($model,'password',array('size'=>50,'maxlength'=>50)); ?>
					<?php echo $form->error($model,'password'); ?>
				</div>

				<div class="row buttons">
					<?php echo CHtml::submitButton('Sign In'); ?>
				</div>
			
			<?php $this->endWidget(); ?>
			
			</div><!-- form -->
		</div>
		<div style="clear:both"></div>
	</div>
</div>