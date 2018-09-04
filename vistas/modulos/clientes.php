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
        <a href="usuarios.php"></a>

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
                            <th>Fecha Nacimiento</th>
                            <th>Correo</th>
                            <th>Telefono</th>
                            <th>Puesto de Area</th>
                            <th>Total Servicios</th>
                            <th>Fecha Servicio</th>
                            <th>Acciones</th>

                        </tr>

                    </thead>

                    <tbody>
                        <tr>
                            <?php
                            $item = null;
                            $valor = null;

                            $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);

                            foreach ($clientes as $key => $value) {
                                echo '
                            
                            <tr>
                            <td>' . ($key + 1) . '</td>
                            <td>' . $value["nombre"] . '</td>
                             <td>' . $value["fecha_nacimiento"] . '</td>
                            <td>' . $value["correo"] . '</td>
                            <td>' . $value["num_celular"] . '<t/d>
                            <td>' . $value["area_trabajo"] . '</td>
                             <td>' . $value["incidencias"] . '</td>
                              <td>' . $value["fecha"] . '</td>
                               

                            <td>
                            <button class = "btn btn-warning btnEditarCliente" data-toggle="modal" data-target="#modalEditarCliente" 
                            idCliente=" ' . $value["id"] . ' "><i class = "fa fa-pencil"></i></button>';
                              
                                if ($_SESSION["perfil"] == "Administrador") {
                                          echo ' <button class = "btn btn-danger btnEliminarCliente" idCliente=" ' . $value["id"] . ' ">
                                              <i class = "fa fa-times"></i></button>
                            </td>';
                                    }
                           }
                            ?>

                        </tr>
                    </tbody>
                </table>


            </div>
        </div>

    </section>



</div>

<!--  /*=============================================
              AGREGAR CLIENTE
=============================================*/-->

<!--VENTANA MODAL USUARIO-->

<div class = "modal fade" id = "modalAgregarCliente">

    <div class = "modal-dialog">

        <div class = "modal-content">

            <form role = "form" method = "post" >


                <!--CABEZA DEL MODAL -->

                <div class = "modal-header" style = "background: #3c8dbc; color: white;">

                    <h4 class = "modal-title">Agregar Categoria</h4>

                    <button type = "button" class = "close" data-dismiss = "modal">&times;
                    </button>
                </div>

                <!--CUERPO DEL MODAL -->

                <div class = "modal-body">
                    <div class = "box-body">
                        <div class = "form-group">
                            <div class = "input-group">

                                <!--ENTRADA PARA EL NOMBRE-->

                                <span class = "input-group-addon"><i class = "fa fa-user"></i></span>

                                <input class = "form-control input-lg" type = "text" name = "nuevoNombre" placeholder = "Ingresar nombre completo" required = "">

                            </div>
                        </div>

                        <div class = "form-group">
                            <div class = "input-group">

                                <!--ENTRADA PARA EL DOCUMENTO-->

                                <span class = "input-group-addon"><i class = "fa fa-user"></i></span>

                                <input class = "form-control input-lg" type = "number" name = "nuevoDocumento" placeholder = "Ingresar documento de cedula" required = "">

                            </div>
                        </div>

                        <div class = "form-group">
                            <div class = "input-group">

                                <!--ENTRADA PARA LA FECHA DE NACIMIENTO-->

                                <span class = "input-group-addon"><i class = "fa fa-calendar"></i></span>

                                <input class = "form-control input-lg" type = "text" name = "nuevaFechaNacimiento" id = "nuevaFechaNacimiento"  required = "" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask placeholder="Ingresar la fecha de nacimiento">

                            </div>
                        </div>


                        <div class = "form-group">
                            <div class = "input-group">

                                <!--ENTRADA PARA EL CORREO-->

                                <span class = "input-group-addon"><i class = "fa fa-at"></i></span>

                                <input class = "form-control input-lg" type = "text" name = "nuevoCorreo" placeholder = "Ingresar correo electronico" required = "">

                            </div>
                        </div>

                        <div class = "form-group">
                            <div class = "input-group">

                                <!--ENTRADA PARA EL TELEFONO-->

                                <span class = "input-group-addon"><i class = "fa fa-whatsapp"></i></span>

                                <input class = "form-control input-lg" type = "text" name = "nuevoNumCelular" placeholder = "Ingresar numero de celular" required = "" data-inputmask="'mask':'(999) 999-99999'" data-mask>

                            </div>
                        </div>

                        <div class = "form-group">
                            <div class = "input-group">

                                <!--ENTRADA PARA EL PUESTO DEL AREA-->

                                <span class = "input-group-addon"><i class = "fa fa-list"></i></span>

                                <select class = "form-control input-lg" name = "nuevoPuestoArea" id = "nuevoPuestoArea" required = "">

                                    <option value = "Administrativo">Administrativo</option>
                                    <option value = "Contaduria">Contaduria</option>
                                    <option value = "Operaciones">Operaciones</option>
                                    <option value = "Gerencia">Gerencia</option>
                                    <option value = "Mantenimiento">Mantenimiento</option>
                                    <option value = "Sistemas">Sistemas</option>
                                    <option value = "Despachos">Despachos</option>


                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!--PIE DE PAGINA DEL MODAL -->


                <div class = "modal-footer">

                    <button type = "button" class = "btn btn-default pull-left" data-dismiss = "modal">Salir</button>

                    <button type = "submit" class = "btn btn-primary">Guardar Cliente</button>
                </div>

                <?php
                $crearClientes = new ControladorClientes();
                $crearClientes->ctrCrearCliente();
                ?>

            </form>



        </div>
    </div>
