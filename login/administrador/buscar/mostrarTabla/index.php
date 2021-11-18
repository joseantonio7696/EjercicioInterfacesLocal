<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $_SESSION['busquedaDni'] = $_POST['dni'];
  $_SESSION["seleccion"] = $_POST["seleccion"];
}

$per_page_record = 4;

$conexion = mysqli_connect("localhost", "root", "", "usuarios") or
  die("Problemas con la conexion");

  if ($_SESSION["seleccion"]=="borrarUsuarios") {
    $consulta = mysqli_query($conexion, "SELECT * FROM usuarios WHERE Usuario_nif LIKE '%" . $_SESSION['busquedaDni'] . "%'") or
  die("Problemas en el select:" . mysqli_error($conexion));
  }else if($_SESSION["seleccion"]=="desbloquear"){
    $consulta = mysqli_query($conexion, "SELECT * FROM usuarios WHERE Usuario_nif LIKE '%" . $_SESSION['busquedaDni'] . "%' AND Usuario_bloqueado= '1'") or
  die("Problemas en el select:" . mysqli_error($conexion));
  }else{
    $consulta = mysqli_query($conexion, "SELECT * FROM usuarios WHERE Usuario_nif LIKE '%" . $_SESSION['busquedaDni'] . "%'") or
  die("Problemas en el select:" . mysqli_error($conexion));
  }



$reg = mysqli_num_rows($consulta);

$total_pages = ceil($reg / $per_page_record);

if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page  = $_GET['page'];
}

$start_from = ($page - 1) * $per_page_record;

if ($_SESSION["seleccion"]=="borrarUsuarios") {
  $consulta = mysqli_query($conexion, "SELECT * FROM usuarios WHERE Usuario_nif LIKE '%" . $_SESSION['busquedaDni'] . "%' LIMIT " . $start_from . ',' . $per_page_record) or
  die("Problemas en el select:" . mysqli_error($conexion));
}else if($_SESSION["seleccion"]=="desbloquear"){
  $consulta = mysqli_query($conexion, "SELECT * FROM usuarios WHERE Usuario_nif LIKE '%" . $_SESSION['busquedaDni'] . "%' AND Usuario_bloqueado= '1' LIMIT " . $start_from . ',' . $per_page_record) or
  die("Problemas en el select:" . mysqli_error($conexion));
}else{
  $consulta = mysqli_query($conexion, "SELECT * FROM usuarios WHERE Usuario_nif LIKE '%" . $_SESSION['busquedaDni'] . "%' AND Usuario_perfil= 'CLIENTE' LIMIT " . $start_from . ',' . $per_page_record) or
  die("Problemas en el select:" . mysqli_error($conexion));
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <title>TABLA DE BUSQUEDA</title>
  <style>
    tr {
      text-align: center;
    }

    td {
      text-align: center;
    }

    #pasador {
      width: 100%;
      text-align: center;
      margin: 0 auto;
    }
  </style>

</head>
<h1></h1>

