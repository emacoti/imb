
<h2>Propiedad ubicada en barrio: <?php echo $model->neighborhood; ?></h2>
 <?php print_r($model->datas->name); ?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'category_id',
		'condition_id',
		'location_id',
		'description',
	),
)); ?>
