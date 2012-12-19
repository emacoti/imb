<?php
$this->breadcrumbs=array(
	'Datas',
);

$this->menu=array(
	array('label'=>'Crear dato', 'url'=>array('create')),
	array('label'=>'Administrar datos', 'url'=>array('admin')),
);

$this->menuAdmin=array(
	array('label'=>'Propiedades', 'url'=>array('estates/index')),
	array('label'=>'Datos', 'url'=>array('data/index')),
	array('label'=>'Imagenes', 'url'=>array('images/index')),
	array('label'=>'Rubros', 'url'=>array('categories/index')),
	array('label'=>'Condiciones', 'url'=>array('conditions/index')),
	array('label'=>'Localidades', 'url'=>array('locations/index')),
	array('label'=>'Monedas', 'url'=>array('currencies/index')),
);
?>

<h1>Datos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'emptyText'=>'La busqueda no arrojo resultados.',
	'pager'=>array('nextPageLabel'=>'Siguiente', 'prevPageLabel'=>'Anterior', 'header'=>'<br/>'),
	'summaryText'=>Yii::t('zii','Mostrando {start}-{end} de {count} resultados.'),
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
