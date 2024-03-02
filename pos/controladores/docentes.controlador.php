<?php
	class ControladorDocentes{

		/*--=====================================
				 CREAR DOCENTES
		======================================*/

		static public function ctrCrearDocente(){

			if(isset($_POST["nuevoDocente"])){

				if (preg_match('/^[.a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoDocente"]) &&
					preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoApellidoPaterno"]) &&
					preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoApellidoMaterno"]) &&
					preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaEspecialidad"])) {
					
					$tabla = "docentes";

					$datos = array( "nombre"=>$_POST["nuevoDocente"],
									"apellido_paterno"=>$_POST["nuevoApellidoPaterno"],
									"apellido_materno"=>$_POST["nuevoApellidoMaterno"],
									"especialidad"=>$_POST["nuevaEspecialidad"]);

					$respuesta = ModeloDocentes::mdlIngresarDocente($tabla, $datos);
					
					if($respuesta == "ok"){

						echo'<script>
	
						swal({
							  type: "success",
							  title: "El docente ha sido guardado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {
	
										window.location = "docentes";
	
										}
									})
	
						</script>';
	
					}
				

				}else{


					echo'<script>

					swal({
						  type: "error",
						  title: "¡El docente no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "docentes";

							}
						})

			  	</script>';


				}

			}

		}

		/*--=====================================
				 MOSTRAR  DOCENTES
		======================================*/

		static public function ctrMostrarDocentes($item, $valor){

			$tabla = "docentes";

			$respuesta = ModeloDocentes::mdlMostrarDocentes($tabla, $item, $valor);

			return $respuesta;
			

		}

		/*--=====================================
				 EDITAR  DOCENTES
		======================================*/
		static public function ctrEditarDocente(){

			if(isset($_POST["editarDocente"])){

				if (preg_match('/^[.a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDocente"]) &&
					preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarApellidoPaterno"]) &&
					preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarApellidoMaterno"]) &&
					preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarEspecialidad"])) {
					
					$tabla = "docentes";

					$datos = array( "id"=>$_POST["idDocente"],
									"nombre"=>$_POST["editarDocente"],
									"apellido_paterno"=>$_POST["editarApellidoPaterno"],
									"apellido_materno"=>$_POST["editarApellidoMaterno"],
									"especialidad"=>$_POST["editarEspecialidad"]);

					$respuesta = ModeloDocentes::mdlEditarDocente($tabla, $datos);
					
					if($respuesta == "ok"){

						echo'<script>
	
						swal({
							  type: "success",
							  title: "El docente ha sido cambiado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {
	
										window.location = "docentes";
	
										}
									})
	
						</script>';
	
					}
				

				}else{


					echo'<script>

					swal({
						  type: "error",
						  title: "¡El docente no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "docentes";

							}
						})

			  	</script>';


				}

			}

		}	


		/*--=====================================
				 ELIMINAR  DOCENTES
		======================================*/
		static public function ctrEliminarDocente(){

			if(isset($_GET["idDocente"])){

				$tabla = "docentes";
				$datos = $_GET["idDocente"];

				$respuesta = ModeloDocentes::mdlEliminarDocente($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El docente ha sido borrado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "docentes";

									}
								})

					</script>';

				}




			}


		}


	}

?>