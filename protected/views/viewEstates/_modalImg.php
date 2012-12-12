
<div id="myModal" class="modal modal-view-est-img hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" title="Cerrar">&times;</button>
    <h3 id="myModalLabel">Imagenes</h3>
  </div>
  <div id="imgBody" class="modal-body">
  
	<?php $this->renderPartial('_carrousel', array('images'=>$images, 'index'=>0)); ?>
	
  </div>
</div>
