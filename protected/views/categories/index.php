<?php
$this->breadcrumbs=array(
	'Categories',
);

$this->menu=array(
	array('label'=>'Crear rubros', 'url'=>array('create')),
	array('label'=>'Administrar rubros', 'url'=>array('admin')),
);
?>

<h1>Rubros</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'emptyText'=>'La busqueda no arrojo resultados.',
	'summaryText'=>Yii::t('zii','Mostrando {start}-{end} de {count} resultados.'),
	'pager'=>array('nextPageLabel'=>'Siguiente', 'prevPageLabel'=>'Anterior', 'header'=>'<br/>'),
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
