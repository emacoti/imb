<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'estates-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'category_id'); ?>
		<?php echo $form->dropDownList($model,'category_id',
									CHtml::listData(
										Categories::model()->findAll(),
										'id','name'), 
										array('empty'=>'Seleccionar..', 'class'=>'input-medium')); ?>
		<?php echo $form->error($model,'category_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'condition_id'); ?>
		<?php echo $form->dropDownList($model,'condition_id',
									CHtml::listData(
										Conditions::model()->findAll(),
										'id','name'), 
										array('empty'=>'Seleccionar..', 'class'=>'input-medium')); ?>
		<?php echo $form->error($model,'condition_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'location_id'); ?>
		<?php echo $form->dropDownList($model,'location_id',
									CHtml::listData(
										Locations::model()->findAll(),
										'id','name'), 
										array('empty'=>'Seleccionar..', 'class'=>'input-medium')); ?>
		<?php echo $form->error($model,'location_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'neighborhood'); ?>
		<?php echo $form->textField($model,'neighborhood',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'neighborhood'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->