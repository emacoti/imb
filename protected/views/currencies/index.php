<?php
$this->breadcrumbs=array(
	'Currencies',
);

$this->menu=array(
	array('label'=>'Create Currencies', 'url'=>array('create')),
	array('label'=>'Manage Currencies', 'url'=>array('admin')),
);
?>

<h1>Currencies</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
