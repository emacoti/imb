<?php
$this->breadcrumbs=array(
	'Datas'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Crear dato', 'url'=>array('create')),
	array('label'=>'Administrar datos', 'url'=>array('admin')),
);
?>

<h1>Actualizando dato #<?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>