<?php
$this->pageTitle=Yii::app()->name . ' - Contactenos';
$this->breadcrumbs=array(
	'Contact',
);
?>

<div class="art-panel">

<h1>Cont&aacute;ctenos</h1>

<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>

<p>
Si tiene alguna inquietud no dude en consultarnos, nos comunicaremos a la brevedad.
</p>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name', array('label' => Yii::t('name','Nombre:'))); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subject', array('label' => Yii::t('subject','Asunto:'))); ?>
		<?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'subject'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'body', array('label' => Yii::t('body','Mensaje:'))); ?>
		<?php echo $form->textArea($model,'body',array('rows'=>10, 'cols'=>50)); ?>
		<?php echo $form->error($model,'body'); ?>
	</div>

	<?php if(CCaptcha::checkRequirements()): ?>
	<div class="row">
		<?php echo $form->labelEx($model,'verifyCode', array('label' => Yii::t('verifyCode','Verificaci&oacute;n:'))); ?>
		<div>
		<?php echo $form->textField($model,'verifyCode'); ?>
		<?php $this->widget('CCaptcha'); ?>
		</div>
		<div class="hint">Por favor, ingrese las letras que ve en la imagen.
		</div>
		<?php echo $form->error($model,'verifyCode'); ?>
	</div>
	<?php endif; ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Enviar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>

<?php endif; ?>