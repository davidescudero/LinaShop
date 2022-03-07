<?php

include '../modelo/modeloUsuario.php';

class UsuarioControlador{
	
	public static function login($usuario,$clave){
		
		$obj_usuario = new Usuario();
		$obj_usuario->setUsuario($usuario);
		$obj_usuario->setClave($clave);

		return modeloUsuario::login($obj_usuario);	
			
	}
	
	public static function obtenerUsuario($usuario,$clave){
		
		$obj_usuario = new Usuario();

		$obj_usuario->setUsuario($usuario);
		$obj_usuario->setClave($clave);
		
		return modeloUsuario::obtenerUsuario($obj_usuario);
	}	
}	

