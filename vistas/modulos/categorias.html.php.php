<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Administrador Categorias
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

                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">

                    Agregar Categoria

                </button>
            </div>
            <div class="box-body">

                <!--ENTRADA PARA EL NOMBRE-->

                <table class="table table-bordered table-striped dt-responsive tablas">
                    <thead>
                        <tr>

                            <th style="width:10px ">#</th>
                            <th>Categoria</th>
                            <th>Acciones</th>

                        </tr>

                    </thead>

                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Mantenimineto de Redes</td>
        
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
<div class="modal fade" id="modalAgregarCategoria">

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

                                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                <input class="form-control input-lg" type="text" name="nuevaCategoria" placeholder="Ingresar categoria" required="">

                            </div>
                        </div>
                    </div>
                </div>

                <!--PIE DE PAGINA DEL MODAL -->


                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-primary">Guardar Categoria</button>
                </div>

            </form>

        </div>
    </div>
</div>
