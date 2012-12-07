<?php
$this->breadcrumbs=array(
	'Propiedades'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar Propiedades', 'url'=>array('index')),
	array('label'=>'Crear Propiedad', 'url'=>array('create')),
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

<h1>Manage Propiedades</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
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
