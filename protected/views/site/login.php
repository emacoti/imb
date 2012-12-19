<?php
$this->pageTitle=Yii::app()->name . ' - Ingresar';
$this->breadcrumbs=array(
	'Login',
);
?>

<div class="art-panel">
<h1>Ingresar</h1>

<p>Por favor, complete los siguientes datos:</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="row buttons">
		<span class="art-button-wrapper">
			<span class="l"> </span>
			<span class="r"> </span>
			<?php echo CHtml::submitButton('Ingresar', array('class'=>'art-button')); ?>
		</span>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
</div>