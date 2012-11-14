<?php
$this->breadcrumbs=array(
	'Estates'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Estates', 'url'=>array('index')),
	array('label'=>'Create Estates', 'url'=>array('create')),
	array('label'=>'Update Estates', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Estates', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Estates', 'url'=>array('admin')),
);
?>

<h1>View Estates #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'category_id',
		'condition_id',
		'location_id',
		'neighborhood',
		'description',
	),
)); ?>
