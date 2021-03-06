<?php

class EstatesController extends AbmController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
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
				'actions'=>array('index','view','create','update','admin','delete','updateAjax','upload', 'uploades', 'borrarArchivo', 'resize'),
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
		$rutas = array();
		$att = array();
		
		for($i=0; $i<100; $i++)
		{
			$nombre = "file";
			$nombre.= strval($i);
			
			$nomatt = strval($i).'nombre';
			$valatt = strval($i).'valor';
			
			$nomatt2 = 'nombre'.strval($i);
			$valatt2 = 'valor'.strval($i);
			
			if(isset($_POST[$nombre]))
			{
				$rutas[$i] = $_POST[$nombre];
			}
			if(isset($_POST[$nomatt]) && isset($_POST[$valatt]))
			{
				$att[$_POST[$nomatt]] = $_POST[$valatt];
			}
			if(isset($_POST[$nomatt2]) && isset($_POST[$valatt2]))
			{
				$att[$_POST[$nomatt2]] = $_POST[$valatt2];
			}
		}
		
		$model=new Estates;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Estates']))
		{
			$model->attributes=$_POST['Estates'];
			if($model->save())
			{
				$id = $model->id;
				// Creacion del directorio para las imagenes
				if (!is_dir('./images/estates/'.$id)) 
				{
					mkdir('./images/estates/'.$id);
				}
				foreach ($rutas as $i => $v) 
				{	
					foreach ($att as $k => $m)
					{
						$da= new Data;
						$da->attributes= array('estate_id'=>$id, 'name'=>$k, 'data_type'=>'-', 'value'=>$m);
						$da->save();
					}
					// Moviendo las imagenes
					$old = "./upload/" . $v;
					$new = "./images/estates/".$id."/".$v;
					rename($old, $new) or die("No se puede mover $old a $new.");
					
					$img= new Images;
					$img->attributes= array('path_name'=>$id."/".$v, 'estate_id'=>$id, 'description'=>'descripcion');
					$img->save();
				}
				// Creando la imagen destacada
				if(isset($_POST["filedes"]) && $model->destacado == 1)
				{
					$id = $model->id;
					$destacado = $_POST["filedes"];
					$old = "./uploades/" . $destacado;
					$new = "./images/estates/".$id."/des".$destacado;
					rename($old, $new) or die("No se puede mover $old a $new.");
					$model->imgdes=$id."/des".$destacado;
					$dimensiones = getimagesize($new);
					$anchoReal = $dimensiones[0];
					$altoReal = $dimensiones[1];
					if($anchoReal != 820 || $altoReal != 320)
					{
						$image = new SimpleImage();
						$image->load($new);
						$image->resize(820,320);
						$image->save($new);
					}
				}
				else if($model->destacado == 1 && isset($_POST["olddes"]))
				{
					$model->imgdes = $_POST["olddes"];
				}
				
				$model->save();
			
				$this->redirect(array('view','id'=>$model->id));
			}
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
	
		$rutas = array();
		$att = array();
		$ids = array();
		
		for($i=0; $i<100; $i++)
		{
			$nombre = "file";
			$nombre.= strval($i);
			
			$nomatt = strval($i).'nombre';
			$valatt = strval($i).'valor';
			
			$nomatt2 = 'nombre'.strval($i);
			$valatt2 = 'valor'.strval($i);
			
			$valid = strval($i).'id';
			
			if(isset($_POST[$nombre]))
			{
				$rutas[$i] = $_POST[$nombre];
			}
			if(isset($_POST[$nomatt]) && isset($_POST[$valatt]))
			{
				$att[$_POST[$nomatt]] = $_POST[$valatt];
			}
			if(isset($_POST[$nomatt2]) && isset($_POST[$valatt2]))
			{
				$att[$_POST[$nomatt2]] = $_POST[$valatt2];
			}
			if(isset($_POST[$valid]))
			{
				$ids[$i] = $_POST[$valid];
			}
		}
		
		$model=$this->loadModel($id);
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Estates']))
		{
			$model->attributes=$_POST['Estates'];
			
			if(isset($_POST["filedes"]) && $model->destacado == 1)
			{
				$destacado = $_POST["filedes"];
				$old = "./uploades/" . $destacado;
				$new = "./images/estates/".$id."/des".$destacado;
				rename($old, $new) or die("No se puede mover $old a $new.");
				$model->imgdes=$id."/des".$destacado;
				$dimensiones = getimagesize($new);
				$anchoReal = $dimensiones[0];
				$altoReal = $dimensiones[1];
				if($anchoReal != 820 || $altoReal != 320)
				{
					$image = new SimpleImage();
					$image->load($new);
					$image->resize(820,320);
					$image->save($new);
				}
			}
			else if($model->destacado == 1 && isset($_POST["olddes"]))
			{
				$model->imgdes = $_POST["olddes"];
			}
			else
			{
				$model->imgdes = "";
				$model->destacado = 0;
			}	
			if($model->save())
			{	
				Data::model()->deleteAll('estate_id = ?' , array($model->id));
				
				foreach ($att as $k => $v)
				{
					$da= new Data;
					$da->attributes= array('estate_id'=>$id, 'name'=>$k, 'data_type'=>'-', 'value'=>$v);
					$da->save();
				}
				
				foreach ($rutas as $i => $v) 
				{	
					//$v = str_replace(" ", "%20", $v);
					$old = "./upload/" . $v;
					$new = "./images/estates/".$id."/".$v;
					rename($old, $new) or die("No se puede mover $old a $new.");
					
					$img= new Images;
					$img->attributes= array('path_name'=>$id."/".$v, 'estate_id'=>$id, 'description'=>'descripcion');
					$img->save();
				}
				//print_r($v);
				$this->redirect(array('view','id'=>$model->id));
			}
		}
		
		$this->mod= $model;
		$img= array(0=>array(0=>'tt')); // agrego pq sino falla el evento ajax

		$this->render('update',array(
			'model'=>$model,
		));
	}

	
	public function actionBorrarArchivo($nombre)
	{
		if(!Yii::app()->request->isPostRequest)
		{
			if(file_exists("./upload/" . $nombre))
				unlink("./upload/" . $nombre);
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
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
				
			// Limpiando la carpeta de imagenes
			$ruta = Yii::app()->getBasePath()."/../images/estates/".$id."/*";
			$files = glob($ruta);
			foreach($files as $file){
				if(is_file($file) && is_writable($file))
					unlink($file);
			}
			$ruta = Yii::app()->getBasePath()."/../images/estates/".$id;
			if(is_dir($ruta))
				rmdir($ruta);
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
	
	public function actionUpload()
	{
        Yii::import("ext.EAjaxUpload.qqFileUploader");
		$folder="./upload/";
        $allowedExtensions = array("jpg", "png", "jpeg");//array("jpg","jpeg","gif","exe","mov" and etc...
        $sizeLimit = 10 * 1024 * 1024;// maximum file size in bytes
        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
        $result = $uploader->handleUpload($folder);

        $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
 
        $fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
        $fileName=$result['filename'];//GETTING FILE NAME
 
        echo $return;// it's array
	}
	
	public function actionUploades()
	{
        Yii::import("ext.EAjaxUpload.qqFileUploader");
		$folder="./uploades/";
        $allowedExtensions = array("jpg", "png", "jpeg");//array("jpg","jpeg","gif","exe","mov" and etc...
        $sizeLimit = 10 * 1024 * 1024;// maximum file size in bytes
        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
        $result = $uploader->handleUpload($folder);

        $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
 
        $fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
        $fileName=$result['filename'];//GETTING FILE NAME
 
        echo $return;// it's array
	}
	
	public function actionResize()
	{
		if(isset($_POST['x1']) && isset($_POST['y1']) && isset($_POST['x2']) && isset($_POST['y2']) && isset($_POST['nomimg']) && isset($_POST['tipo']))
		{
			$nomimg = $_POST['nomimg'];
			$temp = explode("?", $nomimg);
			$nomimg = $temp[0];
			
			$tipo = $_POST['tipo'];
			
			if($tipo == "destacado")
				$ruta = "./uploades/" . $nomimg;
			else
				$ruta = "./upload/" . $nomimg;
			
			$dimensiones = getimagesize($ruta);
			$anchoReal = $dimensiones[0];
			$altoReal = $dimensiones[1];
			$multiplicador = 1;
			if($anchoReal > 500 || $altoReal > 400)
			{
				if($anchoReal > 500 && $altoReal > 400)
				{
					// redimensionar por ancho
					if(($anchoReal / $altoReal) >= 1.25)
					{						
						$multiplicador = $anchoReal / 500;
					}
					// redimensionar por alto
					else
					{
						$multiplicador = $altoReal / 400;
					}
				}
				// redimensionar por ancho
				else if($anchoReal > 500)
				{
					$multiplicador = $anchoReal / 500;
				}
				// redimensionar por alto
				else if($altoReal > 400)
				{
					$multiplicador = $altoReal / 400;
				}
			}
			
			$x1 = floor($_POST['x1'] * $multiplicador);
			$y1 = floor($_POST['y1'] * $multiplicador);
			$x2 = floor($_POST['x2'] * $multiplicador);
			$y2 = floor($_POST['y2'] * $multiplicador);
			
			$image = new SimpleImage();
			$image->load($ruta);
			$image->crop($x1,$y1,$x2,$y2);
			$image->save($ruta);
			
			if($tipo == "destacado")
			{
				$image = new SimpleImage();
				$image->load($ruta);
				$image->resize(820,320);
				$image->save($ruta);
			}
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
