<?php 
	include 'partials/includer.php';
	include 'partials/cabezera.php';
	include 'partials/navbar.php';
	$id = $_GET["id"];
	$sql = "SELECT * FROM `requisicion` where `requisicion`.`id` = ".$id;
	if (($resultado = $conn->query($sql)) !== FALSE) {
		if ($resultado->num_rows > 0) {
			$row = $resultado->fetch_array(MYSQLI_ASSOC);
			$id = $row["id"];        
			$fecha = $row["fecha"];        
			$estado = $row["estado"];        
			$usuario_id = $row["usuario_id"];        
			$sql2 = "SELECT * FROM `usuario` WHERE id = ".$row["usuario_id"]." AND tipo = 2" ;
			$usuario = $conn->query($sql2);
			$datos_usuario = $usuario->fetch_array(MYSQLI_ASSOC);
			$sql3 = "SELECT * from `info_usuario` WHERE usuario_id = ".$row["usuario_id"];
			$info_usuario = $conn->query($sql2);
			$datos_info_usuario = $info_usuario->fetch_array(MYSQLI_ASSOC);
		}
	}
	$total = 0;
?>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<h2>Requisición</h2><h3 class="pull-right"># <?php echo $id; ?></h3>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    				<strong>Solicitante:</strong><br>
    					<?php echo $datos_usuario["nombre"]." ".$datos_usuario["apellido"]; ?><br>
    					<?php echo $datos_info_usuario["direccion"];?><br>
    					<?php echo $datos_usuario["correo"];?><br>
    				</address>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    					<strong>Fecha:</strong><br>
    					<?php echo $fecha; ?><br><br>
    				</address>
    			</div>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Resumen</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td><strong>Producto</strong></td>
        							<td class="text-center"><strong>Precio</strong></td>
        							<td class="text-center"><strong>Cantidad</strong></td>
        							<td class="text-right"><strong>Total</strong></td>
                                </tr>
    						</thead>
    						<tbody>
					<?php 
						if (($resultado = $conn->query($sql)) !== FALSE) {
							while($row = $resultado->fetch_array(MYSQLI_ASSOC)){ 
								$sql_1 = "SELECT * FROM `producto` WHERE `producto`.`id` = ".$row["producto_id"];
								if (($resultado = $conn->query($sql_1)) !== FALSE) {
										if ($resultado->num_rows > 0) {
											$row = $resultado->fetch_array(MYSQLI_ASSOC);
											$id = $row["id"];        
											$precio = $row["precio"];        
											$nombre = $row["nombre"];        
											$sql2 = "SELECT COUNT(id) AS 'cantidad' FROM requisicion WHERE id = ".$_GET["id"]." AND producto_id = ".$row["id"];
											$cantidad = $conn->query($sql2);
											$datos_cantidad = $cantidad->fetch_array(MYSQLI_ASSOC);							
										}
									}?>								

    							<tr>
    								<td><?php echo $nombre; ?></td>
    								<td class="text-center"><?php echo $precio; ?>$</td>
    								<td class="text-center"><?php echo $datos_cantidad["cantidad"]; ?></td>
    								<td class="text-right"><?php $total += (float)$precio*(int)$datos_cantidad["cantidad"];
    								echo ((float)$precio*(int)$datos_cantidad["cantidad"]); ?>$</td>
    							</tr>
					<?php }
				}?>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Total</strong></td>
    								<td class="no-line text-right"><?php echo $total; ?>$</td>
    							</tr>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</div>