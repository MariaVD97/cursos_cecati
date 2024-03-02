/*=============================================
		EDITAR ESPECIALIDAD
=============================================*/
$(".tablas").on("click", ".btnEditarEspecialidad", function(){

	var idEspecialidad = $(this).attr("idEspecialidad");

	var datos = new FormData();
	datos.append("idEspecialidad", idEspecialidad);

	$.ajax({
		url: "ajax/especialidad.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

     		$("#editarEspecialidad").val(respuesta["especialidad"]);
     		$("#idEspecialidad").val(respuesta["id"]);

     	}

	})


})

/*=============================================
		ELIMINAR CATEGORIA
=============================================*/
$(".tablas").on("click", ".btnEliminarEspecialidad", function(){

	 var idEspecialidad = $(this).attr("idEspecialidad");

	 swal({
	 	title: '¿Está seguro de borrar la especialidad?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar especialidad!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=especialidad&idEspecialidad="+idEspecialidad;

	 	}

	 })

})