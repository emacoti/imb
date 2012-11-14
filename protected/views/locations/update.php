<?php
$this->breadcrumbs=array(
	'Locations'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Locations', 'url'=>array('index')),
	array('label'=>'Create Locations', 'url'=>array('create')),
	array('label'=>'View Locations', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Locations', 'url'=>array('admin')),
);
?>

<h1>Update Locations <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>