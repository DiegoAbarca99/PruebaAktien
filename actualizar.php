<?php
require 'includes/app.php';


USE App\Medico;
USE Intervention\Image\ImageManagerStatic as Image;

$id=$_GET['id'];
$id=filter_var($id,FILTER_VALIDATE_INT);

if(!$id){
    header('Location: /');
}

$medico=Medico::find($id);
$errores=Medico::getErrores();


if($_SERVER['REQUEST_METHOD']==='POST'){
    $medico->sincronizar($_POST);

     $carpetaImagenes='./imagenes/';
     $nombre_imagen=md5(uniqid(rand(),true)).'.jpg';

    if($_FILES['imagen']['tmp_name']){

        $image=Image::make($_FILES['imagen']['tmp_name'])->fit(800,600);
 
         $medico->setImagen($nombre_imagen);
    }

    $errores=$medico->validar();


    if(empty($errores)){

  
        if($_FILES['imagen']['tmp_name']){
            $image->save($carpetaImagenes . $nombre_imagen);
        }
   
        $medico->guardar();
      
    
    }

}



incluirTemplate('header');
?>

<div class="contenedor">
    <h1>Registro de médicos del hospital</h1>
    <?php foreach($errores as $error){?>
        <div class="alerta error">
            <?php echo $error?>
        </div>
    <?php }?>
<form class="formulario__form" method="POST" enctype="multipart/form-data">
        <div class="contenedor-campos--crear">
            <div class="campo contenedor">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" placeholder="Nombre" value="<?php echo s($medico->nombre);?>">
            </div>
            
            <div class="campo contenedor">
                <label for="apellido">Apellido:</label>
                <input type="text" name="apellido" id="apellido" placeholder="Apellido" value="<?php echo s($medico->apellido);?>">
            </div>

            <div class="campo contenedor">
                <label for="especialidad">Especialidad:</label>
                <input type="text" name="especialidad" id="especialidad" placeholder="Especialidad" value="<?php echo s($medico->especialidad);?>">
            </div>

            <div class="campo contenedor">
                <label for="imagen">Imagen:</label>
                <input type="file" id="titulo" accept="image/jpge, image/png" name="imagen">
            </div>

            <?php if($medico->imagen){?>
                    <img src="/imagenes/<?php echo$medico->imagen?>" class="imagen-small">

            <?php }?> 

            
            <input type="submit" class="btn-amarillo submit" value="Lorem ipsum">
        </div><!--.contenedor-campos-->
            
        </form>


</div>


<?php
incluirTemplate('footer');
?>