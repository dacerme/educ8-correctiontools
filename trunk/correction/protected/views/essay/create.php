<?php
$this->breadcrumbs=array(
	'Essays'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Essay', 'url'=>array('index')),
	array('label'=>'Manage Essay', 'url'=>array('admin')),
);
?>

<h2>Create Essay</h2>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>