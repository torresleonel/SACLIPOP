function impresion(){
	impr_div("ficha");
}


window.onload = function(){
	document.getElementById("boton").onclick = impresion;
}