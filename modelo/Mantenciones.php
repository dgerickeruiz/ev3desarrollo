<?php
class Mantenciones{
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
    public function listarTodos(){
      $sql = "SELECT * FROM manteciones m JOIN tecnico t WHERE m.tecnicoRut = t.tecnicoRut;";
      $resul = $this->db->listarTodos($sql);
      return $resul;
    }
}
?>