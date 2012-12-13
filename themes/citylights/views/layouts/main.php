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
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" type="text/css" media="screen, projection" />
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/form.css" type="text/css" media="screen, projection" />
        <!--[if IE 6]><link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.ie6.css" type="text/css" media="screen" /><![endif]-->
        <!--[if IE 7]><link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.ie7.css" type="text/css" media="screen" /><![endif]-->
		
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/app.css" />

        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/css/script.js"></script>
		<?php
		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/bootstrap.js'); 
		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/app.js'); 
		Yii::app()->clientScript->registerCoreScript('jquery');
	?>
    </head>
    <body>
		<!--
        <div id="art-page-background-simple-gradient">
            <div id="art-page-background-gradient"></div>
        </div>
        <div id="art-page-background-glare">
            <div id="art-page-background-glare-image"></div>
        </div>
		-->
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
								array('label'=>'Acerca de..', 'url'=>array('/site/page', 'view'=>'about')),
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
                                <p><a href="#">Contact Us</a> | <a href="#">Terms of Use</a> | <a href="#">Trademarks</a>
                                    | <a href="#">Privacy Statement</a><br />
                                    Copyright &copy; 2010 ---. All Rights Reserved.</p>
                            </div>
                        </div>
                        <div class="art-footer-background"></div>
                    </div>
                    <div class="cleared"></div>
                </div>
            </div>
            <div class="cleared"></div>
            <p class="art-page-footer"><a href="http://www.artisteer.com/">Web Template</a> created with Artisteer.</p>
        </div>

    </body>
</html>
