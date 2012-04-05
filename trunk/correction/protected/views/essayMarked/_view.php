<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('m_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->m_id), array('view', 'id'=>$data->m_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('e_id')); ?>:</b>
	<?php echo CHtml::encode($data->e_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('markedcontent')); ?>:</b>
	<?php echo CHtml::encode($data->markedcontent); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('marktime')); ?>:</b>
	<?php echo CHtml::encode($data->marktime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tid')); ?>:</b>
	<?php echo CHtml::encode($data->tid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('feedback')); ?>:</b>
	<?php echo CHtml::encode($data->feedback); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('score')); ?>:</b>
	<?php echo CHtml::encode($data->score); ?>
	<br />

	*/ ?>

</div>