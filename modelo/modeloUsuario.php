<?php
include 'conexion.php';
include '../entidades/Usuario.php';

class modeloUsuario extends Conexion
{
    protected static $cnx;

    private static function getConexion()
    {
        self::$cnx = Conexion::conectar();
    }

    public static function login($usuario)
    {

        $usu = $usuario->getUsuario();
        $clave = $usuario->getClave();

        $query = 'SELECT * FROM usuarios WHERE usuario = :usuario AND clave = :clave;';

        self::getConexion();


        $resultado = self::$cnx->prepare($query);
        $resultado->bindParam(':usuario', $usu);
        $resultado->bindParam(':clave', $clave);

        $resultado->execute();

        if ($resultado->rowCount() > 0) {

            $filas = $resultado->fetch();

            if ($filas['usuario'] == $usu && $filas['clave'] == $clave) {

                return true;
            }
        }

        return false;
    }


    //metodo para obtener un usuario 
    public  function obtenerUsuario($usuario)
    {
        $usu = $usuario->getUsuario();
        $clave = $usuario->getClave();

        $query = 'SELECT clave,nombre,apellidos,edad,rol FROM usuarios WHERE usuario = :usuario AND clave = :clave;';

        self::getConexion();


        $resultado = self::$cnx->prepare($query);
        $resultado->bindParam(':usuario', $usu);
        $resultado->bindParam(':clave', $clave);

        $resultado->execute();

        $filas = $resultado->fetch();

        $usuario = new Usuario();

        
        $usuario->setClave($filas["clave"]);
        $usuario->setNombre($filas["nombre"]);
        $usuario->setApellidos($filas["apellidos"]);
        $usuario->setEdad($filas["edad"]);
        $usuario->setRol($filas["rol"]);



        return $usuario;
    }
}
