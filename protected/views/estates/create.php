<?php
$this->breadcrumbs=array(
	'Propiedades'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Administrar propiedades', 'url'=>array('admin')),
);
?>

<h1>Crear propiedad</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>