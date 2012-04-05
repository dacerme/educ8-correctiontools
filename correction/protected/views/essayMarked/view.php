<?php
$this->breadcrumbs=array(
	'Essay Markeds'=>array('index'),
	$model->m_id,
);

$this->menu=array(
	array('label'=>'List EssayMarked', 'url'=>array('index')),
	array('label'=>'Create EssayMarked', 'url'=>array('create')),
	array('label'=>'Update EssayMarked', 'url'=>array('update', 'id'=>$model->m_id)),
	array('label'=>'Delete EssayMarked', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->m_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EssayMarked', 'url'=>array('admin')),
);
?>

<h1>View EssayMarked #<?php echo $model->m_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'm_id',
		'e_id',
		'markedcontent',
		'status',
		'marktime',
		'tid',
		'feedback',
		'score',
	),
)); ?>
