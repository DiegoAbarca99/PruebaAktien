<?php 

require 'includes/app.php';


use App\Medico;


$medicos=Medico::all();


$resultado=$_GET['resultado']??null;

if($_SERVER["REQUEST_METHOD"]==='POST'){
    $id=$_POST['id'];
    $id=filter_var($id,FILTER_VALIDATE_INT);
    

    if($id){

        $medico=Medico::find($id);
        $medico->eliminar();
            
    }


 }

 incluirTemplate('header'); 
 ?>


    <main class="contenedor">
        <h1>Gestor de medicos del hospital</h1>
        <?php if(intval($resultado)===1){?>
            <p class="alerta exito">Creado correctamente</p>
        <?php } ?>
        <?php if(intval($resultado)===2){?>
            <p class="alerta exito">Actualizado correctamente</p>
        <?php } ?>

        <a href="/crear.php" class="btn-verde">Nuevo Registro</a>

        <div class="medicos">
            <?php foreach($medicos as $medico){?>
            <div class="medicos__elemento">
                <div class="medicos__imagen">
                    <img src="imagenes/<?php echo $medico->imagen?>" alt="Imagen médico">
                </div>
                <div class="medicos__contenido">

                    <p><span>Nombre: </span><?php echo $medico->nombre?> <?php echo $medico->apellido?></h3>

                    <p><span>Especialidad: </span> <?php echo $medico->especialidad?></p>

                </div>

                <form method="POST" class="w-100">
                    <input type="hidden" name="id" value="<?php echo $medico->id; ?>">
                     <input type="submit" value="Eliminar" class="btn-rojo">
                </form>

                <a href="/actualizar.php?id=<?php echo $medico->id; ?>" class="btn-amarillo">Actualizar</a>

              
               

            </div>
            <?php } ?>
        </div>

       

        
        
                    
            

    </main>


        
    
<?php 
 incluirTemplate('footer'); 
 ?>