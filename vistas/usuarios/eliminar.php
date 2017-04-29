<?php
header('Content-Type: application/json');
require_once 'classes/usuarios.php';
require_once 'classes/sesiones.php';
$sesion = new Sesion($_POST['token']);

if(!$sesion->Valida() ){//si esta logueado
  print(json_encode(false));
  return false;
}

$id = $sesion->getId();
$usuario = new Usuario();
$usuario->setId($id);
if(isset($_GET['id'])){
  $id = $_GET['id'];
}

if($usuario->getPrivilegio == 0 && $sesion->getId != $id){
  print(json_encode(false));
  return false;
}
$salida = false;
if($usuario->Eliminar()){
  $salida = true;
}
print(json_encode($salida));
?>
