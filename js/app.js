
function hideCollapsePanel(panelId) {
		
	jQuery('#' + panelId).collapse('hide');
}

function setMarginImages() {
	
	var width= 700;
	var height= 525;
	var xx= jQuery('.modal-view-est-img .carousel .item img');
	
	xx.each(function() {
		
		var h= this.height;
		var w= this.width;
		var img= jQuery(this);
		
		if (w < width) {
			mLeft= (width - w) / 2;
			img.css('margin-left',mLeft);
		}
		
		if (h < height) {
			mTop= (height - h) / 2;
			img.css('margin-top',mTop);
		}
	});
}

function setBackDropClass(styleClass) {
		
	var xx= jQuery('.modal-backdrop');
	xx.addClass(styleClass);
}

/* seteo el menu activo
 * para aquellas pantallas que no se auto
 * setean con el estilo
*/
function setActiveArtMenu(id) {
	jQuery('.art-menu #' + id).first().addClass('active');
}
function setActiveSubArtMenu(id) {
	var activeSubMenu= jQuery('.art-menu #' + id).first().parent().find('li.active');
	if (activeSubMenu.length > 0) {
	
		var parent= activeSubMenu.parent('ul');
		// agrego clase active al item li que contiene al submenu
		parent.prev('a#info-sub-menu').parent('li').addClass('active');
	}
}