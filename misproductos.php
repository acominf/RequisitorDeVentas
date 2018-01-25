<?php 
	include 'partials/includer.php';
	include 'partials/cabezera.php';
	include 'partials/navbar.php';
	$sql = "SELECT * FROM `producto` WHERE proveedor_id = ".$_SESSION["id"];
	if (isset($_POST["new_product"])){

		$directorio = "img/productos";
		$nombre_img = basename($_FILES["fileToUpload"]["name"]);
		$archivo = $directorio . $nombre_img;
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($archivo,PATHINFO_EXTENSION));
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		    if($check !== false) {
		        $uploadOk = 1;
		    } else {
		    	?>
		        <script type="text/javascript"> alert("El archivo no es una foto");</script>
		        <?php
		        $uploadOk = 0;
		    }
		}
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
	    	?>
	        <script type="text/javascript"> alert("Sólo se permiten los siguientes formatos: JPG, JPEG, PNG, GIF");</script>
	        <?php
		    $uploadOk = 0;
		}
		if ($uploadOk == 0) {
	    	?>
	        <script type="text/javascript"> alert("Hubo un error subiendo la foto");</script>
	        <?php
		} else {
		    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $archivo)) {
		        
		    } else {
		    	?>
		        <script type="text/javascript"> alert("Hubo un error subiendo la foto");</script>
		        <?php
		    }
		}
		$name = $_POST["name"];
	    $descripcion = $_POST["descripcion"];
	    $precio = $_POST["precio"];
	    if ($uploadOk == 0) {
      		$sql2 = "INSERT INTO `producto` (`proveedor_id`, `nombre`, `descripcion`) VALUES ('".$_SESSION["id"]."', '".$name."','".$descripcion."');";
		}else{
      		$sql2 = "INSERT INTO `producto` (`proveedor_id`, `nombre`, `descripcion`, `img`) VALUES ('".$_SESSION["id"]."', '".$name."','".$descripcion."', '".$nombre_img."');";
		}
		if (($resultado = $conn->query($sql2)) !== FALSE) {
	    	?>
	        <script type="text/javascript"> alert("Se han creado el producto satisfactoriamente");</script>
	        <?php
		}else{
			?>
		    <script type="text/javascript"> alert("Hubo un error creando el producto");</script>
		    <?php
		}
	}
	if (isset($_POST["edit_product"])){

		$directorio = "img/productos";
		$nombre_img = basename($_FILES["fileToUpload"]["name"]);
		$archivo = $directorio . $nombre_img;
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($archivo,PATHINFO_EXTENSION));
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		    if($check !== false) {
		        $uploadOk = 1;
		    } else {
		    	?>
		        <script type="text/javascript"> alert("El archivo no es una foto");</script>
		        <?php
		        $uploadOk = 0;
		    }
		}
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
	    	?>
	        <script type="text/javascript"> alert("Sólo se permiten los siguientes formatos: JPG, JPEG, PNG, GIF");</script>
	        <?php
		    $uploadOk = 0;
		}
		if ($uploadOk == 0) {
	    	?>
	        <script type="text/javascript"> alert("Hubo un error subiendo la foto");</script>
	        <?php
		} else {
		    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $archivo)) {
		        
		    } else {
		    	?>
		        <script type="text/javascript"> alert("Hubo un error subiendo la foto");</script>
		        <?php
		    }
		}
		$name = $_POST["name"];
	    $descripcion = $_POST["descripcion"];
	    $precio = $_POST["precio"];
	    if ($uploadOk == 0) {
      		$sql2 = "UPDATE  `producto` `proveedor_id`, `nombre`, `descripcion` VALUES ('".$_SESSION["id"]."', '".$name."','".$descripcion."');";
		}else{
      		$sql2 = "UPDATE  `producto` `proveedor_id`, `nombre`, `descripcion`, `img` VALUES ('".$_SESSION["id"]."', '".$name."','".$descripcion."', '".$nombre_img."');";
		}
		if (($resultado = $conn->query($sql2)) !== FALSE) {
	    	?>
	        <script type="text/javascript"> alert("Se han actualizado el producto satisfactoriamente");</script>
	        <?php
		}else{
			?>
		    <script type="text/javascript"> alert("Hubo un error actualizando el producto");</script>
		    <?php
		}
	}

 ?>

 <div class="container">
 	<center><a href="agregar_producto.php" class="btn btn-info">Agregar producto</a></center>

<?php 	
	if (($resultado = $conn->query($sql)) !== FALSE) {
		while($row = $resultado->fetch_array(MYSQLI_ASSOC)){ ?>
			<div class="col-xs-12 col-md-6">
				<div class="prod-info-main prod-wrap clearfix">
					<div class="row">
							<div class="col-md-5 col-sm-12 col-xs-12">
								<div class="product-image"> 
									<img src="img/productos/<?php echo empty($row['img']) ?  'sinfoto.png' : $row['img']; ?>" class="img-responsive"> 
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
										<span><?php echo $row['precio']; ?>$</span>
									</p>
									<span class="tag1"></span> 
							</div>
							<div class="description ">
								<p><?php echo $row['descripcion']; ?></p>
							</div>
							<div class="product-info smart-form">
								<div class="row">
									<div class="col-md-12">
										<a href="<?php echo "editar_producto.php?id=".$row['id']; ?>" class="btn btn-danger">Editar producto</a>
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
		<center><h4>No hay productos actualmente</h4></center>
	<?php } 
	?>
</div>
	
