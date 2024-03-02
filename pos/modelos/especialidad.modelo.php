<?php

require_once "conexion.php";

class ModeloEspecialidad{

	/*=============================================
				CREAR ESPECIALIDAD
	=============================================*/

	static public function mdlIngresarEspecialidad($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(especialidad) VALUES (:especialidad)");

		$stmt->bindParam(":especialidad", $datos, PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
			MOSTRAR ESPECIALIDAD
	=============================================*/

	static public function mdlMostrarEspecialidad($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
				EDITAR ESPECIALIDAD
	=============================================*/

	static public function mdlEditarEspecialidad($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET especialidad = :especialidad WHERE id = :id");

		$stmt -> bindParam(":especialidad", $datos["especialidad"], PDO::PARAM_STR);

		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
			BORRAR ESPECIALIDAD
	=============================================*/

	static public function mdlBorrarEspecialidad($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

}

