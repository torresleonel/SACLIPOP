/*+++++++++++++++---------------------++++++++++++++FUNCIONES PARA OCULTAR DIV/ MOSTRAR DIV/ CAMBIAR CLASS++++++++++++++-------------------------------+++++++++++++++++++++*/

function select_cambia_class(id1,id2){
	var opciones = document.getElementById(id1);
	var indice = opciones.selectedIndex;
	if(indice == 0){
		document.getElementById(id2).className = "activo";   // SE CAMBIA EL NOMBRE DE LA CLASS PERTENECIENTE AL SPAN DEL COLOR DE ESTADO
	}else{
		document.getElementById(id2).className = "inactivo";   // SE CAMBIA EL NOMBRE DE LA CLASS PERTENECIENTE AL SPAN DEL COLOR DE ESTADO
	}
}
/*+++++++++++++++---------------------++++++++++++++FUNCIONES DOM++++++++++++++-------------------------------+++++++++++++++++++++*/
function clonar(id){
	alert("entre en clonar");
	var div = document.getElementById(id);
	alert("clonar antes de cloneNode");
	var nuevoDiv = div.cloneNode(true);
	alert("clonar antes de appendChild");
	div.parentNode.appendChild(nuevoDiv);
}

function eliminar(id,mens){
	if(confirm(mens)){
		var div = document.getElementById(id);
		div.parentNode.removeChild(div);
	}
}

 
/*+++++++++++++++---------------------++++++++++++++FUNCIONES DE VALIDACION++++++++++++++-------------------------------+++++++++++++++++++++*/


//FUNCION PARA VALIDAR CAMPO REQUERIDO ALFANUMERICO
function valida_requerido(id,mensaje){
	var campo = document.getElementById(id);
	if(campo.value =='' || campo.value == null || /^\s+$/.test(campo.value)){
		alert(mensaje);
		campo.value="";
		campo.focus();
		return false;
	}else{
		return true;
	}


}

/*+++++++++++++++---------------------++++++++++++++FUNCIONES DE VERIFICACION Y SUBMIT++++++++++++++-------------------------------+++++++++++++++++++++*/


//FUNCION PARA ENVIAR A ELIMINAR
function envia_elim(id){
	if(confirm("¿Está seguro que desea eliminar el usuario <<"+id+">>?")) window.location.href="elim_usuario_b.php?usuario="+id;
}

function envia_elim_bd(id){
	if(confirm("¿Está seguro que desea eliminar el archivo <<"+id+">>?")) window.location.href="borrar_respld.php?a="+id;
}

function envia_elim(id){
	if(confirm("¿Está seguro que desea eliminar el dia feriado <<"+id+">>?"))
		window.location.href="eliminar_feriado.php?f="+id;
}

function envia_restaura_bd(id){
	if(confirm("¿Está seguro que desea restaurar el archivo <<"+id+">>?")) window.location.href="restaura_bd.php?a="+id;
}

//FUNCION PARA ENVIAR A CALCULAR SALARIO Y/O MODIFICAR SUELDO MENSUAL INDIVIDUAL
function envia_calc_salr(suld,ced){
	if (suld == 0) window.location.href="modf_suld_indv.php?c="+ced;
	else window.location.href="calc_salario_b.php?c="+ced;
}


//+++++++++++++++---------------------++++++++++++++ FUNCIONES DE BUSQUEDA +++++++++++++++---------------------++++++++++++++


function carga_documento(campo,div,doc,variables){
	if(campo==''){
		document.getElementById(div).innerHTML="";
		return;
	}
	var xmlhttp;
	if (window.XMLHttpRequest){
		//para IE7+, Firefox, Chrome, Opera, Safari
		var xmlhttp=new XMLHttpRequest();
	}else{
		//para IE6, IE5
		var xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById(div).innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("POST",doc,true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send(variables);
}


//+++++++++++++++---------------------++++++++++++++ FUNCIONES DE IMPRESION +++++++++++++++---------------------++++++++++++++

function impr_div(div){
	var reporte = document.getElementById(div);
	var ventana = window.open(' ', '_blank');
	ventana.document.write(reporte.innerHTML);
	ventana.document.close();
	var css = ventana.document.createElement("link");
	css.setAttribute("href", "../../css/reporte.css");
	css.setAttribute("rel", "stylesheet");
	css.setAttribute("type", "text/css");
	ventana.document.head.appendChild(css);
	ventana.print();
	ventana.close();
}