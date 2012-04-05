<?php
$this->breadcrumbs=array(
	'Essays'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Essay', 'url'=>array('index')),
	array('label'=>'Create Essay', 'url'=>array('create')),
	array('label'=>'Update Essay', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Essay', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Essay', 'url'=>array('admin')),
);
?>

<h1>View Essay #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'uid',
		'content',
		'questionid',
		'customquestion',
		'submittime',
		'status',
		'markstatus',
		'marktime',
		'cateid',
		'subcateid',
	),
)); ?>
