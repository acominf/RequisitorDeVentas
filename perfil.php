<?php  
	include 'partials/includer.php';
	include 'partials/cabezera.php';
	include 'partials/navbar.php';
	$sql = "SELECT * FROM `info_usuario` WHERE `usuario_id` = '".$_SESSION['id']."'";
	if (($resultado = $conn->query($sql)) !== FALSE) {
		if ($resultado->num_rows > 0) {
			$row = $resultado->fetch_array(MYSQLI_ASSOC);
			$web = $row["paginaweb"];        
			$img = $row["img"];        
			$direccion = $row["direccion"];    
			$fecha = $row["nacimiento"];  
		}
	}
	if (isset($_POST["edit_user"])){

		$directorio = "img/";
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
		$direccion = $_POST["address"];
	    $web = $_POST["web"];
	    $fecha = $_POST["date"];
	    if ($uploadOk == 0) {
      		$sql2 = "INSERT INTO `info_usuario` (`usuario_id`, `direccion`, `nacimiento`, `paginaweb`) VALUES ('".$_SESSION["id"]."', '".$direccion."', '".$fecha."', '".$web."');";
		}else{
      		$sql2 = "INSERT INTO `info_usuario` (`usuario_id`, `direccion`, `nacimiento`, `paginaweb`, `img`) VALUES ('".$_SESSION["id"]."', '".$direccion."', '".$fecha."', '".$web."', '".$nombre_img."');";
		}
		if (($resultado = $conn->query($sql2)) !== FALSE) {
	    	?>
	        <script type="text/javascript"> alert("Se han actualizado los datos satisfactoriamente");</script>
	        <?php
		}else{
			?>
		    <script type="text/javascript"> alert("Hubo un error actualizado los datos");</script>
		    <?php
		}
	}
?>

<div class="center-form">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="row">
            <div class="col-sm-6 col-md-4">
                <img src="img/<?php echo empty($img) ?  'sinfoto.png' : $img; ?>" alt="" height="150" width="150" class="img-rounded img-responsive" />
            </div>
            <div class="col-sm-6 col-md-8">
                <h4><?php echo $_SESSION["nombre"]." ".$_SESSION["apellido"]; ?></h4>
                <small><cite title="<?php echo @$direccion; ?>"><i class="glyphicon glyphicon-map-marker"> <?php echo @$direccion; ?>
                </i></cite></small>
                <p>
                    <i class="glyphicon glyphicon-envelope"></i><?php echo  $_SESSION["email"]; ?>
                    <br />
                    <i class="glyphicon glyphicon-globe"></i><a href="<?php echo $web; ?>"><?php echo @$web; ?></a>
                    <br />
                    <i class="glyphicon glyphicon-gift"></i><?php echo @$fecha; ?>
                    <br />
                    <i class="glyphicon glyphicon-user"></i><?php 
						switch ($_SESSION["tipo"]) {
						    case 0:
						        echo "Administrador";
						        break;
						    case 1:
						        echo "Proveedor";
						        break;
						    case 2:
						        echo "Requisitor";
						        break;
						}
                     ?></p>
                <div class="btn-group">
                    <a href="editarperfil.php" class="btn btn-success">Editar datos</a>
                </div>
            </div>
        </div>
    </div>
</div>