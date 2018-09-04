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
                            <th>Resumen</th>
                            <th>Categoria</th>
                            <th>Perfil</th>
                            <th>Nombre Tecnico</th>
                            <th>Agregado</th>
                            <th>Acciones</th>

                        </tr>

                    </thead>

                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>El usuario informo que el cacleado el puerto de Enternet esta deteriorado</td>
                            <td>Soporte De Redes</td>
                            <td>Tecnico Redes</td>
                            <td>Ana Valentina</td>
                            <td>04/04/2018 00:00:00</td>
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

                                <select name="nuevoPerfil" class="form-control input-lg">
                                    <option value="">Seleccionar Categoria</option>
                                    <option value="soportes  redes">Soportes de Redes</option>
                                    <option value="soportes seguridad">Soportes Seguridad</option>
                                    <option value="soportes  mantenimiento">Soportes Mantenimiento</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="input-group">

                                <!--ENTRADA DE RESUMEN DE LA INCIDENCIA-->

                                <span class="input-group-addon"><i class="fa fa-font"></i></span>


                                <!--class="form-control input-lg"--> 
                                <textarea  name="nuevoUsuario"  placeholder="Ingresar Descripcion de la Incidencia" required="" class="form-control" rows="5" style="max-width: 550px; max-height: 150px;"></textarea>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">

                                <!--ENTRADA PARA EL PERFIL DEL USUARIO-->
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>

                                <select name="nuevoPerfil" class="form-control input-lg">
                                    <option value="">Seleccionar el Perfil del Tecnico</option>
                                    <option value="tecnico  redes">Tecnico de Redes</option>
                                    <option value="tecnico seguridad">Tecnico Seguridad</option>
                                    <option value="tecnico  mantenimiento">Tecnico Mantenimiento</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">

                                <!--ENTRADA SELECCIONAR EL NOMBRE DEL TECNICO RESPONSABLE-->
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                                <select name="nuevoPerfil" class="form-control input-lg">
                                    <option value="">Seleccionar El Nombre Del Tecnico</option>
                                    <option value="tecnico  redes">Santiago Marin</option>
                                    <option value="tecnico seguridad">Ana Maria</option>
                                    <option value="tecnico  mantenimiento">Alejo Restrepo</option>
                                </select>
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

        </div>
    </div>
</div>
