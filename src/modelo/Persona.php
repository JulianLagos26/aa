<?php

namespace Leandro\app\modelo;

use PDOException;
use Leandro\app\libs\Conexion;

class Casa
{
  private $nombre;
  private $id;

  public function __construct($nombre, $id)
  {
    $this->nombre = $nombre;
    $this->id = $id;
    
  }
  public function agregarPersona(){
    $pdo = null;
    $query = null;
    $pdo = Conexion::getConexion()->getPdo();
    $idd = -1;
    try {
      $query      = $pdo->prepare('INSERT INTO casas
      (id, numero, calle)
VALUES(:id,:numero,:calle)');
      $query->bindParam(':id', $this->id);
      $query->bindParam(':numero', $this->numero);
      if ($query->execute()) {
        $idd = $pdo->lastInsertId();
      }
      return $idd;
    } catch (PDOException $th) {
      //throw $th;
    } finally {
      $pdo = null;
    }
  }

  public function getNombre()
  {
    return $this->nombre;
  }

  public function getid()
  {
    return $this->id;
  }

}