<?php

require "src/bussines/Device.php";
require "src/bussines/managers/DeviceManager.php";

class DeviceController extends Controller
{
	
	public function api()
	{
		$miarreglo;
		for ($i = 1 ; $i <= 10 ; $i++)
		{
			$d1 = new Device();
			$d1->setId($i);
			$d1->setNombre("Dispositivo $i");
			$miarreglo[$i] = $d1;			
		}
		
		return json_encode($miarreglo);		
	}
	
	public function index()
	{
		$param = array();		
		
		$dispositivoManager = new DeviceManager();
		
		$lst = $dispositivoManager->getAll();
		
		$param['view_accion'] = 'Listado de Dispositivos';
		$param['lst'] = $lst;
		
		return new View('device.index', $param);
	}
	
	public function details($id = 0)
	{
		$dispositivoManager = new DeviceManager();
		$param = array();
		
		if($id>0)
		{
			if(!$dispositivoManager->existeId($id))
				header('Location: '.URL.'');
		}
		else
		{						
			header('Location: '.URL.'device');				
		}
				
		$dispositivo = new Device();
		
		if ($id > 0)
		{
			$dispositivo->setId($id);
				
			$dispositivoManager->load($dispositivo);			
		}		
		
		$param['id'] = $dispositivo->getId();
		$param['nombre'] = $dispositivo->getNombre();
		$param['view_accion'] = 'Detalles del Dispositivo';		
		return new View('device.details', $param);
	}
			
	public function insertorupdate($id = 0)
	{
		$dispositivoManager = new DeviceManager();
		
		if($id>0)
		{
			if(!$dispositivoManager->existeId($id))
				header('Location: '.URL.'');
		}
		
		$param = array();
		$errorMsg = '';
		
		$nombre = '';
		
		$dispositivo = new Device();
		
		if ($id > 0)
		{
			$dispositivo->setId($id);
			
			$dispositivoManager->load($dispositivo);
			
			$nombre = $dispositivo->getNombre();
		}
		
		if(isset($_POST['btnGuardar']))
		{
			$nombre = $_POST['txtNombre'];
				
			$alert = '<div class="alert alert-danger"> ';
			$alert.= '<ul> ';
			$val_campos = 1;
				
			if($dispositivoManager->existeNombreDispositivo($nombre, $id))
			{
				$alert.= '<li>El nombre del Dispositivo ya est&aacute; registrado</li>';
				$val_campos = 0;
			}
				
			$alert.= '</ul>';
			$alert.= '</div>';
				
				
			if($val_campos)
			{
				$dispositivo->setNombre($nombre);
		
				$dispositivoManager->save($dispositivo);
		
				$param['view_accion'] = 'Crear Dispositivo';
				$param['msgSuccess'] = "<div class='alert alert-success' role='alert'>El Dispositivo <strong>$nombre</strong> ha sido almacenado con &eacute;xito.</div>";				
				if ($id > 0)
				{
					$param['id'] = $id;
					$param['nombre'] = $nombre;
					$param['msgSuccess'] = "<div class='alert alert-success' role='alert'>El Dispositivo <strong>$nombre</strong> ha sido actualizado con &eacute;xito.</div>";
				}
									
				return new View('device.insertorupdate', $param);
			}
			else
				$errorMsg = $alert;
		}
		
		$param['id'] = $id;
		$param['view_accion'] = 'Nuevo Dispositivo';
		if($id>0)
			$param['view_accion'] = 'Editar Dispositivo';
		
		$param['nombre'] = $nombre;
		$param['msgError'] = $errorMsg;
		return new View('device.insertorupdate', $param);		
	}
	
	public function confirmdestroy($id = 0)
	{
		$dispositivoManager = new DeviceManager();
		$param = array();
		
		$dispositivo = new Device();
		
		if($id>0)
		{
			if(!$dispositivoManager->existeId($id))
				header('Location: '.URL.'');
			
			$nombre = '';
				
			if ($id > 0)
			{
				$dispositivo->setId($id);
				
				$dispositivoManager->load($dispositivo);
			}
				
			$param['id'] = $dispositivo->getId();
			$param['nombre'] = $dispositivo->getNombre();
			$param['view_accion'] = 'Eliminar Dispositivo';
			return new View('device.confirmdestroy', $param);
		}			
		header('Location: '.URL.'device');
	}
	
	public function destroy ($id = 0)	
	{		
		if(isset($_POST['btnDelete']) && $id > 0)
		{
			$dispositivoManager = new DeviceManager();			
			
			$param = array();
												
			$dispositivo = new Device();		
			
			$dispositivo->setId($id);
		
			$dispositivoManager->delete($dispositivo);
		
			
			$param['msgSuccess'] = "<div class='alert alert-success' role='alert'>El Dispositivo ha sido eliminado con &eacute;xito.</div>";						
			$param['id'] = $dispositivo->getId();
			$param['nombre'] = $dispositivo->getNombre();
			$param['view_accion'] = 'Eliminar Dispositivo';
			return new View('device.confirmdestroy', $param);
		}	
		
		header('Location: '.URL.'device');		
	}	
}