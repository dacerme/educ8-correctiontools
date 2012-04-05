<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('uid')); ?>:</b>
	<?php echo CHtml::encode($data->uid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('content')); ?>:</b>
	<?php echo CHtml::encode($data->content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('questionid')); ?>:</b>
	<?php echo CHtml::encode($data->questionid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('customquestion')); ?>:</b>
	<?php echo CHtml::encode($data->customquestion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('submittime')); ?>:</b>
	<?php echo CHtml::encode($data->submittime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('markstatus')); ?>:</b>
	<?php echo CHtml::encode($data->markstatus); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('marktime')); ?>:</b>
	<?php echo CHtml::encode($data->marktime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cateid')); ?>:</b>
	<?php echo CHtml::encode($data->cateid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subcateid')); ?>:</b>
	<?php echo CHtml::encode($data->subcateid); ?>
	<br />

	*/ ?>

</div>