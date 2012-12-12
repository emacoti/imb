<?php $this->beginContent('//layouts/main'); ?>
<div class="art-layout-cell art-sidebar1">
    <div class="art-block">
        <div class="art-block-body">
            <div class="art-blockcontent">
                <div class="art-blockcontent-body">
                    <!-- block-content -->
                    <div>
                       
					   <div class="span-5 menu-adm">
							<div id="sidebar">
							<?php
								$this->beginWidget('zii.widgets.CPortlet', array(
									'title'=>'Administraci&oacute;n',
								));
								$this->widget('zii.widgets.CMenu', array(
									'items'=>$this->menuAdmin,
									'htmlOptions'=>array('class'=>'operations'),
								));
								$this->endWidget();
							?>
							</div><!-- sidebar -->
						</div>
						
						<div class="span-5">
							<div id="sidebar">
							<?php
								$this->beginWidget('zii.widgets.CPortlet', array(
									'title'=>'Operaciones',
								));
								$this->widget('zii.widgets.CMenu', array(
									'items'=>$this->menu,
									'htmlOptions'=>array('class'=>'operations'),
								));
								$this->endWidget();
							?>
							</div><!-- sidebar -->
						</div>
					   
                    </div>
                    <!-- /block-content -->

                    <div class="cleared"></div>
                </div>
            </div>
            <div class="cleared"></div>
        </div>
    </div>   
</div>
<div class="art-layout-cell art-content">
    <div class="art-post">
        <div class="art-post-tl"></div>
        <div class="art-post-tr"></div>
        <div class="art-post-bl"></div>
        <div class="art-post-br"></div>
        <div class="art-post-tc"></div>
        <div class="art-post-bc"></div>
        <div class="art-post-cl"></div>
        <div class="art-post-cr"></div>
        <div class="art-post-cc"></div>
        <div class="art-post-body">
            <div class="art-post-inner art-article">
                <div class="art-postcontent">
                    <!-- article-content -->
                    <?php echo $content; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endContent(); ?>
