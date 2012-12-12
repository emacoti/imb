<?php
$this->breadcrumbs=array(
	'Propiedades'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Crear propiedad', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('estates-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar propiedades</h1>

<p>
Puede ingresar, si lo desea, operadores de comparac&oacute;n (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) al principio de cada uno de los cuadros de busqueda.
</p>

<?php echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'estates-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'emptyText'=>'La busqueda no arrojo resultados.',
	'summaryText'=>Yii::t('zii','Mostrando {start}-{end} de {count} resultados.'),
	'columns'=>array(
		'id',
		'category_id',
		'condition_id',
		'location_id',
		'currency_id',
		'value',
		'neighborhood',
		'description',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
