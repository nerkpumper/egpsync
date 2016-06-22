<?php

class Perfume extends Entity implements JsonSerializable
{
	#------------------------------------------------------------------------------------------------------#
	#----------------------------------------------Propiedades---------------------------------------------#
	#------------------------------------------------------------------------------------------------------#
	
	private $id;
	private $codigo;
	private $genero;
	private $idtipofrag;	
	private $idmarca;
	private $nombre;
	private $descripcion;
	private $presentacion;
	private $existencia;
	private $stock;
	private $img;
	private $apartado;
	private $version;
	private $preciomayoreo;
	private $preciomedmay;
	private $preciomenudeo;
	
	function __construct()
	{
		$this->id = 0;
		$this->codigo = "";
		$this->genero = "";
		$this->idtipofrag = 0;
		$this->idmarca = 0;
		$this->nombre = "";
		$this->descripcion = "";
		$this->presentacion = "";
		$this->existencia = 0;
		$this->stock = 0;
		$this->img = "";
		$this->apartado = 0;
		$this->version = 0;
		$this->preciomayoreo = "";
		$this->preciomedmay = "";
		$this->preciomenudeo = "";
		
	}
	
	#------------------------------------------------------------------------------------------------------#
	#----------------------------------------------Getters    ---------------------------------------------#
	#------------------------------------------------------------------------------------------------------#
	
	public function getId()
	{
		return $this->id;
	}
	
	public function getCodigo()
	{
		return $this->codigo;
	}
	
	public function getGenero()
	{
		return $this->genero;
	}
	
	public function getIdtipofrag()
	{
		return $this->idtipofrag;
	}
	
	public function getIdmarca()
	{
		return $this->idmarca;
	}
	
	public function getNombre()
	{
		return $this->nombre;
	}
	
	public function getDescripcion()
	{
		return $this->descripcion;
	}
	
	public function getPresentacion()
	{
		return $this->presentacion;
	}
	
	public function getExistencia()
	{
		return $this->existencia;
	}
	
	public function getStock()
	{
		return $this->stock;
	}
	
	public function getImg()
	{
		return $this->img;
	}
	
	public function getApartado()
	{
		return $this->apartado;
	}
	
	public function getVersion()
	{
		return $this->version;
	}
	
	public function getPreciomayoreo()
	{
		return $this->preciomayoreo;
	}
	
	public function getPreciomedmay()
	{
		return $this->preciomedmay;
	}
	
	public function getPreciomenudeo()
	{
		return $this->preciomenudeo;
	}
		
	
	#------------------------------------------------------------------------------------------------------#
	#----------------------------------------------Setters    ---------------------------------------------#
	#------------------------------------------------------------------------------------------------------#
	
	public function setId($id)
	{
		$this->id = $id;
	}
	
	public function setCodigo($codigo)
	{
		$this->codigo = $codigo;
	}
	
	public function setGenero($genero)
	{
		$this->genero = $genero;
	}
	
	public function setIdtipofrag($idtipofrag)
	{
		$this->idtipofrag = $idtipofrag;
	}
	
	public function setIdmarca($idmarca)
	{
		$this->idmarca = $idmarca;
	}
	
	public function setNombre($nombre)
	{
		$this->nombre = $nombre;
	}
	
	public function setDescripcion($descripcion)
	{
		$this->descripcion = $descripcion;
	}
	
	public function setPresentacion($presentacion)
	{
		$this->presentacion = $presentacion;
	}
	
	public function setExistencia($existencia)
	{
		$this->existencia = $existencia;
	}
	
	public function setStock($stock)
	{
		$this->stock = $stock;
	}
	
	public function setImg($img)
	{
		$this->img = $img;
	}
	
	public function setApartado($apartado)
	{
		$this->apartado = $apartado;
	}
	
	public function setVersion($version)
	{
		$this->version = $version;
	}
	
	public function setPreciomayoreo($preciomayoreo)
	{
		$this->preciomayoreo = $preciomayoreo;
	}
	
	public function setPreciomedmay($preciomedmay)
	{
		$this->preciomedmay = $preciomedmay;
	}
	
	public function setPreciomenudeo($preciomenudeo)
	{
		$this->preciomenudeo = $preciomenudeo;
	}
	
	public function jsonSerialize()
	{
		$obj = array();
		$obj['id'] = $this->getId();
		$obj['codigo'] = $this->getCodigo();
		$obj['genero'] = $this->getGenero();
		$obj['idtipofrag'] = $this->getIdtipofrag();
		$obj['idmarca'] = $this->getIdmarca();
		$obj['nombre'] = $this->getNombre();
		$obj['descripcion'] = $this->getDescripcion();
		$obj['presentacion'] = $this->getPresentacion();
		$obj['existencia'] = $this->getExistencia();
		$obj['stock'] = $this->getStock();
		$obj['img'] = $this->getImg();
		$obj['apartado'] = $this->getApartado();
		$obj['version'] = $this->getVersion();
		$obj['preciomayoreo'] = $this->getPreciomayoreo();
		$obj['preciomedmay'] = $this->getPreciomedmay();
		$obj['preciomenudeo'] = $this->getPreciomenudeo();
		
	
		return $obj;
	}
		
}