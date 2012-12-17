<?php
$this->breadcrumbs=array(
	'Conditions',
);

$this->menu=array(
	array('label'=>'Crear condiciones', 'url'=>array('create')),
	array('label'=>'Administrar condiciones', 'url'=>array('admin')),
);
?>

<h1>Condiciones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'emptyText'=>'La busqueda no arrojo resultados.',
	'summaryText'=>Yii::t('zii','Mostrando {start}-{end} de {count} resultados.'),
)); ?>
