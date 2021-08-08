<?php

class Usuario{
    private $id;
    private $nombre;
    private $apellido;
    private $email;
    private $password;
    private $rol;
    private $imagen;
    private $db;
    
    public function __construct(){
        $this->db = Database::connect();
    }
    //setters
    function setNombre($nombre){
        $this->nombre = $this->db->real_escape_string($nombre);
    }
    function setApellido($apellido){
        $this->apellido = $this->db->real_escape_string($apellido);
    }
    function setRol($rol){
        $this->rol = $this->db->real_escape_string($rol);
    }
    function setImagen($imagen){
        $this->imagen = $this->db->real_escape_string($imagen);
    }
    function setEmail($email){
        $this->email = $this->db->real_escape_string($email);
    }
    function setId($id){
        $this->id = $this->db->dreal_escape_string($id);
    }
    function setPassword($password){
        $this->password = $password; 
    }

    /*setters*/
    function getNombre(){
       return $this->nombre;
    }
    function getApellido(){
       return $this->apellido;
    }
    function getId(){
       return $this->id;
    }
    function getEmail(){
       return $this->email;
    }
    function getRol(){
       return $this->rol;
    }
    function getImagen(){
       return $this->imagen;
    }
    function getPassword(){
       return $this->password = password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]); 
    }
    public function saveDate(){
        $sql = "INSERT INTO usuarios VALUES(NULL,'{$this->getNombre()}' ,'{$this->getApellido()}','{$this->getEmail()}','{$this->getPassword()}', NULL ,'{$this->getImagen()}');";
        $save = $this->db->query($sql);
        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }
    public function login(){
        $result = false;
        $email = $this->email;
        $password = $this->password;
        $sql = "SELECT * FROM usuarios WHERE email = '$email'";
        $login = $this->db->query($sql);
        if($login && $login->num_rows == 1){
            $usuario = $login->fetch_object();
            $verify = password_verify($password, $usuario->password);
        if($verify){
            $result = $usuario;
            }
        }
        return $result;
    }
}
?>