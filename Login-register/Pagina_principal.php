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
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GREENHOUSE TEC</title>
    <link rel="stylesheet" href="assets/css/pagina2.css">
</head>

<body>
<a href="php/cerrar_session.php">Cerrar Sesion</a>
    <nav class="menu">
        <section class="menu__container">
            <h1 class="menu__logo"> <img src="html y css/img2.jpg"></h1>

            <ul class="menu__links">
                <li class="menu__item">
                    <a href="http://192.168.129.191/dht11_project/paso.php" class="menu__link">Base de datos</a>
                </li>
    
                <li class="menu__item menu__item--show">
                    <a href="mantenimientos.html" class="menu__link">Mantenimientos<img src="" class="menu__arrow"></a>
    
                   
    
                <li class="menu__item  menu__item--show">
                    <a href="" class="menu__link">Manuales<img src="" class="menu__arrow"></a>
    
                    <ul class="menu__nesting">
                        <li class="menu__inside">
                            <a href="Manuales.html" class="menu__link menu__link--inside">Manual de usuario</a>
                        </li>
                        <li class="menu__inside">
                            <a href="Manuales.html" class="menu__link menu__link--inside">Prototipo</a>
                        </li>
                    
                    </ul>
                </li>
    
                <li class="menu__item">
                    <a href="contacto1.php" class="menu__link">Contacto</a>
                </li>
    
            </ul>

            <div class="menu__hamburguer">
                <img src="" class="menu__img">
            </div>
        </section>

      
    </nav>
    <div class="container_titulo"> 
        <h2>GREENHOUSE TEC</h2>
        <p>¡Bienvenidos a nuestro sitio web! Aquí podrás conocer todo acerca de nuestro proyecto de invernadero automatizado. ¿Te imaginas poder controlar el nivel de humedad y temperatura de tus plantas desde la comodidad de tu hogar? Con nuestro sistema, podrás hacerlo. A través de nuestra página web, podrás monitorear y controlar los datos de tu invernadero en tiempo real. ¡Únete a la revolución de la agricultura inteligente y descubre cómo nuestro invernadero automatizado puede mejorar la calidad de tus cultivos! </p>

    </div>
    
    <script src="assets/js/pagina2.js"></script>
</body>
</html>