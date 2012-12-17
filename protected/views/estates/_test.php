<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'mod-form',
		'enableAjaxValidation'=>false,
	)); ?>
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
    <h3 id="myModalLabel">Modal header</h3>
  </div>
  <div class="modal-body">
  
	<div class="form">
					<?php $mod= new Images;
					echo $form->errorSummary($mod);  ?>

					<div class="row">
						
						<?php echo $form->labelEx($mod,'path_name'); ?>
						<?php echo Chtml::fileField('path_name','', array('id'=>'pathNameInput')); ?>
						<?php echo $form->error($mod,'path_name'); ?>
					</div>
					
					<div class="row">
						<?php echo $form->labelEx($mod,'path_name'); ?>
						<?php echo Chtml::textArea('description','', array('id'=>'descriptionInput')); ?>
						<?php echo $form->error($mod,'path_name');?>
					</div>
	</div>
	
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
	<?php
		echo CHtml::ajaxButton (
					"Guardar",
					CController::createUrl('estates/UpdateAjax'),
					array('data'=>array(
							'path_name'=>'js:$("#pathNameInput").val()',
							'description'=>'js:$("#descriptionInput").val()',
							'id'=>$id),
							'type'=>'GET',
							'update' => '#imgf'),
					array('id'=>'btnId','onclick'=>"$('.modal').modal('hide');"));
	?>
  </div>
</div>

<?php $this->endWidget(); ?>