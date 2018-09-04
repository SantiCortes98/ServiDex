<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Administrador Usuario
            <small>Panel de Control </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box">
            <div class="box-header with-border">

                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">

                    Agregar Usuario

                </button>
            </div>
            <div class="box-body">

                <!--ENTRADA PARA EL NOMBRE-->

                <table class="table table-bordered table-striped dt-responsive tablas" style="width: 100%">
                    <thead>
                        <tr>

                            <th style="width:10px ">#</th>
                            <th>Nombre</th>
                            <th>Usuario</th>
                            <th>Foto</th>
                            <th>Perfil</th>
                            <th>Estado</th>
                            <th>Ultimo Login</th>
                            <th>Acciones</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php
                        $item = null;
                        $valor = null;

                        $usuario = ControladorUsuarios::ctrMostarUsuarios($item, $valor);

                        foreach ($usuario as $key => $value) {
                            echo
                            '<tr>
                                  <td>' . ($key + 1) . '</td>
                                   <td>' . $value["nombre"] . '</td>
                                   <td>' . $value["usuario"] . '</td>';

                            if ($value["foto"] != " ") {

                                echo '<td><img src="' . $value["foto"] . '" class="img-thumbnail" width="40px"></td>';
                            } else {

                                echo '<td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>';
                            }

                            echo '<td>' . $value["perfil"] . '</td>';


                            if ($value["estado"] != 0) {

                                echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="' . $value["id"] . '"'
                                . ' estadoUsuario="0">Activado</button></td>';
                            } else {
                                echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="' . $value["id"] . '" '
                                . 'estadoUsuario="1">Desactivado</button></td>';
                            }

                            echo '<td>' . $value["ultimo_login"] . '</td>
                            <td>

                            <button class = "btn btn-warning btnEditarUsuario" idUsuario=" ' . $value["id"] . ' 
                                " data-toggle="modal" data-target="#modalEditarUsuario"><i class = "fa fa-pencil"></i></button>
                                
                            <button class = "btn btn-danger btnEliminarUsuario" idUsuario=" ' . $value["id"] . ' " fotoUsuario=" ' . $value["foto"] . ' "
                                " usuario=" ' . $value["usuario"] . ' "><i class = "fa fa-times"></i></button>

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

<!--  /*=============================================
              AGREGAR USUARIO
=============================================*/-->

<div class="modal fade" id="modalAgregarUsuario">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">


                <!--CABEZA DEL MODAL -->

                <div class="modal-header" style="background: #3c8dbc; color: white;">

                    <h4 class="modal-title">Agregar Usuario</h4>

                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!--CUERPO DEL MODAL -->

                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="input-group">

                                <!--ENTRADA PARA EL NOMBRE-->

                                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                                <input class="form-control input-lg" type="text" name="nuevoNombre" placeholder="Ingresar nombre" required="">

                            </div>
                        </div>

                        <div class="form-group">

                            <div class="input-group">

                                <!--ENTRADA PARA EL USUARIO-->

                                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                                <input class="form-control input-lg" type="text" name="nuevoUsuario"
                                       placeholder="Ingresar usuario" required=""  id="nuevoUsuario">

                            </div>
                        </div>

                        <div class="form-group">

                            <div class="input-group">

                                <!--ENTRADA PARA EL PASSWORD-->

                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                                <input class="form-control input-lg" type="password" name="nuevoPassword" placeholder="Ingresar contraseña" required="">

                            </div>
                        </div>

                        <div class="form-group">

                            <div class="input-group">

                                <!--ENTRADA SELECCIONAR PARA SI PERFIL-->

                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                <select name="nuevoPerfil" class="form-control input-lg">

                                    <option value="">Seleccionar Peril</option>

                                    <option value="Tecnico Redes">Tecnico Redes</option>

                                    <option value="Tecnico Mantenimiento">Tecnico Mantenimiento</option>

                                    <option value="Tecnico Seguridad">Tecnico Seguridad</option>

                                    <option value="Call Center">Call Center</option>


                                </select>

                            </div>
                        </div>

                        <!-- SELECCIONAR UNA FOTO-->
                        <div class="form-group">
                            <div class="panel">Subir Foto</div>
                            <input type="file" class="nuevaFoto" name="nuevaFoto">

                            <p class="help-block">Peso maximo de la foto 2MB</p>

                            <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px"/>

                        </div>

                    </div>
                </div>

                <!--PIE DE PAGINA DEL MODAL -->


                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-primary">Guardar usuario</button>
                </div>

                <?php
                $crearUsuario = new ControladorUsuarios();
                $crearUsuario->ctrCrearUsuario();
                ?>
            </form>

        </div>
    </div>
</div>


<!--  /*=============================================
              EDITAR USUARIO
=============================================*/-->
<div class="modal fade" id="modalEditarUsuario">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">


                <!--CABEZA DEL MODAL -->

                <div class="modal-header" style="background: #3c8dbc; color: white;">

                    <h4 class="modal-title">Editar Usuario</h4>

                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!--CUERPO DEL MODAL -->

                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="input-group">

                                <!--ENTRADA PARA EL NOMBRE-->

                                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                                <input class="form-control input-lg" type="text"  id="editarNombre" name="editarNombre" value="" required="">

                            </div>
                        </div>

                        <div class="form-group">

                            <div class="input-group">

                                <!--ENTRADA PARA EL USUARIO-->

                                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                                <input class="form-control input-lg" type="text" id="editarUsuario" name="editarUsuario" value="" readonly="">

                            </div>
                        </div>

                        <div class="form-group">

                            <div class="input-group">

                                <!--ENTRADA PARA EL PASSWORD-->

                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                                <input class="form-control input-lg" type="password" name="editarPassword" 
                                       placeholder="Escriba una nueva contraseña" >
                                <input type="hidden" id="passwordActual" name="passwordActual">

                            </div>
                        </div>

                        <div class="form-group">

                            <div class="input-group">

                                <!--ENTRADA SELECCIONAR PARA SI PERFIL-->

                                <span class="input-group-addon"><i class="fa fa-users"></i></span>

                                <select  name="editarPerfil" class="form-control input-lg">

                                    <option value=" " id="editarPerfil"></option>

                                    <option value="Tecnico Redes">Tecnico Redes</option>

                                    <option value="Tecnico Mantenimiento">Tecnico Mantenimiento</option>

                                    <option value="Tecnico Seguridad">Tecnico Seguridad</option>

                                    <option value="Call Center">Call Center</option>

                                </select>

                            </div>
                        </div>

                        <!-- SELECCIONAR UNA FOTO-->
                        <div class="form-group">

                            <div class="panel">Subir Foto</div>

                            <input type="file" class="nuevaFoto" name="editarFoto">

                            <p class="help-block">Peso maximo de la foto 2MB</p>

                            <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">


                            <input type="hidden" id="fotoActual" name=="fotoActual">

                        </div>

                    </div>
                </div>

                <!--PIE DE PAGINA DEL MODAL -->


                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-primary">Modificar usuario</button>
                </div>

                <?php
                $editarUsuario = new ControladorUsuarios();

                $editarUsuario->ctrEditarUsuario();
                ?>

            </form>

        </div>
    </div>
</div>

<?php
$borrarUsuario = new ControladorUsuarios();

$borrarUsuario->ctrBorrarUsuario();
?>

