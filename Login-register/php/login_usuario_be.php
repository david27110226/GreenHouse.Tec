<?php

session_start();
include 'conexion_be.php';

$Correo_Electronico= $_POST['Correo_Electronico'];
$Contraseña = $_POST['Contraseña'];
$Contraseña = hash('sha512', $Contraseña);

$validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE Correo_Electronico='$Correo_Electronico' 
and Contraseña='$Contraseña'");

if(mysqli_num_rows($validar_login) > 0){
    $_SESSION['usuario'] = $Correo_Electronico;
    header("location: ../bienvenido.php");
    exit;
}else{
    echo '
        <script>
        alert("Usuario no existe, verifique los datos introducidos");
        window.location = "../index.php";
        </script>
    ';
    exit();
}

?>