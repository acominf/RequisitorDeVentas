<?php 
	include 'partials/includer.php';
	include 'partials/cabezera.php';
	include 'partials/navbar.php';

	?><form class="form-horizontal" role="form" method="post" action="confirmar_requisicion.php">
    <?php
	foreach ($_SESSION["carrito"] as &$valor) {
		$sql = "SELECT * FROM `producto` WHERE `id` = ".$valor["id"]." AND `nombre` = '".$valor["nombre"]."' AND `estado` = 0";
		if (($resultado = $conn->query($sql)) !== FALSE) {
			if ($resultado->num_rows > 0) {
				$row = $resultado->fetch_array(MYSQLI_ASSOC);
				$info_id = $row["id"];
				$nombre = $row["nombre"];        
				$img = $row["img"];        
				$precio = $row["precio"];    
				$descripcion = $row["descripcion"];
			} ?>
			    <div class="container">
					<div class="row">
						<div class="[ col-xs-12 col-sm-offset-2 col-sm-8 ]">
							<ul class="event-list" style="width: 75%;margin-left: 13%;">
								<li>
									<img alt="<?php echo $row["nombre"]; ?>" src="img/productos/<?php echo empty($row['img']) ?  'sinfoto.png' : $row['img']; ?>" />
									<div class="info">
										<h2 class="title"><?php echo $row["nombre"]; ?></h2>
										<div id="divCheckbox" style="display: none;">
											<input type="id" name="id[]" value="<?php echo $info_id; ?>">
										</div>
										<p class="desc"><?php echo $row["descripcion"]; ?></p>
									</div>
									<div class="social" style="margin-right:5%;">
										<ul>
											<li style="width:33%;display: block;width: 40px;padding: 10px 0px 9px;"><?php echo "$".$row["precio"] ?></li>
										</ul>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			<?php
		}
	}
 	?>	
		<div class="form-group">
		<div class="col-sm-10" style="margin-left: 58%;">
		<input id="submit" name="submit" type="submit" value="Guardar Requisición" class="btn btn-primary">
		</div>
		</div>
	</form>	