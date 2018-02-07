<?php 
	include 'partials/includer.php';
	include 'partials/cabezera.php';
	include 'partials/navbar.php';
	$sql = "SELECT * FROM `requisicion` WHERE `requisicion`.`id` = ".$_GET["id"];

	if (isset($_POST["eliminar"])) {

		$sql3 = "DELETE FROM `requisicion` WHERE `producto_id` = ".$_POST["eliminar"]." AND `id` = ".$_GET["id"];
		$conn->query($sql3);
	}


	?>
	<center><h3>Editar Requisición #<?php echo $_GET["id"]; ?> </h3></center>
	<?php
	if (($resultado = $conn->query($sql)) !== FALSE) {
			while($row = $resultado->fetch_array(MYSQLI_ASSOC)){ 
				$sql2 = "SELECT * FROM `producto` WHERE `id` = ".$row["producto_id"];
                $productos = $conn->query($sql2);
                $producto = $productos->fetch_array(MYSQLI_ASSOC);?> 
				<div class="col-xs-12 col-md-6">
					<div class="prod-info-main prod-wrap clearfix">
						<div class="row">
								<div class="col-md-5 col-sm-12 col-xs-12">
									<div class="product-image"> 
										<img src="img/productos/<?php echo empty($producto['img']) ?  'sinfoto.png' : $producto['img']; ?>" class="img-responsive"> 
									</div>
								</div>
								<div class="col-md-7 col-sm-12 col-xs-12">
								<div class="product-deatil">
										<h5 class="name">
											<a href="<?php echo "ver_producto.php?id=".$row['id']; ?>">
											 	<?php echo $producto['nombre']; ?>
											</a>
										</h5>
										<p class="price-container">
											<span><?php echo $producto['precio']; ?>$</span>
										</p>
										<span class="tag1"></span> 
								</div>
								<div class="description ">
									<p><?php echo $producto['descripcion']; ?></p>
								</div>
								<div class="product-info smart-form">
									<div class="row">
										<div class="col-md-12">
										<form class="form-horizontal" role="form" method="post" action="editar_requisicion.php?id=<?php echo $_GET["id"]; ?>" enctype="multipart/form-data">
												<div id="divCheckbox" style="display: none;">
													<input type="text" name="eliminar" value="<?php echo $row["producto_id"]; ?>">
												</div>
											<div class="form-group">
											  <div class="col-sm-10 col-sm-offset-2">
											  <input id="submit" name="submit" type="submit" value="Eliminar" class="btn btn-danger">
											  </div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
	<?php } 
	} 
?>