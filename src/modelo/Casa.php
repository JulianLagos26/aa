<?php

namespace Leandro\app\modelo;

use PDOException;
use Leandro\app\libs\Conexion;

class Casa
{
  private $id;
  private $calle;
  private $numero;

  public function __construct($id, $calle, $numero)
  {
    $this->id = $id;
    $this->calle = $calle;
    $this->numero = $numero;
  }
  public function agregarCasa()
  {
    $pdo = null;
    $query = null;
    $pdo = Conexion::getConexion()->getPdo();
    $id = -1;
    try {
      $query      = $pdo->prepare('INSERT INTO personas
      (id, numero, calle)
VALUES(:id,:numero,:calle)');
      $query->bindParam(':id', $this->id);
      $query->bindParam(':calle', $this->calle);
      $query->bindParam(':numero', $this->numero);
      if ($query->execute()) {
        $id = $pdo->lastInsertId();
      }
      return $id;
    } catch (PDOException $th) {
      //throw $th;
    } finally {
      $pdo = null;
    }
  }

  public function getId()
  {
    return $this->id;
  }

  public function getnumero()
  {
    return $this->numero;
  }

  public function getcalle()
  {
    return $this->calle;
  }
}