<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Administrador Incidentes
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

                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarIncidencia">

                    Agregar Incidentes

                </button>
            </div>
            <div class="box-body">

                <!--ENTRADA PARA EL NOMBRE-->

                <table class="table table-bordered table-striped dt-responsive tablas">
                    <thead>
                        <tr>

                            <th style="width:10px ">#</th>
                            <th>Codigo</th>
                            <th>Descripcion</th>
                            <th>Categoria</th>
                            <th>Agregado</th>
                            <th>Acciones</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php
                        $item = null;
                        $valor = null;
                        $orden = "id";

                        $incidencias = ControladorIncidencias::ctrMostrarIncidencias($item, $valor, $orden);

                        foreach ($incidencias as $key => $value) {

                            echo '             
                            <tr>
                                <td>' . ($key + 1) . '</td>
                                   <td>' . $value["codigo"] . '</td>
                                 <td>' . $value["descripcion"] . '</td>';

                            $item = "id";
                            $valor = $value["id_categoria"];

                            $categoria = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                            echo '
                                   <td>' . $categoria["categoria"] . '</td>
                                     <td>' . $value["fecha"] . '</td>
                            <td>

                                <button class="btn btn-warning btnEditarIncidencias" idIncidencia="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarIncidencia">
                                    <i class="fa fa-pencil"></i></button>
                                    
                                <button class="btn btn-danger btnEliminarIncidencias" idIncidencia="' . $value["id"] . ' " codigo="' . $value["codigo"] . '">
                                    <i class="fa fa-times"></i></button>

                            </td>

                        </tr>';
                        }
                        ?>

                    </tbody>
                </table>


            </div>
        </div>

    </section>



</div>

<!--VENTANA MODAL INCIDENCIAS-->
<div class="modal fade" id="modalAgregarIncidencia">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">


                <!--CABEZA DEL MODAL -->

                <div class="modal-header" style="background: #3c8dbc; color: white;">

                    <h4 class="modal-title">Agregar Incidente</h4>

                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!--CUERPO DEL MODAL -->

                <div class="modal-body">
                    <div class="box-body">

                        <div class="form-group">
                            <div class="input-group">

                                <!--ENTRADA PARA EL Categoria-->
                                <span class="input-group-addon"><i class="fa fa-list"></i></span>

                                <select name="nuevaCategoria" id="nuevaCategoria" class="form-control input-lg">
                                    <option value="">Seleccionar Categoria</option>

                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $categoria = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                                    foreach ($categoria as $key => $value) {

                                        echo '<option value="' . $value["id"] . '">' . $value["categoria"] . '</option> ';
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="input-group">

                                <!--ENTRADA DE  CODIGO-->

                                <span class="input-group-addon"><i class="fa fa-code"></i></span>
                                <input class="form-control input-lg" type="text" id="nuevoCodigo"  name="nuevoCodigo" placeholder="Ingresar codigo" required="" readonly="">


                                <!--class="form-control input-lg"--> 

                            </div>
                        </div>

                        <div class="form-group">

                            <div class="input-group">

                                <!--ENTRADA DE DESCRIPCION DE LA INCIDENCIA-->

                                <span class="input-group-addon"><i class="fa fa-font"></i></span>
                                <input class="form-control input-lg" type="text" name="nuevaDescripcion" placeholder="Ingresar descripcion" required="">


                                <!--class="form-control input-lg"--> 

                            </div>
                        </div>

                    </div>
                </div>

                <!--PIE DE PAGINA DEL MODAL -->


                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-primary">Guardar Incidente</button>
                </div>



            </form>

            <?php
            $crearincidencia = new ControladorIncidencias();
            $crearincidencia->ctrCrearIncidencia();
            ?>

        </div>
    </div>
</div>

<!--=====================================
MODAL EDITAR CATEGORÍA
======================================-->

<div id="modalEditarIncidencia" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post" >


                <!--CABEZA DEL MODAL -->

                <div class="modal-header" style="background: #3c8dbc; color: white;">

                    <h4 class="modal-title">Editar Incidente</h4>

                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!--CUERPO DEL MODAL -->

                <div class="modal-body">
                    <div class="box-body">

                        <div class="form-group">
                            <div class="input-group">

                                <!--ENTRADA PARA EL Categoria-->
                                <span class="input-group-addon"><i class="fa fa-list"></i></span>

                                <select name="editarCategoria"   class="form-control input-lg" readonly>
                                    <option id="editarCategoria" ><option>


                                </select>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="input-group">

                                <!--ENTRADA DE  CODIGO-->

                                <span class="input-group-addon"><i class="fa fa-code"></i></span>
                                <input class="form-control input-lg" type="text" id="editarCodigo"  name="editarCodigo"  required="" readonly="">


                                <!--class="form-control input-lg"--> 

                            </div>
                        </div>

                        <div class="form-group">

                            <div class="input-group">

                                <!--ENTRADA DE DESCRIPCION DE LA INCIDENCIA-->

                                <span class="input-group-addon"><i class="fa fa-font"></i></span>
                                <input class="form-control input-lg" type="text" name="editarDescripcion" id="editarDescripcion" required="">


                                <!--class="form-control input-lg"--> 

                            </div>
                        </div>

                    </div>
                </div>

                <!--PIE DE PAGINA DEL MODAL -->


                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>


            </form>

            <?php
            $editarIncidencia = new ControladorIncidencias();
            $editarIncidencia->ctrEditarIncidencia();
            ?>


        </div>

    </div>

</div>

<?php
$eliminarIncidencia = new ControladorIncidencias();
$eliminarIncidencia->ctrEliminarIncidencia();
?>

