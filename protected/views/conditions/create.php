<?php
$this->breadcrumbs=array(
	'Conditions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Conditions', 'url'=>array('index')),
	array('label'=>'Manage Conditions', 'url'=>array('admin')),
);
?>

<h1>Create Conditions</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>