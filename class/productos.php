<?php

  class Productos {

    protected $id;
    public $nombre;
    public $descipcion;
    public $precio; 
    public $categoria;
    public $imagen;
    private $exist = false;

    function __construct($id) {
      $db = new baseDeDatos("mysql","miproyecto", "127.0.0.1", "root","");
      $resp = $db-> select("productos", "id=?", array($id));
      if(isset($resp[0]["id"])){
        $this->id = $resp[0][$id];
        $this->nombre = $resp[0]["nombre_producto"];
        $this->descripcion = $resp[0]["descripcion_producto"];
        $this->precio = $resp[0]["precio_producto"];
        $this->categoria = $resp[0]["categoria_producto"];
        $this->imagen = $resp[0]["imagen_categoria"];
        $this->exist = true;
    }

    public function mostrar() {
      echo "<pre>";
      print_r($this);
      echo "<pre>";
    }

    public function guardar() {
      if($this->exist) {
        return $this->actualizar();
      } else {
        return $this->insertar();
      }
    }

    public function eliminar(){
      $db = new baseDeDatos("mysql", "miproyecto","127.0.0.1","root","");
      return $db->delete("productos","id= ".$this.id);
    }

    private function insertar() {
      $db = new baseDeDatos("mysql", "miproyecto","127.0.0.1","root","");
      $resp = $db->insert("productos","nombre_productos=?, imagen_producto=?, descripcion_producto=?, precio_producto=?,categoria_id=?","id=?",array($this->id, $this->nombre,$this->descripcion, $this->precio, $this->imagen,$this->categoria));

      if($resp){
        $this->id = $resp;
        $this->exist =true;
        return true;
      } else {
        return false;
      }
    }

    private function actualizar(){
      $db = new baseDeDatos("mysql", "miproyecto","127.0.0.1","root","");
      return $db->update("productos","nombre_productos=?, imagen_producto=?, descripcion_producto=?, precio_producto=?,categoria_id=?","id=?",array($this->id, $this->nombre,$this->descripcion, $this->precio, $this->imagen,$this->categoria));
    }

    public function listar(){
      $db = new baseDeDatos("mysql", "miproyecto","127.0.0.1","root","");
      return $db->select("productos");
    }
  }
  }
?>
