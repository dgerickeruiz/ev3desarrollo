<?php
class DataBase {
    private $db;
    private $sentencia;

    public function __construct()
    {
        $host = 'localhost';
        $user = 'root';
        $password = '';
        $database = 'evfinal';
        $this->db = new mysqli($host, $user, $password, $database);
        $this->sentencia = $this->db->stmt_init();
    }

    public function listarUno($sql){
        if ($this->sentencia->prepare($sql)) {
            $lista = $this->db->query($sql);
            $this->sentencia->close();
            return $lista->fetch_assoc();
        }
        $this->db->close();
        return null;
    }
    
}
