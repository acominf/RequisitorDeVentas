<?php 
	include 'partials/includer.php';
	include 'partials/cabezera.php';
	include 'partials/navbar.php';
	$sql2 = "SELECT * FROM `usuario` WHERE `tipo` != 0";
	$sql = "SELECT * FROM `requisicion` GROUP BY `requisicion`.`id`";
	$meses = array(
		"01" => "Enero",
		"02" => "Febrero",
		"03" => "Marzo",
		"04" => "Abril",
		"05" => "Mayo",
		"06" => "Junio",
		"07" => "Julio",
		"08" => "Agosto",
		"09" => "Septiembre",
		"10" => "Octubre",
		"11" => "Noviembre",
		"12" => "Diciembre",
	);
 ?>
 	<CENTER><h2>Usuarios</h2></CENTER>
    <div class="row">
        <div class="col-xs-12 col-sm-offset-3 col-sm-6">
            <div class="panel panel-default">
                <div class="row" style="display: none;">
                    <div class="col-xs-12">
                        <div class="input-group c-search">
                            <input type="text" class="form-control" id="contact-list-search">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search text-muted"></span></button>
                            </span>
                        </div>
                    </div>
                </div>
                <ul class="list-group" id="contact-list">
            	<?php  
        		if (($resultado = $conn->query($sql2)) !== FALSE) {
					while($row = $resultado->fetch_array(MYSQLI_ASSOC)){ ?>
					<?php if($row["tipo"] == 1) {
						?>
                    <a href="<?php echo "ver_proveedor.php?id=".$row['id']; ?>"><li class="list-group-item">

					<?php }else{ ?>

					<?php	}  ?>
                        <div class="col-xs-12 col-sm-3">
                            <img src="img/<?php echo empty($row['img']) ?  'sinfoto.png' : $row['img']; ?>" alt="<?php echo $row["nombre"]; ?>" class="img-responsive img-circle" />
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <h3><?php echo $row["nombre"]." ".$row["apellido"]; ?></h3>
                           
                            <span class="glyphicon glyphicon-envelope" data-toggle="tooltip" title="<?php echo $row['correo']; ?>"><?php echo " ".$row['correo']; ?></span>
                        </div>
                        </a>
				          <?php               
				            switch ($row["tipo"]) {
				              case 0:?>
				              	<h4>Administrador</h4>
				                <?php 
				                break;
				              case 1:
				                ?>
				              	<h4>Proveedor</h4>
				                <?php 
				                break;
				              case 2:
				                ?>
				              	<h4>Requisitor</h4>
				                <?php 
				                break;
				              } ?>
                        <?php if ($_SESSION["tipo"]==0) {
						?>
	                        <div class="col-xs-12 col-sm-3">
	                       	<?php if ($row["estado"]==0) {
									?>
	                        	<input type="checkbox" name="persona,<?php echo $row["id"]; ?>" id="estado_checkbox" value ="1"  checked><label> Habilitado</label><br>
	                        <?php }else{ ?>
	                        	<input type="checkbox" name="persona,<?php echo $row["id"]; ?>" id="estado_checkbox" value ="0"  ><label> Deshabilitado</label><br>
	                         <?php } ?>	                         
							<input type="radio"  name="tipo_usuario,<?php echo $row["id"]; ?>" id="usuario_radio" value="1" <?php if($row["tipo"] == 1){ echo "checked";} ?>>Proveedor <br>
							<input type="radio"  name="tipo_usuario,<?php echo $row["id"]; ?>" id="usuario_radio" value="2" <?php if($row["tipo"] == 2){ echo "checked";} ?>>Requisitor
	                        <div class="clearfix"></div>	                         
	                        </div>                        
                        <?php } ?>
	                        <div class="clearfix"></div>
                    </li>

                 <?php }} ?>
                </ul>
            </div>
        </div>
	</div>

 	<CENTER><h2>Requisiciones</h2></CENTER>
	<?php
	if (($resultado = $conn->query($sql)) !== FALSE) {
		while($row = $resultado->fetch_array(MYSQLI_ASSOC)){ ?> 
		    <div class="container">
				<div class="row">
					<div class="[ col-xs-12 col-sm-offset-2 col-sm-8 ]">
						<ul class="event-list" style="width: 88%;margin-left: 7%;">
							<li>
								<?php $date = explode("-",$row["fecha"]) ?>
								<time datetime="<?php echo $row["fecha"]; ?>">
									<span class="day"><?php echo $date[2]; ?></span>
									<span class="month"><?php echo $meses[$date[1]]; ?></span>
									<span class="year"><?php echo $date[0]; ?></span>
								</time>
								<div class="info">
									<?php
									$total = 0;
									$sql_req = "SELECT * FROM `requisicion` where `requisicion`.`id` = ".$row["id"]." GROUP BY `requisicion`.`producto_id";
									 
										if (($resultado_req = $conn->query($sql_req)) !== FALSE) {
											$sql_user = "select * from usuario where id =".$row["usuario_id"];
											if (($res_usuario = $conn->query($sql_user)) !== FALSE) {
												if ($res_usuario->num_rows > 0) {
													$user_row = $res_usuario->fetch_array(MYSQLI_ASSOC);
													$nombre_usuario = $user_row["nombre"]." ".$user_row["apellido"];
												}
											}										
											?>
										<center><h2 class="title">Requisición #<?php echo $row["id"]." - ".$nombre_usuario; ?></h2></center>
			                            <?php
			                            while($product_row = $resultado_req->fetch_array(MYSQLI_ASSOC)){ 
			                                $sql_1 = "SELECT * FROM `producto` WHERE `producto`.`id` = ".$product_row["producto_id"];
			                                if (($resultado2 = $conn->query($sql_1)) !== FALSE) {
			                                    while($result = $resultado2->fetch_array(MYSQLI_ASSOC)){
			                                        $id = $result["id"];        
			                                        $precio = $result["precio"];        
			                                        $sql2 = "SELECT COUNT(id) AS 'cantidad' FROM requisicion WHERE id = ".$row["id"]." AND producto_id = ".$result["id"];
			                                        $cantidad = $conn->query($sql2);
			                                        $datos_cantidad = $cantidad->fetch_array(MYSQLI_ASSOC);
			                                        $total += (float)$precio*(int)$datos_cantidad["cantidad"];
			                                    }
			                                }
			                            }?>
			                    <?php }?>
									<center><strong>Total: </strong>
    								$<?php echo $total; ?></center>
									<center style="position:  relative;top: -19px;">
									<div align="right"><a href="<?php echo "ver_requisicion.php?id=".$row["id"]; ?>">ver Requisicion</a></div>
			                       	<?php if ($row["estado"]==0) {
									?>
	                        	<input type="checkbox" name="requisicion,<?php echo $row["id"]; ?>" id="estado_checkbox" value ="1"  checked><label> Aprobada</label><br>
	                        <?php }else{ ?>
	                        	<input type="checkbox" name="requisicion,<?php echo $row["id"]; ?>" id="estado_checkbox" value ="0"  ><label> Rechazada</label><br>
	                         <?php } ?>
									</center>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
	<?php }
	}
?>


<script type="text/javascript">
    $(document).on("change", "#estado_checkbox", function() {
    	
    	valores = this.name.split(",");
    	id = valores[1];
    	nuevo_estado = this.value == 0 ? 1 : 0;
        $.ajax({ 
        	url: '/RequisitorDeVentas/cambiar_estado.php',
            context: this,
            data: {tipo: valores[0], id: valores[1], estado: this.value },
            type: 'post',
            success: function(result)
            {
                if(nuevo_estado==0)
                {	
                	$(this).siblings()[1].innerHTML = "Rechazada"
                	$(this).prop('checked', false);
                	location.reload();
                }else{
                	$(this).siblings()[1].innerHTML = "Aprobada"
                	$(this).prop('checked', true);
                	location.reload();
                }
            }
            
        });
    });
    $(document).on("change", "#usuario_radio", function() {
    	valores = this.name.split(",");
    	id = valores[1];
        $.ajax({ 
        	url: '/RequisitorDeVentas/cambiar_estado.php',
            context: this,
            data: {tipo: valores[0], id: valores[1], estado: this.value },
            type: 'post',
            success: function(result){
                location.reload();

            }
        });
    });    
</script>