<?php

try {
    $conexion = new PDO ("mysql:dbname=miproyecto;host=127.0.0.1", "root","");
    echo "Conexion exitosa";
} catch (Excepcion $ex) {
    echo "Falló al conectarse a la BBDD". $ex->getMessage();
}


class baseDeDatos {
    private $gdb;

    function __contruct($driver,$baseDeDatos,$host,$user,$pass){
        $conexion = $driver.":dbname".$baseDeDatos.";host=$host";
        $this->gdb = new PDO($conexion,$user,$pass);

        if (!$this->gdb) {
            throw new Excepcion("No se ha podido generar la conexion";)
        }
    }


    function select($tabla,$filtros = null,$arr_prepare = null, $orden = null, $limit = null) {
        $sql = "SELECT * FROM".tabla;
        
        if ($filtros != null) {
            $sql.=" WHERE ".$filtros;
        }
        
        if ($orden != null){
            $sql.=" ORDER BY ".$order;
        }

        if($limit != null){
            $sql.=" LIMIT ".$limit;
        }

        $recurso = $this-> gbd -> prepare($sql);
        $recurso -> execute($arr_prepare);
        if($recurso) {
            return $recurso -> fetchAll(PDO::FETCH_ASSOC);
        } else {
            throw New Excepcion("No se pudo realizar  la consulta solicitada"); 
        }
    }
    
    function delete($tabla,$filtros = null,$arr_prepare = null){
        $sql = "DELETE FROM".$tabla."WHERE".$filtros;

        $recurso = $this-> gbd -> prepare($sql);
        $recurso -> execute($arr_prepare);
        if($recurso) {
            return $recurso -> fetchAll(PDO::FETCH_ASSOC);
        } else {
            throw New Excepcion("No se pudo realizar  la consulta solicitada"); 
        }
    }






















}






?>
