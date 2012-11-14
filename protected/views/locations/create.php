<?php
$this->breadcrumbs=array(
	'Locations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Locations', 'url'=>array('index')),
	array('label'=>'Manage Locations', 'url'=>array('admin')),
);
?>

<h1>Create Locations</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>