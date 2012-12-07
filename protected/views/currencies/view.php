<?php
$this->breadcrumbs=array(
	'Currencies'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Currencies', 'url'=>array('index')),
	array('label'=>'Create Currencies', 'url'=>array('create')),
	array('label'=>'Update Currencies', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Currencies', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Currencies', 'url'=>array('admin')),
);
?>

<h1>View Currencies #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'symbol',
	),
)); ?>
