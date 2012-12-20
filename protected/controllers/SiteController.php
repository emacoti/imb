<?php
Yii::import('application.extensions.EWideImage.EWideImage');

class SiteController extends Controller
{
	public $info=array();
	public $services=array();
	public $ask=array();
	public $setArtMenu="setActiveArtMenu('info-menu'); setActiveSubArtMenu('info-sub-menu')";
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		
		$estates= Estates::model()->findAll(array(
			'condition'=>'destacado=:des',
			'params'=>array(':des'=>1),
			'limit'=>5
		));
		$this->render('index', array('estates'=>$estates));
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
	
	/**
	 * Displays the contact page
	 */
	public function actionPage($view)
	{
		$this->layout= '//layouts/column2-info';
		$this->info=array(
			array('label'=>'Acerca de..', 'url'=>array('/site/page', 'view'=>'about')),
			array('label'=>'Requisitos alquilar', 'url'=>array('/site/page', 'view'=>'req')),
			array('label'=>'Preguntas frecuentes', 'url'=>array('/site/page', 'view'=>'ask'))
		);
		$this->services=array(
			array('label'=>'Tasaciones', 'url'=>array('/site/page', 'view'=>'tas')),
			array('label'=>'Venta y alquiler', 'url'=>array('/site/page', 'view'=>'sale')),
			array('label'=>'Administraciones', 'url'=>array('/site/page', 'view'=>'adm')),
			array('label'=>'Servicios al desarrollador', 'url'=>array('/site/page', 'view'=>'serv'))
		);
		$this->render('pages/'.$view);
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Gracias por contactarse con nosotros, en breve le responderemos.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(array('admin/index'));
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}