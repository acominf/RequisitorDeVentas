<?php 
	include 'partials/includer.php';
	include 'partials/cabezera.php';
	include 'partials/navbar.php';
	$sql = "SELECT * FROM `producto` WHERE  `estado` = 0";
 ?>
<div class="container">
<?php 	
	if (($resultado = $conn->query($sql)) !== FALSE) {
		while($row = $resultado->fetch_array(MYSQLI_ASSOC)){ ?>
			<div class="col-xs-12 col-md-6">
				<div class="prod-info-main prod-wrap clearfix">
					<div class="row">
							<div class="col-md-5 col-sm-12 col-xs-12">
								<div class="product-image"> 
									<img src="img/productos/<?php echo empty($row["img"]) ?  'sinfoto.png' : $row["img"]; ?>" class="img-responsive"> 
								</div>
							</div>
							<div class="col-md-7 col-sm-12 col-xs-12">
							<div class="product-deatil">
									<h5 class="name">
										<a href="<?php echo "ver_producto.php?id=".$row['id']; ?>">
										 	<?php echo $row['nombre']; ?>
										</a>
									</h5>
									<p class="price-container">
										<span>$<?php echo $row['precio']; ?></span>
									</p>
									<span class="tag1"></span> 
							</div>
							<div class="description">
								<p><?php echo $row['descripcion']; ?></p>
							</div>
							<div class="product-info smart-form">
								<div class="row">
									<div class="col-md-12">
							            <div class="section" style="padding-bottom:20px;">
							            	<a href="<?php echo "agregar_carrito.php?id=".$row['id']."&nombre=".$row['nombre']; ?>"  class="btn btn-success"><span style="margin-right:20px" class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Agregar al carrito</a>
							            </div>   
			                            <a href="<?php echo "ver_producto.php?id=".$row['id']; ?>" class="btn btn-info">Ver más</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	<?php 
		}
	}else{?>
		<h4>No hay productos actualmente</h4>
	<?php } 
	?>
</div>
	
<?php  include 'partials/footer.php'; ?>