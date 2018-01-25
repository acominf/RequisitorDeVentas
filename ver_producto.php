<?php 
	include 'partials/includer.php';
	include 'partials/cabezera.php';
	include 'partials/navbar.php';

	$sql = "SELECT * FROM `producto` WHERE id = ".$_GET["id"];
	if (($resultado = $conn->query($sql)) !== FALSE) {
		if ($resultado->num_rows > 0) {
			$row = $resultado->fetch_array(MYSQLI_ASSOC);
			$nombre = $row["nombre"];        
			$id = $row["id"];        
			$img = $row["img"];        
			$descripcion = $row["descripcion"];
			$estado = $row["estado"];
			$precio = $row["precio"];
			$sql2 = "SELECT * FROM `usuario` WHERE id = ".$row["proveedor_id"]." AND tipo = 1" ;
			$vendedor = $conn->query($sql2);
			$datos_vendedor = $vendedor->fetch_array(MYSQLI_ASSOC);
		}
	}
 ?>

<div class="container" style="margin-left: 18%;">
	<div class="row">
       <div class="col-xs-4 item-photo">
            <img style="max-width:100%;" src="img/productos/<?php echo empty($img) ?  'sinfoto.png' : $img; ?>" />
        </div>
        <div class="col-xs-5" style="border:0px solid gray">
            <!-- Datos del vendedor y titulo del producto -->
            <h3><?php echo $nombre; ?></h3>    
            <h5 style="color:#337ab7">vendido por <a href="<?php echo "ver_proveedor.php?id=".$row["proveedor_id"]; ?>"><?php echo $datos_vendedor["nombre"]." ".$datos_vendedor["apellido"]; ?></a></h5>
            <!-- Precios -->
            <h6 class="title-price"><small>PRECIO</small></h6>
            <h3 style="margin-top:0px;"><?php echo $precio; ?>$</h3>
            <?php if (isset($_SESSION['logeado']) && ($_SESSION['tipo'] == 2)){ ?>
	            <div class="section" style="padding-bottom:20px;">
	                <h6 class="title-attr"><small>CANTIDAD</small></h6>                    
	                <div>
	                    <div class="btn-minus"><span class="glyphicon glyphicon-minus"></span></div>
	                    <input value="1" />
	                    <div class="btn-plus"><span class="glyphicon glyphicon-plus"></span></div>
	                </div>
	            </div>
	            <!-- Botones de compra -->
	            <div class="section" style="padding-bottom:20px;">
	                <button class="btn btn-success"><span style="margin-right:20px" class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Agregar al carro</button>
	            </div>                                        
	        <?php }
	         if($_SESSION["tipo"] == 0){
			?>
            <div class="section" style="padding-bottom:20px;">
            	<a href="<?php echo "cambiar_estado.php?id=".$row['id']."&tipo=producto&estado=".$estado; ?>"  class="btn btn-<?php if($estado == 0){ echo"danger";}else{echo"success";} ?>"><?php if($estado == 0) { echo"Dar de baja";}else{echo"Dar de alta";} ?></a>
            </div>  
	        <?php }
	         ?>
        </div>                              
        <div class="col-xs-9">
            <ul class="menu-items">
                <li class="active">Detalle del producto</li>
            </ul>
            <div style="width:100%;border-top:1px solid silver">
                <p style="padding:15px;">
                    <small>
                    <?php echo $descripcion; ?>
                    </small>
                </p>
            </div>
        </div>		
    </div>
</div>  

<?php  include 'partials/footer.php'; ?>
