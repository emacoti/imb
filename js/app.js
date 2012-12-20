
function hideCollapsePanel(panelId) {
		
	jQuery('#' + panelId).collapse('hide');
}

function setMarginImages() {
	
	// agregado timeout para dar tiempo a renderizar
	// imagenes y que su tamaño este seteado
	setTimeout(function() {
	
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
	}, 200);
}

function setBackDropClass(styleClass) {
		
	jQuery('.modal-backdrop').addClass(styleClass);
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

function test() {

	jQuery.ajax({
	url : 'http://google.com.ar',
	type : 'GET',
	error: function() {
       alert("Connection active!");
	   var xx= jQuery('.view-estate .map').css('display','none');
	   var yy= jQuery('.view-estate .no_map').css('display','block');
	},
	});
}