<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/especialidad.controlador.php";
require_once "controladores/docentes.controlador.php";
require_once "controladores/cursos.controlador.php";

require_once "modelos/usuarios.modelo.php";
require_once "modelos/especialidad.modelo.php";
require_once "modelos/docentes.modelo.php";
require_once "modelos/cursos.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();