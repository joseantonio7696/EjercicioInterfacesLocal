<?php
session_start();
?>

<html>

<head>
    <title>Problema</title>
</head>

<body>
    <?php
    $conexion = mysqli_connect("localhost", "root", "", "usuarios") or
        die("Problemas con la conexión");

    mysqli_query($conexion, "update usuarios
                          set Usuario_correo='$_REQUEST[correo]' 
                        where Usuario_correo='".$_SESSION['Usuario_email']."'") or
        die("Problemas en el select:" . mysqli_error($conexion));
        //ME QUEDE POR AQUI
    echo "El mail fue modificado con exito";
    ?>
</body>

</html>