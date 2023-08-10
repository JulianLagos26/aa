<?php

use Leandro\app\modelo\Casa;
use Leandro\app\libs\Controlador;


class Casa_Controller extends Controlador
{

  public function agregarCasa()
  {
    $id = $_POST["id"];
    $numero = $_POST["numero"];
    $calle = $_POST["calle"];
    $Casa = new Casa($id, $numero, $calle);
    $ida = $Casa->agregar();
    $this->cargarVista("casa/agregar", $ida);
  }

  public function listar(){
    $lista = Casa::listar();
    $this->cargarVista("casa/listar", $lista);
  }
}