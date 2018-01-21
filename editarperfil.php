<?php  
  include 'partials/includer.php';
  include 'partials/cabezera.php';
  include 'partials/navbar.php';
  $direccion = "-";
  $web = "-";
  $fecha = "dd/mm/yyyy";
  $img = "";
  $sql = "SELECT * FROM `info_usuario` WHERE `usuario_id` = '".$_SESSION['id']."'";
  if (($resultado = $conn->query($sql)) !== FALSE) {
	if ($resultado->num_rows > 0) {
		$row = $resultado->fetch_array(MYSQLI_ASSOC);
		$web = $row["paginaweb"];        
		$img = $row["direccion"];        
		$direccion = $row["direccion"];    
		$fecha = $row["nacimiento"];  
	}
  }
?>
<script> //date picker js
  $(document).ready(function() {  
      $('.datepicker').datepicker({
         todayHighlight: true,
         "autoclose": true,
      });
  });   
</script>
<div class="center-form">
	<h4 class="title">Editar datos de Usuario</h4>
	<form class="form-horizontal" role="form" method="post" action="perfil.php" enctype="multipart/form-data">
	<div class="form-group">
	  <label for="address" class="col-sm-2 control-label">Direccion </label>
	  <div class="col-sm-10">
	    <input type="text" class="form-control" id="address" name="address" placeholder="Direccion" value="<?php echo $direccion; ?>">
	  </div>
	</div>
	<div class="form-group">
	  <label for="web" class="col-sm-2 control-label">Pagina web </label>
	  <div class="col-sm-10">
	    <input type="text" class="form-control" id="web" name="web" placeholder="Apellido" value="<?php echo $web; ?>">
	  </div>
	</div>
	<div class="form-group">
	  <label for="date" class="col-sm-2 control-label">Fecha de nacimiento</label>
	  <div class="col-sm-10">
	    <input type="date" class="form-control" class="datepicker" id="date" name="date" value="">
	  </div>
	</div>
	<div class="form-group">
	  <label for="imagen" class="col-sm-2 control-label">Foto de perfil</label>
	  <div class="col-sm-10">
	    <input type="file" name="fileToUpload" id="fileToUpload">
	  </div>
	</div>
	<div id="divCheckbox" style="display: none;">
		<input type="text" name="edit_user" value="1">
	</div>
	<div class="form-group">
	  <div class="col-sm-10 col-sm-offset-2">
	  <input id="submit" name="submit" type="submit" value="Enviar" class="btn btn-primary">
	  </div>
	</div>
	</form>
</div>