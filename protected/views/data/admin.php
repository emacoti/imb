<?php
$this->breadcrumbs=array(
	'Datas'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Crear dato', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('data-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar datos</h1>

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
	'id'=>'data-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'emptyText'=>'La busqueda no arrojo resultados.',
	'summaryText'=>Yii::t('zii','Mostrando {start}-{end} de {count} resultados.'),
	'columns'=>array(
		'id',
		'estate_id',
		'name',
		'data_type',
		'value',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
