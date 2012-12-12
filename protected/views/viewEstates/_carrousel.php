

  
	<div id="myCarousel" class="carousel slide">
	
		<!-- Carousel items -->
		<div class="carousel-inner">
		<?php
			if (count($images) > 0) {
				foreach ($images as $i => $image) {
					$img= Yii::app()->request->baseUrl . '/images/estates/' . $image->path_name;
					
					if ($i == $index) {
						echo '<div class="active item">';
					}
					else {
						echo '<div class="item">';
					}
					echo '<img src="'. $img . '" alt="">';
					echo '</div>';
				}
			}
		?>
			
				
		</div>
		
		<!-- Carousel nav -->
		<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
		<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
		
		<script>
			setMarginImages();
		</script>
		
	<script>
		setBackDropClass('darkest');
	</script>
	</div>
