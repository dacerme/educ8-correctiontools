<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('qid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->qid), array('view', 'id'=>$data->qid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('content')); ?>:</b>
	<?php echo CHtml::encode($data->content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cateid')); ?>:</b>
	<?php echo CHtml::encode($data->cateid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subcateid')); ?>:</b>
	<?php echo CHtml::encode($data->subcateid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updatetime')); ?>:</b>
	<?php echo CHtml::encode($data->updatetime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />


</div>