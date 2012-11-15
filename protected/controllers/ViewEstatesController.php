<?php

class ViewEstatesController extends Controller
{	
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$model=new Estates('search');
		$model->unsetAttributes();  // clear any default values
		$title= 'Todas';
		
		if(isset($_GET['Estates'])) {
		
			$aux= $_GET['Estates'];
			$model->attributes= $aux;
			
			$title= $this->hasSearch($aux);
		}		
		
		$this->render('index',array(
			'model'=>$model,
			'title'=>$title
		));
	}
	
	// revisa si fue seteado alguno de los atributos
	// para filtrar las propiedades
	function hasSearch($attributes) {
		
		$title= '';
		
		if ($attributes['category_id'] != null) {
			$title= Categories::model()->findByPk($attributes['category_id'])->name;
		}
		
		if ($title === '') {
			$title= 'Todas';
		}
			
		return $title;
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
}