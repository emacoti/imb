<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
    <head>
        <!--
        Created by Artisteer v2.4.0.27666
        Base template (without user's data) checked by http://validator.w3.org : "This page is valid XHTML 1.0 Transitional"
        -->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
        <title><?php echo CHtml::encode(Yii::app()->name); ?></title>

		<!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />-->
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.fancybox.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/imgareaselect-default.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" type="text/css" media="screen, projection" />
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/form.css" type="text/css" media="screen, projection" />
        <!--[if IE 6]><link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.ie6.css" type="text/css" media="screen" /><![endif]-->
        <!--[if IE 7]><link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.ie7.css" type="text/css" media="screen" /><![endif]-->
		
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/app.css" />

        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/css/script.js"></script>
		<?php
		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/bootstrap.js');
		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/app.js');
		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/jquery.fancybox.pack.js');
		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/jquery.imgareaselect.min.js');
		
		Yii::app()->clientScript->registerCoreScript('jquery');
	?>
    </head>
    <body>
	<div id="modalResize" class="modal hide fade in" style="display: none; ">  
		<div class="modal-header">  
			<a class="close" data-dismiss="modal">X</a>  
			<h3>Edici&oacute;n de imagen</h3>  
		</div>  
		<div class="modal-body" style="text-align:center;">
		Para redimensionar la imagen dibuje un rectangulo sobre la misma.<br/>
			<img id="imgedit" src="" style="border:1px solid; max-width: 500px; max-height: 400px;">          
		</div>  
		<div class="modal-footer">
			<input type="hidden" name="x1" id="x1" value="" />
			<input type="hidden" name="y1" id="y1" value="" />
			<input type="hidden" name="x2" id="x2" value="" />
			<input type="hidden" name="y2" id="y2" value="" />
			<input type="hidden" name="nomimg" id="nomimg" value="" />
			<input type="hidden" name="tipo" id="tipo" value="" />

			<a href="#" onclick="cortarYRedimensionar();" class="btn" data-dismiss="modal">Redimensionar</a>  
			<a href="#" class="btn" onclick="$('#imgedit').imgAreaSelect({ instance: true });" data-dismiss="modal">Cancelar</a>  
		</div>  
	</div>
	<script language='JavaScript'>
	function selectedDim(img, selection)
	{
		$('input[name="x1"]').val(selection.x1);
		$('input[name="y1"]').val(selection.y1);
		$('input[name="x2"]').val(selection.x2);
		$('input[name="y2"]').val(selection.y2);
	}
	</script>
        <div id="art-main">
            <div class="art-sheet">
                <div class="art-sheet-tl"></div>
                <div class="art-sheet-tr"></div>
                <div class="art-sheet-bl"></div>
                <div class="art-sheet-br"></div>
                <div class="art-sheet-tc"></div>
                <div class="art-sheet-bc"></div>
                <div class="art-sheet-cl"></div>
                <div class="art-sheet-cr"></div>
                <div class="art-sheet-cc"></div>
                <div class="art-sheet-body">
                    <div class="art-nav art-nav-sup">
                        <div class="l"></div>
                        <div class="r"></div>                       
                    </div>
                    <div class="art-header">
                        <div class="art-header-jpeg"></div>
                        <div class="art-logo">
                            <h1 id="name-text" class="art-logo-name"><a href="#"><?php echo isset(Yii::app()->params['art-logo-name']) ? Yii::app()->params['art-logo-name'] : Yii::app()->name; ?></a></h1>
                            <div id="slogan-text" class="art-logo-text"><?php echo Yii::app()->params['art-logo-text']; ?></div>
                        </div>
                    </div>
					<div class="art-nav art-nav-inf">
                        <div class="l"></div>
                        <div class="r"></div>
                        <?php $this->widget('application.components.ArtMenu',array(
                            'cls'=>'art-menu',
                            'prelinklabel'=>'<span class="l"></span><span class="r"></span><span class="t">',
                            'postlinklabel'=>'</span>',
                            'items'=>array(
								array('label'=>'Home', 'url'=>array('/site/index')),
								array('label'=>'Propiedades', 'url'=>array('/viewEstates/index'), 'linkOptions'=>array('id'=>'states-menu')),
								array('label'=>'Informacion', 'url'=>array('/site/page', 'view'=>'about'), 'items'=>array(
									array('label'=>'Acerca de..', 'url'=>array('/site/page', 'view'=>'about'), 'linkOptions'=>array('class'=>'submenu-info')),
									array('label'=>'Requisitos Alquilar', 'url'=>array('/site/page', 'view'=>'req'), 'linkOptions'=>array('class'=>'submenu-info')),
									array('label'=>'Preguntas Frecuentes', 'url'=>array('/site/page', 'view'=>'ask'), 'linkOptions'=>array('class'=>'submenu-info')),
									array('label'=>'Servicios', 'url'=>'', 'items'=>array(
										array('label'=>'Tasaciones', 'url'=>array('/site/page', 'view'=>'tas')),
										array('label'=>'Venta y alquiler', 'url'=>array('/site/page', 'view'=>'sale')),
										array('label'=>'Administraciones', 'url'=>array('/site/page', 'view'=>'adm')),
										array('label'=>'Servicios al desarrollador', 'url'=>array('/site/page', 'view'=>'serv'))
									), 'linkOptions'=>array('class'=>'submenu-info', 'id'=>'info-sub-menu'))
								), 'linkOptions'=>array('id'=>'info-menu')),
								array('label'=>'Contacto', 'url'=>array('/site/contact')),
								array('label'=>'Administrar', 'url'=>array('/admin/index'), 'visible'=>!Yii::app()->user->isGuest, 'linkOptions'=>array('id'=>'admin-menu')),
								array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
								array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                            ),
                        )); ?>
                    </div>
                    <div class="art-content-layout">
                        <div class="art-content-layout-row">
                            <!-- removed sidebar HTML and set aside -->
                            <!-- goes before ..."art-layout-cell art-content" in page.html original -->

                            <!-- Main content goes here -->
                            <?php echo $content; ?>
                        </div>
                    </div>

                    <div class="cleared"></div><div class="art-footer">
                        <div class="art-footer-inner">
                            <a href="#" class="art-rss-tag-icon" title="RSS"></a>
                            <div class="art-footer-text">
                                <p>
								<?php echo CHtml::link('Contactenos', array('/site/contact')); ?>
								| 
								<a href="http://www.yiiframework.com/" target="_blank">Yii</a>
								<br /> 
								Copyright &copy; 2012. Filippone Inmobiliaria.
								</p>
                            </div>
                        </div>
                        <div class="art-footer-background"></div>
                    </div>
                    <div class="cleared"></div>
                </div>
            </div>
            <div class="cleared"></div>
        </div>

    </body>
</html>
