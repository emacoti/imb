<?php
$this->breadcrumbs=array(
	'Estates'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Estates', 'url'=>array('index')),
	array('label'=>'Manage Estates', 'url'=>array('admin')),
);
?>

<h1>Create Estates</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>