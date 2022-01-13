<?php
class Cliente{
    private $db;
    private $clienteRut;
    private $clienteNombre;
    private $clientePassword;
    private $clienteMonto;

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

    public function iniciarSesion(){
        $sql = "SELECT * FROM cliente WHERE clienteRut = '".$this->clienteRut."' AND clientePassword = '".$this->clientePassword."'";
        $resul = $this->db->listarUno($sql);
        return $resul;
    }
}
?>