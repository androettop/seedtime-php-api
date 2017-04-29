<?php
header('Content-Type: application/json');
require_once 'classes/posts.php';
require_once 'classes/sesiones.php';
require_once 'classes/usuarios.php';
$sesion = new Sesion($_POST['token']);
$id = 0;
$post = new Post();
$usuario = new Usuario();

if(!$sesion->Valida() || !isset($_GET['id']) ){//si esta logueado
  print(json_encode(false));
  return false;
}
else{
  $id = $_GET['id'];
}
$usuario->setId($sesion->getId());
$post->setId($id);
if($usuario->getPrivilegio() == 0 && $sesion->getId() != $post->getAutor()){
  print(json_encode(false));
  return false;
};

if(isset($_POST['contenido'])){
  $post->setContenido($_POST['contenido']);
}
if(isset($_POST['fecha'])){
  $post->setFecha($_POST['fecha']);
}
if(isset($_POST['tags'])){
  $post->setTags($_POST['tags']);
}
if(isset($_POST['img'])){
  $post->setImagen($_POST['img']);
}
$salida = false;
if($post->Actualizar()){
  $salida = true;
}
print(json_encode($salida));
?>
