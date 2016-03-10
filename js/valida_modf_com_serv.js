function cambia_color_estado(){
	select_cambia_class("estado","color");
}

window.onload = function(){
	document.forms[0].reset;
	document.forms[0].elements[0].focus();
	$('.tlf_formato').mask('9999-9999999');
	document.getElementById("estado").onclick = cambia_color_estado;
}