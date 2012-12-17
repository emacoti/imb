<?php
$this->breadcrumbs=array(
	'Images'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Administrar imagenes', 'url'=>array('admin')),
);
?>

<h1>Crear imagenes</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>