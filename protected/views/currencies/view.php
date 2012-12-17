<?php
$this->breadcrumbs=array(
	'Currencies'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Crear moneda', 'url'=>array('create')),
	array('label'=>'Administrar monedas', 'url'=>array('admin')),
);
?>

<h1>Viendo moneda #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'symbol',
	),
)); ?>
