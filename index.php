<?php
require 'includes/app.php';
incluirTemplate('header',$inicio=true)
?>
    <main class="main contenedor">
        <div class="main__contenedor">
            <div class="main__contenido">
                <h2 class="main__titulo">Lorem ipsum dolor sit amet</h2>
                <p class="main__parrafo">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos magni excepturi</p>

                <ul class="main__lista">
                    <li class="elemento">Lorem ipsum dolor sit ame</li>
                    <li class="elemento">Lorem ipsum dolor sit ame</li>       
                </ul>

                <p class="elemento--resaltado">Lorem ipsum dolor sit ame</p>


            </div>

            <div class="main__imagen">
                <picture>
                    <source  srcset="build/img/imagen1.webp" type="image/webp">
                    <source  srcset="build/img/imagen1.avif" type="image/avif">
                    <img     src="build/img/imagen1.jpg" alt="Imagen de un doctor">
                </picture>
            </div>
        </div>

    </main><!--.main-->

    <div class="section-buscador">
        <section class="contenedor section-buscador__contenedor">
            <div class="section-buscador__descripcion">
                <h3>Lorem ipsum dolor sit ame</h3>
                <p>Lorem ipsum dolor sit ame, Quos magni excepturi</p>
            </div>
    
            <form  class="section-buscador__buscador">
                <input type="text">
                <input type="submit" value="Lorem ipsum" class="btn-azul">
            </form>
        </section>
        
    </div><!--.section-->
  
<?php
incluirTemplate('footer')
?>