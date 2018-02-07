<?php 
	include 'partials/includer.php';
	include 'partials/cabezera.php';
	include 'partials/navbar.php';

	$sql = "SELECT * FROM `usuario` WHERE tipo = 1 AND id = ".$_GET["id"];
	if (($resultado = $conn->query($sql)) !== FALSE) {
		if ($resultado->num_rows > 0) {
			$row = $resultado->fetch_array(MYSQLI_ASSOC);
			$nombre = $row["nombre"];      
			$apellido = $row["apellido"];      
			$id = $row["id"];
			$email = $row["correo"];
			$estado = $row["estado"];
			$sql2 = "SELECT * FROM `info_usuario` WHERE usuario_id = ".$id;
			$vendedor = $conn->query($sql2);
			if (($resultado = $conn->query($sql2)) !== FALSE) {
				if ($resultado->num_rows > 0) {
					$datos_vendedor = $vendedor->fetch_array(MYSQLI_ASSOC);
					$direccion = $datos_vendedor["direccion"];
					$nacimiento = $datos_vendedor["nacimiento"];
					$paginaweb = $datos_vendedor["paginaweb"];
					$telefono = $datos_vendedor["telefono"];
					$img = $datos_vendedor["img"];
				}
			}
		}
	}
	$sql3 = "SELECT * FROM `producto` WHERE proveedor_id = ".$id;
 ?>


<div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $nombre." ".$apellido; ?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="img/<?php echo empty($img) ?  'sinfoto.png' : $img; ?>" class="img-circle img-responsive"> </div>
                
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Tipo de usuario</td>
                        <td>Proveedor</td>
                      </tr>
                      <tr>
                        <td>Fecha de nacimiento</td>
                        <td><?php echo @$nacimiento; ?></td>
                      </tr>
                      <tr>
                        <td>Página web</td>
                        <td><?php echo @$paginaweb; ?></td>
                      </tr>
                        <tr>
                        <td>Dirección</td>
                        <td><?php echo @$direccion; ?></td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td><a href="mailto:<?php echo  $email; ?>"><?php echo  $email; ?></a></td>
                      </tr>
                   	 <tr>
                        <td>Teléfono</td>
                        <td><?php echo @$telefono; ?><br>
                        </td>
                      </tr>
                     <?php if($_SESSION["tipo"]==0){ ?>
                   	 <tr>
                        <td>Acción</td>
                        <td>
            	<a href="<?php echo "cambiar_estado.php?id=".$row['id']."&tipo=proveedor&estado=".$estado; ?>"  class="btn btn-<?php if($estado == 0){ echo"danger";}else{echo"success";} ?>"><?php if($estado == 0) { echo"Dar de baja";}else{echo"Dar de alta";} ?></a>
                        	<br>
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php 	
	if (($resultado = $conn->query($sql3)) !== FALSE) {
		while($row = $resultado->fetch_array(MYSQLI_ASSOC)){ ?> ?>
		    <div class="container">
				<div class="row">
					<div class="[ col-xs-12 col-sm-offset-2 col-sm-8 ]">
						<ul class="event-list" style="width: 75%;margin-left: 13%;">
							<li>
								
								<img alt="<?php echo $row["nombre"]; ?>" src="img/productos/<?php echo empty($row['img']) ?  'sinfoto.png' : $row['img']; ?>" />
								<div class="info">
									<h2 class="title"><?php echo $row["nombre"]; ?></h2>
									<p class="desc"><?php echo $row["descripcion"]; ?></p>
								</div>
								<div class="social" style="margin-right:5%;">
									<ul>
										<li style="width:33%;display: block;width: 40px;padding: 10px 0px 9px;"><?php echo $row["precio"]." $"; ?></li>
									</ul>
								</div>
								<div align="right"><a href="<?php echo "ver_producto.php?id=".$row["id"]; ?>">ver mas</a></div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		<?php }

		}else{ ?>
		    <div class="container">
				<div class="row">
					<div class="[ col-xs-12 col-sm-offset-2 col-sm-8 ]">
						<ul class="event-list" style="width: 75%;margin-left: 13%;">
							<li>
								<div class="info">
									<center><h2 class="title">No posee productos</h2></center>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		<?php } ?>