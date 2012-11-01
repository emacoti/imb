<?php
$this->breadcrumbs=array(
	'Houses'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Houses', 'url'=>array('index')),
	array('label'=>'Create Houses', 'url'=>array('create')),
	array('label'=>'View Houses', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Houses', 'url'=>array('admin')),
);
?>

<h1>Update Houses <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>