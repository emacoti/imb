<?php
$this->breadcrumbs=array(
	'Currencies'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Crear moneda', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('currencies-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar monedas</h1>

<p>
Puede ingresar, si lo desea, operadores de comparac&oacute;n (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) al principio de cada uno de los cuadros de busqueda.
</p>

<?php echo CHtml::link('Busqueda avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'currencies-grid',
	'emptyText'=>'La busqueda no arrojo resultados.',
	'pager'=>array('nextPageLabel'=>'Siguiente', 'prevPageLabel'=>'Anterior', 'header'=>'<br/>'),
	'summaryText'=>Yii::t('zii','Mostrando {start}-{end} de {count} resultados.'),
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'symbol',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
