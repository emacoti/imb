
<h2 class="title-estates">
	<strong>
		Propiedades: 
	</strong>
	<i>
		<?php echo($title); ?>
	</i>
	<a class="link-back" data-toggle="collapse" data-parent="#filters" href="#filtersBody" title="Busqueda de propiedades">
        Busqueda
      </a>
</h2>

<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$model->search(),
	'itemView'=>'_view',
	'htmlOptions'=>array('class'=>'list-view list-view-estates'),
	'sortableAttributes'=>array(
		'category_id'
	),
	'emptyText'=>'La busqueda no arrojo resultados.',
	'summaryText'=>Yii::t('zii','Mostrando {start}-{end} de {count} resultados.'),
	'sorterHeader'=>Yii::t('zii','Ordenar por: '),
	'template'=>"{sorter}\n{summary}\n{items}\n{pager}"
)); ?>

<?php
	if ($wasSearch) {
?>
	<script>
		hideCollapsePanel('filtersBody');
	</script>
<?php
	}
?>