<?php
$this->breadcrumbs=array(
	'Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Administrar rubros', 'url'=>array('admin')),
);
?>

<h1>Crear rubro</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>