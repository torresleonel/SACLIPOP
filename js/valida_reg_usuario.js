/*++++++++++++++------------+++++++++++EVALUA FUNCIONES GENERALES DE VALIDACION PARA REGISTRO DE USUARIO++++++++++---------------++++++++++++++++++*/

function compara(){
	var clave = document.getElementById("clave");
	var rep_clav = document.getElementById("rep_clave");
	if(clave.value != rep_clav.value) rep_clav.setCustomValidity('La clave no coincide con la ingresada anteriormente');
	else rep_clav.setCustomValidity('');
}


window.onload = function(){
	document.forms[0].reset;
	document.forms[0].elements[0].focus();
	document.getElementById("boton").onclick = compara;
}