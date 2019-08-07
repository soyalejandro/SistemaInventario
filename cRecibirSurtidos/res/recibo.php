<?php 

include'../conexion/conexion.php'; 
include'../funcionesPHP/fechaEspanol.php'; 

mysql_query("SET NAMES utf8");

$PedidoFarmacias=$_GET['pedidoFarmacia'];


$consulta=mysql_query("SELECT
                                (SELECT nombre_medicamento FROM medicamentos WHERE medicamentos.id_medicamento = detalle_surtido.id_medicamento),
                                cantidad_pedido,
                                cantidad_entrante,
                                diferencia,
                                fecha_registro,
                                hora_registro


                            FROM
                                detalle_surtido
                                WHERE id_pedido='$PedidoFarmacias'",$conexion) or die (mysql_error());

$consulta1=mysql_query("SELECT
                                 (SELECT nombre_farmacia FROM farmacias WHERE farmacias.id_farmacia = pedidos_farmacias.id_farmacia),
                                 total_pedido,
                                 total_entregado,
                                 diferencia,
                                 fecha_registro,
                                 hora_registro,
                                 status
                            FROM
                                pedidos_farmacias
                                WHERE id_pedido_farmacia='$PedidoFarmacias'",$conexion) or die (mysql_error());
    $row=mysql_fetch_row($consulta1);


    $farmacia=$row[0];
    $totalPedido=$row[1];
    $TotalEntregado=$row[2];
    $DiferenciaTotal=$row[3];
    $FechaPedido=$row[4];
    $Horapedido=$row[5];
    $status=$row[6];
  
   
//Descargamos el arreglo que arroja la consulta
$n=1;
// $row=mysql_fetch_row($consulta);

$fecha=date("Y-m-d"); 
$fechaEspanol=fechaCastellano($fecha);

 ?>

<!-- Inicio Estilo del reporte -->
<style type="text/css">

    table
    {
        width:  90%;
        margin:auto;
    }

    td.borde
    {
        text-align: center;
        border: solid 1px #D8D8D8;
        padding: 2px;
        text-align: center;
    }

    td.titular
    {
        text-align: center;
        border: solid 1px #34495e;
        background: #ecf0f1;
        color:#34495e;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 3px;
        padding: 11px;
        font-size:12px;
    }

    p.parrafo
    {
        border: solid 1px #34495e;
        color:#34495e;
        font-size:12px;
        margin:5px;
        padding:0px 0px 5px 0px;  
    }

    td.encabezado
    {
        text-align: center;
        color:#34495e;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 3px;
        padding: 11px;
        font-size:15px;
    }

    td.fecha
    {
        text-align: right;
        border: solid 0px #34495e;
        background: #ffffff;
        color:#34495e;
        letter-spacing: 3px;
        padding: 18px;
    }
    h5{
        background: #ffffff;
        color:#34495e;
    }
    h3{
         background: #ffffff;
        color:#34495e;
    }

    img{
        width: 100%;
    }

</style>

<table border="0">
    <col style="width: 8%">
    <col style="width: 8%">
    <col style="width: 8%">
    <col style="width: 8%">
    <col style="width: 8%">
    <col style="width: 8%">
    <col style="width: 8%">
    <col style="width: 8%">
    <col style="width: 8%">
    <col style="width: 8%">
    <col style="width: 8%">
    <col style="width: 8%">
    <!-- defino el ancho de la tabla -->
    <tr border="0">
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td colspan="6">
            <h3 align="center">Hospital General Linares SSNL</h3>
        </td>

        <td colspan="6" class="Fecha">
        <img src="../img/logoo.png" width='80' height='80' align="center">
        </td>
    </tr>
    <tr >
        <td  colspan="12" class="encabezado">
            Surtido A Farmacia
        </td>
    </tr>
    <tr>
        <td  colspan="3">
            Farmacia: <?php echo $farmacia; ?>
        </td>
        <td  colspan="3">
            Fecha: <?php echo $FechaPedido; ?>
        </td>
        <td  colspan="3">
            Hora: <?php echo $Horapedido; ?>
        </td>
        <td  colspan="3">
            Estatus: <?php echo $status; ?>
        </td>
    </tr> 
    <tr >
        <td  colspan="1" class="titular">
            #
        </td>
        <td  colspan="2" class="titular">
            Medicamento
        </td>
        <td  colspan="2" class="titular">
            Cantidad pedida
        </td>
        <td  colspan="2" class="titular">
             Cantidad Surtida
        </td>
        <td  colspan="2" class="titular">
             Diferencia
        </td>
        <td  colspan="2" class="titular">
             Fecha
        </td>
        <td  colspan="2" class="titular">
             Hora
        </td>
    </tr>

    <?php

        $n=1;
        while($row=mysql_fetch_row($consulta)){
            $Medicamento = $row[0];
            $cantidad   = $row[1];
            $Entrante   = $row[2];
            $diferencia   = $row[3];
            $Fechass   = $row[4];
            $Horass   = $row[5];
            
    ?>
        <tr >
            <td  colspan="1" class="borde">
                <p class="parrafo">
                    <?php echo $n; ?>
                </p>
            </td>
            <td  colspan="2" class="borde">
                <p class="parrafo">
                    <?php echo $Medicamento; ?>
                </p>
            </td>
            <td  colspan="2" class="borde">
                <p class="parrafo">
                    <?php echo $cantidad; ?>
                </p>
            </td>
            <td  colspan="2" class="borde">
                <p class="parrafo">
                    
                    <?php echo $Entrante; ?>
                </p>
            </td> 
            <td  colspan="2" class="borde">
                <p class="parrafo">
                    
                    <?php echo $diferencia; ?>
                </p>
            </td>
            <td  colspan="2" class="borde">
                <p class="parrafo">
                    
                    <?php echo $Fechass; ?>
                </p>
            </td>
            <td  colspan="2" class="borde">
                <p class="parrafo">
                    
                    <?php echo $Horass; ?>
                </p>
            </td>          
        </tr>
        
    <?php 
        $n++;
        }
    ?>
     <tr>
            <td  colspan="1" >
            </td>
            <td  colspan="2" class="borde">
                <p class="parrafo">
                   Totales:
                </p>
            </td>
            <td  colspan="2" class="borde">
                <p class="parrafo">
                    <?php echo $totalPedido; ?>
                </p>
            </td>
            <td  colspan="2" class="borde">
                <p class="parrafo">
                    <?php echo $TotalEntregado; ?>
                </p>
            </td>
            <td  colspan="2" class="borde">
                <p class="parrafo">
                    <?php echo $DiferenciaTotal; ?>
                </p>
            </td>
        </tr>
</table>

<table>
<col style="width: 10%">
    <col style="width: 10%">
    <col style="width: 10%">
    <col style="width: 10%">
    <col style="width: 10%">
    <col style="width: 10%">
    <col style="width: 10%">
    <col style="width: 10%">
    <col style="width: 10%">
    <col style="width: 10%">
    <!-- defino el ancho de la tabla -->
    <tr border="0">
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
    </tr>
    <tr >  
        <td  colspan="6">
            <br>
           <h5 align="center">Firma Almacen:  _______________________</h5>
        </td>
        <td  colspan="6" class="fecha">
            <strong><?php echo "$fechaEspanol"; ?></strong>
        </td>
    </tr> 
    <tr>
        <td  colspan="12" align="center">
            <hr>
        </td>
    </tr>
</table>