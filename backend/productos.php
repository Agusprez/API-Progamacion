<?php

  include '../class/autoload.php';

  if(isset($_POST['accion']) && $_POST['action'] === 'guardar'){
    $miProducto = new Productos();
    $miProducto->nombre = $_POST['producto'];
    $miProducto->descripcion = $_POST['descripcion_producto'];
    $miProducto->precio = $_POST['precio_producto'];
    $miProducto->categoria = $_POST['categoria_producto'];
    $miProducto->imagen = $_POST['imagen_producto'];

    $miProducto->guardar();

  } else if(isset($_GET['add'])){
    include 'views/productos.html';
    die();
  }
  $lista_productos = Productos::listar();
  include 'views/lista_productos.html';
