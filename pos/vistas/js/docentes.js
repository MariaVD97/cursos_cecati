	/*=============================================
			EDITAR DOCENTES
	=============================================*/
	$(".tablas").on("click", ".btnEditarDocente", function(){

		var idDocente = $(this).attr("idDocente");

		var datos = new FormData();
		datos.append("idDocente", idDocente);

		$.ajax({
			url: "ajax/docentes.ajax.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			dataType:"json",
			success: function(respuesta){

				$("#idDocente").val(respuesta["id"]);
				$("#editarDocente").val(respuesta["nombre"]);
				$("#editarApellidoPaterno").val(respuesta["apellido_paterno"]);
				$("#editarApellidoMaterno").val(respuesta["apellido_materno"]);
				$("#editarEspecialidad").val(respuesta["especialidad"]);


			}

		})


	})

/*=============================================
		ELIMINAR DOCENTE
=============================================*/
$(".tablas").on("click", ".btnEliminarDocente", function(){

	 var idDocente = $(this).attr("idDocente");

	 swal({
	 	title: '¿Está seguro de borrar el Docente?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar docente!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=docentes&idDocente="+idDocente;

	 	}

	 })

})