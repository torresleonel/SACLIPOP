/*++++++++++++++++++++++++++++++------------+++++++++++VALIDA FUNCIONES PARA BITACORA++++++++++---------------++++++++++++++++++++++++*/

function manejador_carga(){
	var user = document.getElementById("u").value;
	var mes = document.getElementById("mes");
	var ano = document.getElementById("ano");
	if (mes.value == "") {
		mes.selectedIndex = 0;
		var campo = mes.value;
	}
	if (ano.value == "") {
		ano.selectedIndex = 0;
		var campo = ano.value;
	}
	var variables = "u="+user+"&m="+mes.value+"&a="+ano.value;
	carga_documento(campo,"tabla_bitacora","tabla_bitacora.php",variables);
}



window.onload = function(){
	document.forms[0].reset;
	document.forms[0].elements[0].focus();
	document.getElementById("u").onchange = manejador_carga;
	document.getElementById("mes").onchange = manejador_carga;
	document.getElementById("ano").onchange = manejador_carga;
}