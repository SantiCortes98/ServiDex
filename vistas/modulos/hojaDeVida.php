<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Administrador Hoja de Vida
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

                <a href="crear-hoja"><button class='btn btn-primary' >Agregar Hoja de Vida</button> </a>


            </div>
            <div class="box-body">

                <!--ENTRADA PARA EL NOMBRE-->

                <table class="table table-bordered table-striped dt-responsive tablas">
                    <thead>
                        <tr>

                            <th style="width:10px ">#</th>
                            <th>Nombre Empleado</th>
                            <th>Nombre del Aparato</th>
                            <th>Marca</th>
                            <th>Estado del Aparato</th>
                            <th>Licencia</th>
                            <th>Nombre Tecnico</th>
                            <th>Tipo de Tecnico</th>
                            <th>Fecha</th>
                            <th>Acciones</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php
                        $item = null;
                        $valor = null;

                        $respuesta = ControladorhojaDeVida::ctrMostrarHojasDeVida($item, $valor);

                        foreach ($respuesta as $key => $value) {
                            echo '<tr>
                            
                           <td>' . ($key + 1) . '</td>';

                            $itemCliente = "id";
                            $valorCliente = $value["id_cliente"];

                            $respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

                            echo '<td>' . $respuestaCliente["nombre"] . '</td>
                                     <td>' . $value["nom_aparato"] . '</td>
                                     <td>' . $value["marca"] . '</td>
                                     <td>' . $value["estado_aparato"] . '</td>
                                     <td>' . $value["licencia"] . '</td>
                                      <td>' . $value["fecha"] . '</td>';

                            $valorItemUsuario = "id";
                            $valorUsuario = $value["id_us"];

                            $respuestaUsuario = ControladorUsuarios::ctrMostarUsuarios($valorItemUsuario, $valorUsuario);

                            echo '<td>' . $respuestaUsuario["nombre"] . '</td>';

                            $itemPerfil = "id";
                            $valorPeril = $value["id_perfil"];

                            $respuestaPerfil = ControladorUsuarios::ctrMostarUsuarios($itemPerfil, $valorPeril);

                            echo '<td>' . $respuestaPerfil["perfil"] . '</td>
                            <td>' . $value["fecha"] . '</td>
                                    
                          <td>

                                <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>';
                            
                            if ($_SESSION["perfil"] == "Administrador") {
                                
                        
                               echo ' <button class="btn btn-danger"><i class="fa fa-times"></i></button>';
                               
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

