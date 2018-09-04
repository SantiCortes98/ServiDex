<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Crear Hoja De Vida
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
                    <form role="form" method="post" class="formularioHoja">

                        <div class="box-body">



                            <div class="box">

                                <div class="form-group">

                                    <!--=====================================
                                   ENTRADA NOMBRE DEL TECNICO
                                   ======================================-->

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input type="text" class="form-control" id="NombreTecnico" name="NombreTecnico" value="<?php echo $_SESSION["nombre"]; ?>" readonly="">
                                        <input type="hidden" name="idTecnico" value="<?php echo $_SESSION["id"]; ?>" >
                                    </div>

                                </div>



                                <!--=====================================
                                ENTRADA TECNICO
                                ======================================-->
                                <div class="form-group">

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>
                                        <input type="text" class="form-control" id="nuevoTecnico" name="tipoTecnico" value="<?php echo $_SESSION["perfil"]; ?>" readonly="">
                                        <input type="hidden" name="idPerfil" value="<?php echo $_SESSION["id"]; ?>">


                                    </div>

                                </div>

                                <!--=====================================
                               ENTRADA NUMERO DEL APARATO
                               ======================================-->
                                <div class="form-group">

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                        <input type="text" class="form-control" id="nomAparato" name="nomAparato" placeholder="Ingresar el nombre del aparato" required>

                                    </div>
                                </div>

                                <div class="form-group">

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                        <input type="text" class="form-control" id="nomMarca" name="nomMarca" placeholder="Ingresar el nombre de la marca" required>

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
                                            <?php
                                            $itemCliente = null;
                                            $valorCliente = null;

                                            $clientes = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

                                            foreach ($clientes as $key => $value) {
                                                echo '<option value= " ' . $value["id"] . ' "> ' . $value["nombre"] . '</option>';
                                            }
                                            ?>

                                        </select>
                                        <span class="input-group-addon">
                                            <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modalAgregarCliente" data-dismiss="modal">Agregar Cliente</button>
                                        </span>

                                    </div>

                                </div>



                                <!--=====================================
                                ENTRADA DE LA COMPONENTE
                                ======================================-->
                                <div class="form-group row nuevoComponente">


                                </div>

                                <input type="hidden" id="listaComponente" name="listaComponente">


                                <button type="button" class="btn btn-default hidden-lg"> Agregar Componentes</button>
                                <hr>


                                <div class="form-group">

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                        <select class="form-control" id="seleccionarLicencia" name="seleccionarLicencia"  required>
                                            <option value="#">Seleccionar S.O</option>
                                            <option value="Linux">Linux</option>
                                            <option value="Unix">Unix</option>
                                            <option value="Solaris">Solaris</option>
                                            <option value="Windows">Windows</option>
                                            <option value="Windows Server">Windows Server</option>
                                            <option value="MacOS">MacOS</option>
                                        </select>

                                    </div>
                                </div>


                                <!--=====================================
                              BOTON PARA AGREGAR INCIDENCIA
                              ======================================-->
                                <div class="box-footer">
                                    <button type="button" class="btn btn-default hidden-lg"> Agregar componentes</button>
                                </div>
                            </div>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary pull-right">Guardar Hoja de Vida</button>
                        </div>

                    </form>

                </div>
            </div>

            <!--=====================================
            Tabla de Componentes
            ======================================-->

            <div class="col-lg-7 hidden-md hidden-sm hidden-xs">

                <div class="box box-warning">

                    <div class="box-header with-border"> </div>

                    <div class="box-body">

                        <table class="table table-bordered table-striped dt-responsive tablas">

                            <thead>
                                <tr>
                                    <th style="width:10px ">#</th>
                                    <th>Tipo</th>
                                    <th>Componentes</th>
                                    <th>Acciones</th>

                                </tr>


                            </thead>

                            <tbody>

                                <?php
                                $itemComponente= null;
                                $valorComponente = null;

                                $componentes = ControladorComponentes::ctrMostrarComponentes($itemComponente, $valorComponente);

                                foreach ($componentes as $key => $value) {
                                    echo
                                    '<tr>
                                                 <td>' . ($key + 1) . '</td>
                                                 <td>' . $value["tipo_componente"] . '</td>
                                                  <td>' . $value["nom_componente"] . '</td>';

                                    echo '<td>
                                    
                                                            <div class="btn-group">
                                                                    <button class="btn btn-primary agregarComponentes recuperarBoton" idComponente="' . $value["id"] . '" >Agregar</button>
                                                             </div>
                                                 </td>
                                       </tr>';
                                }
                                ?>

                            </tbody>

                        </table>

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

