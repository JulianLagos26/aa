<?php

namespace Leandro\app\modelo;

use PDOException;
use Leandro\app\libs\Conexion;

class Persona
{
  private $id;
  private $nombre;

  public function __construct($id, $nombre)
  {
    $this->id = $id;
    $this->nombre = $nombre;
  }


  public static function arrayAPersona($row)
  {
    $persona = new Persona($row['id'], $row['nombre']);
    return $persona;
  }

  public function agregarPersona()
  {
    $pdo = null;
    $query = null;
    $pdo = Conexion::getConexion()->getPdo();
    $idd = -1;
    try {
      $query      = $pdo->prepare('INSERT INTO personas
      (nomnbre)
VALUES(:nombre)');
      $query->bindParam(':nombre', $this->nombre);
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

  public function getId()
  {
    return $this->id;
  }

  public function getById($id)
  {
    $pdo = null;
    $query = null;
    $persona= null;
    $pdo = Conexion::getConexion()->getPdo();
    try {
      $query      = $pdo->prepare('SELECT id, nombre FROM persona p where p.id=:id');
      $query->bindParam(':id', $id);
      while ($row = $query->fetch()) {
        $persona = self::arrayAPersona($row);

        //$item->url = isset($row['url']) ? $row['url'] : $urlDefecto;
      }
      return $persona;
    } catch (PDOException $th) {
      //throw $th;
    } finally {
      $pdo = null;
    }
  }
}