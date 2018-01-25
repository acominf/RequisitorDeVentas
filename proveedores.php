<?php 
	include 'partials/includer.php';
	include 'partials/cabezera.php';
	include 'partials/navbar.php';
	$sql = "SELECT * FROM `usuario` WHERE `tipo` = 1 AND `estado` = 0";
 ?>
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
        		if (($resultado = $conn->query($sql)) !== FALSE) {
					while($row = $resultado->fetch_array(MYSQLI_ASSOC)){ ?>
                    <a href="<?php echo "ver_proveedor.php?id=".$row['id']; ?>"><li class="list-group-item">
                        <div class="col-xs-12 col-sm-3">
                            <img src="img/<?php echo empty($row['img']) ?  'sinfoto.png' : $row['img']; ?>" alt="<?php echo $row["nombre"]; ?>" class="img-responsive img-circle" />
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <h3><?php echo $row["nombre"]; ?></h3><br/>
                            <span class="glyphicon glyphicon-envelope" data-toggle="tooltip" title="<?php echo $row['correo']; ?>"><?php echo " ".$row['correo']; ?></span>
                        </div>
                        </a>
                        <?php if ($_SESSION["tipo"]==0) {
						?>
	                        <div class="col-xs-12 col-sm-3">
	                        	<br>
	                        	<br>
	                            <span class="glyphicon glyphicon-remove" data-toggle="tooltip" ></span>
	                        </div>                        
                        <?php } ?>
	                        <div class="clearfix"></div>
                    </li>
                 <?php }} ?>
                </ul>
            </div>
        </div>
	</div>
    

<?php  include 'partials/footer.php'; ?>
