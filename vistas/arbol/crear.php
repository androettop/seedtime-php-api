<?php
header('Content-Type: application/json');
require_once 'classes/sesiones.php';
require_once 'classes/arboles.php';
$arbol = new Arbol();
$sesion = new Sesion($_POST['token']);
if(!$sesion->Valida()){
  print(json_encode(false));
  return false;
}
$arbol->setTipo($_POST['tipo']);
$arbol->setFecha($_POST['fecha']);
$arbol->setUser($sesion->getId());
$arbol->setLatitud($_POST['latitud']);
$arbol->setLongitud($_POST['longitud']);
$arbol->setImagen($_POST['img']);
$salida = false;
if($arbol->Save()){
  $salida = true;
}
print(json_encode($salida));
?>
