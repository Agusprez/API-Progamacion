<?php

  include '../class/autoload.php';

  if(isset($_POST['action']) && $_POST['action'] == 'guardar'){
    $miCategoria = new Categorias();
    $miCategoria->nombre = $_POST['categoria'];
    $miCategoria->guardar();
  } else if(isset($_GET['add'])){
    include 'views/categorias.html';
    die();
  }
  $lista_categorias = Categorias::listar();
  include 'views/lista_categorias.html';