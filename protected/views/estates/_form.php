
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'estates-form',
	'enableAjaxValidation'=>false,
)); ?>

<div>
<div class="form">
	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>
</div>
	

<div class="accordion" id="estate">

	<div class="accordion-group">
		<div class="accordion-heading">
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#estate" href="#primaryData">
				Datos Primarios
			</a>
		</div>
		<div id="primaryData" class="accordion-body collapse in">
			<div class="accordion-inner">
				
				<div class="form">
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
						<?php echo $form->labelEx($model,'currency_id'); ?>
						<?php echo $form->dropDownList(
											$model,'currency_id',
											CHtml::listData(Currencies::model()->findAll(),'id','name'), 
											array('empty'=>'Seleccionar..', 'class'=>'input-medium')); ?>
						<?php echo $form->error($model,'currency_id'); ?>
					</div>

					<div class="row">
						<?php echo $form->labelEx($model,'value'); ?>
						<?php echo $form->textField($model,'value'); ?>
						<?php echo $form->error($model,'value'); ?>
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

				</div>
			</div>
		</div>
	</div>
	
	<div class="accordion-group">
		<div class="accordion-heading">
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#estate" href="#images">
				Imagenes
			</a>
		</div>
		<div id="images" class="accordion-body collapse">
			<div class="accordion-inner">
				
				<a href="#myModal" role="button" class="btn" data-toggle="modal">Agregar Imagen</a>
				<div id="imgf" class="form">					
					
					<?php $this->renderPartial('_images', array('model'=>$model)); ?>
					
					<div id="divMod">
						<?php $this->renderPartial('_test', array('id'=>$model->id)); ?>
					</div>
					<script>
					$('#divMod .modal').appendTo($("body"));
					</script>
					
				</div>
			</div>
		</div>
	</div>
	
	<div class="accordion-group">
		<div class="accordion-heading">
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#estate" href="#attributes">
				Atributos
			</a>
		</div>
		<div id="attributes" class="accordion-body collapse">
			<div class="accordion-inner">
				
				<div class="form">
					
					<?php
						foreach ($model->datas as $i => $data) {
						
							echo '<div class="row">';
							echo '<h4>Atributo ' . ($i+1) . '</h1>';
							echo $form->labelEx($data,'name');
							echo $form->textField($data,'name');
							echo $form->error($data,'name');
							echo '</div>';
						}
					?>
					
				</div>
			</div>
		</div>
	</div>
</div>

<div class="form">
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>
</div>

</div>

<?php $this->endWidget(); ?>