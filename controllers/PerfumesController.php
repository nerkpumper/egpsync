<?php

require "src/bussines/Perfume.php";
require "src/bussines/managers/PerfumeManager.php";
require "src/bussines/Promocion.php";
require "src/bussines/managers/PromocionManager.php";

class PerfumesController extends Controller
{
	public function promociones()
	{
		$param = array();
		
		$promocionManager = new PromocionManager();
		$listaPromociones = $promocionManager->getAll(); 
		
		$param['view_accion'] = 'Promociones';
		$param['lst'] = $listaPromociones;
		return new View('perfumes.promociones', $param, 'main');
	}
	
	public function searchperfumes($codigo = "", $nombre = "")
	{
		$strResult = "";
		
		$param = array();
		
		$perfumeManager = new PerfumeManager();
		
		$listaPerfumes = $perfumeManager->getAll();
		
		foreach ($listaPerfumes as $item)
		{
			$strResult .= "<tr>";
			$strResult .= "<td>" . $item["codigo"] . "</td>";
			$strResult .= "<td>" . $item["nombre"] . "</td>";
			$strResult .= "<td>" . $item["descripcion"] . "</td>";
			$strResult .= "<td><a class=' btn waves-effect waves-light'><i class='material-icons'>add</i></a></td>";
			$strResult .= "</tr>";
		}
		
		return $strResult;
	}
	
	public function addpromocion ()
	{
		$param = array();
		$perfumeManager = new PerfumeManager();
		
		$listaPerfumes = $perfumeManager->getAll();
		
		$param["lst"] = $listaPerfumes;
		$param['view_accion'] = 'Seleccione Producto para Promoci&oacute;n';
		return new View('perfumes.addpromocion', $param, 'main');
	}
	
	public function setdatepromocion($idperfume)
	{
		$perfumeManager = new PerfumeManager();
		
		if($idperfume>0)
		{
			if(!$perfumeManager->existeId($idperfume))
				header('Location: '.URL.'');
		}
		
		$p = new Perfume();
		$p->setId($idperfume);
		$perfumeManager->loadById($p);
		
		$promocion = new Promocion();
		$promocionManager = new PromocionManager();
		
		$promocion->setCodigo($p->getCodigo());
		$promocionManager->loadByCodigo($promocion);
			
		if(isset($_POST['btnGuardar']))
		{
			$fechaInicio = $_POST['dtInicio'];
			$fechaFin = $_POST['dtFin'];
			$precio = $_POST['txtPrecio'];
			$codigo = $_POST['txtCodigo'];
									
			
			
			$promocion->setCodigo($codigo);
			$promocion->setFechaInicio($fechaInicio);
			$promocion->setFechaFin($fechaFin);
			$promocion->setPrecio($precio);
			
			$promocionManager->save($promocion);
			header('Location: '.URL.'perfumes/promociones');
			
		}
		
				
		$param = array();
		$param["idperfume"] = $idperfume;
		$param["perfume"] = $p;
		$param["fechainicio"] = $promocion->getFechaInicio();
		$param["fechafin"] = $promocion->getFechaFin();
		$param["precio"] = ($promocion->getId() > 0 ? $promocion->getPrecio() : ""); 
		$param['view_accion'] = 'Establezca las fechas de la promoci&oacute;n';
		return new View('perfumes.setdatepromocion', $param, 'main');
		
	}
}