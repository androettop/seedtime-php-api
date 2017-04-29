<?php
require_once 'classes/posts.php';
require_once 'classes/sesiones.php';
$sesion = new Sesion($_POST['token']);
$post = new Post();
$id = 0;
if(!$sesion->Valida() || !isset($_GET['id']) ){//si esta logueado
  print(json_encode(false));
  return false;
}
else{
  $id = $_GET['id'];
}
$datos = array(
  'tipo' => $post->getTipo(),
  'fecha' => $post->getFecha(),
  'user' => $post->getUser(),
  'latitud' => $post->getLatitud(),
  'longitud' => $post->getLongitud(),
  'img' => $post->getImagen()
);

print(json_encode($datos));

?>
