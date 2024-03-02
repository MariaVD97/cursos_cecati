<?php

	class ControladorCursos{

		/*--=====================================
				 CREAR CURSOS
		======================================*/
		static public function ctrCrearCurso(){

			if(isset($_POST["nuevoCurso"])){

				if (preg_match('/^[.,a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoCurso"]) &&
					preg_match('/^[.a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoDocente"]) &&
					preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaEspecialidad"]) &&
					//preg_match('/^[\.\0-9 ]+$/', $_POST["nuevaFechaInicio"]) &&
					//preg_match('/^[\.\0-9 ]+$/', $_POST["nuevaFechaTerminacion"]) &&
					preg_match('/^[.,a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoDia"]) &&
					preg_match('/^[.:a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoHorario"]) &&
					preg_match('/^[.a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ$ ]+$/', $_POST["nuevoCosto"]) &&
					preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaModalidad"]) &&
					preg_match('/^[.º""a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoGrupo"]) &&
					preg_match('/^[#a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoIngresado"]) &&
					preg_match('/^[#a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoEgresado"]) &&
					preg_match('/^[.,a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaObservacion"]) &&
					preg_match('/^[.a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoPeriodo"]) ) {

						$tabla = "curso";

						$datos = array("nombre"=>$_POST["nuevoCurso"],
										"docente"=>$_POST["nuevoDocente"],
										"especialidad"=>$_POST["nuevaEspecialidad"],
										"fecha_inicio"=>$_POST["nuevaFechaInicio"],
										"fecha_terminacion"=>$_POST["nuevaFechaTerminacion"],
										"dias"=>$_POST["nuevoDia"],
										"horario"=>$_POST["nuevoHorario"],
										"costo"=>$_POST["nuevoCosto"],
										"modalidad"=>$_POST["nuevaModalidad"],
										"grupo"=>$_POST["nuevoGrupo"],
										"inscritos"=>$_POST["nuevoIngresado"],
										"egresados"=>$_POST["nuevoEgresado"],
										"observaciones"=>$_POST["nuevaObservacion"],
										"periodo"=>$_POST["nuevoPeriodo"] );

					$respuesta = ModeloCursos::mdlIngresarCurso($tabla, $datos);
					
					if($respuesta == "ok"){

						echo'<script>
	
						swal({
							  type: "success",
							  title: "El curso ha sido guardado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {
	
										window.location = "curso";
	
										}
									})
	
						</script>';
	
					}
					
				}else{

					echo'<script>

					swal({
						  type: "error",
						  title: "¡El curso no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "curso";

							}
						})

			  	</script>';

				}

			}

		}

		/*--=====================================
				 MOSTRAR  CURSOS
		======================================*/

		static public function ctrMostrarCursos($item, $valor){

			$tabla = "curso";

			$respuesta = ModeloCursos::mdlMostrarCursos($tabla, $item, $valor);

			return $respuesta;
			

		}		

		/*--=====================================
				 EDITAR  CURSO
		======================================*/

		static public function ctrEditarCurso(){

			if(isset($_POST["editarCurso"])){

				if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCurso"]) &&
					preg_match('/^[.a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDocente"]) &&
					preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarEspecialidad"]) &&
					//preg_match('/^[\.\0-9 ]+$/', $_POST["editarFechaInicio"]) &&
					//preg_match('/^[\.\0-9 ]+$/', $_POST["editarFechaTerminacion"]) &&
					preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDia"]) &&
					preg_match('/^[.a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ: ]+$/', $_POST["editarHorario"]) &&
					preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ$ ]+$/', $_POST["editarCosto"]) &&
					preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarModalidad"]) &&
					preg_match('/^[º""a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarGrupo"]) &&
					preg_match('/^[#a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarIngresado"]) &&
					preg_match('/^[#a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarEgresado"]) &&
					preg_match('/^[.,a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarObservacion"]) &&
					preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarPeriodo"]) ) {

						$tabla = "curso";

						$datos = array("id"=>$_POST["idCurso"],
										"nombre"=>$_POST["editarCurso"],
										"docente"=>$_POST["editarDocente"],
										"especialidad"=>$_POST["editarEspecialidad"],
										"fecha_inicio"=>$_POST["editarFechaInicio"],
										"fecha_terminacion"=>$_POST["editarFechaTerminacion"],
										"dias"=>$_POST["editarDia"],
										"horario"=>$_POST["editarHorario"],
										"costo"=>$_POST["editarCosto"],
										"modalidad"=>$_POST["editarModalidad"],
										"grupo"=>$_POST["editarGrupo"],
										"inscritos"=>$_POST["editarIngresado"],
										"egresados"=>$_POST["editarEgresado"],
										"observaciones"=>$_POST["editarObservacion"],
										"periodo"=>$_POST["editarPeriodo"] );

					$respuesta = ModeloCursos::mdlEditarCurso($tabla, $datos);
					
					if($respuesta == "ok"){

						echo'<script>
	
						swal({
							  type: "success",
							  title: "El curso ha sido cambiado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {
	
										window.location = "curso";
	
										}
									})
	
						</script>';
	
					}
					
				}else{

					echo'<script>

					swal({
						  type: "error",
						  title: "¡El curso no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "curso";

							}
						})

			  	</script>';

				}

			}

		}


		/*--=====================================
				 ELIMINAR  CURSO
		======================================*/
		static public function ctrEliminarCurso(){

			if(isset($_GET["idCurso"])){

				$tabla = "curso";
				$datos = $_GET["idCurso"];

				$respuesta = ModeloCursos::mdlEliminarCurso($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El curso ha sido borrado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "curso";

									}
								})

					</script>';

				}




			}


		}


	}