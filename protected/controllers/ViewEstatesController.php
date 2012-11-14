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
			$title= '';
			if (isset($aux['category_id'])) {
				$title= Categories::model()->findByPk($aux['category_id'])->name;
			}
		}		
		
		$this->render('index',array(
			'model'=>$model,
			'title'=>$title
		));
	}
	
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>Estates::model()->with('datas')->findByPk($id)
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