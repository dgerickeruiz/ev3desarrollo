<?php
class Mantenciones
{
  private $db;
  private $mantencionID;
  private $tecnicoRut;
  private $mantencionFecha;
  private $cajeroID;
  private $mantencionCantidad;

  public function __construct()
  {
    include_once 'Conectar.php';
    $this->db = new DataBase();
  }

  public function __get($key)
  {
    return $this->$key;
  }

  public function __set($key, $value)
  {
    $this->$key = $value;
  }
  public function listarTodos()
  {
    $sql = "SELECT * FROM manteciones m JOIN tecnico t WHERE m.tecnicoRut = t.tecnicoRut";
    $resul = $this->db->listarTodos($sql);
    return $resul;
  }
  public function listarUno()
  {
    $sql = "SELECT * FROM mantenciones m JOIN tecnico t WHERE m.tecnicoRut = " . $this->tecnicoRut . "AND m.mantencionID = " . $this->mantencionID;
    $resul = $this->db->listarUno($sql);
    return $resul;
  }
  public function registrarMantenciones()
  {
    $sql = "INSERT INTO mantenciones(tecnicoRut, mantencionFecha, cajeroID, mantencionCantidad)
            VALUES(" . $this->tecnicoRut . ", " . $this->mantencionFecha . ", " . $this->mantencionID . ", " . $this->cajeroID . ", '" . $this->mantencionCantidad . "')";
    $resul = $this->db->ejecutar($sql);
    return $resul;
  }
  public function actualizarMantenciones()
  {
    $sql = "UPDATE mantenciones
            SET mantencionFecha =" . $this->mantencionFecha . ", mantencionCantidad = " . $this->mantencionCantidad . "
            WHERE tecnicoRut =" . $this->tecnicoRut;
    $resul = $this->db->ejecutar($sql);
    return $resul;
  }
  public function eliminarMantencion()
  {
    $sql = "DELETE FROM mantenciones
            WHERE codigo = " . $this->codigo;
    $resul = $this->db->ejecutar($sql);
    return $resul;
  }
}
