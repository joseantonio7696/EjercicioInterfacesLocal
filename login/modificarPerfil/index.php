<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilosEditar.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>EDITAR PERFIL</title>
</head>
<body>
<div class="jumbotron text-center" style="margin-bottom:0">
  <h1>EDITA TU PERFIL</h1>
  <p>AQUI PODRAS MODIFICAR TUS DATOS DE PERFIL O INTRODUCIR SINO LO HAS HECHO</p> 
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <a class="navbar-brand" href="../" >Inicio</a>
  </div> 

  <div id="login" class="dropdown">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    <?php echo $_SESSION["correo"] ?> 
    </button>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="hola">Editar Perfil</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="../borrado.php"  >Login Out</a>
    </div>
  </div>
</div>
</nav>

<div class="container" style="width: 50%;">
<form>
  
  <div class="img-user">
  <input type="image" class="imgRedonda" src="imagenes/1.jpg" >
  </div>
  <label for="nombre" class="form-label">Nombre</label>
  <input name="nombre" type="text" class="form-control" ></input>
  <label for="apellido1" class="form-label">Apellido 1</label>
  <input name="apellido1" type="text" class="form-control" ></input>
  <label for="apellido2" class="form-label">Apellido 2</label>
  <input name="apellido2" type="text" class="form-control" ></input>
  <label for="contrasena" class="form-label">Contraseña</label>
  <input name="contrasena" type="text" class="form-control" ></input>
  <label for="correo" class="form-label">Correo Electronico</label>
  <input name="correo" type="text" class="form-control" ></input>
  <label for="domicilio" class="form-label">Domicilio</label>
  <input name="domicilio" type="text" class="form-control" ></input>
  <label for="poblacion" class="form-label">Poblacion</label>
  <input name="poblacion" type="text" class="form-control" ></input>
  <label for="provincia" class="form-label">Provincia</label>
  <input name="provincia" type="text" class="form-control" ></input>
  <label for="perfil" class="form-label">Perfil</label>
  <input name="perfil" type="text" class="form-control" ></input>
  <label for="dni" class="form-label">DNI</label>
  <input name="dni" type="text" class="form-control" ></input>
  <label for="numeroTelefono" class="form-label">Numero de Telefono</label>
  <input name="numeroTelefono" type="text" class="form-control" ></input>
  <label for="foto" class="form-label">Fotografia</label><br>
  <input name="foto" type="file" ></input>

</form>
</div>

<div class="jumbotron text-center" style="margin-bottom:0; margin-top: 80px; height: 10px">
  <p>JOSE ANTONIO MARQUEZ GONZALEZ</p>
</div>
</body>
</html>