</div>

<!--  /*=============================================
             EDITAR CLIENTE
=============================================*/-->

<!--VENTANA MODAL USUARIO-->
<div class = "modal fade" id = "modalEditarCliente">

    <div class = "modal-dialog">

        <div class = "modal-content">

            <form role = "form" method = "post" >


                <!--CABEZA DEL MODAL -->

                <div class = "modal-header" style = "background: #3c8dbc; color: white;">

                    <h4 class = "modal-title">Editar Cliente</h4>

                    <button type = "button" class = "close" data-dismiss = "modal">&times;
                    </button>
                </div>

                <!--CUERPO DEL MODAL -->

                <div class = "modal-body">
                    <div class = "box-body">
                        <div class = "form-group">
                            <div class = "input-group">



                                <!--ENTRADA PARA EL NOMBRE-->

                                <span class = "input-group-addon"><i class = "fa fa-user"></i></span>

                                <input class = "form-control input-lg" type = "text" name = "editarNombre"  id= "editarNombre" >

                                <!--ENTRADA PARA EL ID-->
                                <input type="hidden" name="idCliente" id="idCliente">

                            </div>
                        </div>

                        <div class = "form-group">
                            <div class = "input-group">

                                <!--ENTRADA PARA EL DOCUMENTO-->

                                <span class = "input-group-addon"><i class = "fa fa-user"></i></span>

                                <input class = "form-control input-lg" type = "number" name = "editarDocumento" id= "editarDocumento" >

                            </div>
                        </div>

                        <div class = "form-group">
                            <div class = "input-group">

                                <!--ENTRADA PARA LA FECHA DE NACIMIENTO-->

                                <span class = "input-group-addon"><i class = "fa fa-calendar"></i></span>

                                <input class = "form-control input-lg" type = "text" name = "editarFechaNacimiento" id = "editarFechaNacimiento"  data-inputmask="'alias': 'yyyy/mm/dd'" data-mask >

                            </div>
                        </div>


                        <div class = "form-group">
                            <div class = "input-group">

                                <!--ENTRADA PARA EL CORREO-->

                                <span class = "input-group-addon"><i class = "fa fa-at"></i></span>

                                <input class = "form-control input-lg" type = "email" name = "editarCorreo"  id= "editarCorreo">

                            </div>
                        </div>

                        <div class = "form-group">
                            <div class = "input-group">

                                <!--ENTRADA PARA EL TELEFONO-->

                                <span class = "input-group-addon"><i class = "fa fa-whatsapp"></i></span>

                                <input class = "form-control input-lg" type = "text" name = "editarNumCelular" id="editarNumCelular"  data-inputmask="'mask':'(999) 999-9999'" data-mask="" >

                            </div>
                        </div>

                        <div class = "form-group">
                            <div class = "input-group">

                                <!--ENTRADA PARA EL PUESTO DEL AREA-->

                                <span class = "input-group-addon"><i class = "fa fa-list"></i></span>

                                <select class = "form-control input-lg" name = "editarPuestoArea" id = "editarPuestoArea" >

                                    <option value = "Administrativo">Administrativo</option>
                                    <option value = "Contaduria">Contaduria</option>
                                    <option value = "Operaciones">Operaciones</option>
                                    <option value = "Gerencia">Gerencia</option>
                                    <option value = "Mantenimiento">Mantenimiento</option>
                                    <option value = "Sistemas">Sistemas</option>
                                    <option value = "Despachos">Despachos</option>


                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!--PIE DE PAGINA DEL MODAL -->


                <div class = "modal-footer">

                    <button type = "button" class = "btn btn-default pull-left" data-dismiss = "modal">Salir</button>

                    <button type = "submit" class = "btn btn-primary">Guardar Cambios</button>
                </div>

            </form>

            <?php
            $editarClientes = new ControladorClientes();
            $editarClientes->ctrEditarCliente();
            ?>
        </div>
    </div>
</div>

<?php
$eliminarClientes = new ControladorClientes();
$eliminarClientes->ctrEliminarCliente();
?>