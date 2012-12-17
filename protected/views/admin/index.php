<?php
$this->breadcrumbs=array(
	'Administrar',
);

$this->menuAdmin=array(
	array('label'=>'Propiedades', 'url'=>array('estates/index')),
	array('label'=>'Datos', 'url'=>array('data/index')),
	array('label'=>'Imagenes', 'url'=>array('images/index')),
	array('label'=>'Rubros', 'url'=>array('categories/index')),
	array('label'=>'Condiciones', 'url'=>array('conditions/index')),
	array('label'=>'Localidades', 'url'=>array('locations/index')),
	array('label'=>'Monedas', 'url'=>array('currencies/index')),
);
?>

<h1>Administraci&oacute;n de Inmobiliaria</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>array(),
	'attributes'=>array(
		array('label'=>'Propiedades', 'value'=> Estates::model()->count()),
		array('label'=>'Localidades', 'value'=> Locations::model()->count()),
		array('label'=>'Rubros', 'value'=> Categories::model()->count()),
	),
)); ?>
