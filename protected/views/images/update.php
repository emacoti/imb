<?php
$this->breadcrumbs=array(
	'Images'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Crear imagen', 'url'=>array('create')),
	array('label'=>'Administrar imagenes', 'url'=>array('admin')),
);
?>

<h1>Actualizando imagen #<?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>