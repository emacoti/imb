<?php
$this->breadcrumbs=array(
	'Locations'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Crear localidad', 'url'=>array('create')),
	array('label'=>'Administrar localidades', 'url'=>array('admin')),
);
?>

<h1>Actualizando localidad #<?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>