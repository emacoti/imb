<?php
$this->breadcrumbs=array(
	'Images',
);

$this->menu=array(
	array('label'=>'Crear imagen', 'url'=>array('create')),
	array('label'=>'Administrar imagenes', 'url'=>array('admin')),
);
?>

<h1>Imagenes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'emptyText'=>'La busqueda no arrojo resultados.',
	'summaryText'=>Yii::t('zii','Mostrando {start}-{end} de {count} resultados.'),
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
