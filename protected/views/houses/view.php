<?php
$this->breadcrumbs=array(
	'Houses'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Houses', 'url'=>array('index')),
	array('label'=>'Create Houses', 'url'=>array('create')),
	array('label'=>'Update Houses', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Houses', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Houses', 'url'=>array('admin')),
);
?>

<h1>View Houses #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
