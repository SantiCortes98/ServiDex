<?php
if (isset($_GET["fechaInicial"])) {

    $fechaInicial = $_GET["fechaInicial"];
    $fechaFinal = $_GET["fechaFinal"];
} else {

    $fechaInicial = null;
    $fechaFinal = null;
}

$respuesta = ControladorServicios::ctrRangoFechasServicios($fechaInicial, $fechaFinal);

$arrayFechas = array();


foreach ($respuesta as $key => $value) {


//    Capturamos solo el año, el mes 
    $fecha = substr($value["fecha"], 0, 7);

//Introduccir las fechas en arrayFechas
    array_push($arrayFechas, $fecha);
}

?>

<!--=====================================
Graficos de Servicios
======================================-->

<div class="box box-solid bg-teal-gradient">

    <div class="box-header">

        <i class="fa fa-th"></i>
        <h3 class="box-title">Grafico de Servicios</h3>

    </div>

    <div class="box-body border-radius-none nuevoGraficoServicio">

        <div class="chart" id="line-chart-servicios" style="height: 250px;"></div>

    </div>

</div>

<script>
    var line = new Morris.Line({
        element: 'line-chart-servicios',
        resize: true,
        data: [

            {y: '2015', servicios: 2666},
            {y: '2016', servicios: 2778},
            {y: '2017', servicios: 4912},
            {y: '2015', servicios: 3767}

        ],
        xkey: 'y',
        ykeys: ['servicios'],
        labels: ['servicios'],
        lineColors: ['#efefef'],
        lineWidth: 2,
        hideHover: 'auto',
        gridTextColor: '#fff',
        gridStrokeWidth: 0.4,
        pointSize: 4,
        pointStrokeColors: ['#efefef'],
        gridLineColor: '#efefef',
        gridTextFamily: 'Open Sans',
        preUnits: '$',
        gridTextSize: 10
    });

</script>