<?php
/*
* Modulo: Sesion
* Version: 0.1A
* Dependencias:
* --Database.
* --Usuarios.
* Manejador de Sesiones de usuario.
*
*/
class Sesion extends Database {
	private $id, $user, $pass, $token;
	public function __construct($token) {
    $this->token = $token;
    $this->id = substr($this->token,32,strlen($this->token)-1);
	}
	public function getId(){
    return $this->id;
	}
	public function Valida(){
    $id = substr($this->token,32,strlen($this->token)-1);
		$hash = substr($this->token,0,32);
    require_once 'classes/usuarios.php';
    $usuario = new Usuario();
    $usuario->setId($id);
    $newtoken = md5($usuario->getUser().".".$usuario->getPass().".").$id;
    if($this->token == $newtoken){
      return true;
    }
    else{
      return false;
    }
	}
}
?>
