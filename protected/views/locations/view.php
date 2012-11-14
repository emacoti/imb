<?php
$this->breadcrumbs=array(
	'Locations'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Locations', 'url'=>array('index')),
	array('label'=>'Create Locations', 'url'=>array('create')),
	array('label'=>'Update Locations', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Locations', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Locations', 'url'=>array('admin')),
);
?>

<h1>View Locations #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
