<?php

class PromocionManager extends BaseManager
{
	protected $tableName = "promocion";
	
	public function getAll ()
	{
		$strQuery = "SELECT pro.id, p.id as idproducto, pro.codigo, pro.fechainicio, pro.fechafin, pro.precio, p.nombre, p.descripcion, m.nombre as marca, 
		                   (CASE WHEN curdate() >= STR_TO_DATE(pro.fechainicio, '%d/%m/%Y') AND curdate() <= STR_TO_DATE(pro.fechafin, '%d/%m/%Y') THEN 'ACTIVA' ELSE 'INACTIVA' END) AS estatus
                      FROM $this->tableName as pro 
		 			 INNER JOIN perfume as p
                        ON p.codigo = pro.codigo
                     INNER JOIN marca as m
                        ON m.id = p.idmarca";
	
		$db = new DB();
		$db->open();
	
		$lst = $db->query_asoc($strQuery);
	
		$db->close();
	
		return $lst;
	}
	
	public function loadByCodigo(Promocion $promocion)
	{
		$db = new DB();
		$db->open();
	
		$codigo = $db->real_escape_string($promocion->getCodigo());
	
		$sql = " SELECT  id, codigo, fechainicio, fechafin, precio
		       FROM $this->tableName WHERE codigo='$codigo'";
					
		$lst = $db->query_asoc($sql);
	
		$db->close();
	
		foreach ($lst as $row)
		{
			$promocion->setId($row['id']);
			$promocion->setCodigo($row['codigo']);
			$promocion->setFechaInicio($row['fechainicio']);
			$promocion->setFechaFin($row['fechafin']);
			$promocion->setPrecio($row['precio']);			
		}
	}
	
	public function save(Promocion $promocion)
	{
		$db = new DB();
		$db->open();

		$codigo = $db->real_escape_string($promocion->getCodigo());
		$fechainicio = $db->real_escape_string($promocion->getFechaInicio());
		$fechafin = $db->real_escape_string($promocion->getFechaFin());
		$precio = $db->real_escape_string($promocion->getPrecio());		
			
		$sql = "CALL PromocionInsert ('$codigo', '$fechainicio', '$fechafin', '$precio')";
					
		$db->query($sql);				
	
		$db->close();
	}
	
	public function existeId($id)
	{
		return parent::existeIdBase('id',$id);
	}
}