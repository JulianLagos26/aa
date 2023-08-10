<?php 

namespace Leandro\app\modelo;

use PDOException;
use Leandro\app\libs\Conexion;

class Alquiler
{
  private $id;
  private $duracionMeses;
  private $costo;
  private $persona;
  private $casa;

  public function __construct($id, $duracionMeses, $costo, $persona, $casa)
  {
    $this->id = $id;
    $this->duracionMeses = $duracionMeses; 
    $this->costo = $costo;
    $this->persona = $persona;
    $this->casa = $casa;
  }

  public static function arrayAlquiler($row)
  {
    $casa = new Casa($row['idC'], $row['calle'], $row['numero']);
    $persona = new Persona($row['idP'], $row['nombre']);
    $alquiler = new Alquiler($row['idA'], $row['duracionMeses'], $row['costo'], $persona, $casa);
    return $alquiler;
  }

  public function getduracionMeses()
  {
    return $this->duracionMeses;
  }

  public function getid()
  {
    return $this->id;
  }

  public function getCosto(){
    return $this->costo;
  }
  
  public function getPersona(){
    return $this->persona;
  }

  public static function alquilar($persona, $casa, $costo, $duracion){
    $pdo = null;
    $query = null;
    $pdo = Conexion::getConexion()->getPdo();
    $idd = -1;
    try {
      $query      = $pdo->prepare('INSERT INTO `alquiler` 
      (`persona_id`, `casa_id`, `duracionMeses`, `costo`) 
      VALUES (:persona, :casa, :duracion, :costo);
      ');
      $query->bindParam(':persona', $persona->getId());
      $query->bindParam(':casa', $casa->getId());
      $query->bindParam(':duracionMeses',$duracion);
      $query->bindParam(':costo', $costo);
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

  public static function listar(){
    $pdo = null;
    $query = null;
    $pdo = Conexion::getConexion()->getPdo();
    $idd = -1;
    try {
      $query      = $pdo->query('SELECT p.id as idP, p.nombre, c.id as idC, a.id as idA, c.calle,c.numero,a.duracionMeses,a.costo FROM alquiler a
      INNER JOIN persona p ON a.persona_id = p.id
      INNER JOIN casa c ON a.casa_id = c.id');
      
      while ($row = $query->fetch()) {
        $casa = self::arrayAlquiler($row);
      }
      
      return $idd;
    } catch (PDOException $th) {
      //throw $th;
    } finally {
      $pdo = null;
    }
  }
  
}