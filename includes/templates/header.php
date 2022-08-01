<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.css">
    <link rel="stylesheet" href="build/css/app.css">
</head>
<body>
    <header class="header">
        <div class="header__contenedor">
            <div class="header__barra contenedor">

                
                <a class="header__enlace--principal" href="/">
                    <i class="fa-solid fa-heart-pulse"></i>
                     Mi hospital
                </a>
                 
    
                 <div class="header__menu">
    
                    <div class="mobile-menu">
                        <img src="/build/img/barras.svg" alt="Logo menu desplegable">
                    </div>
    
                    <nav class="header__navegacion">
                        <a href="/nosotros.php" class="header__enlace">Lorem ipsum</a>
                        <a href="/medicos.php" class="header__enlace">Lorem ipsum</a>
                        <a href="" class="header__enlace">Lorem ipsum</a>
                        <a href="" class="header__enlace">Lorem ipsum</a>
                    </nav>
    
                 </div>
               
            </div><!--.header__barra-->
        </div><!--.header__contenedor-->
        
    
        <div class="header__descripcion contenedor <?php echo $inicio===false?"ocultar":" " ?>">
            <h1>Lorem ipsum dolor sit amet </h1>
       
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. A, minus unde.</p>
        
            <div class="flex">
                <a href="" class="btn-transparente ">Lorem ipsum</a>
                <a href="" class="btn-transparente">Lorem ipsum</a>
            </div>
           
        </div> 
        <video class="header__video <?php echo $inicio===false ?"ocultar":" " ?>" autoplay muted loop>
            <source src="video/index.mp4" type="video/mp4">
        </video> 
    </header><!--.header-->

