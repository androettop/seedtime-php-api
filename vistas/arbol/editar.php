<?php
header('Content-Type: application/json');
require_once 'classes/arboles.php';
require_once 'classes/sesiones.php';
require_once 'classes/usuarios.php';
$sesion = new Sesion($_POST['token']);
$id = 0;
$arbol = new Arbol();
$usuario = new Usuario();
$usuario->setId($sesion->getId());

if(!$sesion->Valida() || !isset($_GET['id']) ){//si esta logueado
  print(json_encode(false));
  return false;
}
else{
  $id = $_GET['id'];
}
if($usuario->getPrivilegio() == 0 && $sesion->getId() != $arbol->getUser()){
  print(json_encode(false));
  return false;
};
$arbol->setId($id);
if(isset($_POST['tipo'])){
  $arbol->setTipo($_POST['tipo']);
}
if(isset($_POST['fecha'])){
  $arbol->setFecha($_POST['fecha']);
}
if(isset($_POST['latitud'])){
  $arbol->setLatitud($_POST['latitud']);
}
if(isset($_POST['longitud'])){
  $arbol->setLongitud($_POST['longitud']);
}
if(isset($_POST['img'])){
  $arbol->setImagen($_POST['img']);
}
$salida = false;
if($arbol->Actualizar()){
  $salida = true;
}
print(json_encode($salida));
?>
