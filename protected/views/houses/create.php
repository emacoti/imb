<?php
$this->breadcrumbs=array(
	'Houses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Houses', 'url'=>array('index')),
	array('label'=>'Manage Houses', 'url'=>array('admin')),
);
?>

<h1>Create Houses</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>