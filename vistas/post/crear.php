<?php
header('Content-Type: application/json');
require_once 'classes/sesiones.php';
require_once 'classes/posts.php';
$post = new Post();
$sesion = new Sesion($_POST['token']);
if(!$sesion->Valida()){
  print(json_encode(false));
  return false;
}
$post->setContenido($_POST['contenido']);
$post->setAutor($sesion->getId());
$post->setFecha($_POST['fecha']);
$post->setTags($_POST['tags']);
$post->setImagen($_POST['img']);
$salida = false;
if($post->Save()){
  $salida = true;
}
print(json_encode($salida));
?>
