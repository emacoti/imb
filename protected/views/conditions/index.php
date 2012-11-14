<?php
$this->breadcrumbs=array(
	'Conditions',
);

$this->menu=array(
	array('label'=>'Create Conditions', 'url'=>array('create')),
	array('label'=>'Manage Conditions', 'url'=>array('admin')),
);
?>

<h1>Conditions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
