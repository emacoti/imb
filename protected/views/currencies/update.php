<?php
$this->breadcrumbs=array(
	'Currencies'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Crear moneda', 'url'=>array('create')),
	array('label'=>'Administrar monedas', 'url'=>array('admin')),
);
?>

<h1>Actualizando moneda #<?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>