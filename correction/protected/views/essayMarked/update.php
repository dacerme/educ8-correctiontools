<?php
$this->breadcrumbs=array(
	'Essay Markeds'=>array('index'),
	$model->m_id=>array('view','id'=>$model->m_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EssayMarked', 'url'=>array('index')),
	array('label'=>'Create EssayMarked', 'url'=>array('create')),
	array('label'=>'View EssayMarked', 'url'=>array('view', 'id'=>$model->m_id)),
	array('label'=>'Manage EssayMarked', 'url'=>array('admin')),
);
?>

<h1>Update EssayMarked <?php echo $model->m_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>