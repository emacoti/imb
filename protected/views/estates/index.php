<?php
$this->breadcrumbs=array(
	'Propiedades',
);

$this->menu=array(
	array('label'=>'Crear propiedad', 'url'=>array('create')),
	array('label'=>'Administrar propiedades', 'url'=>array('admin')),
);
?>

<h1>Propiedades</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'emptyText'=>'La busqueda no arrojo resultados.',
	'pager'=>array('nextPageLabel'=>'Siguiente', 'prevPageLabel'=>'Anterior', 'header'=>'<br/>'),
	'summaryText'=>Yii::t('zii','Mostrando {start}-{end} de {count} resultados.'),
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
