<?php
header('Content-Type: application/json');
require_once 'classes/arboles.php';
require_once 'classes/usuarios.php';
require_once 'classes/sesiones.php';
$sesion = new Sesion($_POST['token']);
$usuario = new Usuario();
if(!$sesion->Valida() ){//si esta logueado
  print(json_encode(false));
  return false;
}
$usuario->setId($sesion->getId());
$arbol = new Arbol();
$arbol->setId($_POST['id']);
if($usuario->getPrivilegio() == 0 && $sesion->getId() != $arbol->getUser()){
  print(json_encode(false));
  return false;
}
$salida = false;
if($arbol->Eliminar()){
  $salida = true;
}
print(json_encode($salida));
?>
