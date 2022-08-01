<?php
require 'includes/app.php';
incluirTemplate('header',$inicio=false)
?>

<main class="main--nosotros contenedor " >
    <div class="main__contenedor">
        <div class="main__imagen">
            <picture>
                <source  srcset="build/img/imagen2.webp" type="image/webp">
                <source  srcset="build/img/imagen2.avif" type="image/avif">
                <img     src="build/img/imagen2.jpg" alt="Imagen de un doctor">
            </picture>
        </div>
        <div class="main__contenido">
            <a href=""><h1>Lorem ipsum</h1></a>
            <p class="resaltar-texto">Dolore in ut amet Lorem .</p>
            <p class="texto-gris">Et tempor fugiat non adipisicing aliquip laborum velit laborum sint..</p>
            <p class="texto-chico">Lorem ipsum</p>
            <div class="main__listas">
                <ul >
                    <li class="texto-gris">Minim irure eu ipsum</li>
                    <li class="texto-gris">Ullamco non sint anim Lorem cupidatat.</li>
                    <li class="texto-gris">Commodo sunt culpa.</li>
                    <li class="texto-gris">Veniam culpa.</li>
                </ul>
                <ul >
                    <li class="texto-gris">Quis nostrud elit.</li>
                    <li class="texto-gris">Nulla ullamco.</li>
                    <li class="texto-gris">Sunt laborum eiusmod</li>
                    <li class="texto-gris">Proident minim.</li>
                </ul>
               
            </div>
            
            <a href="" class="btn-azul">Lorem ipsum</a>
           
        </div>
    </div>

</main><!--contenedor-->

<section class="contenedor">
        <a href=""><h2>Lorem ipsum</h2></a>
        
        <?php incluirTemplate('carousel');?>

</section><!--Carrusel-->


<?php
incluirTemplate('plataformas'); //Bloque de plataformas.
?>

<section class="section">
    <div class="contenedor">
        <div class="section__contenido">
            <h2 class="section__titulo">Lorem <span>_ipsum</span></h2>
            <p class="resaltar-texto">Officia adipisicing.</p>
            <p>Anim ex nostrud culpa culpa eiusmod fugiat eu fugiat ad elit elit amet,
                Voluptate aliqua nulla mollit veniam esse cillum aliquip eu.
            </p>

            <a href="/">Lorem ipsum</a>
        </div>
    </div>
</section><!--.section-->

<section class="formulario">
    <div class="formulario__contenedor">
        <div class="formulario__azul">
            <h2 class="formulario__titulo">
                Lorem ipsum
            </h2>

            <p class="resaltar-texto">Nulla cupidatat ullamco occaecat voluptate eu in.</p>

            <p>Non ut ut ut excepteur?</p>
            
            <a href="/">Lorem ipsum</a>
        </div><!--.formulario__azul-->

        <form class="formulario__form">
        <div class="contenedor-campos">
            <div class="campo contenedor">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" placeholder="Nombre completo">
            </div>
            
            <div class="campo contenedor">
                <label for="pais">Pais:</label>
                <select name="pais" id="pais">
                    <option value="" selected disabled>--Seleccione un pais--</option>
                    <option value="mexico">México</option>
                    <option value="usa">Usa</option>
                    <option value="canada">Canada</option>
                    <option value="otro">Otro</option>
                </select>
            </div>
         
            <div class="campo contenedor">
                <label for="email">E-mail:</label>
                <input type="email" name="email" id="email" placeholder="E-mail">
            </div>
            
            <div class="campo contenedor">
                <label for="ciudad">Ciudad:</label>
                <input type="text" name="ciudad" id="ciudad" placeholder="ciudad">
            </div>

            <div class="campo contenedor">
                <label for="telefono">Teléfono:</label>
                <input type="text" name="telefono" id="telefono" placeholder="Teléfono">
            </div>

            <input type="submit" class="btn-azul submit" value="Lorem ipsum">
        </div><!--.contenedor-campos-->
            

            <p class="texto-gris">Non est occaecat ut nostrud ullamco aute incididunt nulla sunt anim ea ex aliquip.</p>
            <p class="texto-gris">Consectetur incididunt ex nisi ipsum ipsum.</p>
        </form>


    </div>
</section>




<?php
incluirTemplate('footer');
?>