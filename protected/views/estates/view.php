<?php
$this->breadcrumbs=array(
	'Propiedades'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Crear propiedad', 'url'=>array('create')),
	array('label'=>'Administrar propiedades', 'url'=>array('admin')),
);
?>

<h1>Viendo propiedad #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'category.name',
		'condition.name',
		'location.name',
		'currency.name',
		'value',
		'neighborhood',
		'description',
	),
)); ?>
