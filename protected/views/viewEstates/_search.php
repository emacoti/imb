<div>

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

<div class="accordion" id="filters">
   
    <div id="filtersBody" class="accordion-body collapse">
      <div class="accordion-inner well search-estates">
	  
		<div class="controls controls-row">
	  
			<div class="span span-custom">        
				<?php echo $form->label($model,'category_id'); ?>
				<?php echo $form->dropDownList($model,'category_id',
					CHtml::listData(
						Categories::model()->findAll(),
						'id','name'), 
						array('empty'=>'Seleccionar..', 'class'=>'select-custom')); ?>
			</div>
			
			<div class="span span-custom">
				<?php echo $form->label($model,'condition_id'); ?>
				<?php echo $form->dropDownList($model,'condition_id',
					CHtml::listData(
						Conditions::model()->findAll(),
						'id','name'), 
						array('empty'=>'Seleccionar..', 'class'=>'select-custom')); ?>
			</div>
			
			<div class="span span-custom ">
				<?php echo $form->label($model,'location_id'); ?>
				<?php echo $form->dropDownList($model,'location_id',
					CHtml::listData(
						Locations::model()->findAll(),
						'id','name'), 
						array('empty'=>'Seleccionar..', 'class'=>'select-custom')); ?>
			</div>
			
			<div class="span span-custom">
				<?php echo $form->label($model,'neighborhood'); ?>
				<?php echo $form->textField(
									$model,'neighborhood',
									array('size'=>50, 'maxlength'=>50, 'class'=>'input-custom')); ?>
			</div>			
		
		</div>
		
		<div class="controls controls-row last">			
			
			<div class="span span-custom">
				<?php echo $form->label($model,'Valor Desde'); ?>
				<?php echo $form->textField(
									$model,'valueFrom',
									array('class'=>'input-custom')); ?>
			</div>
			
			<div class="span span-custom">
				<?php echo $form->label($model,'Valor Hasta'); ?>
				<?php echo $form->textField(
									$model,'valueTo',
									array('class'=>'input-custom')); ?>
			</div>			
			
			<div class="span span-custom ">
				<?php echo $form->label($model,'currency_id'); ?>
				<?php echo $form->dropDownList($model,'currency_id',
					CHtml::listData(
						Currencies::model()->findAll(),
						'id','name'), 
						array('empty'=>'Seleccionar..', 'class'=>'select-custom')); ?>
			</div>
		
			<div class="span span-custom btn-submit">
				<span class="art-button-wrapper">
					<span class="l"> </span>
					<span class="r"> </span>
					<?php echo CHtml::submitButton('Buscar', array('class'=>'art-button btn-icon')); ?>
					<i class="icon-search icon-white"></i>
				</span>
				
			</div>
		
		</div>
		
      </div>
    </div>
</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->