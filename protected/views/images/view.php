<?php
$this->breadcrumbs=array(
	'Images'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Crear imagen', 'url'=>array('create')),
	array('label'=>'Administrar imagenes', 'url'=>array('admin')),
);
?>

<h1>Viendo imagen <?php echo $model->path_name; ?></h1>

<?php
$description = "";
if($model->description!=null)
	$description = $model->description;
else 
	$description = 'No tiene';

$this->widget('zii.widgets.CDetailView', array(
'data'=>$model,
'attributes'=>array(
array(
'name'=>'ID',
'value'=>$model->id,
),
array(
'name'=>'Propiedad',
'value'=>$model->estate_id,
),
array(
'name'=>'Descripci&oacute;n',
'value'=>$description,
),
array(
'name'=>'Vista previa',
'type'=>'raw',
'value'=> CHtml::image(Yii::app()->request->baseUrl.'/images/estates/'.$model->path_name, 'imagen no disponible', array('width'=>'150px')),
),
),
));
?>
