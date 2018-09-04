<?php

require_once "../../../controladores/servicios.controlador.php";
require_once "../../../modelos/servicios.modelo.php";

require_once "../../../controladores/clientes.controlador.php";
require_once "../../../modelos/clientes.modelo.php";

require_once "../../../controladores/usuarios.controlador.php";
require_once '../../../modelos/usuarios.modelo.php';

require_once "../../../controladores/incidencias.controlador.php";
require_once "../../../modelos/incidencias.modelo.php";

class imprimirFactura{

public $codigo;

public function traerImpresionFactura(){

//Traemos informacion de la venta
$itemServicio = "codigo";
$valorServicio = $this->codigo;

$respuestaServicio = ControladorServicios::ctrMostrarServicios($itemServicio, $valorServicio);

$fecha = substr($respuestaServicio["fecha"], 0, -8);
$incidencias = json_decode($respuestaServicio["incidencias"], true);
$estados = mb_substr($respuestaServicio["estados"], 0);
$observaciones = mb_substr($respuestaServicio["observaciones"], 0);

//INFORMACION DEL EMPLEADO
$itemCliente = "id";
$valorCliente = $respuestaServicio["id_cliente"];

$respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

//TRAEMOS INFORMACION DEL TECNICO
$itemUsuario = "id";
$valorUsuario = $respuestaServicio["id_tecnico"];

$respuestaUsuario = ControladorUsuarios::ctrMostarUsuarios($itemUsuario, $valorUsuario);

// REQUERIMOS LA CLASE TCPDF

require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->startPageGroup();

$pdf->AddPage();

// ------------------------------------------------------------------------------------------------------------------------------------
$bloque1 = <<<EOF
        
        <table>
                <tr>
                    <td sytle="width:150px"><img src="images/logo-blanco-bloque.png "></td>
                    <td style="background-color:white; width:140px">
                        <div sytle="font-size:8.5px; text-aling:right; line-height:15px;">
                                    <br>
                                     NIT: 14.154.958-5
                                      
                                     <br>
                                     Dirreccion: Calle 2 #75-35 
   
                        </div>
                    </td>
        
                    <td style="background-color:white; width:140px">
                        <div sytle="font-size:8.5px; text-aling:right; line-height:15px;">
                                    <br>
                                     Telefono: 345 758 85 49
                                      
                                     <br>
                                     Correo: servitex@hotmail.com
   
                        </div>
                    </td>
        
                    <td style="background-color:white; width:110px; text-align:center; color:red;"><br><br>Factura N<br>$valorServicio</td>
                </tr>
            
        </table>
EOF;

$pdf->writeHTML($bloque1, false, false, false, false, '');
// --------------------------------------------------------------------------------------------------------------------------------------------------------------
$bloque2 = <<<EOF
        
        <table >
        
            <tr>
                
                <td style="width:540px;">
        
                    <img src="images/back.jpg">
                    
                </td>
        
            </tr>
        
        </table>
        
        <table style="font-size:10px; padding:5px 10px;">
                <tr>
                    <td style="border: 1px solid #666; background-color:white; width:390px;" >
        
                            Cliente: $respuestaCliente[nombre]
     
                    </td>
        
	<td style="border: 1px solid #666; background-color:white; width:150px; text-align:right">
        
                            Fecha: $fecha
        
                    </td>
        
                </tr>
        
        </table>

EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '');

//Salida del archivo
$pdf->Output('factura.pdf');
}

}

$factura = new imprimirFactura();
$factura->codigo = $_GET["codigo"];
$factura->traerImpresionFactura();

?>