<?php
require_once 'classes/posts.php';
$post = new Post();
$max = 0;
if(!$sesion->Valida() || !isset($_GET['id']) ){//si esta logueado
  print(json_encode(false));
  return false;
}
else{
  $max = $_GET['id'];
}

$datos = $post->getAll($max);
print(json_encode($datos));
?>
