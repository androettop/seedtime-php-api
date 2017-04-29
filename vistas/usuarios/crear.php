<?php
header('Content-Type: application/json');
require_once 'classes/usuarios.php';
$usuario = new Usuario();
$usuario->setUser($_POST['user']);
$usuario->setPass($_POST['pass']);
$usuario->setEmail($_POST['email']);
$usuario->setNombre($_POST['nombre']);
$usuario->setApellido($_POST['apellido']);
$usuario->setUser($_POST['fecha']);
$usuario->setPrivilegio(0);
$salida = false;
if($usuario->Save()){
  $salida = true;
}
print(json_encode($salida));
?>
