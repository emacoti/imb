<?php
$this->breadcrumbs=array(
	'Propiedades'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Propiedades', 'url'=>array('index')),
	array('label'=>'Manage Propiedades', 'url'=>array('admin')),
);
?>

<h1>Crear Propiedad</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>