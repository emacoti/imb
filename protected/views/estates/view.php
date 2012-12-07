<?php
$this->breadcrumbs=array(
	'Propiedades'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Propiedades', 'url'=>array('index')),
	array('label'=>'Crear Propiedad', 'url'=>array('create')),
	array('label'=>'Editar Propiedad', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar Propiedad', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Seguro desea borrar la propiedad?')),
	array('label'=>'Manage Propiedades', 'url'=>array('admin')),
);
?>

<h1>Propiedad</h1>

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
