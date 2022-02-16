<?php

Class Conexion{
    static public function conectar(){
        $link = new PDO("mysql:host=localhost;dbname=db_lina_shop",
                        "root",
                        "");
        $link->exec("set names utf8");
        return $link;
    }
}