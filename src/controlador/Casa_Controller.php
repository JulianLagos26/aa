<?php

use Leandro\app\libs\Controlador;
use Leandro\app\modelo\Persona;


class Persona_Controller extends Controlador
{

  public function agregarCasa()
  {
    $id = $_POST["id"];
    $numero = $_POST["numero"];
    $calle = $_POST["calle"];
    $Casa = new Casa($id, $numero, $calle);
    $ida = $Casa->agregarPersona();
    $this->cargarVista("persona/agregar", $ida);
  }
}