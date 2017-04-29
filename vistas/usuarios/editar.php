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

if(isset($_POST['user'])){
  $usuario->setUser($_POST['user']);
}
if(isset($_POST['pass'])){
  $usuario->setPass($_POST['pass']);
}
if(isset($_POST['email'])){
  $usuario->setEmail($_POST['email']);
}
if(isset($_POST['nombre'])){
  $usuario->setNombre($_POST['nombre']);
}
if(isset($_POST['apellido'])){
  $usuario->setApellido($_POST['apellido']);
}
if(isset($_POST['fecha'])){
  $usuario->setFecha($_POST['fecha']);
}
if(isset($_POST['img'])){
  $usuario->setImagen($_POST['img']);
}
if(isset($_POST['privilegio']) && $usuario->getPrivilegio == 1){
  $usuario->setPrivilegio($_POST['privilegio']);
}
$salida = false;
if($usuario->Actualizar()){
  $salida = true;
}
print(json_encode($salida));
?>
