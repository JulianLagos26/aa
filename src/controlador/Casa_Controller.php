<?php

use Leandro\app\libs\Controlador;
use Leandro\app\modelo\Casa;

class Casa_Controller extends Controlador
{

    public function nuevo()
    {
        $this->cargarVista("casa/agregar");
    }
    public function agregar()
    {
        $numero = $_POST["numero"];
        $calle  = $_POST["calle"];
        $casa   = new Casa(1, $numero, $calle);
        $ida    = $casa->agregar();
        $this->cargarVista("casa/agregar", $ida);
    }
    public function listar()
    {
        $lista = Casa::listar();
        $this->cargarVista("casa/listar", $lista);
    }
}
