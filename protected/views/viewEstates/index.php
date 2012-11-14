
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>

<h1>Propiedades: <?php echo($title); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$model->search(),
	'itemView'=>'_view',
	'htmlOptions'=>array('class'=>'list-view list-view-estates')
)); ?>