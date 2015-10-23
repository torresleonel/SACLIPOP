/*++++++++++++++------------+++++++++++EVALUA FUNCIONES GENERALES DE VALIDACION PARA INICIO DE SESION++++++++++---------------++++++++++++++++++*/

function valida_sesion(){
	if(!valida_requerido("user", "Debe ingresar su nombre de usuario para acceder al sistema")) return false;
	if(!valida_requerido("pass", "Debe ingresar su contraseña para acceder al sistema")) return false;
}



window.onload = function(){
	document.forms[0].reset;
	document.forms[0].elements[0].focus();
	document.getElementById("boton").onclick = valida_sesion;
}