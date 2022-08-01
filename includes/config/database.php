<?php

function conectarDB(){
    $db=new mysqli('localhost','root','root','hospital');

    if(!$db){
        echo "Conexión fallida!";
        exit;
    }

    return $db;

}
