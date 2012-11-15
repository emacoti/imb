
<h2>Propiedad ubicada en barrio: <?php echo $model->neighborhood; ?></h2>
</br>

<?php echo $model->description; ?>
</br>

<h4>Detalles:</h4>
</br>
 <?php 
 
	$auxx= CHtml::listData($model->datas,'name','value');
	$arr= array();
	
	//$arr[0]= array('label'=>'Rubro', 'value'=>Categories::model()->findByPk($model->category_id)->name);
	
	//$arr[1]= array('label'=>'Condicion', 'value'=>Conditions::model()->findByPk($model->condition_id)->name);
	
	//$arr[2]= array('label'=>'Localidad', 'value'=>Locations::model()->findByPk($model->location_id)->name);
	
	//$arr[3]= array('label'=>'Barrio', 'value'=>$model->neighborhood);
	
	$ind= 0;
	foreach ($auxx as $name =>$value) {
		$arr[$ind]= array('label'=>$name, 'value'=>$value);
		$ind= $ind+1;
	}
?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>$arr
)); ?>
