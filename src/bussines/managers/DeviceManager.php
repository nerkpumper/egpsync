<?php



class DeviceManager extends BaseManager
{

	protected $tableName = "dispositivos";
	
	public function getAll ()
	{
		$strQuery = "SELECT id, nombre, columnas ".
		            " FROM $this->tableName " ;
		
		$db = new DB();
		$db->open();
		
		$lst = $db->query_asoc($strQuery);
		
		$db->close();
		
		return $lst;
	}
	
	public function save(Device $dispositivo)
	{	
		$db = new DB();
		$db->open();
	
		$id = $db->real_escape_string($dispositivo->getId());
		$nombre = $db->real_escape_string($dispositivo->getNombre());
		$columnas = $db->real_escape_string($dispositivo->getColumnas());
	
		if($id == 0)
		{
			$sql = "INSERT INTO $this->tableName (nombre, columnas) 
			          VALUES('$nombre', '')";
	
			$db->query($sql);
	
			$dispositivo->setId($db->insert_id());			
			mkdir("assets/devices/" . $dispositivo->getId(), 0777);
		}
		else
		{	
			$sql = "UPDATE $this->tableName SET
			               nombre='$nombre',
			               columnas='$columnas'
			        WHERE id=$id ";
				
			$db->query($sql);
		}
	
		$db->close();
	}
	
	public function delete(Device $dispositivo)
	{
		$db = new DB();
		$db->open();
	
		$id = $db->real_escape_string($dispositivo->getId());
	
		$sql = "DELETE FROM $this->tableName WHERE id = $id ";
	
		$db->query($sql);
		$db->close();
	}
	
	public function load(Device $dispositivo)
	{
		$db = new DB();
		$db->open();
	
		$id = $db->real_escape_string($dispositivo->getId());
	
		$sql = " SELECT id, nombre, columnas
		           FROM $this->tableName WHERE id=$id";
		
		$lst = $db->query_asoc($sql);
	
		$db->close();
	
		foreach ($lst as $row)
		{
			$dispositivo->setNombre($row['nombre']);	
			$dispositivo->setColumnas($row['columnas']);
		}
	
	}
	
	public function existeNombreDispositivo($nombre, $idExcepcion)
	{
		return parent::existeCampoStringBase('nombre',$nombre,$idExcepcion);
	}
	
	public function existeId($id)
	{
		return parent::existeIdBase('id',$id);
	}
}