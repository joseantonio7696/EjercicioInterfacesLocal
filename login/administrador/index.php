<?php
session_start();
if ( !is_null($_SESSION["correo"])) {

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>MI PAGINA DE DISEÑO DE INTERFACES</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
  .fakeimg {
    height: 200px;
    width: 200px;
    background: #aaa;
  }
  </style>
</head>
<body>

<div class="jumbotron text-center" style="margin-bottom:0">
  <h1>PAGINA PRINCIPAL</h1>
  <p>HOLA  ADMINISTRADOR</p> 
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <?php

if ($_SESSION["Usuario_perfil"]=="ADMINISTRADOR") {
  ?>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
  <a class="navbar-brand" href="../administrador/" >Inicio</a>
</div> 
<?php
} else {
  ?>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
  <a class="navbar-brand" href="../cliente/" >Inicio</a>
</div> 
<?php
}
?>
  <div id="login" class="dropdown">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    <?php echo $_SESSION["correo"] ?> 
    </button>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="../modificarPerfil/buscarDetalles.php">Editar Perfil</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="../borrado.php">Login Out</a>
    </div>
  </div>
</div>

</nav>

<div class="container" style="margin-top:30px">
  <div class="row">
    <div class="col-sm-4">
      <h2>Sobre Ti:</h2>
      <h5>Tu foto:</h5>
      <?php

      if (isset($_SESSION["Usuario_fotografia"])) {
    
      ?>
      <div class="fakeimg"><img class="fakeimg" src="../modificarPerfil/imagenes/<?php echo $_SESSION['Usuario_fotografia']?>"/></div> 
      <?php
      } else {
      ?> 
        <div class="fakeimg"><img class="fakeimg" src="../modificarPerfil/imagenes/login.png"/></div>
      <?php
      }
      ?>
    </div>
  </div>
</div>

<div class="jumbotron text-center" style="margin-bottom:0; margin-top: 100px;">
  <p>Jose Antonio Marquez Gonzalez</p>
</div>

</body>
</html>

<?php
}else {
  
      $url = "../../";
      header("HTTP/1.1 301 Moved Permanently");
      header("Location: ".$url);
      exit(); 
       
} 
?>