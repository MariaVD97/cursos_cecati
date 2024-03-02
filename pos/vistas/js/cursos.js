	/*=============================================
			EDITAR CURSO
	=============================================*/
	$(".tablas").on("click", ".btnEditarCurso", function(){

		var idCurso = $(this).attr("idCurso");

		var datos = new FormData();
		datos.append("idCurso", idCurso);

		$.ajax({
			url: "ajax/cursos.ajax.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			dataType:"json",
			success: function(respuesta){

				$("#idCurso").val(respuesta["id"]);
				$("#editarCurso").val(respuesta["nombre"]);
				$("#editarDocente").val(respuesta["docente"]);
				$("#editarEspecialidad").val(respuesta["especialidad"]);
				$("#editarFechaInicio").val(respuesta["fecha_inicio"]);
				$("#editarFechaTerminacion").val(respuesta["fecha_terminacion"]);
				$("#editarDia").val(respuesta["dias"]);
				$("#editarHorario").val(respuesta["horario"]);
				$("#editarCosto").val(respuesta["costo"]);
				$("#editarModalidad").val(respuesta["modalidad"]);
				$("#editarGrupo").val(respuesta["grupo"]);
				$("#editarIngresado").val(respuesta["inscritos"]);
				$("#editarEgresado").val(respuesta["egresados"]);
				$("#editarObservacion").val(respuesta["observaciones"]);
				$("#editarPeriodo").val(respuesta["periodo"]);



			}

		})


	})

/*=============================================
		ELIMINAR CURSO
=============================================*/
$(".tablas").on("click", ".btnEliminarCurso", function(){

	 var idCurso= $(this).attr("idCurso");

	 swal({
	 	title: '¿Está seguro de borrar el Curso?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar curso!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=curso&idCurso="+idCurso;

	 	}

	 })

})