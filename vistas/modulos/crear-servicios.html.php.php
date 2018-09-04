<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Crear Servicios
            <small>Panel de Control </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">

            <!--=====================================
            CUERPO DOCUMENTO
            ======================================-->

            <div class="col-lg-5 col-xs-12">

                <div class="box box-success">
                    <div class="box-header with-border"></div>
                    <form role="form" method="post">

                        <div class="box-body">



                            <div class="box">

                                <div class="form-group">

                                    <!--=====================================
                                   ENTRADA NOMBRE DEL TECNICO
                                   ======================================-->

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input type="text" class="form-control" id="nuevoNombreTecnico" name="nuevoNombreTecnico" value="Santiago Cortes Marin" readonly="">

                                    </div>
                                </div>

                                <!--=====================================
                                ENTRADA TECNICO
                                ======================================-->
                                <div class="form-group">

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>
                                        <input type="text" class="form-control" id="nuevoTecnico" name="nuevoTecnico" value="Tecnico de Redes" readonly="">

                                    </div>
                                </div>

                                <!--=====================================
                               ENTRADA NUMERO DE LA FACTURA
                               ======================================-->
                                <div class="form-group">

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                        <input type="text" class="form-control" id="nuevoServicio" name="nuevoServicio" value="10175487" readonly="">

                                    </div>
                                </div>

                                <!--=====================================
                               ENTRADA DEL CLIENTE
                               ======================================-->

                                <div class="form-group">

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                        <select type="text" class="form-control" id="agregarCliente" name="agregarCliente" placeholder="Agregar cliente" required="">

                                            <option value="">Seleccionar Cliente</option>

                                        </select>
                                        <span class="input-group-addon">
                                            <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modalAgregarCliente" data-dismiss="modal">Agregar Cliente</button>
                                        </span>

                                    </div>
                                </div>

                                <!--=====================================
                                ENTRADA DE LA INCIDENCIA
                                ======================================-->
                                <div class="form-group row nuevoIncidente">

                                    <!--Descripcion de la incidencia-->

                                    <div class="col-xs-6" style="padding-right: 0px">
                                        <div class="input-group">

                                            <span class="input-group-addon">
                                                <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button>                                                
                                            </span>

                                            <input type="text" class="form-control" id="agregarIncidencias" name="agregarIncidencias" placeholder="Descripcion de la incidencia" required="">

                                        </div>

                                    </div>

                                    <!--Seleccionar el estado del computador-->

                                    <div class="col-xs-3">
                                        <select class="form-control" id="nuevoEstado" name="nuevoEstado">
                                            <option value="#">Seleccionar el estado</option>
                                            <option value="Bueno">Bueno</option>
                                            <option value="Malo">Malo</option>
                                            <option value="Deteriorado">Deteriorado</option>
                                        </select>
                                    </div>

                                    <!--Seleccionar la tecnologia adecuada-->

                                    <div class="col-xs-3" style="padding-left: 0px">

                                        <div class="input-group">
                                            <select class="form-control" id="nuevoEstado" name="nuevoEstado">
                                                <option value="#">Seleccionar la tecnologia</option>
                                                <option value="PC">PC</option>
                                                <option value="Router">Router</option>
                                                <option value="Impresora">Impresora</option>
                                            </select>
                                        </div>

                                    </div>

                                </div>

                                <!--=====================================
                              BOTON PARA AGREGAR INCIDENCIA
                              ======================================-->

                                <button type="button" class="btn btn-default hidden-lg"> Agregar Incidencia</button>
                                <hr>

                                <div class="col-xs-6" style="padding-right:0px">

                                    <div class="input-group">

                                        <textarea class="form-control" placeholder="Describir la observacion del incidente" name="nuevaObservacionIncidente" id="nuevaObservacionIncidente" style="max-width: 400px; width: 400px; max-height: 150px; height: 150px;"></textarea>

                                    </div>

                                </div>

                            </div> 



                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary pull-right">Guardar Servicios</button>
                        </div>

                    </form>

                </div>

            </div>

            <!--=====================================
            Tabla de Incidencias
            ======================================-->
            <div class="col-lg-7 hidden-md hidden-sm hidden-xs">

                <div class="box box-warning">

                    <div class="box-header with-border"> </div>

                    <div class="box-body">

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

                        </table>

                    </div>

                </div>
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

