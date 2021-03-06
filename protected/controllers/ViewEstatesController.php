<?php

class ViewEstatesController extends Controller
{	
	public $layout='//layouts/column0';
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$model=new Estates('search');
		$model->unsetAttributes();  // clear any default values
		$title= 'Todas';
		$wasSearch= false;
		
		if(isset($_GET['Estates'])) {
		
			$aux= $_GET['Estates'];
			$model->valueFrom= $aux['valueFrom'];
			$model->valueTo= $aux['valueTo'];
			$model->attributes= $aux;
			
			$title= $this->hasSearch($aux);
			$wasSearch= true;
		}
		
		$this->render('index',array(
			'model'=>$model,
			'title'=>$title,
			'wasSearch'=> $wasSearch
		));
	}
	
	// revisa si fue seteado alguno de los atributos
	// para filtrar las propiedades
	function hasSearch($attributes) {
		
		$title= '';
		$allEstates= true;
		$hasCategory= null;
		$seted= array();
		
		if ($attributes['category_id'] != null) {
			$seted[0]= Categories::model()->findByPk($attributes['category_id'])->name;
		}
		
		if ($attributes['condition_id'] != null) {
			$seted[1]= Conditions::model()->findByPk($attributes['condition_id'])->name;
		}
		
		if ($attributes['location_id'] != null) {
			$seted[2]= 'en ' . Locations::model()->findByPk($attributes['location_id'])->name;
		}
		
		if ($attributes['valueFrom'] != null && $attributes['valueTo'] != null) {
			$seted[3]= 'desde ' . $attributes['valueFrom'] . ' hasta ' . $attributes['valueTo'];
		}
		else {
			
			if ($attributes['valueFrom'] != null) {
				$seted[3]= 'desde ' . $attributes['valueFrom'];
			}
			
			if ($attributes['valueTo'] != null) {
				$seted[3]= 'hasta ' . $attributes['valueTo'];
			}
		}
		
		if (count($seted) > 0) {
			
			foreach ($seted as $name) {
				$title= $title . ', ' . $name;
			}
		}
		else {
			$title= '  Todas';
		}
			
		return substr($title,2);
	}
	
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>Estates::model()->findByPk($id)
		));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}	
	
	public function actionUpdateAjax()
    {
        $data = '';	
		
		$i= $_GET['index'];
		$mod= Estates::model()->findByPk($_GET['id']);
		
		$this->renderPartial('_carrousel', array('images'=>$mod->images, 'index'=>$i));
    }
}