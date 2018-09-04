<?php
$valorIncidencia = null;
$itemIncidencia = null;
$orden = "id";
$incidencias = ControladorIncidencias::ctrMostrarIncidencias($itemIncidencia, $valorIncidencia, $orden);
?>

<div class="box box-primary">

    <div class="box-header with-border">

        <h3 class="box-title">Servicios Recientes</h3>


    </div>

    <div class="box-body">

        <ul class="products-list product-list-in-box">

            <?php
            for ($i = 0; $i < 10; $i++) {

                echo
                '<li class = "item">

                    <div class = "product-info">
                            <a href = "incidencias" class = "product-title">
                                ' . $incidencias[$i]["descripcion"] . '
                            </a>';

            }
            ?>




        </ul>

    </div>

    <div class="box-footer text-center">
        <a href="incidencias" class="uppercase">Ver todos los servicios</a>
    </div>

</div>

