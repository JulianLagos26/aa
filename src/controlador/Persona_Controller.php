<?php

use Leandro\app\libs\Controlador;
use Leandro\app\modelo\Persona;

class Persona_Controller extends Controlador
{
    public function nueva()
    {
        $this->cargarVista("persona/agregar");
    }
    public function agregarPersona()
    {
        $nombre  = $_POST["nombre"];
        $Persona = new Persona(1,$nombre);
        $ida     = $Persona->agregarPersona();
        $this->cargarVista("persona/agregar", $ida);
    }
}