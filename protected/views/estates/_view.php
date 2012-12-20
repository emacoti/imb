<div class="view admin">
	
	<div>
		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
		<?php echo CHtml::encode($data->id); ?>
		
		<?php echo CHtml::link(
			' <i class="icon-search icon-white"></i> ',
			array('view', 'id'=>$data->id),
			array('class'=>'btn btn-primary btn-large', 'title'=>'Ver Propidad')); ?>
	</div>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('category_id')); ?>:</b>
	<?php echo CHtml::encode(Categories::model()->findByPk($data->category_id)->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('condition_id')); ?>:</b>
	<?php echo CHtml::encode(Conditions::model()->findByPk($data->condition_id)->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('location_id')); ?>:</b>
	<?php echo CHtml::encode(Locations::model()->findByPk($data->location_id)->name); ?>
	
</div>