<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'category_id'); ?>
		<?php echo $form->dropDownList(
							$model,'category_id',
							CHtml::listData(Categories::model()->findAll(),'id','name'),
							array('empty'=>'Seleccionar..', 'class'=>'input-medium')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'condition_id'); ?>
		<?php echo $form->dropDownList(
							$model,'condition_id',
							CHtml::listData(Conditions::model()->findAll(),'id','name'),
							array('empty'=>'Seleccionar..', 'class'=>'input-medium')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'location_id'); ?>		
		<?php echo $form->dropDownList(
							$model,'location_id',
							CHtml::listData(Locations::model()->findAll(),'id','name'),
							array('empty'=>'Seleccionar..', 'class'=>'input-medium')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'currency_id'); ?>
		<?php echo $form->dropDownList(
							$model,'currency_id',
							CHtml::listData(Currencies::model()->findAll(),'id','name'),
							array('empty'=>'Seleccionar..', 'class'=>'input-medium')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'value'); ?>
		<?php echo $form->textField($model,'value'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'neighborhood'); ?>
		<?php echo $form->textField($model,'neighborhood',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->