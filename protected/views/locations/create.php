<?php
$this->breadcrumbs=array(
	'Locations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Administrar localidades', 'url'=>array('admin')),
);
?>

<h1>Crear localidad</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>