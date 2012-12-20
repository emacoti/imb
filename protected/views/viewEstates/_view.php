
<a href="view/id/<?php echo($data->id); ?>" class="view-estates">
	<div class="view">
	
		<?php 
			$img= '';
			if (count($data->images) > 0) {
				$img= $data->images[0]->path_name;
			}
			else {
				$img= 'no-img.jpg';
			}
		?>
		<div class="img">
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/estates/<?php echo $img ?>" alt="">
		</div>
		
		<div class="info">
			<div>
				<b><?php echo CHtml::encode($data->getAttributeLabel('category_id')); ?>:</b>
				<?php echo CHtml::encode($data->category->name); ?>
				<div class="right">
					<b><?php echo CHtml::encode($data->getAttributeLabel('value')); ?>:</b>
					<?php echo CHtml::encode($data->currency->symbol); ?>
					<?php echo CHtml::encode($data->value); ?>
				</div>
			</div>
			<br />
			
			<b><?php echo CHtml::encode($data->getAttributeLabel('condition_id')); ?>:</b>
			<?php echo CHtml::encode($data->condition->name); ?>
			<br />
			
			<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
			<?php echo CHtml::encode($data->description); ?>
			<br />
		</div>

	</div>
</a>