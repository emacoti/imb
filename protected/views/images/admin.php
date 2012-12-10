<?php
$this->breadcrumbs=array(
	'Images'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar imagenes', 'url'=>array('index')),
	array('label'=>'Subir imagenes', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('images-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar imagenes</h1>

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
	'id'=>'images-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'estate_id',
		'path_name',
		'description',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