<body>
  <div class="jumbotron text-center" style="margin-bottom:0">
    <h1>AQUI TIENES LOS USUARIOS REGISTRADOS SEGUN EL PATRON DE BUSQUEDA</h1>
  </div>

  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <?php

    if ($_SESSION["Usuario_perfil"] == "ADMINISTRADOR") {
    ?>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <a class="navbar-brand" href="../../../administrador/">Inicio</a>

        <div class="dropdown">
          <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown">
            Opciones de Administrador
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="../../agregar/">Agregar Usuario</a>
            <a class="dropdown-item" href="../../borrar/">Borrar Usuario</a>
            <a class="dropdown-item" href="../../buscar/">Buscar Usuario</a>
          </div>
        </div>
      </div>
    <?php
    } else {
    ?>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <a class="navbar-brand" href="../../../cliente/">Inicio</a>
      </div>
    <?php
    }

    ?>

    <div id="login" class="dropdown">
      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
        <?php echo $_SESSION["correo"] ?>
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="../../../modificarPerfil/buscarDetalles.php">Editar Perfil</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="../../../borrado.php">Login Out</a>
      </div>
    </div>
    </div>
  </nav>

  <?php

  if ($_SESSION["seleccion"] == "borrarUsuarios") {


  ?>

    <form action="./borrado.php" method="POST">

      <table class="table table-hover table-responsive">
        <thead class="thead-dark">
          <tr>
            <th>Marcar</th>
            <th>Id</th>
            <th>Nombre</th>
            <th>Primer Apellido</th>
            <th>Segundo Apellido</th>
            <th>Usuario_email</th>
            <th>Usuario_domicilio</th>
            <th>Usuario_nif</th>
            <th>Usuario_numero_telefono</th>
            <th>Usuario_fecha_nacimiento</th>
            <th>Usuario_perfil</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($reg = mysqli_fetch_array($consulta)) {
            echo "<tr>";
            echo "<td><input type='checkbox' name='seleccion[]' value='" . $reg['Usuario_id'] . "'></input></td>";
            echo "<td>" . $reg['Usuario_id'] . "</td>";
            echo "<td>" . $reg['Usuario_nombre'] . "</td>";
            echo "<td>" . $reg['Usuario_apellido1'] . "</td>";
            echo "<td>" . $reg['Usuario_apellido2'] . "</td>";
            echo "<td>" . $reg['Usuario_email'] . "</td>";
            echo "<td>" . $reg['Usuario_domicilio'] . "</td>";
            echo "<td>" . $reg['Usuario_nif'] . "</td>";
            echo "<td>" . $reg['Usuario_numero_telefono'] . "</td>";
            echo "<td>" . $reg['Usuario_fecha_nacimiento'] . "</td>";
            echo "<td>" . $reg['Usuario_perfil'] . "</td>";
            echo "</tr>";
          }
          ?>
        </tbody>



      </table>

    <?php
  } else if($_SESSION["seleccion"] == "desbloquear") {

    ?>

      <form action="./desbloquear.php" method="POST">

        <table class="table table-hover table-responsive">
          <thead class="thead-dark">
            <tr>
              <th>Marcar</th>
              <th>Id</th>
              <th>Nombre</th>
              <th>Primer Apellido</th>
              <th>Segundo Apellido</th>
              <th>Usuario_email</th>
              <th>Usuario_domicilio</th>
              <th>Usuario_nif</th>
              <th>Usuario_numero_telefono</th>
              <th>Usuario_fecha_nacimiento</th>
              <th>Usuario_perfil</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while ($reg = mysqli_fetch_array($consulta)) {
              echo "<tr>";
              echo "<td><input type='checkbox' name='seleccion[]' value='" . $reg['Usuario_id'] . "'></input></td>";
              echo "<td>" . $reg['Usuario_id'] . "</td>";
              echo "<td>" . $reg['Usuario_nombre'] . "</td>";
              echo "<td>" . $reg['Usuario_apellido1'] . "</td>";
              echo "<td>" . $reg['Usuario_apellido2'] . "</td>";
              echo "<td>" . $reg['Usuario_email'] . "</td>";
              echo "<td>" . $reg['Usuario_domicilio'] . "</td>";
              echo "<td>" . $reg['Usuario_nif'] . "</td>";
              echo "<td>" . $reg['Usuario_numero_telefono'] . "</td>";
              echo "<td>" . $reg['Usuario_fecha_nacimiento'] . "</td>";
              echo "<td>" . $reg['Usuario_perfil'] . "</td>";
              echo "</tr>";
            }
            ?>
          </tbody>



        </table>

      <?php
    }else if($_SESSION["seleccion"] == "editarUsuarios") {

      ?>
  
        <form action="./editar.php" method="POST">
  
          <table class="table table-hover table-responsive">
            <thead class="thead-dark">
              <tr>
                <th>Marcar</th>
                <th>Id</th>
                <th>Nombre</th>
                <th>Primer Apellido</th>
                <th>Segundo Apellido</th>
                <th>Usuario_email</th>
                <th>Usuario_domicilio</th>
                <th>Usuario_nif</th>
                <th>Usuario_numero_telefono</th>
                <th>Usuario_fecha_nacimiento</th>
                <th>Usuario_perfil</th>
              </tr>
            </thead>
            <tbody>
              <?php
              while ($reg = mysqli_fetch_array($consulta)) {
                echo "<tr>";
                echo "<td><input type='checkbox' name='seleccion[]' value='" . $reg['Usuario_id'] . "'></input></td>";
                echo "<td>" . $reg['Usuario_id'] . "</td>";
                echo "<td>" . $reg['Usuario_nombre'] . "</td>";
                echo "<td>" . $reg['Usuario_apellido1'] . "</td>";
                echo "<td>" . $reg['Usuario_apellido2'] . "</td>";
                echo "<td>" . $reg['Usuario_email'] . "</td>";
                echo "<td>" . $reg['Usuario_domicilio'] . "</td>";
                echo "<td>" . $reg['Usuario_nif'] . "</td>";
                echo "<td>" . $reg['Usuario_numero_telefono'] . "</td>";
                echo "<td>" . $reg['Usuario_fecha_nacimiento'] . "</td>";
                echo "<td>" . $reg['Usuario_perfil'] . "</td>";
                echo "</tr>";
              }
              ?>
            </tbody>
  
  
  
          </table>
  
        <?php
      }
        ?>

      <nav aria-label="...">
        <ul class="pagination justify-content-center">
          <li class="page-item">
            <a class="page-link" href="./?page=1" tabindex="-1">Anterior</a>
          </li>

          <?php
          for ($page = 1; $page <= $total_pages; $page++) {
            echo "<li class='page-item'><a class='page-link' href='./?page=" . $page . "'>" . $page . "</a></li>";
          }
          ?>
          <li class="page-item">
            <a class="page-link" href="./?page=<?php echo $total_pages ?>">Último</a>
          </li>

        </ul>



        <div style="margin-left: 5%;">

          <?php

          if ($_SESSION["seleccion"] == "borrarUsuarios") {

          ?>

            <input class="btn btn-danger" type="submit" value="Borrar Registros" />

          <?php
          } else if($_SESSION["seleccion"] == "desbloquear") {

          ?>
            <input class="btn btn-danger" type="submit" value="Desbloquear Usuarios" />
          <?php
          }else if($_SESSION["seleccion"] == "editarUsuarios"){
            ?>
            <input class="btn btn-danger" type="submit" value="Editar Usuarios" />
          <?php
          }
          ?>

        </div>

      </nav>

      </form>

      </div>
</body>

</html>