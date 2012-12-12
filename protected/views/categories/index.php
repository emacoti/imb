<?php
$this->breadcrumbs=array(
	'Categories',
);

$this->menu=array(
	array('label'=>'Crear rubros', 'url'=>array('create')),
	array('label'=>'Administrar rubros', 'url'=>array('admin')),
);
?>

<h1>Rubros</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'summaryText'=>Yii::t('zii','Mostrando {start}-{end} de {count} resultados.'),
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
