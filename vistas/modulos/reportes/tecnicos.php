<?php
$item = null;
$valor = null;

$servicios = ControladorServicios::ctrMostrarServicios($item, $valor);
$usuarios = ControladorUsuarios::ctrMostarUsuarios($item, $valor);

$arrayTecnicos = array();
$arrayListaTecnicos = array();

foreach ($servicios as $key => $valueServicios) {

    foreach ($usuarios as $key => $valueUsuarios) {

        if ($valueUsuarios["id"] == $valueServicios["id_tecnico"]) {

//            captamos los tecnicos en un array
            array_push($arrayTecnicos, $valueUsuarios["nombre"]);

//            captamos los nombres y los valores totales en un ,mismo array 
            $arrayListaTecnicos = array($valueUsuarios["nombre"] => $valueServicios["total"]);
        }

//        suma total de cada tecnico
        foreach ($arrayListaTecnicos as $key => $value) {

            $sumaTotalTecnicos[$key] += $value;
        }
    }
}
//Evitamos repetir tecnicos
$noRepetirNombres = array_unique($arrayTecnicos);
?>

<!--Vendedores-->

<div class="box box-success">

    <div class="box-header with-border">

        <h3 class="box-title">Tecnicos</h3>

    </div>

    <div class="box-body">

        <div class="chart-responsive">

            <div class="chart" id="bar-chart1" style="height: 300px;">

            </div>

        </div>

    </div>

</div>

<script>

    //BAR CHART
    var bar = new Morris.Bar({
        element: 'bar-chart1',
        resize: true,
        data: [

<?php
foreach ($noRepetirNombres as $value) {

    echo "
            {y: '" . $value . "', a:' " . $sumaTotalTecnicos[$value] . " '},";
}
?>

        ],
        barColors: ['#0af'],
        xkey: 'y',
        ykeys: ['a'],
        labels: ['incidencias'],
        hideHover: 'auto'
    });

</script>