<?php

class EstatesController extends AbmController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
	public $mod= null;

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','create','update','admin','delete','updateAjax'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Estates;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Estates']))
		{
			$model->attributes=$_POST['Estates'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Estates']))
		{
			$model->attributes=$_POST['Estates'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}
		
		$this->mod= $model;
		$img= array(0=>array(0=>'tt')); // agrego pq sino falla el evento ajax
		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Estates');
		$this->render('index',array(
			'dataProvider'=>$dataProvider
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Estates('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Estates']))
			$model->attributes=$_GET['Estates'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Estates::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	/**
	 * Returns the full data model based on the primary key given in the GET variable.
	 * With the all relations
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadFullModel($id)
	{
		$model=Estates::model()
				->with('category', 'condition', 'location', 'currency')
				->findByPk($id);
				
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
			
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='estates-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionUpdateAjax()
    {
        $data = '';	
		
		if(isset($_GET['path_name']))
			$data = substr(strrchr($_GET['path_name'],'\\'),1);
			
		if(isset($_GET['path_name']))
			$description = $_GET['description'];
			
		/*if(isset($_GET['img'])) {
			$img= $_GET['img'];
			$index= count($img);
			$img[$index]= array(0=>$data, 1=>$description);
			$img[$index+1]= array(0=>'tt'); // agrego pq sino me queda desfazado
		}*/
		
		$this->mod= $this->loadModel($_GET['id']);
		
		
		$img= new Images;
		$img->attributes= array('path_name'=>$data, 'estate_id'=>$_GET['id'], 'description'=>$description);
		$img->save();
 
        $this->renderPartial('_images', array('model'=>$this->mod), false, true);
		$this->renderPartial('_test', array('id'=>$_GET['id']), false, true);
    }
}
