
<div class="view-estate">

	<h2>Propiedad ubicada en barrio: <?php echo $model->neighborhood; ?></h2>
	</br>

	<div class="estate-description">
		<?php echo $model->description; ?>
	</div>
	</br>

	<h4>Detalles:</h4>
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
		'attributes'=>$arr,
		'htmlOptions'=>array('class'=>'detail-view view-est-att')
	)); ?>

	<br />
	<h4>Imagenes:</h4>
	<div class="view-est-img">
	<?php 
		$img= '';
		if (count($model->images) > 0) {
			foreach ($model->images as $i => $image) {
				$img= Yii::app()->request->baseUrl . '/images/estates/' . $image->path_name;
				echo CHtml::ajaxLink (
						'<img src="'. $img . '" alt="">',
						CController::createUrl('viewEstates/UpdateAjax'),
						array('data'=>array(
								'id'=>$model->id,
								'index'=>$i),
								'type'=>'GET',
								'update' => '#imgBody'),
						array('href'=>'#myModal',	'data-toggle'=>'modal'));
			}
		}
	?>
	</div>
	<div id="divMod">
		<?php $this->renderPartial('_modalImg', array('images'=>$model->images, 'index'=>0)); ?>
	</div>
	<script>
	$('#divMod .modal').appendTo($("body"));
	</script>
	
</div>