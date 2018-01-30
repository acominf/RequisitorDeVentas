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
 <form class="form-horizontal" role="form" method="post" action="cambiar_estado.php">
	<div id="divCheckbox" style="display: none;">
		<input type="text" name="cambiar_estado" value="1">
	</div>
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
	                        	<input type="checkbox" name="persona[<?php echo $row["id"]; ?>]" value ="1" checked> Habilitado<br>
	                        <?php }else{ ?>
	                        	<input type="checkbox" name="persona[<?php echo $row["id"]; ?>]" value ="0" > Deshabilitado<br>
	                         <?php } ?>
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
									<center><h2 class="title">Requisición #<?php echo $row["id"]; ?></h2></center>
									<center>
			                       	<?php if ($row["estado"]==0) {
									?>
	                        	<input type="checkbox" name="requisicion[<?php echo $row["id"]; ?>]" value ="1"  checked> Habilitado<br>
	                        <?php }else{ ?>
	                        	<input type="checkbox" name="requisicion[<?php echo $row["id"]; ?>]" value ="0"  > Deshabilitado<br>
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
<div class="form-group">
<div class="col-sm-10" style="margin-left: 58%;">
<input id="submit" name="submit" type="submit" value="Cambiar estado" class="btn btn-primary">
</div>
</div>
</form>