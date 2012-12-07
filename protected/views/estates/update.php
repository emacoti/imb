<?php
$this->breadcrumbs=array(
	'Propiedades'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Propiedades', 'url'=>array('index')),
	array('label'=>'Crear Propiedad', 'url'=>array('create')),
	array('label'=>'Ver Propiedad', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Propiedades', 'url'=>array('admin')),
);
?>

<h1>Editar Propiedad con ID <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>