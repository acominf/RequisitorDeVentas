<?php 
	include 'partials/includer.php';
	include 'partials/cabezera.php';
	include 'partials/navbar.php';

	$sql = "SELECT * FROM `requisicion` WHERE `usuario_id` = ".$_SESSION["id"]." GROUP BY `requisicion`.`id`";
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
	if (($resultado = $conn->query($sql)) !== FALSE) {
		while($row = $resultado->fetch_array(MYSQLI_ASSOC)){ ?> 
		    <div class="container">
				<div class="row">
					<div class="[ col-xs-12 col-sm-offset-2 col-sm-8 ]">
						<ul class="event-list" style="width: 75%;margin-left: 13%;">
							<li>
								<?php $date = explode("-",$row["fecha"]) ?>
								<time datetime="<?php echo $row["fecha"]; ?>">
									<span class="day"><?php echo $date[2]; ?></span>
									<span class="month"><?php echo $meses[$date[1]]; ?></span>
									<span class="year"><?php echo $date[0]; ?></span>
								</time>								
								<div class="info">
									<center><h2 class="title">Requisición #<?php echo $row["id"]; ?></h2></center>
									<center><p>Estado: <?php echo $row["estado"]== 0? "Por aprobar" :"Rechazado";  ?></p></center>
								</div>
							</li>
							<div align="right"><a href="<?php echo "editar_requisicion.php?id=".$row["id"]; ?>">editar</a></div>
							<div align="right"><a href="<?php echo "ver_requisicion.php?id=".$row["id"]; ?>">ver mas</a></div>
						</ul>
					</div>
				</div>
			</div>
	<?php }
	}
?>
