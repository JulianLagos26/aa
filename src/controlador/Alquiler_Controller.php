<?php

use Leandro\app\libs\Controlador;
use Leandro\app\modelo\Alquiler;
use Leandro\app\modelo\Casa;
use Leandro\app\modelo\Persona;

class Alquiler_Controller extends Controlador
{

    public function nuevo()
    {
        $res           = new stdClass();
        $res->personas = Persona::listar();
        $res->casas    = Casa::listar();
        $this->cargarVista("alquiler/nuevo", $res);
    }
    public function alquilar()
    {
        $duracionMeses = $_POST["duracionMeses"];
        $costo         = $_POST["costo"];
        $persona       = $_POST["persona"];
        $casa          = $_POST["casa"];
        $alquiler      = new Alquiler(1, $duracionMeses, $costo, $persona, $casa);
        $idd           = $alquiler->alquilar($persona, $casa, $duracionMeses, $costo);
        $this->cargarVista("alquiler/alquilar", $idd);
    }

    public function listar()
    {
        $lista = Alquiler::listar();
        $this->cargarVista("alquiler/listar", $lista);
    }
}
