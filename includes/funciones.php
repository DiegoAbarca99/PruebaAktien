<?php

define('TEMPLATES_URL',__DIR__.'/templates');

function incluirTemplate($nombre,$inicio=false){
    include TEMPLATES_URL."/{$nombre}.php"; 
}

function s($html){
    $S= htmlspecialchars($html);
    return $S;
 }
 

