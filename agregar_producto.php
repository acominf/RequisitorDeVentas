<?php 
	include 'partials/includer.php';
	include 'partials/cabezera.php';
	include 'partials/navbar.php';

 ?>

 <div class="center-form">
	<h4 class="title">Agregar nuevo producto</h4>
	<form class="form-horizontal" role="form" method="post" action="misproductos.php" enctype="multipart/form-data">
	<div class="form-group">
	  <label for="name" class="col-sm-2 control-label">Nombre del Producto </label>
	  <div class="col-sm-10">
	    <input type="text" class="form-control" id="name" name="name" placeholder="" value="">
	  </div>
	</div>
	<div class="form-group">
	  <label for="imagen" class="col-sm-2 control-label">Foto del producto</label>
	  <div class="col-sm-10">
	    <input type="file" name="fileToUpload" id="fileToUpload">
	  </div>
	</div>
	<div class="form-group ">
	  <label for="price" class="col-sm-2 control-label">Precio del producto </label>
	  <div class="col-sm-10">
	    <input type="text" class="form-control" id="precio" name="precio" placeholder="" value="" onkeypress='return ((event.charCode >= 48 && event.charCode <= 57 ) || event.charCode <= 13 || event.charCode == 46)'>
		</div>
	</div>
	<div class="form-group">
	  <label for="web" class="col-sm-2 control-label">Descripción </label>
	  <div class="col-sm-10">
	  	<textarea class="form-control" rows="5" id="descripcion" name="descripcion"></textarea>
	  </div>
	</div>
	<div id="divCheckbox" style="display: none;">
		<input type="text" name="new_product" value="1">
	</div>
	<div class="form-group">
	  <div class="col-sm-10 col-sm-offset-2">
	  <input id="submit" name="submit" type="submit" value="Enviar" class="btn btn-primary">
	  </div>
	</div>
	</form>
</div>