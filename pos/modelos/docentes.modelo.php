<?php

	require_once "conexion.php";


	class ModeloDocentes{

		/*=============================================
				CREAR DOCENTE
		=============================================*/

		static public function mdlIngresarDocente($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, apellido_paterno, apellido_materno, especialidad)
			VALUES (:nombre, :apellido_paterno, :apellido_materno, :especialidad)");

			$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
			$stmt->bindParam(":apellido_paterno", $datos["apellido_paterno"], PDO::PARAM_STR);
			$stmt->bindParam(":apellido_materno", $datos["apellido_materno"], PDO::PARAM_STR);
			$stmt->bindParam(":especialidad", $datos["especialidad"], PDO::PARAM_STR);

			if($stmt->execute()){

				return "ok";

			}else{

				return "error";

			}

			$stmt->close();
			$stmt = null;

		}


		/*=============================================
				MOSTRAR DOCENTE
		=============================================*/
		static public function mdlMostrarDocentes($tabla, $item, $valor){

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
				EDITAR DOCENTE
		=============================================*/
		static public function mdlEditarDocente($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, apellido_paterno = :apellido_paterno,
			 apellido_materno = :apellido_materno, especialidad = :especialidad WHERE id = :id");


			$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
			$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
			$stmt->bindParam(":apellido_paterno", $datos["apellido_paterno"], PDO::PARAM_STR);
			$stmt->bindParam(":apellido_materno", $datos["apellido_materno"], PDO::PARAM_STR);
			$stmt->bindParam(":especialidad", $datos["especialidad"], PDO::PARAM_STR);

			if($stmt->execute()){

				return "ok";

			}else{

				return "error";

			}

			$stmt->close();
			$stmt = null;

		}


	/*=============================================
			ELIMINAR DOCENTE
	=============================================*/

	static public function mdlEliminarDocente($tabla, $datos){

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


