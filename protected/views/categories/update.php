<?php
$this->breadcrumbs=array(
	'Categories'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Crear rubros', 'url'=>array('create')),
	array('label'=>'Administrar rubros', 'url'=>array('admin')),
);
?>

<h1>Actualizando rubro #<?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>