<?php
class Categoria{
    private $id;
    private $nombre;
    private $db;

    public function __construct(){
        require_once 'config/db.php';
        $this->db = database::connect();
    }
    public function getId(){
        return $this->id;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function setNombre($nombre){
        $this->nombre = $this->db->real_escape_string($nombre);
    }
    public function getOne(){
        $sql = "SELECT * FROM categorias WHERE id = {$this->getId()};";
        $categorias = $this->db->query($sql);
        return $categorias->fetch_object();
    }
    public function getAll(){
        $sql = "SELECT * FROM categorias;";
        $categorias = $this->db->query($sql);
        return $categorias;
    }
    public function save(){
        $sql = "INSERT INTO categorias VALUES(NULL,'{$this->getNombre()}');";
        $save = $this->db->query($sql);
        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }
}
?>