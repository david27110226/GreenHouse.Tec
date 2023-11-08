<?php

   include 'conexion_be.php';


   $Nombre_Completo = $_POST['Nombre_Completo'];
   $Correo_Electronico = $_POST['Correo_Electronico'];
   $Contraseña = $_POST['Contraseña'];

   //Encriptamiento de contraseña
   $Contraseña = hash('sha512', $Contraseña);

   $query = "INSERT INTO usuarios(Nombre_Completo,Correo_Electronico,Contraseña)
             VALUES('$Nombre_Completo','$Correo_Electronico','$Contraseña')";
          
    //Verificar que el correo no se repita en la base de datos
$verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE Correo_Electronico='$Correo_Electronico'");


    if(mysqli_num_rows($verificar_correo) > 0){
    	echo '
    	    <script>
    	        alert("este correo ya esta registrado, intenta con otro diferente");
    	        window.location = "../index.php";
    	    </script>
    	';
    	exit();
    }
  
   
    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
          echo '
           <script>
              alert("Usuario almacenado exitosamente");
              window.location = "../login1.php";
              </script>
           ';
    }else{
        echo '
        <script>
              alert("Intentalo de nuevo, usuario no almacenado");
              window.location = "../login1.php";
              </script>
            ';
    }
 
    mysqli_close($conexion); 

?>



