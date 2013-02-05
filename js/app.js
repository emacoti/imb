var attid = 1;

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

function testConnection() {

	var a=navigator.onLine;
	if(a){
		var xx= jQuery('.view-estate .map').css('display','block');
		var yy= jQuery('.view-estate .no_map').css('display','none');
	}else{
	}
}

function deleteimg(url)
{
	var req = new XMLHttpRequest();
	req.open("GET", url, true);
	req.send();
}

function cortarYRedimensionar(){

	var datos='x1='+document.getElementById("x1").value+'&y1='+document.getElementById("y1").value+'&x2='+document.getElementById("x2").value+'&y2='+document.getElementById("y2").value+'&nomimg='+document.getElementById("nomimg").value+'&tipo='+document.getElementById("tipo").value;

	$.ajax({
	type: "POST",
	url: docrot + "/estates/resize",
	data: datos,
	dataType:   "json",
	success: function(data) {
		if(data.success){}
		else
		{
			alert("Error: Por favor intente nuevamente.");	
		}
	}
	});
}

function deleteimg2(nombre)
{
	var url = "";
	var ele = document.getElementById("accion");
	if(ele.value == 'update')
		url = "../../borrarArchivo/nombre/" + nombre;
	else
		url = "./borrarArchivo/nombre/" + nombre;
	var req = new XMLHttpRequest();
	req.open("GET", url, true);
	req.send();
}

function deleteli(id)
{
	var elem = document.getElementById(id);
	elem.parentNode.removeChild(elem);
}

function borrarli(id)
{
	var elem = document.getElementsByName(id)[0];
	elem.parentNode.removeChild(elem);
}

function reloadImg(id) {
   var obj = document.getElementById(id);
   var src = obj.src;
   var pos = src.indexOf('?');
   if (pos >= 0) {
      src = src.substr(0, pos);
   }
   var date = new Date();
   obj.src = src + '?v=' + date.getTime();
   return false;
}

function agregarAtributo()
{
	var elem = document.getElementById("att");
	
	var newp = document.createElement('p');
	newp.setAttribute('id','litem' + attid);
	
	var input1 = document.createElement('input');
	input1.setAttribute('class','atributos');
	input1.setAttribute('type','text');
	input1.setAttribute('name','nombre' + attid);
	input1.setAttribute('size','5');
	
	var strong1 = document.createElement('strong');
	strong1.innerHTML = '&nbsp;';
	
	var strong2 = document.createElement('strong');
	strong2.innerHTML = '&nbsp;';
	
	var input2 = document.createElement('input');
	input2.setAttribute('class','atributos');
	input2.setAttribute('type','text');
	input2.setAttribute('name','valor' + attid);
	input2.setAttribute('size','5');
	
	var aref = document.createElement('a');
	aref.setAttribute('href','#');
	aref.setAttribute('onclick','deleteli(\"litem'+attid+'\")');
	aref.innerHTML = 'Borrar';
	
	attid++;
	
	newp.appendChild(input1);
	newp.appendChild(strong1);
	newp.appendChild(input2);
	newp.appendChild(strong2);
	newp.appendChild(aref);
	
	elem.appendChild(newp);
}

function reiniciar()
{
	document.getElementById("x1").value = 0;
	document.getElementById("y1").value = 0;
	document.getElementById("x2").value = 0;
	document.getElementById("y2").value = 0;
	$("#imgedit").imgAreaSelect({remove:true});
	$("#imgedit").imgAreaSelect({remove:true});
	$("#imgedit").imgAreaSelect({remove:true});
}