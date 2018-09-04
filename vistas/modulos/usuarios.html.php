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

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">

                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">

                    Agregar Usuario

                </button>
            </div>
            <div class="box-body">

                <!--ENTRADA PARA EL NOMBRE-->

                <table class="table table-bordered table-striped dt-responsive tablas">
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
                        <tr>
                            <td>1</td>
                            <td>Administrador Usuario</td>
                            <td>admin</td>
                            <td> <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"/></td>
                            <td>Administrador</td>
                            <td><button class="btn btn-success btn-xs">Activado</button></td>
                            <td>2018-03-28 16:22:55</td>
                            <td>

                                <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-danger"><i class="fa fa-times"></i></button>

                            </td>

                        </tr>
                    </tbody>
                </table>


            </div>
        </div>

    </section>



</div>

<!--VENTANA MODAL USUARIO-->
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

                                <input class="form-control input-lg" type="text" name="nuevoUsuario" placeholder="Ingresar usuario" required="">

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
                                </select>

                            </div>
                        </div>

                        <!-- SELECCIONAR UNA FOTO-->
                        <div class="form-group">
                            <div class="panel">Subir Foto</div>
                            <input type="file" id="nuevaFoto" name="nuevaFoto">

                            <p class="help-block">Peso maximo de la foto 200 MB</p>

                            <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="100px"/>

                        </div>

                    </div>
                </div>

                <!--PIE DE PAGINA DEL MODAL -->


                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-primary">Guardar usuario</button>
                </div>

            </form>

        </div>
    </div>
</div>
