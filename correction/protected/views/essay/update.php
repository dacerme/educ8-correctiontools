<?php
$this->breadcrumbs=array(
	'Essays'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Essay', 'url'=>array('index')),
	array('label'=>'Create Essay', 'url'=>array('create')),
	array('label'=>'View Essay', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Essay', 'url'=>array('admin')),
);
?>

<h1>Update Essay <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>