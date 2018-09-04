<?php
$item = null;
$valor = null;

$servicios = ControladorServicios::ctrMostrarServicios($item, $valor);
$empleados = ControladorClientes::ctrMostrarClientes($item, $valor);

$arrayEmpleados = array();
$arrayListaEmpleados = array();

foreach ($servicios as $key => $valueServicios) {

    foreach ($empleados as $key => $valueEmpleados) {

        if ($valueEmpleados["id"] == $valueServicios["id_cliente"]) {

//            captamos los tecnicos en un array
            array_push($arrayEmpleados, $valueEmpleados["nombre"]);

//            captamos los nombres y los valores totales en un ,mismo array 
            $arrayListaEmpleados = array($valueEmpleados["nombre"] => $valueServicios["total"]);
        }

//        suma total de cada tecnico
        foreach ($arrayListaEmpleados as $key => $value) {

            $sumaTotalEmpleados[$key] += $value;
        }
    }
}
//Evitamos repetir tecnicos
$noRepetirNombres = array_unique($arrayEmpleados);
?>

<!--Empleados-->

<div class="box box-primary">

    <div class="box-header with-border">

        <h3 class="box-title">Empleados</h3>

    </div>

    <div class="box-body">

        <div class="chart-responsive">

            <div class="chart" id="bar-chart2" style="height: 300px;">

            </div>

        </div>

    </div>

</div>

<script>

    //BAR CHART
    var bar = new Morris.Bar({
        element: 'bar-chart2',
        resize: true,
        data: [
<?php
foreach ($noRepetirNombres as $value) {

    echo "
            {y: '" . $value . "', a:' " . $sumaTotalEmpleados[$value] . " '},";
}
?>
        ],
        barColors: ['#f6a'],
        xkey: 'y',
        ykeys: ['a'],
        labels: ['incidencias'],
        hideHover: 'auto'
    });


</script>