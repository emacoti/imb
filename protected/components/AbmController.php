<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class AbmController extends Controller
{	
	/**
	 * @var array menu de administracion.
	 */
	public $menuAdmin=array();
	public $setArtMenu="setActiveArtMenu('admin-menu');";
	public $layout='//layouts/column2-admin';
	
	public function init() {
		$this->homeLink= CHtml::link(Yii::t('zii','Administrar'), array('admin/index'));
		
		$this->menuAdmin=array(
			array('label'=>'Propiedades', 'url'=>array('estates/index')),
			array('label'=>'Datos', 'url'=>array('data/index')),
			array('label'=>'Imagenes', 'url'=>array('images/index')),
			array('label'=>'Rubros', 'url'=>array('categories/index')),
			array('label'=>'Condiciones', 'url'=>array('conditions/index')),
			array('label'=>'Localidades', 'url'=>array('locations/index')),
			array('label'=>'Monedas', 'url'=>array('currencies/index')),
);
	}
}