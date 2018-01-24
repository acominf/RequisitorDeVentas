<?php  
	include 'partials/includer.php';
	include 'partials/cabezera.php';
	include 'partials/navbar.php';
	$sql = "SELECT * FROM `info_usuario` WHERE `usuario_id` = '".$_SESSION['id']."'";
	if (($resultado = $conn->query($sql)) !== FALSE) {
		if ($resultado->num_rows > 0) {
			$row = $resultado->fetch_array(MYSQLI_ASSOC);
			$info_id = $row["id"];
			$web = $row["paginaweb"];        
			$img = $row["img"];        
			$direccion = $row["direccion"];    
			$fecha = $row["nacimiento"];
			$telefono = $row["telefono"];
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
		        <!--<script type="text/javascript"> alert("Hubo un error subiendo la foto");</script>-->
		        <?php
		    }
		}
		$direccion = $_POST["address"];
	    $web = $_POST["web"];
	    $fecha = $_POST["date"];
	    $telefono = $_POST["telefono"];
	    if ($uploadOk == 0) {
      		$sql2 = "REPLACE INTO `info_usuario` ('id', `usuario_id`, `direccion`, `nacimiento`, `paginaweb`, `telefono` ) VALUES ('".@$info_id."','".$_SESSION["id"]."', '".$direccion."', '".$fecha."', '".$web."', '".$telefono."');";
		}else{
      		$sql2 = "REPLACE INTO `info_usuario` ('id', `usuario_id`, `direccion`, `nacimiento`, `paginaweb`, `telefono` , `img`) VALUES ('".@$info_id."','".$_SESSION["id"]."', '".$direccion."', '".$fecha."', '".$web."', '".$telefono."', '".$nombre_img."');";
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

<div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $_SESSION["nombre"]." ".$_SESSION["apellido"]; ?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="img/<?php echo empty($img) ?  'sinfoto.png' : $img; ?>" class="img-circle img-responsive"> </div>
                
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Tipo de usuario</td>
                        <td><?php 
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
                     ?></td>
                      </tr>
                      <tr>
                        <td>Fecha de nacimiento</td>
                        <td><?php echo @$fecha; ?></td>
                      </tr>
                   
                         <tr>
                             <tr>
                        <td>Página web</td>
                        <td><?php echo @$web; ?></td>
                      </tr>
                        <tr>
                        <td>Dirección</td>
                        <td><?php echo @$direccion; ?></td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td><a href="mailto:<?php echo  $_SESSION["email"]; ?>"><?php echo  $_SESSION["email"]; ?></a></td>
                      </tr>
                        <td>Teléfono</td>
                        <td><?php echo @$telefono; ?><br>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <a href="editarperfil.php" class="btn btn-primary">Editar Perfil</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>