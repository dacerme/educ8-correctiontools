<?php
$this->breadcrumbs=array(
	'Essay Markeds'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EssayMarked', 'url'=>array('index')),
	array('label'=>'Manage EssayMarked', 'url'=>array('admin')),
);
?>

<h1>Create EssayMarked</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>