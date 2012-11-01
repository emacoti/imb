
<div class="accordion" id="filters">
  <div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#filters" href="#filtersBody">
        Filtros
      </a>
    </div>
    <div id="filtersBody" class="accordion-body collapse in">
      <div class="accordion-inner">
        <div class="control-group">
			<label class="control-label" for="selRubro">Rubro</label>
			<div class="controls">
			<select id="selRubro">
				<option value="1">eliga</option>
			</select>
			</div>
		</div>
      </div>
    </div>
  </div>
</div>

<h1>Propiedades: Todas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>