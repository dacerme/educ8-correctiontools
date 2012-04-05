<?php
$this->breadcrumbs=array(
	'Essay Markeds',
);

$this->menu=array(
	array('label'=>'Create EssayMarked', 'url'=>array('create')),
	array('label'=>'Manage EssayMarked', 'url'=>array('admin')),
);
?>

<h1>Essay Markeds</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
