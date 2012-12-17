<?php
$this->breadcrumbs=array(
	'Datas'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Crear dato', 'url'=>array('create')),
	array('label'=>'Administrar datos', 'url'=>array('admin')),
);
?>

<h1>Viendo dato #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'estate_id',
		'name',
		'data_type',
		'value',
	),
)); ?>
