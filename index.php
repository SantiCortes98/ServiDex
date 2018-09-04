<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/clientes.controlador.php";
require_once "controladores/reportes.controlador.php";
require_once "controladores/categorias.controlador.php";
require_once "controladores/incidencias.controlador.php";
require_once 'controladores/servicios.controlador.php';
require_once 'controladores/hojaDeVida.controlador.php';
require_once 'controladores/componentes.controlador.php';


require_once "modelos/usuarios.modelo.php";
require_once "modelos/clientes.modelo.php";
require_once "modelos/reportes.modelo.php";
require_once "modelos/categorias.modelo.php";
require_once "modelos/incidencias.modelo.php";
require_once 'modelos/servicios.modelo.php';
require_once 'modelos/hojaDeVida.modelo.php';
require_once 'modelos/componentes.modelo.php';

$plantilla = new ControladorPantilla();
$plantilla -> ctrPlantilla();
