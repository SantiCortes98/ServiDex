<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Administrador Clientes
            <small>Panel de Control </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <a href="usuarios.html.php"></a>

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">

                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCliente">

                    Agregar Cliente

                </button>
            </div>
            <div class="box-body">

                <!--ENTRADA PARA EL NOMBRE-->

                <table class="table table-bordered table-striped dt-responsive tablas">
                    <thead>
                        <tr>

                            <th style="width:10px ">#</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Telefono</th>
                            <th>Puesto de Area</th>
                            <th>Acciones</th>

                        </tr>

                    </thead>

                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Leticia Marin Arias</td>
                            <td>leticia.marin@hotmail.com</td>
                            <td>316900548</td>
                            <td>Contaduria</td>

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
<div class="modal fade" id="modalAgregarCliente">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post" >


                <!--CABEZA DEL MODAL -->

                <div class="modal-header" style="background: #3c8dbc; color: white;">

                    <h4 class="modal-title">Agregar Categoria</h4>

                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!--CUERPO DEL MODAL -->

                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="input-group">

                                <!--ENTRADA PARA EL NOMBRE-->

                                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                                <input class="form-control input-lg" type="text" name="nuevoNombre" placeholder="Ingresar nombre completo" required="">

                            </div>
                        </div>


                        <div class="form-group">
                            <div class="input-group">

                                <!--ENTRADA PARA EL CORREO-->

                                <span class="input-group-addon"><i class="fa fa-at"></i></span>

                                <input class="form-control input-lg" type="text" name="nuevoCorreo" placeholder="Ingresar correo electronico" required="">

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">

                                <!--ENTRADA PARA EL TELEFONO-->

                                <span class="input-group-addon"><i class="fa fa-whatsapp"></i></span>

                                <input class="form-control input-lg" type="text" name="nuevoNumCelular" placeholder="Ingresar numero de celular" required="">

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">

                                <!--ENTRADA PARA EL PUESTO DEL AREA-->

                                <span class="input-group-addon"><i class="fa fa-list"></i></span>

                                <select class="form-control input-lg" name="nuevoPuestoArea" id="nuevoPuestoArea" required="">

                                    <option value="Administrativo">Administrativo</option>
                                    <option value="Contaduria">Contaduria</option>
                                    <option value="Operaciones">Operaciones</option>
                                    <option value="Gerencia">Gerencia</option>
                                    <option value="Mantenimiento">Mantenimiento</option>
                                    <option value="Sistemas">Sistemas</option>
                                    <option value="Despachos">Despachos</option>


                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!--PIE DE PAGINA DEL MODAL -->


                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-primary">Guardar Cliente</button>
                </div>

            </form>

        </div>
    </div>
</div>