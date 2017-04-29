<?php
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

$datos = array(
  'user' => $usuario->getUser(),
  'email' => $usuario->getEmail(),
  'img' => $usuario->getImagen(),
  'nombre' => $usuario->getNombre(),
  'apellido' => $usuario->getApellido(),
  'privilegio' => $usuario->getPrivilegio(),
  'fecha' => $usuario->getFecha()
);

print(json_encode($datos));

?>
