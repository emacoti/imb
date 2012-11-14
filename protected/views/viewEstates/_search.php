<div>

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

<div class="accordion" id="filters">
  <div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#filters" href="#filtersBody">
        Filtros
      </a>
    </div>
    <div id="filtersBody" class="accordion-body collapse in">
      <div class="accordion-inner well form-horizontal">
	  
		<div class="control-group">
	  
			<div class="span2">        
				<?php echo $form->label($model,'category_id'); ?>
				<?php echo $form->dropDownList($model,'category_id',
					CHtml::listData(
						Categories::model()->findAll(),
						'id','name'), 
						array('empty'=>'Seleccionar..', 'class'=>'input-medium')); ?>
			</div>
			
			<div class="span2">
				<?php echo $form->label($model,'condition_id'); ?>
				<?php echo $form->dropDownList($model,'condition_id',
					CHtml::listData(
						Conditions::model()->findAll(),
						'id','name'), 
						array('empty'=>'Seleccionar..', 'class'=>'input-medium')); ?>
			</div>
			
			<div class="span2">
				<?php echo $form->label($model,'location_id'); ?>
				<?php echo $form->dropDownList($model,'location_id',
					CHtml::listData(
						Locations::model()->findAll(),
						'id','name'), 
						array('empty'=>'Seleccionar..', 'class'=>'input-medium')); ?>
			</div>
			
			<div class="span2">
				<?php echo $form->label($model,'neighborhood'); ?>
				<?php echo $form->textField(
									$model,'neighborhood',
									array('size'=>50, 'maxlength'=>50, 'class'=>'input-medium')); ?>
			</div>
			
			<div class="span2">
				<?php echo CHtml::submitButton('Search'); ?>
			</div>
		
		</div>
		
      </div>
    </div>
  </div>
</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->