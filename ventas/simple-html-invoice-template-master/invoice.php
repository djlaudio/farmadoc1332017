<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>A simple, clean, and responsive HTML invoice template</title>

    <style>
    .invoice-box{
        max-width:800px;
        margin:auto;
        padding:30px;
        border:1px solid #eee;
        box-shadow:0 0 10px rgba(0, 0, 0, .15);
        font-size:16px;
        line-height:24px;
        font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color:#555;
    }

    .invoice-box table{
        width:100%;
        line-height:inherit;
        text-align:left;
    }

    .invoice-box table td{
        padding:5px;
        vertical-align:top;
    }

    .invoice-box table tr td:nth-child(2){
        text-align:right;
    }

    .invoice-box table tr.top table td{
        padding-bottom:20px;
    }

    .invoice-box table tr.top table td.title{
        font-size:45px;
        line-height:45px;
        color:#333;
    }

    .invoice-box table tr.information table td{
        padding-bottom:40px;
    }

    .invoice-box table tr.heading td{
        background:#eee;
        border-bottom:1px solid #ddd;
        font-weight:bold;
    }

    .invoice-box table tr.details td{
        padding-bottom:20px;
    }

    .invoice-box table tr.item td{
        border-bottom:1px solid #eee;
    }

    .invoice-box table tr.item.last td{
        border-bottom:none;
    }

    .invoice-box table tr.total td:nth-child(2){
        border-top:2px solid #eee;
        font-weight:bold;
    }

    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td{
            width:100%;
            display:block;
            text-align:center;
        }

        .invoice-box table tr.information table td{
            width:100%;
            display:block;
            text-align:center;
        }
    }
    </style>
</head>



















<h1>Resumen de Venta</h1>
<?php if(isset($_GET["id"]) && $_GET["id"]!=""):?>
<?php
$sell = SellData::getById($_GET["id"]);
$operations = OperationData::getAllProductsBySellId($_GET["id"]);
$total = 0;
$ivValue = 0;
?>
<?php
if(isset($_COOKIE["selled"])){
	foreach ($operations as $operation) {
//		print_r($operation);
		$qx = OperationData::getQYesF($operation->product_id);
		// print "qx=$qx";
			$p = $operation->getProduct();
		if($qx==0){
			echo "<p class='alert alert-danger'>El producto <b style='text-transform:uppercase;'> $p->name</b> no tiene existencias en inventario.</p>";
		}else if($qx<=$p->inventary_min/2){
			echo "<p class='alert alert-danger'>El producto <b style='text-transform:uppercase;'> $p->name</b> tiene muy pocas existencias en inventario.</p>";
		}else if($qx<=$p->inventary_min){
			echo "<p class='alert alert-warning'>El producto <b style='text-transform:uppercase;'> $p->name</b> tiene pocas existencias en inventario.</p>";
		}
	}
	setcookie("selled","",time()-18600);
}

?>
<table class="table table-bordered">



</table>
<br>
<br><br>
<div class="row">
<div class="col-md-4">
<table class="table table-bordered">
	<tr>
		<td><h4>Descuento:</h4></td>
		<td><h4>$ <?php echo number_format($sell->discount,2,'.',','); ?></h4></td>
	</tr>
	<tr>
		<td><h4>Subtotal:</h4></td>
		<td><h4>$ <?php echo number_format(($total-	$sell->discount),2,'.',','); ?></h4></td>
	</tr>
	<tr>
		<td><h4>IV:</h4></td>
		<td><h4>$ <?php echo number_format(($ivValue),2,'.',','); ?></h4></td>
	</tr>
	<tr>
		<td><h4>Total:</h4></td>
		<td><h4>$ <?php echo number_format($total-	$sell->discount + $ivValue,2,'.',','); ?></h4></td>
	</tr>
</table>


</div>
</div>
<div class="btn-group pull-right">
<a href="index.php?view=updatesellanular&id=<?php echo $sell->id; ?>" class="btn btn-xs btn-default"><i class="glyphicon glyphicon-pencil">Anular Factura</i></a>
</div>


