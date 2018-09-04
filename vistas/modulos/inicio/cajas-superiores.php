<?php

$item = null;
$valor = null;
$orden = "id";

$servicios = ControladorServicios::ctrSumarTotalServicios();

$incidencias = ControladorIncidencias::ctrMostrarIncidencias($item, $valor, $orden);
//Cuenta el  total de las filas de la tabla incidencias
$totalIncidencias = count($incidencias);

$clientes = ControladorClientes::ctrMostrarClientes($item, $valor);
$totalClientes = count($clientes);

$usuarios = ControladorUsuarios::ctrMostarUsuarios($item, $valor);
$totalUsuarios = count($usuarios);
 

?>

<div class="col-lg-3 col-xs-6">
    
    <div class="small-box bg-aqua">
        <div class="inner">
            <h3><?php echo number_format($servicios["total"]); ?></h3>

            <p>Inicidencias</p>
        </div>
        <div class="icon">
            <i class="ion ion-android-laptop"></i>
        </div>
        <a href="servicios" class="small-box-footer">Mas info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
</div>

<div class="col-lg-3 col-xs-6">

    <div class="small-box bg-green">
        
        <div class="inner">
            
            <h3><?php echo number_format($totalIncidencias) ?></h3>

            <p>Servicios</p>
        </div>
        <div class="icon">
            <i class="ion ion-clipboard"></i>
        </div>
        <a href="incidencias" class="small-box-footer">Mas info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
</div>

<div class="col-lg-3 col-xs-6">

    <div class="small-box bg-yellow">
        <div class="inner">
            <h3><?php echo number_format($totalClientes); ?></h3>

            <p>Empleados</p>
        </div>
        <div class="icon">
            <i class="ion ion-person-add"></i>
        </div>
        <a href="clientes" class="small-box-footer">Mas info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
</div>


<div class="col-lg-3 col-xs-6">
    
    <div class="small-box bg-red">
        <div class="inner">
            <h3><?php echo number_format($totalUsuarios); ?></h3>

            <p>Usuarios</p>
        </div>
        <div class="icon">
            <i class="ion ion-person-stalker"></i>
        </div>
        <a href="usuarios" class="small-box-footer">Mas info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
</div>
