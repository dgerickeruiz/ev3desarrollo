
<?php
class Tecnico{
    private $db;
    private $tecnicoRut;
    private $tecnicoNombre;
    private $tecnicoPassword;
    private $tecnicoTipo;

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
        $sql = "SELECT * FROM tecnico WHERE tecnicoRut = '".$this->tecnicoRut."' AND tecnicoPassword = '".$this->tecnicoPassword."'";
        $resul = $this->db->listarUno($sql);
        return $resul;
    }
}
?>