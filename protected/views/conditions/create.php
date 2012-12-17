<?php
$this->breadcrumbs=array(
	'Conditions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Administrar condiciones', 'url'=>array('admin')),
);
?>

<h1>Crear condici&oacute;n</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>