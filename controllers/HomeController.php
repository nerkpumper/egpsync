<?php

class HomeController extends Controller
{	
	public function index()
	{
		$param = array();
		$param['view_accion'] = 'Inicio';
		return new View('home.index', $param, 'main');
	}
	
	public function saludame()
	{
		return "<a id='btnBotonPrueba' class='waves-effect waves-light btn' onClick='saludar2();'>button</a>";
	}
}