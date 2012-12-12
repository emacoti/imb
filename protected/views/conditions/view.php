<?php
$this->breadcrumbs=array(
	'Conditions'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Crear condiciones', 'url'=>array('create')),
	array('label'=>'Administrar condiciones', 'url'=>array('admin')),
);
?>

<h1>Viendo condici&oacute;n #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
