<?php
/*
* Modulo: Usuario
* Version: 0.1A
* Dependencias:
* --Database.
* --Imagen.
*
* Manejador de cuentas de usuarios.
*/
class Usuario extends Database {
	private $id, $user, $pass, $email,$img, $nombre, $apellido,$privilegio,$fecha;
	private $table;
	private $datos = array();
	public function __construct() {
		$this->table = "usuarios";
		if(parent::Create($this->table,
		"id INT UNSIGNED AUTO_INCREMENT,usuario VARCHAR(14),pass VARCHAR(40),email VARCHAR(128),img INT,nombre VARCHAR(64),apellido VARCHAR(64),privilegio INT, fecha DATE,PRIMARY KEY(id),UNIQUE KEY `usuario` (`usuario`)")){
			return true;
		}
		else{
			return false;
		}
	}
	public function getTable(){
		return $this->table;
	}
	public function getAll(){
		return parent::SelectAll("*",$this->table);
	}
	public function setId($id){
		$this->id = $id;
		$this->datos = parent::Select("*",$this->table,"id",$id);
		$this->user = $this->datos[1];
		$this->pass = $this->datos[2];
		$this->email = $this->datos[3];
		$this->img = $this->datos[4];
		$this->nombre = $this->datos[5];
		$this->apellido = $this->datos[6];
		$this->privilegio = $this->datos[7];
		$this->fecha = $this->datos[8];
	}
	public function getId(){
		if($this->id != null){
			return $this->id;
		}
		else{
			return false;
		}
	}
	public function getUser(){
		if($this->user != null){
			return $this->user;
		}
		else{
			return false;
		}
	}
	public function setUser($user){
		if(!empty($user)){
					$this->user = $user;
		}
	}
	public function getPass(){
		if($this->pass != null){
			return $this->pass;
		}
		else{
			return false;
		}
	}
	public function setPass($pass){
		if(!empty($pass)){
					$this->pass = $pass;
		}
	}
	public function getEmail(){
		if($this->email != null){
			return $this->email;
		}
		else{
			return false;
		}
	}
	public function setEmail($email){
		if(!empty($email)){
					$this->email = $email;
		}
	}
	public function getImagen(){
		if($this->img != null){
			return $this->img;
		}
		else{
			return false;
		}
	}
	public function setNombre($nombre){
		if(!empty($nombre)){
					$this->nombre = $nombre;
		}
	}
	public function getNombre(){
		if($this->nombre != null){
			return ($this->nombre);
		}
		else{
			return false;
		}
	}
	public function setApellido($apellido){
		if(!empty($apellido)){
					$this->apellido = $apellido;
		}
	}
	public function getApellido(){
		if($this->apellido != null){
			return ($this->apellido);
		}
		else{
			return false;
		}
	}
	public function setPrivilegio($privilegio){
		if(!empty($privilegio)){
					$this->user = $privilegio;
		}
	}
	public function getPrivilegio(){
		if($this->privilegio != null){
			return $this->privilegio;
		}
		else{
			return false;
		}
	}
	public function setFecha($fecha){
		if(!empty($fecha)){
					$this->fecha = $fecha;
		}
	}
	public function getFecha(){
		if($this->fecha != null){
			return $this->fecha;
		}
		else{
			return false;
		}
	}
	public function setImagen($img){
		if(!empty($img)){
			$this->img = $img;
		}
	}
	public function Save(){
		return parent::Insert($this->table,array("usuario" => $this->user,"pass" => $this->pass,"email" => $this->email,"img" => $this->img,"nombre" => $this->nombre,"apellido" => $this->apellido,"privilegio" => $this->privilegio, "fecha" => $this->fecha));
	}
	public function Actualizar(){
		if($this->id != null){
			return parent::Update($this->table,array("usuario" =>$this->user,"pass" =>$this->pass,"email" =>$this->email,"img" =>$this->img,"nombre" =>$this->nombre,"apellido" =>$this->apellido,"privilegio" =>$this->privilegio, "fecha" => $this->fecha),"id",$this->id);
		}
		else{
			return false;
		}
	}
	public function Eliminar(){
		if($this->id != null){
			return parent::Delete($this->table,"id",$this->id);
		}
		else {
			return flase;
		}
	}
}
?>
