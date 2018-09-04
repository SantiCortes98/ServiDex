
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Administrador Servicios
            <small>Panel de Control </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">

            <div class="box-header with-border">
                <a href="crear-servicios">
                    <button class="btn btn-primary">

                        Agregar Servicios

                    </button>
                </a>

                <button type="button" class="btn btn-default pull-right" id="daterange-btn">

                    <span>
                        <i class="fa fa-calendar"></i> Rango de fecha
                    </span>

                    <i class="fa fa-caret-down"></i>

                </button>
            </div>

            <div class="box-body">

                <!--ENTRADA PARA EL NOMBRE-->

                <table class="table table-bordered table-striped dt-responsive tablas">
                    <thead>
                        <tr>

                            <th style="width:10px ">#</th>
                            <th>Codigo factura</th>
                            <th>Cliente</th>
                            <th>Tecnico</th>
                            <th>Nombre tecnico</th>
                            <th>Fecha de la Incidencia</th>
                            <th>Acciones</th>

                        </tr>

                    </thead

                    <tbody>

                        <?php
                        if (isset($_GET["fechaInicial"])) {

                            $fechaInicial = $_GET["fechaInicial"];
                            $fechaFinal = $_GET["fechaFinal"];
                        } else {

                            $fechaInicial = null;
                            $fechaFinal = null;
                        }

                        $respuesta = ControladorServicios::ctrRangoFechasServicios($fechaInicial, $fechaFinal);


                        foreach ($respuesta as $key => $value) {
                            echo ' <tr>
                                
                            <td>' . ($key + 1) . '</td>
                            <td>' . $value["codigo"] . '</td>';

                            $itemCliente = "id";
                            $valorCliente = $value["id_cliente"];

                            $respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

                            echo '<td>' . $respuestaCliente["nombre"] . '</td>';

                            $itemPerfil = "id";
                            $valorPeril = $value["id_perfil"];

                            $respuestaPerfil = ControladorUsuarios::ctrMostarUsuarios($itemPerfil, $valorPeril);

                            echo '<td>' . $respuestaPerfil["perfil"] . '</td>';


                            $itemTecnico = "id";
                            $valorTecnico = $value["id_tecnico"];

                            $respuetaTecnico = ControladorUsuarios::ctrMostarUsuarios($itemTecnico, $valorTecnico);

                            echo '<td>' . $respuetaTecnico["nombre"] . '</td>
                                
                            <td>' . $value["fecha"] . '</td>
                                
                            <td>
                                    <div class="btn-group">
                                        <button class="btn btn-info btnImprimirServicio" codigoServicio="' . $value["codigo"] . '">
                                            <i class="fa fa-print"></i>
                                            </button>
                                        <a href="index.php?ruta=editar-servicios&idServicio=' . $value["id"] . ' 
                                    "<button class="btn btn-warning"><i class="fa fa-pencil"></i></button></a>';
                                        
                            if ($_SESSION["perfil"] == "Administrador") {
                                        echo '<button class="btn btn-danger"><i class="fa fa-times"></i></button>
                                                </div>';
                                   }    

                           echo '</td>
                            
                            </tr>';
                        }
                        ?>

                    </tbody>


                </table>
            </div>
        </div>
    </section>
</div>

