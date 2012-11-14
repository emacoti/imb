<?php
$this->breadcrumbs=array(
	'Conditions'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Conditions', 'url'=>array('index')),
	array('label'=>'Create Conditions', 'url'=>array('create')),
	array('label'=>'Update Conditions', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Conditions', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Conditions', 'url'=>array('admin')),
);
?>

<h1>View Conditions #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
