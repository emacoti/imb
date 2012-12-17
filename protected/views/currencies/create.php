<?php
$this->breadcrumbs=array(
	'Currencies'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Administrar monedas', 'url'=>array('admin')),
);
?>

<h1>Crear moneda</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>