<?php
$this->breadcrumbs=array(
	'Conditions'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Conditions', 'url'=>array('index')),
	array('label'=>'Create Conditions', 'url'=>array('create')),
	array('label'=>'View Conditions', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Conditions', 'url'=>array('admin')),
);
?>

<h1>Update Conditions <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>