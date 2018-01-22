<?php  
  include 'partials/includer.php';
  include 'partials/cabezera.php';
  include 'partials/navbar.php';
  include 'partials/footer.php';

?>
<div class="center-form">
	<h4 class="title">Registro de Usuario</h4>
	<form class="form-horizontal" role="form" method="post" action="index.php">
	<div class="form-group">
	  <label for="name" class="col-sm-2 control-label">Nombre </label>
	  <div class="col-sm-10">
	    <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" value="">
	  </div>
	</div>
	<div class="form-group">
	  <label for="last_name" class="col-sm-2 control-label">Apellido </label>
	  <div class="col-sm-10">
	    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Apellido" value="">
	  </div>
	</div>
	<div class="form-group">
	  <label for="email" class="col-sm-2 control-label">Email</label>
	  <div class="col-sm-10">
	    <input type="email" class="form-control" id="email" name="email" placeholder="ejemplo@dominio.com" value="">
	  </div>
	</div>
	<div class="form-group">
	  <label for="password" class="col-sm-2 control-label">Contraseña</label>
	  <div class="col-sm-10">
	    <input class="form-control" type="password" class="form-control" id="password" name="password"></input>
	  </div>
	</div>
	<div id="divCheckbox" style="display: none;">
		<input type="text" name="new_user" value="1">
	</div>
	<div class="form-group">
	  <div class="col-sm-10 col-sm-offset-2">
	  <input id="submit" name="submit" type="submit" value="Enviar" class="btn btn-primary">
	  </div>
	</div>
	</form>
</div>