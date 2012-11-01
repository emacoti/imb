<?php
$this->breadcrumbs=array(
	'Houses',
);

$this->menu=array(
	array('label'=>'Create Houses', 'url'=>array('create')),
	array('label'=>'Manage Houses', 'url'=>array('admin')),
);
?>

<h1>Houses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
