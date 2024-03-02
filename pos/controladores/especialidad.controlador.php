<?php

class ControladorEspecialidad{

	/*=============================================
				CREAR ESPECIALIDAD
	=============================================*/

	static public function ctrCrearEspecialidad(){ //metodo

		if(isset($_POST["nuevaEspecialidad"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaEspecialidad"])){

				$tabla = "Especialidad";

				$datos = $_POST["nuevaEspecialidad"];

				$respuesta = ModeloEspecialidad::mdlIngresarEspecialidad($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La Especialidad ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "especialidad";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La especialidad no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "especialidad";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
			MOSTRAR CATEGORIAS
	=============================================*/

	static public function ctrMostrarEspecialidad($item, $valor){

		$tabla = "especialidad";

		$respuesta = ModeloEspecialidad::mdlMostrarEspecialidad($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
			EDITAR ESPECIALIDAD
	=============================================*/

	static public function ctrEditarEspecialidad(){

		if(isset($_POST["editarEspecialidad"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarEspecialidad"])){

				$tabla = "especialidad";

				$datos = array("especialidad"=>$_POST["editarEspecialidad"],
							   "id"=>$_POST["idEspecialidad"]);

				$respuesta = ModeloEspecialidad::mdlEditarEspecialidad($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La Especialidad ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "especialidad";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La especialidad no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "especialidad";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
			BORRAR ESPECIALIDAD
	=============================================*/

	static public function ctrBorrarEspecialidad(){

		if(isset($_GET["idEspecialidad"])){

			$tabla ="especialidad";
			$datos = $_GET["idEspecialidad"];

			$respuesta = ModeloEspecialidad::mdlBorrarEspecialidad($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "La especialidad ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "especialidad";

									}
								})

					</script>';
			}
		}
		
	}

	
}
