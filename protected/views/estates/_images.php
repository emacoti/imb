
<?php
	$aux= array();
	$titulo = true;
	foreach ($model->images as $i => $img) {
		if($titulo)
		{
			$titulo = false;
			echo 'Cargadas anteriormente:';
		}
		echo '<li class=" qq-upload-success">';
		echo '<span class="qq-upload-file">';
		//echo Chtml::label('Nombre', false);
		echo $img->path_name;
		echo '</span>';
		echo '<a class="deletelink" href="../../delete/'.$img->path_name.'">Borrar</a>';
		echo '</li>';
		//echo '</div>';
		//$aux[$i]= array('label'=>'Nombre', 'value'=>$img->path_name);
	}
?>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>array(),
	'attributes'=>$aux
)); ?>
					