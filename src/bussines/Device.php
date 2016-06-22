<?php

class Device extends Entity implements JsonSerializable
{
	private $id;
	private $nombre;
	private $columnas;
	
	function __construct()
	{
		$this->id = 0;
		$this->nombre = "";
	}
	
	public function getId()
	{
		return $this->id;
	}
	
	public function setId ($id)
	{
		$this->id = $id;
	}
	
	public function getNombre()
	{
		return $this->nombre;
	}
	
	public function setNombre($nombre)
	{
		$this->nombre = $nombre;
	}
	
	public function getColumnas()
	{
		return $this->columnas;
	}
	
	public function setColumnas($columnas)
	{
		$this->columnas = $columnas;
	}
	
	public function jsonSerialize()
	{
		$obj = array();
		$obj['id'] = $this->getId();
		$obj['nombre'] = $this->getNombre();		
	
		return $obj;
	}
}