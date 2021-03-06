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
    <script>
        function comprobarClave(){
            let comprobado=true;
           clave1 = document.formuContrasena.nuevaContrasena.value;
           clave2 = document.formuContrasena.nuevaContrasenaRep.value;
        
            if (clave1 != clave2){
              document.getElementById("error").classList.add("mostrar");
              comprobado=false;
              
            }

               return comprobado;
            }
      </script>
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
  
  <?php

if ($_SESSION["Usuario_perfil"]=="ADMINISTRADOR") {
  ?>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
  <a class="navbar-brand" href="../administrador/" >Inicio</a>
  <div class="dropdown">
  <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown">
    Opciones de Administrador
  </button>
<div class="dropdown-menu">
      <a class="dropdown-item" href="./agregar/">Agregar Usuario</a>
      <a class="dropdown-item" href="./borrar/">Borrar Usuario</a>
      <a class="dropdown-item" href="./buscar/">Buscar Usuario</a>
</div>
</div>
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
      <a class="dropdown-item" href="./buscarDetalles.php">Editar Perfil</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="../borrado.php"  >Login Out</a>
    </div>
  </div>
</div>
</nav>

<div class="container" style="width: 50%;">
<form action="actualizarDatos.php" method="POST">
  <?php
  
  if (is_null($_SESSION["Usuario_fotografia"])) {
  ?>
  <div class="img-user">
    <img class="imgRedonda" src="imagenes/login.png">
  </div>
  <?php
  }else {
  ?>
  <div class="img-user">
    <img class="imgRedonda" src="./imagenes/<?php echo $_SESSION['Usuario_fotografia']?>">
  </div>
  <?php
  }
  ?>
  <label for="nombre" class="form-label">Nombre</label>
  <input name="nombre" type="text" class="form-control" pattern="[A-Z ]{2,254}" value="<?php echo $_SESSION['Usuario_nombre']?>" ></input>
  <label for="apellido1" class="form-label">Apellido 1</label>
  <input name="apellido1" type="text" class="form-control" pattern="[A-Z ]{2,254}" value="<?php echo $_SESSION['Usuario_apellido1']?>" ></input>
  <label for="apellido2" class="form-label">Apellido 2</label>
  <input name="apellido2" type="text" class="form-control" pattern="[A-Z ]{2,254}" value="<?php echo $_SESSION['Usuario_apellido2']?>" ></input>
  <label for="correo" class="form-label">Correo Electronico</label>
  <input name="correo" type="email" class="form-control" value="<?php echo $_SESSION['Usuario_email']?>" ></input>
  <label for="domicilio" class="form-label">Domicilio</label>
  <input name="domicilio" type="text" class="form-control" pattern="[A-Z ]{2,254}" value="<?php echo $_SESSION['Usuario_domicilio']?>" ></input>
  <label for="poblacion" class="form-label">Poblacion</label>
  <input name="poblacion" type="text" class="form-control" pattern="[A-Z ]{2,254}" value="<?php echo $_SESSION['Usuario_poblacion']?>" ></input>
  <label for="provincia" class="form-label">Provincia</label>
  <input name="provincia" type="text" class="form-control" pattern="[A-Z ]{2,254}" value="<?php echo $_SESSION['Usuario_provincia']?>" ></input>
  <label for="dni" class="form-label">DNI</label>
  <input name="dni" type="text" class="form-control" value="<?php echo $_SESSION['Usuario_dni']?>" ></input>
  <label for="numeroTelefono" class="form-label">Numero de Telefono</label>
  <input name="numeroTelefono" type="number" class="form-control" value="<?php echo $_SESSION['Usuario_numeroTelefono']?>" ></input>
  <input style="margin-top: 15px; margin-left: 40%;" type="submit" value="Guardar Datos">
</form>
<hr>
<h2>Cambiar Contrase??a</h2>
<form name="formuContrasena" action="actualizarContrasena.php" onsubmit="return comprobarClave()" method="POST">
  <label for="contrasena" class="form-label">Contrase??a actual</label>
  <input type="password" class="form-control" name="contrasena"/>
  <label for="nuevaContrasena" class="form-label">Nueva contrase??a</label>
  <input type="password" class="form-control" name="nuevaContrasena"/>
  <label for="nuevaContrasenaRep" class="form-label">Repita la contrasena</label>
  <input type="password" class="form-control" name="nuevaContrasenaRep"/>
  <input style="margin-top: 15px; margin-left: 40%;" type="submit" value="Cambiar Contrase??a">
</form>
<hr>
<h2>Cambiar Imagen de Perfil</h2>
<form  action="actualizarFotografia.php" method="POST" enctype="multipart/form-data">
  <label for="fotografia" class="form-label">Fotografia</label>
  <input type="file" class="form-control" name="fotografia"/>
  <input style="margin-top: 15px; margin-left: 40%;" type="submit" value="Subir Imagen">
</form>



</div>

<div class="jumbotron text-center" style="margin-bottom:0; margin-top: 80px; height: 10px">
  <p>JOSE ANTONIO MARQUEZ GONZALEZ</p>
</div>
</body>
</html>
