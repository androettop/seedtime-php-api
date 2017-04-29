<?php
require_once 'classes/especies.php';
$especie = new Especie();
$reg = 0;
if(!isset($_GET['id']) ){
  print(json_encode(false));
  return false;
}
else{
  $reg = $_GET['id'];
}
$datos = $especie->getAllReg($reg);
print(json_encode($datos));
?>
