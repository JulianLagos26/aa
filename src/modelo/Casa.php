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

  public static function arrayCasa($row)
  {
    $casa = new Casa($row['id'], $row['calle'], $row['numero']);
    return $casa;
  }
  
  public function agregar()
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


  public function getById($id)
  {
    $pdo = null;
    $query = null;
    $casa = null;
    $pdo = Conexion::getConexion()->getPdo();
    try {
      $query      = $pdo->prepare('SELECT id, calle, numero FROM casa c where c.id=:id');
      $query->bindParam(':id', $id);
      while ($row = $query->fetch()) {
        $casa = self::arrayCasa($row);
      }
      return $casa;
    } catch (PDOException $th) {
      //throw $th;
    } finally {
      $pdo = null;
    }
  }

  public static function listar(){
    $pdo = null;
    $query = null;
    $lista = null;
    $pdo = Conexion::getConexion()->getPdo();
    try {
      $query      = $pdo->query('SELECT id, calle, numero FROM casa');
      while ($row = $query->fetch()) {
        $casa = self::arrayCasa($row);
        $lista[] = $casa;
      }
      return $lista;
    } catch (PDOException $th) {
      //throw $th;
    } finally {
      $pdo = null;
    }
  }
}