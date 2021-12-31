<?php

define('SERVIDOR', 'localhost');
define('NOMBRE_BD', 'develop');
define('USUARIO', 'root');
define('CLAVE', '');
$opciones = [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'];

try {
  $pdo = new PDO('mysql:host=' . SERVIDOR . ';dbname=' . NOMBRE_BD, USUARIO, CLAVE, $opciones);
  return $pdo;
} catch (Exception $e) {
  $respuesta = ['Error' => 'error: ' . $e->getMessage()];
  print json_encode($respuesta);
  die();
}
