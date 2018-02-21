<?php 
  include 'partials/includer.php';
  include 'partials/cabezera.php';
  include 'partials/navbar.php';
 
  if (isset($_POST["new_user"])){
    $nombre = $_POST["name"];
    $apellido = $_POST["last_name"];
    $email = $_POST["email"];
    $contrasena = md5($_POST["password"]);
    $sql = "INSERT INTO `usuario` (`nombre`, `apellido`, `correo`, `contrasena`, `tipo`) VALUES ('".$nombre."', '".$apellido."', '".$email."', '".$contrasena."', '2');";
    if ($conn->multi_query($sql)=== TRUE){
      ?>
      <script type="text/javascript">
        alert("Se ha creado el usuario correctamente!");
      </script>
      <?php
    }else{
      ?>
      <script type="text/javascript">
        alert("Hubo un error creando el usuario");
      </script>
      <?php
    }
  }
  if (isset($_POST["login_user"])){
    $email = $_POST["email"];
    $contrasena = md5($_POST["password"]);
    $sql = "SELECT * FROM `usuario` WHERE `correo` = '".$email."' AND contrasena = '".$contrasena."'";
    if (($resultado = $conn->query($sql)) !== FALSE) 
    {
      if ($resultado->num_rows > 0) {
        $row = $resultado->fetch_array(MYSQLI_ASSOC);
        if($row["estado"] == 1)
        {
            ?>
              <script type="text/javascript">
              alert("Usuario Bloqueado");
            </script>
      <?php
        }
        else
        {
          
          $_SESSION['logeado'] = true;
          $_SESSION['nombre'] = $row['nombre'];
          $_SESSION['apellido'] = $row['apellido'];
          $_SESSION['id'] = $row['id'];        
          $_SESSION['email'] = $row['correo'];        
          $_SESSION['tipo'] = $row['tipo'];
          $_SESSION["carrito"] = [];
          $_SESSION["mensaje"] = FALSE;
        }
      }
    }else{
    ?>
    <script type="text/javascript">
      alert("Datos errados");
    </script>
    <?php
    }
    //$actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
    //$first = explode("index.php", $actual_link)[0];
    //$prev_link = $_SERVER['HTTP_REFERER'];
    //echo $_SERVER['HTTP_REFERER'];
    //$prev_page = substr($_SERVER['HTTP_REFERER'], strpos($_SERVER['HTTP_REFERER'], $actual_link));
    //echo $prev_page;
    //$arr = explode($first, $prev_link);
    //echo $arr[1];
    //$prev_page = $arr[1];
    
    header('Location: '."index.php");
  }

  if (@$_SESSION["mensaje"]) {
    ?>
    <script type="text/javascript">
      alert("Se ha creado su requisición con éxito");
    </script>
    <?php
    $_SESSION["mensaje"] = FALSE;
  }
 ?>


<div class="carousel fade-carousel slide" data-ride="carousel" data-interval="4000" id="bs-carousel">
  <!-- Overlay -->
  <div class="overlay"></div>

  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#bs-carousel" data-slide-to="0" class="active"></li>
    <li data-target="#bs-carousel" data-slide-to="1"></li>
    <li data-target="#bs-carousel" data-slide-to="2"></li>
  </ol>
  
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item slides active">
      <div class="slide-1"></div>
      <div class="hero">
        <hgroup>
            <h1>Todos los productos que buscas</h1>        
            <h3>Nosotros los tenemos</h3>
        </hgroup>
      </div>
    </div>
    <div class="item slides">
      <div class="slide-2"></div>
      <div class="hero">        
        <hgroup>
            <h1>El mejor equipo de proveedores</h1>        
         </hgroup>       
      </div>
    </div>
    <div class="item slides">
      <div class="slide-3"></div>
      <div class="hero">        
        <hgroup>
            <h1>Entregas en tiempo record</h1>        
        </hgroup>
      </div>
    </div>
  </div> 
</div>

 <?php include 'partials/footer.php'; ?>