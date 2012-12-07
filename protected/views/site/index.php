<?php $this->pageTitle=Yii::app()->name; ?>

<div style="width:820px;margin-left:10px">

	<h2 class="art-postheader">Propiedades Destacadas</h2>
	
	<div id="myCarousel" class="carousel slide">
	
		<!-- Carousel items -->
		<div class="carousel-inner">
			<div class="active item">
				<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/bootstrap-mdo-sfmoma-01.jpg" alt="">
				<div class="carousel-caption">
					<h4>First Thumbnail label</h4>
					<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam.
					Donec id elit non mi porta gravida at eget metus. Nullam id dolor 
					id nibh ultricies vehicula ut id elit.</p>
				</div>
			</div>
				<div class="item">
				<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/bootstrap-mdo-sfmoma-02.jpg" alt="">
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