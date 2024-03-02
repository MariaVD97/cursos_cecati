<?php

	require_once "conexion.php";


	class ModeloCursos{

		/*=============================================
				CREAR CURSOS
		=============================================*/

		static public function mdlIngresarCurso($tabla, $datos){


			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, docente, especialidad, fecha_inicio, 
			fecha_terminacion, dias, horario, costo, modalidad, grupo, inscritos, egresados, observaciones, periodo) VALUES

			 (:nombre, :docente, :especialidad, :fecha_inicio, :fecha_terminacion, :dias, :horario, :costo, 
			 :modalidad, :grupo, :inscritos, :egresados, :observaciones, :periodo)");

			$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
			$stmt->bindParam(":docente", $datos["docente"], PDO::PARAM_STR);
			$stmt->bindParam(":especialidad", $datos["especialidad"], PDO::PARAM_STR);
			$stmt->bindParam(":fecha_inicio", $datos["fecha_inicio"], PDO::PARAM_STR);
			$stmt->bindParam(":fecha_terminacion", $datos["fecha_terminacion"], PDO::PARAM_STR);
			$stmt->bindParam(":dias", $datos["dias"], PDO::PARAM_STR);
			$stmt->bindParam(":horario", $datos["horario"], PDO::PARAM_STR);
			$stmt->bindParam(":costo", $datos["costo"], PDO::PARAM_STR);
			$stmt->bindParam(":modalidad", $datos["modalidad"], PDO::PARAM_STR);
			$stmt->bindParam(":grupo", $datos["grupo"], PDO::PARAM_STR);
			$stmt->bindParam(":inscritos", $datos["inscritos"], PDO::PARAM_INT);
			$stmt->bindParam(":egresados", $datos["egresados"], PDO::PARAM_INT);
			$stmt->bindParam(":observaciones", $datos["observaciones"], PDO::PARAM_STR);
			$stmt->bindParam(":periodo", $datos["periodo"], PDO::PARAM_STR);

			if($stmt->execute()){

				return "ok";

			}else{

				return "error";

			}

			$stmt->close();
			$stmt = null;

		}

		/*=============================================
				MOSTRAR CURSOS
		=============================================*/
		static public function mdlMostrarCursos($tabla, $item, $valor){

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
				EDITAR CURSOS
		=============================================*/

		static public function mdlEditarCurso($tabla, $datos){


			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre , docente = :docente, 
			especialidad = :especialidad, fecha_inicio = :fecha_inicio, fecha_terminacion =:fecha_terminacion,
			dias = :dias, horario = :horario, costo = :costo, modalidad = :modalidad, grupo = :grupo, 
			inscritos = :inscritos, egresados = :egresados, observaciones =:observaciones, periodo =:periodo WHERE id = :id");

			$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
			$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
			$stmt->bindParam(":docente", $datos["docente"], PDO::PARAM_STR);
			$stmt->bindParam(":especialidad", $datos["especialidad"], PDO::PARAM_STR);
			$stmt->bindParam(":fecha_inicio", $datos["fecha_inicio"], PDO::PARAM_STR);
			$stmt->bindParam(":fecha_terminacion", $datos["fecha_terminacion"], PDO::PARAM_STR);
			$stmt->bindParam(":dias", $datos["dias"], PDO::PARAM_STR);
			$stmt->bindParam(":horario", $datos["horario"], PDO::PARAM_STR);
			$stmt->bindParam(":costo", $datos["costo"], PDO::PARAM_STR);
			$stmt->bindParam(":modalidad", $datos["modalidad"], PDO::PARAM_STR);
			$stmt->bindParam(":grupo", $datos["grupo"], PDO::PARAM_STR);
			$stmt->bindParam(":inscritos", $datos["inscritos"], PDO::PARAM_INT);
			$stmt->bindParam(":egresados", $datos["egresados"], PDO::PARAM_INT);
			$stmt->bindParam(":observaciones", $datos["observaciones"], PDO::PARAM_STR);
			$stmt->bindParam(":periodo", $datos["periodo"], PDO::PARAM_STR);

			if($stmt->execute()){

				return "ok";

			}else{

				return "error";

			}

			$stmt->close();
			$stmt = null;

		}

	/*=============================================
			ELIMINAR CURSO
	=============================================*/

			static public function mdlEliminarCurso($tabla, $datos){

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
	
	
	
	
	
	
	
	
	
	
	
	