<?php
/*
* Modulo: Post
* Version: 0.1A
* Dependencias:
* --Database.
* --Imagen.
* --Usuario.
*
* Manejador de Especies.
*/
class Especie extends Database {
	private $id, $nombre, $region,$img;
	private $table;
	private $datos = array();
	public function __construct() {
		$this->table = "especies";
		if(parent::Create($this->table,
  		"id INT UNSIGNED AUTO_INCREMENT,nombre VARCHAR(128), region INT, img INT,PRIMARY KEY(id)")){
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
	public function getAllReg($reg){
		return parent::SelectAll("*",$this->table,"region",$reg);
	}
	public function setId($id){
		$this->id = $id;
		$this->datos = parent::Select("*",$this->table,"id",$id);
		if($this->datos != false){
			$this->nombre = $this->datos[1];
			$this->region = $this->datos[2];
			$this->img = $this->datos[3];
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
	public function getNombre(){
		if($this->nombre != null){
			return $this->nombre;
		}
		else{
			return false;
		}
	}
	public function setNombre($nombre){
		$this->nombre = $nombre;
	}
	public function getRegion(){
		if($this->region != null){
			return $this->region;
		}
		else{
			return false;
		}
	}
	public function setRegion($region){
		$this->region = $region;
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
		return parent::Insert($this->table,array("nombre" => $this->nombre,"region" => $this->region,"img" => $this->img));
	}
	public function Actualizar(){
		if($this->id != null){
			return parent::Update($this->table,array("nombre" => $this->nombre,"region" => $this->region,"img" => $this->img),"id",$this->id);
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
