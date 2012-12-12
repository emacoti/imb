<?php
$this->breadcrumbs=array(
	'Locations'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Crear localidad', 'url'=>array('create')),
	array('label'=>'Administrar localidades', 'url'=>array('admin')),
);
?>

<h1>Viendo localidad #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
