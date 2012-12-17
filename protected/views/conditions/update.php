<?php
$this->breadcrumbs=array(
	'Conditions'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Crear condiciones', 'url'=>array('create')),
	array('label'=>'Administrar condiciones', 'url'=>array('admin')),
);
?>

<h1>Actualizar condici&oacute;n <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>