<?php
$this->breadcrumbs=array(
	'Datas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Administrar datos', 'url'=>array('admin')),
);
?>

<h1>Crear dato</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>