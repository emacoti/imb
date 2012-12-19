<?php
$this->breadcrumbs=array(
	'Currencies',
);

$this->menu=array(
	array('label'=>'Crear moneda', 'url'=>array('create')),
	array('label'=>'Administrar monedas', 'url'=>array('admin')),
);
?>

<h1>Currencies</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'emptyText'=>'La busqueda no arrojo resultados.',
	'pager'=>array('nextPageLabel'=>'Siguiente', 'prevPageLabel'=>'Anterior', 'header'=>'<br/>'),
	'summaryText'=>Yii::t('zii','Mostrando {start}-{end} de {count} resultados.'),
	'itemView'=>'_view',
)); ?>
