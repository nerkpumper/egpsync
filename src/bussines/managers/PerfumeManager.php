<?php

class PerfumeManager extends BaseManager
{
	
	protected $tableName = "perfume";
	
	public function getAll ()
	{
		$strQuery = "SELECT id, codigo, genero, idtipofrag, idmarca, nombre, descripcion, presentacion, existencia, stock, img, apartado, version, preciomayoreo, preciomedmay, preciomenudeo  ".
				     " FROM $this->tableName " ;
	
		$db = new DB();
		$db->open();
	
		$lst = $db->query_asoc($strQuery);
	
		$db->close();
	
		return $lst;
	}
	
	
	public function existeId($id)
	{
		return parent::existeIdBase('id',$id);
	}
	
	public function loadById(Perfume $perfume)
	{
		$db = new DB();
		$db->open();
		
		$id = $db->real_escape_string($perfume->getId());
		
		$sql = " SELECT  id, codigo, genero, idtipofrag, idmarca, nombre, descripcion, presentacion, existencia, stock, img, apartado, version, preciomayoreo, preciomedmay, preciomenudeo 
		         FROM $this->tableName WHERE id=$id";
		
		
		$lst = $db->query_asoc($sql);
		
		$db->close();
		
		foreach ($lst as $row)
		{
			$perfume->setId($row['id']);
			$perfume->setCodigo($row['codigo']);
			$perfume->setGenero($row['genero']);
			$perfume->setIdtipofrag($row['idtipofrag']);
			$perfume->setIdmarca($row['idmarca']);
			$perfume->setNombre($row['nombre']);
			$perfume->setDescripcion($row['descripcion']);
			$perfume->setPresentacion($row['presentacion']);
			$perfume->setExistencia($row['existencia']);
			$perfume->setStock($row['stock']);
			$perfume->setImg($row['img']);
			$perfume->setApartado($row['apartado']);
			$perfume->setVersion($row['version']);
			$perfume->setPreciomayoreo($row['preciomayoreo']);
			$perfume->setPreciomedmay($row['preciomedmay']);
			$perfume->setPreciomenudeo($row['preciomenudeo']);			
		}
	}
	
	public function loadByCodigo(Perfume $perfume)
	{
		$db = new DB();
		$db->open();
	
		$codigo = $db->real_escape_string($perfume->getCodigo());
	
		$sql = " SELECT  id, codigo, genero, idtipofrag, idmarca, nombre, descripcion, presentacion, existencia, stock, img, apartado, version, preciomayoreo, preciomedmay, preciomenudeo
		FROM $this->tableName WHERE codigo='$codigo'";
	
	
		$lst = $db->query_asoc($sql);
	
		$db->close();
	
		foreach ($lst as $row)
		{
			$perfume->setId($row['id']);
			$perfume->setCodigo($row['codigo']);
			$perfume->setGenero($row['genero']);
			$perfume->setIdtipofrag($row['idtipofrag']);
			$perfume->setIdmarca($row['idmarca']);
			$perfume->setNombre($row['nombre']);
			$perfume->setDescripcion($row['descripcion']);
			$perfume->setPresentacion($row['presentacion']);
			$perfume->setExistencia($row['existencia']);
			$perfume->setStock($row['stock']);
			$perfume->setImg($row['img']);
			$perfume->setApartado($row['apartado']);
			$perfume->setVersion($row['version']);
			$perfume->setPreciomayoreo($row['preciomayoreo']);
			$perfume->setPreciomedmay($row['preciomedmay']);
			$perfume->setPreciomenudeo($row['preciomenudeo']);
		}
	}
	
}