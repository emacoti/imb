<?php
$this->breadcrumbs=array(
	'Categories'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Crear rubros', 'url'=>array('create')),
	array('label'=>'Administrar rubros', 'url'=>array('admin')),
);
?>

<h1>Viendo rubro #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
