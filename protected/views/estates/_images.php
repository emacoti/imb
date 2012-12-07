
<?php
	$aux= array();
	foreach ($model->images as $i => $img) {
	
		echo '<div class="row">';
		echo '<h4>Imagen ' . ($i+1) . '</h1>';
		echo Chtml::label('Nombre', false);
		echo Chtml::label($img->path_name,false);
		echo '</div>';
		$aux[$i]= array('label'=>'Nombre', 'value'=>$img->path_name);
	}
?>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>array(),
	'attributes'=>$aux
)); ?>
					