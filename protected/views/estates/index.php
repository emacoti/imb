<?php
$this->breadcrumbs=array(
	'Estates',
);

$this->menu=array(
	array('label'=>'Create Estates', 'url'=>array('create')),
	array('label'=>'Manage Estates', 'url'=>array('admin')),
);
?>

<h1>Estates</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
