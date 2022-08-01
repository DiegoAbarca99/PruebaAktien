<?php
require 'funciones.php';
require 'config/database.php';
require __DIR__.'/../vendor/autoload.php';
USE App\Medico;

$database=conectarDB();
Medico::setDB($database);