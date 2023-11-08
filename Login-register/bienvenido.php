<?php

session_start();


if(!isset($_SESSION['usuario'])){
    echo '
       <script>
          alert("Por favor inicia sesion");
         window.location = "login1.php";
       </script>
    ';
    session_destroy();
    die();

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <tittle>Bienvenido</tittle>
</head>
<body>
    <h1>Bienvenido a GREENHOUSE TEC</h1>
    <a href="php/cerrar_session.php">Cerrar Sesion</a>
</body>
</html>