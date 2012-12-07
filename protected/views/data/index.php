<?php
$this->breadcrumbs=array(
	'Datas',
);

$this->menu=array(
	array('label'=>'Create Data', 'url'=>array('create')),
	array('label'=>'Manage Data', 'url'=>array('admin')),
);

$this->menuAdmin=array(
	array('label'=>'Administrar Propiedades', 'url'=>array('estates/index')),
	array('label'=>'Administrar Datos', 'url'=>array('data/index')),
	array('label'=>'Administrar Imagenes', 'url'=>array('images/index')),
	array('label'=>'Administrar Rubros', 'url'=>array('categories/index')),
	array('label'=>'Administrar Condiciones', 'url'=>array('conditions/index')),
	array('label'=>'Administrar Localidades', 'url'=>array('locations/index')),
);
?>

<h1>Datas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