<?php else:?>
	501 Internal Error
<?php endif; ?>








<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="Untitled.png" style="width:100%; max-width:300px;">
                            </td>

                            <td>
                                Factura #: 123<br>
                                29 de diciembre del 2016<br>

                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Jorge Chacon Rojas, Inc.<br>
                                300 N de Iglesia El Tremedal<br>
                                Tel: (506)8324-9197<br>
                                Ced Juridica: 20344041621
                            </td>

                            <td>
                              <?php if($sell->person_id!=""):
                              $client = $sell->getPerson();
                              ?>
                              <tr>
                              	<td style="width:150px;">Cliente</td>
                              	<td><?php echo $client->name." ".$client->lastname;?></td>
                              </tr>

                              <?php endif; ?>


                              <?php if($sell->user_id!=""):
                              $user = $sell->getUser();
                              ?>
                              <tr>
                              	<td>Atendido por</td>
                              	<td><?php echo $user->name." ".$user->lastname;?></td>
                              </tr>
                              <?php endif; ?>


                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>
                    Metodo de pago
                </td>

                <td>

                </td>
            </tr>

            <tr class="details">
                <td>
                  Deposito bancario
                </td>

                <td>

                </td>
            </tr>

            <tr class="heading">
                <td>
                    Descripcion
                </td>

                <td>
                    Precio
                </td>
            </tr>



            <thead>
              <th>Codigo</th>
              <th>Cantidad</th>
              <th>Nombre del Producto</th>
              <th>Término de pago</th>
              <th>Tipo de Pago</th>
              <th>Estado</th>
              <th>Precio Unitario</th>
              <th>Total</th>

            </thead>

            <table class="table table-bordered table-hover">

            <?php
            	foreach($operations as $operation){
            		$product  = $operation->getProduct();
            ?>
            <tr>
            	<td><?php echo $product->id ;?></td>
            	<td><?php echo $operation->q ;?></td>
            	<td><?php echo $product->name ;?></td>

            	<td><?php
            	switch ($sell->termino_id) {
            	    case 135:
            	        echo "Contado";
            	        break;
            	    case 137:
            	        echo "Crédito";
            	        break;

            	}?>

            	<?php
            	switch ($sell->iv) {
            	    case 0:
            	        $ivValue=0;
            	        break;
            	    case 1:
                  //En caso de que hay IV, se le suma el 0,13 al precio final con descuento
            	        $ivValue=($total-	$sell->discount)*0.13;
            	        break;

            	        break;
            	}?></td>

            	<td><?php echo $sell->tipo_pago == 0 ? "Efectivo" : "Tarjeta" ;?></td>
            	<td><?php echo $sell->anulada  == 0 ? "En Firme" : "Anulada";?></td>
            	<td>$ <?php echo number_format($product->price_out,2,".",",") ;?></td>
            	<td><b>$ <?php echo number_format($operation->q*$product->price_out,2,".",",");$total+=$operation->q*$product->price_out;?></b></td>
            </tr>
            <?php
            	}
            	?>
            </table>

            <tr class="Descripcion">
                <td>
                    Camisa playera azul
                </td>

                <td>
                    $300.00
                </td>
            </tr>

            <tr class="item">
                <td>
                    Pantalon mezclilla 20117
                </td>

                <td>
                    $75.00
                </td>
            </tr>

            <tr class="item last">
                <td>
                    Medias fastness
                </td>

                <td>
                    $10.00
                </td>
            </tr>
            <tr class="total">
                <td></td>

                <td>
                   Descuento: $0.00
                </td>
            </tr>
            <tr class="total">
                <td></td>

                <td>
                   IV: $50.05
                </td>
            </tr>
            <tr class="total">
                <td></td>

                <td>
                   Total: $435.05
                </td>
            </tr>
        </table>
        <BR>
          <BR>
          <Center>  Autorizado mediante resolucion 1197 del 3/9/97 D.G.T.D </CENTER>
    </div>


</body>
</html>
