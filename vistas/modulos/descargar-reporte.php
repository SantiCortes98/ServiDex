<?php

require_once '../../controladores/servicios.controlador.php';
require_once '../../modelos/servicios.modelo.php';
require_once '../../controladores/clientes.controlador.php';
require_once '../../modelos/clientes.modelo.php';
require_once '../../controladores/usuarios.controlador.php';
require_once '../../modelos/usuarios.modelo.php';
require_once '../../controladores/incidencias.controlador.php';
require_once '../../modelos/incidencias.modelo.php';

$reporte = new ControladorServicios();
$reporte->ctrDescargarReporte();
