$(document).ready(function(){/*Cuando el documento este listo, va a accionar */
	$("#idbusqueda").keyup(function(e){ /*Le añade un evento al idbusqueda*/
		if(e.keyCode==13){ /*e es variable de evento, el 13 es un enter, y así lo traduce*/
			search_producto();
		}
	});
});
function search_producto(){ /*Funcion para lanzar una accion */
	window.location.href="busqueda.php?text="+$("#idbusqueda").val(); //Al buscar nos va a mandar los resultados junto con el texto que hemos escrito
}
