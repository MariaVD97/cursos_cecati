<?php

require_once "../controladores/especialidad.controlador.php";
require_once "../modelos/especialidad.modelo.php";

class AjaxEspecialidad{

	/*=============================================
				EDITAR ESPECIALIDAD
	=============================================*/	

	public $idEspecialidad;

	public function ajaxEditarEspecialidad(){

		$item = "id";
		$valor = $this->idEspecialidad;

		$respuesta = ControladorEspecialidad::ctrMostrarEspecialidad($item, $valor);

		echo json_encode($respuesta);

	}
}

		/*=============================================
				EDITAR ESPECIALIDAD
		=============================================*/	
		if(isset($_POST["idEspecialidad"])){

			$especialidad = new AjaxEspecialidad();
			$especialidad -> idEspecialidad = $_POST["idEspecialidad"];
			$especialidad -> ajaxEditarEspecialidad();
		}
