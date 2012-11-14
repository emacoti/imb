
<a href="index.php?r=viewEstates/view&id=<?php echo($data->id); ?>">
	<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('category_id')); ?>:</b>
		<?php echo CHtml::encode(Categories::model()->findByPk($data->category_id)->name); ?>
		<br />
		
		<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
		<?php echo CHtml::encode($data->description); ?>
		<br />

	</div>
</a>