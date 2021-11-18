<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilosEditar.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>BUSQUEDA DE USUARIO</title>
    
</head>
<body>
<div class="jumbotron text-center" style="margin-bottom:0">
  <h1>BUSQUEDA DE USUARIOS</h1>
  <p>AQUI PODRAS BUSCAR LOS USUARIOS SEÑOR ADMINISTRADOR</p> 
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <?php

  if ($_SESSION["Usuario_perfil"]=="ADMINISTRADOR") {
    ?>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <a class="navbar-brand" href="../../administrador/" >Inicio</a>
  
  <div class="dropdown">
  <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown">
    Opciones de Administrador
  </button>
<div class="dropdown-menu">
      <a class="dropdown-item" href="../agregar/">Agregar Usuario</a>
      <a class="dropdown-item" href="../borrar/">Borrar Usuario</a>
      <a class="dropdown-item" href="../buscar/">Buscar Usuario</a>
</div>
</div>
  </div> 
  <?php
  } else {
    ?>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <a class="navbar-brand" href="../../cliente/" >Inicio</a>
  </div> 
  <?php
  }
  
  ?>

  <div id="login" class="dropdown">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    <?php echo $_SESSION["correo"] ?> 
    </button>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="../../modificarPerfil/buscarDetalles.php">Editar Perfil</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="../../borrado.php"  >Login Out</a>
    </div>
  </div>
</div>
</nav>

<?php
        
        if ($_SESSION["idRegistrado"]==1) {
            $_SESSION["idRegistrado"]==0;
        ?>
        <div class="modal1" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
            
            <div class="modal-header" style="text-align: center;">
                <h4 class="modal-title">ERROR</h4>
            </div>

            
            <div class="modal-body" style="text-align: center;">
                EL ID NO ESTA REGISTRADO, POR FAVOR INTENTALO DE NUEVO
            </div>

            
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="document.getElementById('myModal').style.display='none'">Close</button>
            </div>

            </div>
            </div>
        </div>
        <?php
        }
        ?>


<div class="container" style="width: 50%; margin-top: 5%;">

<h1>BUSCAR USUARIOS</h1>

<form action="./mostrarTabla/" method="POST">
  <label for="seleccion" class="form-label">Seleccion: </label>
  <select name="seleccion">
        <option value="desbloquear">DESBLOQUEAR USUARIOS</option>
        <option value="borrarUsuarios">BORRAR USUARIOS</option>
        <option value="editarUsuarios">EDITAR USUARIOS</option>
  </select>
  <br>
  <label for="dni" class="form-label">DNI USUARIOS</label>
  <input name="dni" type="number" class="form-control" value="" ></input>
  <label for="provincia" class="form-label">PROVINCIA</label>
  <input name="provincia" type="text" class="form-control" value=""  ></input>
  <label for="email" class="form-label">EMAIL</label>
  <input name="email" type="text" class="form-control" value=""  ></input>
  <input style="margin-top: 15px; margin-left: 40%;" type="submit" value="BUSCAR USUARIOS">
</form>

</div>

<div class="jumbotron text-center" style="margin-bottom:0; margin-top: 80px; height: 10px">
  <p>JOSE ANTONIO MARQUEZ GONZALEZ</p>
</div>
</body>
</html>