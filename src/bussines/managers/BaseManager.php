<?php 


class BaseManager
{
	protected $tableName = "";

	function __construct()
	{

	}

	public function existeIdBase($campo,$id)
	{
		$db = new DB();
		$db->open();

		$tabla = $db->real_escape_string($this->tableName);
		$campo = $db->real_escape_string($campo);
		$id = $db->real_escape_string($id);

		$sql = "SELECT Count(*) AS T FROM $tabla WHERE $campo =$id";

		$existe = $db->query_count($sql);
		$db->close();

		return $existe; 
	}

	public function existeCampoStringBase($campo,$valor,$idExcepcion = 0)
	{
		$db = new DB();
		$db->open();

		$tabla = $db->real_escape_string($this->tableName);
		$campo = $db->real_escape_string($campo);
		$valor = $db->real_escape_string($valor);
		$idExcepcion = $db->real_escape_string($idExcepcion);
		
		$sql = " SELECT Count(*) AS T FROM $tabla WHERE $campo = '$valor' ";
		if($idExcepcion!=0)
			$sql.= " AND id<>$idExcepcion";
		$existe = $db->query_count($sql);

		$db->close ();
		
		return $existe;
	}
	
	public function existeCampoStringBaseWhere($campo,$valor,$where, $idExcepcion = 0)
	{
		$db = new DB();
		$db->open();
	
		$tabla = $db->real_escape_string($this->tableName);
		$campo = $db->real_escape_string($campo);
		$valor = $db->real_escape_string($valor);
		$idExcepcion = $db->real_escape_string($idExcepcion);
	
		$sql = " SELECT Count(*) AS T FROM $tabla WHERE $campo = '$valor' AND $where ";
		if($idExcepcion!=0)
			$sql.= " AND id<>$idExcepcion";
			$existe = $db->query_count($sql);
	
			$db->close ();
	
			return $existe;
	}


}