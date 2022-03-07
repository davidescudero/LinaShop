<?php

include 'controlador_usuario.php';

session_start();
header("Content-type: application/json");

$resultado = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["usuario"]) &&  isset($_POST["clave"])) {

        $txtUsuario = validar_campo($_POST["usuario"]);
        $txtClave =  validar_campo($_POST["clave"]);

        $resultado = array("estado" => "true");
        	
        if (UsuarioControlador::login($txtUsuario, $txtClave)) {
            
            $usuario = UsuarioControlador::obtenerUsuario($txtUsuario, $txtClave);
            return print(json_encode($resultado));
/*
            $_SESSION["usuario"] = array(
				"usuario" => $usuario->getUsuario(),
				"nombre" => $usuario->getNombre(),
				"apellidos" => $usuario->getApellidos(),
				"clave" => $usuario->getClave(),
				"edad" => $usuario->getEdad(),
				"rol" => $usuario->getRol() 
			);			*/
            
            return print(json_encode($resultado));	
        }
    }
}

$resultado = array("estado"=>"false");
return print(json_encode($resultado));	




function validar_campo($campo)
{
    $campo = trim($campo);
    $campo = stripcslashes($campo);
    $campo = htmlspecialchars($campo);
    return $campo;
}
