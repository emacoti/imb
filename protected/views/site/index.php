<?php $this->pageTitle=Yii::app()->name; ?>

<div class="panel-preview">
	
	<div id="myCarousel" class="carousel slide">
	
		<!-- Carousel items -->
		<div class="carousel-inner">
			<h2 class="art-postheader">Propiedades Destacadas</h2>
			
			<div>
							
				<?php 
				
					foreach($estates as $i => $estate) {
						
						if ($i == 0) {
							echo '<div class="active item">';
						}
						else {
							echo '<div class="item">';
						}
						echo 	'<img src="' . Yii::app()->request->baseUrl . '/images/estates/' . $estate['imgdes'] . '" alt="">';
						echo 	'<div class="carousel-caption">';
						if ($estate['description'] == '') {
							echo	'<p>&nbsp;</p>';
						}
						else {
							echo	'<p>' . $estate['description'] . '</p>';
						}
						echo 	'</div>';
						echo '</div>';
					}
				?>
			</div>
		</div>
		
		<!-- Carousel nav -->
		<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
		<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
	</div>
</div>
<script>
	jQuery('.carousel').carousel();
</script>