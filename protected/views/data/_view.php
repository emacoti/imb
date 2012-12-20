<div class="view admin">
	
	<div>
		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
		<?php echo CHtml::encode($data->id); ?>
		
		<?php echo CHtml::link(
			' <i class="icon-search icon-white"></i> ',
			array('view', 'id'=>$data->id),
			array('class'=>'btn btn-primary btn-large', 'title'=>'Ver Dato')); ?>
	</div>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estate_id')); ?>:</b>
	<?php echo CHtml::encode($data->estate_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data_type')); ?>:</b>
	<?php echo CHtml::encode($data->data_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('value')); ?>:</b>
	<?php echo CHtml::encode($data->value); ?>
	<br />


</div>