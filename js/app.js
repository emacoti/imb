
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