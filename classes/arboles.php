<?php
/*
* Modulo: Arbol
* Version: 0.1A
* Dependencias:
* --Database.
* --Media.
* --Usuario.
*
* Objeto para manejar los arboles plantados.
*/
class Arbol extends Database {
	private $id, $tipo, $fecha, $user, $latitud,$longitud,$img;
	private $table;
	private $datos = array();
	public function __construct() {
		$this->table = "arboles";
		if(parent::Create($this->table,
		"id INT UNSIGNED AUTO_INCREMENT,tipo INT,fecha DATE, user INT,latitud FLOAT, longitud FLOAT, img INT,PRIMARY KEY(id)")){
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
	public function getAllEsp($tipo){
		return parent::SelectAll("*",$this->table,"tipo",$tipo);
	}
	public function setId($id){
		$this->id = $id;
		$this->datos = parent::Select("*",$this->table,"id",$id);
		if($this->datos != false){
			$this->tipo = $this->datos[1];
			$this->fecha = $this->datos[2];
			$this->user = $this->datos[3];
			$this->latitud = $this->datos[4];
			$this->longitud = $this->datos[5];
			$this->img = $this->datos[6];
			return true;
		}
		else{
			return false;
		}
	}
	public function getId(){
		if($this->id != null){
			return $this->id;
		}
		else{
			return false;
		}
	}
	public function getTipo(){
		if($this->tipo != null){
			return $this->tipo;
		}
		else{
			return false;
		}
	}
	public function setTipo($tipo){
		if(!empty($tipo)){
			$this->tipo = $tipo;
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
	public function setFecha($fecha){
		$this->fecha = $fecha;
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
	public function getLatitud(){
		if($this->latitud != null){
			return $this->latitud;
		}
		else{
			return false;
		}
	}
	public function setLatitud($latitud){
		if(!empty($latitud)){
			$this->latitud = $latitud;
		}
	}
	public function getLongitud(){
		if($this->longitud != null){
			return $this->longitud;
		}
		else{
			return false;
		}
	}
	public function setLongitud($longitud){
		if(!empty($longitud)){
			$this->longitud = $longitud;
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
	public function setImagen($img){
		if(!empty($img)){
			$this->img = $img;
		}
	}
	public function Save(){
		return parent::Insert($this->table,array("tipo" => $this->tipo,"fecha" => $this->fecha,"user" => $this->user,"latitud" => $this->latitud, "longitud" => $this->longitud,"img" => $this->img));
	}
	public function Actualizar(){
		if($this->id != null){
			return parent::Update($this->table,array("tipo" => $this->tipo,"fecha" => $this->fecha,"user" => $this->user,"latitud" => $this->latitud, "longitud" => $this->longitud,"img" => $this->img),"id",$this->id);
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
