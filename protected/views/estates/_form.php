<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'estates-form',
	'enableAjaxValidation'=>false,
)); ?>

<script type="text/javascript">
	var docrot = <?php echo "'" . Yii::app()->getBaseUrl(true) . "'";?>;
	$(document).ready(function() {
		$(".fancybox").fancybox({
			maxWidth   : 500,
			maxHeight	: 500,
		});
	});
</script>

<div>
<div class="form">
	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>
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
						<?php echo $form->labelEx($model,'destacado'); ?>
						<?php echo $form->checkBox($model,'destacado',
						array(
							'value'=>1, 'uncheckValue'=>0,
							'onclick'=>'js:$(this).is(":checked")? document.getElementById("imgdes").style.display = "block": document.getElementById("imgdes").style.display = "none";'
						)); ?>
						<?php echo $form->error($model,'destacado'); ?>
					</div>
					
					<div class="row" id="imgdes" <?php if($model->destacado == 0) echo "style='display:none;'" ?>>
					<?php echo $form->labelEx($model,'imgdes'); ?>
					<?
					$this->widget('ext.EAjaxUpload.EAjaxUpload',
						array(
							'id'=>'uploadFile2',
							'config'=>array(
							   'action'=>Yii::app()->getBaseUrl(true) . '/estates/uploades/',
							   'allowedExtensions'=>array("jpg", "png","jpeg"),//array("jpg","jpeg","gif","exe","mov" and etc...
							   'sizeLimit'=>10*1024*1024,// maximum file size in bytes
							   'minSizeLimit'=>1*1024,// minimum file size in bytes
							   'messages'=>array(
												 'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
												 'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
												 'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
												 'emptyError'=>"{file} is empty, please select files again without it.",
												 'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
												),
							   'showMessage'=>"js:function(message){ alert(message); }"
							)
					));
					?>
					<!--<div id="uploadFile"><div class="qq-uploader">-->
					<ul class="qq-upload-list">
					<?php 
					if($model->imgdes != "")
					{
						echo 'Imagen actual:';
						echo "<li id='imgdes0' class=' qq-upload-success'>";
						echo '<span class="qq-upload-file">';
						$url = $model->imgdes;
						$var = explode("/",$url, 2);
						$nombre = $var[1];
						echo "<a class='fancybox' data-fancybox-group='dgallery' rel='group' href='../../../images/estates/$url'>$nombre</a>";
						echo '</span>';
						echo '</li>';
						$oldvalue = $model->imgdes;
						echo "<input type='hidden' name='olddes' value='$oldvalue' />";
					}
					?>
					</ul>
					<!--</div></div>-->
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
						<?php echo $form->labelEx($model,'googledata'); ?>
						<?php echo $form->textField($model,'googledata',array('size'=>100,'maxlength'=>150)); ?>
						(Ej: Alem 100, Bahia Blanca, Buenos Aires)
						<?php echo $form->error($model,'googledata'); ?>
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
				<?php
				if($model->isNewRecord)
					echo("<input type='hidden' id='accion' value='new'/>");
				else
					echo("<input type='hidden' id='accion' value='update'/>");
				?>
				<div id="imgf" class="form">					
				<?	
				$this->widget('ext.EAjaxUpload.EAjaxUpload',
					array(
						'id'=>'uploadFile',
						'config'=>array(
						   'action'=>Yii::app()->getBaseUrl(true) . '/estates/upload/',
						   'allowedExtensions'=>array("jpg", "png","jpeg"),//array("jpg","jpeg","gif","exe","mov" and etc...
						   'sizeLimit'=>10*1024*1024,// maximum file size in bytes
						   'minSizeLimit'=>1*1024,// minimum file size in bytes
						   'multiple'=>true,
						   'messages'=>array(
											 'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
											 'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
											 'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
											 'emptyError'=>"{file} is empty, please select files again without it.",
											 'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
											),
						   'showMessage'=>"js:function(message){ alert(message); }"
						)
					));
					?>
					<div id="uploadFile"><div class="qq-uploader">
					<ul class="qq-upload-list">
					<?php $this->renderPartial('_images', array('model'=>$model)); ?>
					</ul>
					</div></div>
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
					$newitem = 0;
					echo '<div id="divizq">Nombre:</div>';
					echo '<div id="divder">Valor:</div>';
					echo '<br style="clear:both;"/>';
					echo '<div id="att">';
					if(!$model->isNewRecord)
					{
						foreach ($model->datas as $i => $data)
						{
							$nombrevar = $data['name'];
							$valuevar = $data['value'];
							$valueid = $data['id'];
							echo "<p id='{$newitem}litem'>";
							echo "<input class='atributos' type='text' name='{$newitem}nombre' size='5' value='$nombrevar'/>";
							echo " <input class='atributos' type='text' name='{$newitem}valor' size='5' value='$valuevar'/>";
							echo "<input type='hidden' name='{$newitem}id' value='$valueid'/>";
							echo " <a href='#' onclick='deleteli(\"{$newitem}litem\")'>Borrar</a>";
							echo '</p>';
							$newitem++;
						}
					}
					else
					{
						echo '<p id = "litem0">';
						echo '<input class="atributos" type="text" name="nombre0" size="5"/>';
						echo ' <input class="atributos" type="text" name="valor0" size="5"/>';
						echo " <a href='#' onclick='deleteli(\"litem0\")'>Borrar</a>";
						echo '</p>';
					}
					echo '</div>';
					echo "<a href='#' onclick='agregarAtributo()'>Agregar otro</a>";
					
					
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