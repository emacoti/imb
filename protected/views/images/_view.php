<div class="view admin">

	<div>
		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
		<?php echo CHtml::encode($data->id); ?>
		
		<?php echo CHtml::link(
			' <i class="icon-search icon-white"></i> ',
			array('view', 'id'=>$data->id),
			array('class'=>'btn btn-primary btn-large', 'title'=>'Ver Imagen')); ?>
	</div>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estate_id')); ?>:</b>
	<?php echo CHtml::encode($data->estate_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('path_name')); ?>:</b>
	<?php echo CHtml::encode($data->path_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />


</div>