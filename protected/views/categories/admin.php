<?php
$this->breadcrumbs=array(
	'Categories'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Crear rubro', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('categories-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar rubros</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'categories-grid',
	'dataProvider'=>$model->search(),
	'emptyText'=>'La busqueda no arrojo resultados.',
	'pager'=>array('nextPageLabel'=>'Siguiente', 'prevPageLabel'=>'Anterior', 'header'=>'<br/>'),
	'summaryText'=>Yii::t('zii','Mostrando {start}-{end} de {count} resultados.'),
	'columns'=>array(
		'id',
		'name',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>







