<?php
$this->breadcrumbs=array(
	'Propiedades'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Crear propiedad', 'url'=>array('create')),
	array('label'=>'Administrar propiedades', 'url'=>array('admin')),
);
?>

<h1>Editando la propiedad #<?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>