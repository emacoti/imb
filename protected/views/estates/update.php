<?php
$this->breadcrumbs=array(
	'Estates'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Estates', 'url'=>array('index')),
	array('label'=>'Create Estates', 'url'=>array('create')),
	array('label'=>'View Estates', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Estates', 'url'=>array('admin')),
);
?>

<h1>Update Estates <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>