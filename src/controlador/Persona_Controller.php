<?php

use Leandro\app\libs\Controlador;
use Leandro\app\modelo\Persona;


class Persona_Controller extends Controlador
{


  public function agregarPersona()
  {
    $nombre = $_POST["nombre"];
    $id = $_POST["id"];
    $Persona = new Persona($nombre, $id);
    $ida = $Persona->agregarPersona();
    $this->cargarVista("persona/agregar", $ida);
  }
  public function nueva()
  {

    $this->cargarVista("persona/agregar");
  }
}