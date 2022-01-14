<?php
class Giros{
    private $db;
    private $girosID;
    private $girosFecha;
    private $cajeroID;
    private $girosCantidad;

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
      $sql = "SELECT * FROM giros g JOIN cliente c WHERE g.clienteRut = c.clienteRut;";
      $resul = $this->db->listarTodos($sql);
      return $resul;
    }
    public function registrarGiros(){
      $sql = "INSERT INTO giros(codigo, generoId, categoriaId, album, autor, precio, discografica, urlSpotify, habilitado)
              VALUES(".$this->codigo.", ".$this->generoId.", ".$this->categoriaId.", '".$this->album."', '".$this->autor."', ".$this->precio.", '".$this->discografica."', '".$this->urlSpotify."', 1)";
      $resul = $this->db->ejecutar($sql);
      return $resul;
    }
}
?>