
<?php
	$aux= array();
	$titulo = true;
	$i = 0;
	foreach ($model->images as $i => $img) {
		if($titulo)
		{
			$titulo = false;
			echo 'Cargadas anteriormente:';
		}
		$i++;
		echo "<li id='img$i' class=' qq-upload-success'>";
		echo '<span class="qq-upload-file">';
		//echo Chtml::label('Nombre', false);
		
		$url = $img->path_name;
		$var = explode("/", $url, 2);
		$nombre = $var[1];
		echo "<a class='fancybox' data-fancybox-group='gallery' rel='group' href='../../../images/estates/$url'>$nombre</a>";
		echo '</span>';
		$var = "\"../../../images/delete/id/$img->id\"";
		echo "<a class='deletelink' href='#' onclick='if(confirm(\"&iquest;Est&aacute; seguro?\")){deleteimg($var);deleteli(\"img$i\")}'>Borrar</a>";
		echo '</li>';
		//echo '</div>';
		//$aux[$i]= array('label'=>'Nombre', 'value'=>$img->path_name);
	}
?>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>array(),
	'attributes'=>$aux
)); ?>
					