<?php

use Leandro\app\libs\Controlador;
use Leandro\app\modelo\Persona;

class Api_Persona_Controller extends Controlador
{

    public function listar()
    {
        $res         = new stdClass();
        $res->lista  = [];
        $res->codigo = 200;
        try {
            $lista          = Persona::listar();
            $res->respuesta = [
                "lista" => $lista,
                "total" => count($lista),
            ];

            $this->cargarVista("api/index", $res);

        } catch (\Throwable $th) {

            $res->codigo = 500;
        }
    }

    public function recibir()
    {
        $res         = new stdClass();
        $res->lista  = [];
        $res->codigo = 200;
        try {
            $datos = file_get_contents("php://input");
            $json  = json_decode($datos);
            $clave = $json->clave;
            $lista = $json->lista;

            $res->respuesta = [
                "lista" => $lista,
                "total" => count($lista),
            ];

            $this->cargarVista("api/index", $res);

        } catch (\Throwable $th) {

            $res->codigo = 500;
        }
    }

}
