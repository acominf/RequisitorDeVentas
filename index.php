<?php 
  include 'partials/includer.php';
  include 'partials/cabezera.php';
  include 'partials/navbar.php';
 
  if (isset($_POST["new_user"])){
    $nombre = $_POST["name"];
    $apellido = $_POST["last_name"];
    $email = $_POST["email"];
    $contrasena = md5($_POST["password"]);
    $chequear_email = "SELECT * FROM `usuario` WHERE `correo` = '".$email."'";
    if ($resultado = mysql_query($chequear_email) && mysql_num_rows($resultado) > 0) {
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
    }else{
        ?>
        <script type="text/javascript">
          alert("El correo electronico ya está en uso");
        </script>
      <?php
    }
  }
  if (isset($_POST["login_user"])){
    $email = $_POST["email"];
    $contrasena = md5($_POST["password"]);
    $sql = "SELECT * FROM `usuario` WHERE `correo` = '".$email."' AND contrasena = '".$contrasena."'";
    if (($resultado = $conn->query($sql)) !== FALSE) {
      if ($resultado->num_rows > 0) {
        $row = $resultado->fetch_array(MYSQLI_ASSOC);
        $_SESSION['logeado'] = true;
        $_SESSION['nombre'] = $row['nombre'];
        $_SESSION['apellido'] = $row['apellido'];
        $_SESSION['id'] = $row['id'];        
        $_SESSION['email'] = $row['correo'];        
        $_SESSION['tipo'] = $row['tipo'];        
      }
    }
    $actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
    $prev_page = substr($_SERVER['HTTP_REFERER'], strpos($_SERVER['HTTP_REFERER'], $actual_link) + 37);
    header('Location: '.$prev_page);
  }
 ?>


 <?php include 'partials/footer.php'; ?>