<?php
require_once 'classes/sesiones.php';
$sesion = new Sesion($_POST['token']);
$salida=true;
if($Sesiones->Valida()){
  $salida = false;
}
print(json_encode($salida));
?>
