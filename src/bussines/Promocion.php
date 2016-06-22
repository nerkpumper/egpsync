<?php

class Promocion extends Entity implements JsonSerializable
{
	#------------------------------------------------------------------------------------------------------#
	#----------------------------------------------Propiedades---------------------------------------------#
	#------------------------------------------------------------------------------------------------------#
	
	private $id;
	private $codigo;
	private $precio;
	private $fechainicio;
	private $fechafin;
	private $objPerfume;
	
	function __construct()
	{
		$this->id = 0;
		$this->codigo = "";
		$this->precio = 0;
		$this->objPerfume = null;
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
	
	public function getFechaInicio()
	{
		return $this->fechainicio;
	}
	
	public function getFechaFin()
	{
		return $this->fechafin;
	}
	
	public function getPrecio()
	{
		return $this->precio;
	}
	
	public function objPerfume()
	{
		if ($this->objPerfume == null)
		{
			if (strlen($this->getCodigo()) > 0)
			{
				$perfumeManager = new PerfumeManager();
				
				$this->objPerfume = new Perfume();
				$this->objPerfume->setCodigo($this->getCodigo());
				$perfumeManager->loadByCodigo($this->objPerfume);				
			}
			else 
			{
				return new Perfume();
			}
		}
		
		return $this->objPerfume;		
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
	
	public function setFechaInicio($fechainicio)
	{
		$this->fechainicio = $fechainicio;
	}
	
	public function setFechaFin($fechafin)
	{
		$this->fechafin = $fechafin;	
	}
	
	public function setPrecio($precio)
	{
		$this->precio = $precio;
	}
	
	public function jsonSerialize()
	{
		$obj = array();
		$obj['id'] = $this->getId();
		$obj['codigo'] = $this->getCodigo();
		$obj['fechainicio'] = $this->getFechaInicio();
		$obj['fechafin'] = $this->getFechaFin();
		$obj['precio'] = $this->getPrecio();	
	
		return $obj;
	}
	
	
}