<?php
$this->breadcrumbs=array(
	'Locations',
);

$this->menu=array(
	array('label'=>'Crear localidad', 'url'=>array('create')),
	array('label'=>'Administrar localidades', 'url'=>array('admin')),
);
?>

<h1>Localidades</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'pager'=>array('nextPageLabel'=>'Siguiente', 'prevPageLabel'=>'Anterior', 'header'=>'<br/>'),
	'emptyText'=>'La busqueda no arrojo resultados.',
	'summaryText'=>Yii::t('zii','Mostrando {start}-{end} de {count} resultados.'),
	'itemView'=>'_view',
)); ?>
