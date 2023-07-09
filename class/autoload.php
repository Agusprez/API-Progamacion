<?php

/* Agustin Gabriel Perez */

class Autocarga {
  
  static public function cargarClase($clase){
    $arrayClase = array();
    $base = __DIR__.DIRECTORY_SEPARATOR;

    $arrayClase['baseDeDatos'] = $base.'database.php';
    $arrayClase['Categorias'] = $base.'categorias.php';
    $arrayClase['Productos'] = $base.'productos.php';

    if(isset($arrayClase[$clase])){
      if(file_exists($arrayClase[$clase])){
        include $arrayClase[$clase];
      } else {
        throw new Exception("Archivo de clase no hallado [{$arrayClase[$clase]}]");
      }
    }
  }
}
spl_autoload_register('Autocarga::cargarClase');