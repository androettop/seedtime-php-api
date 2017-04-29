<?php
require_once 'classes/arboles.php';
require_once 'classes/sesiones.php';
$sesion = new Sesion($_POST['token']);
$arbol = new Arbol();
$id = 0;
if(!$sesion->Valida() || !isset($_GET['id']) ){//si esta logueado
  print(json_encode(false));
  return false;
}
else{
  $id = $_GET['id'];
}
$datos = array(
  'tipo' => $arbol->getTipo(),
  'fecha' => $arbol->getFecha(),
  'user' => $arbol->getUser(),
  'latitud' => $arbol->getLatitud(),
  'longitud' => $arbol->getLongitud(),
  'img' => $arbol->getImagen()
);

print(json_encode($datos));

?>
