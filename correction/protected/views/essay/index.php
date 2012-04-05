<?php
$this->breadcrumbs=array(
	'Essays',
);

$this->menu=array(
	array('label'=>'Create Essay', 'url'=>array('create')),
	array('label'=>'Manage Essay', 'url'=>array('admin')),
);
?>

<h1>Essays</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
