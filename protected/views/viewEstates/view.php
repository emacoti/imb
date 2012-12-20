
<div class="view-estate">

	<h2 class="title">Propiedad ubicada en barrio: <i><?php echo $model->neighborhood; ?></i>
		<?php echo CHtml::link('Volver',Yii::app()->request->urlReferrer, array('class'=>'link-back')); ?>
	</h2>

	<div class="estate-description">
		<?php echo $model->description; ?>
	</div>
	</br></br>

	<h4 class="title">Detalles</h4>
	 <?php 
	 
		$auxx= CHtml::listData($model->datas,'name','value');
		$arr= array();
		
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

	<br /></br>
	
	<h4 class="title">Imagenes</h4>
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
	</div></br>
	
	<h4 class="title">Ubicaci&oacute;n</h4>
	
	<?php
		if ($model->googledata != '') {
			$address= str_replace(' ', '+', $model->googledata);
	?>
	<div class="map" style="display:none">
		<iframe width="820" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.ar/maps?saddr=<?php echo $address ?>&amp;t=h&amp;ie=UTF8&amp;z=16&amp;output=embed" style="margin-left: 8px" onerror="alert(11);">
		</iframe>
		<br />
		<small style="margin-left: 8px">
		<a href="https://maps.google.com.ar/maps?saddr=Panama+1501,+Bahia+Blanca,+Buenos+Aires&amp;t=h&amp;ie=UTF8&amp;z=16&amp;" target="_blank" style="color:#0000FF;text-align:left">
			Ver mapa m&aacute;s grande
		</a>
		</small>
	</div>
	<div class="no_map">
		No es posible mostrar la ubicacion ya que no hay conexion a internet.
	</div>
	<?php
		}
		else {
			echo "Ubicacion no establecida";
		}
	?>
	
	
	<div id="divMod">
		<?php $this->renderPartial('_modalImg', array('images'=>$model->images, 'index'=>0)); ?>
	</div>
	<script>
	$('#divMod .modal').appendTo($("body"));
	setActiveArtMenu('states-menu');
	testConnection();
	</script>
</div>