<?php class Producto{
    private $id;
    private $categoria_id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $imagen;
    private $stock;
    private $oferta;
    private $fecha;
    private $db;
    
    public function __construct(){
        $this->db = Database::connect();
    }
    function setId($id){
        $this->id = $this->db->real_escape_string($id);
    }
    function setNombre($nombre){
        $this->nombre = $this->db->real_escape_string($nombre);
    }
    function setCategoria_id($categoria){
        $this->categoria_id = $this->db->real_escape_string($categoria);
    }
    function setDescripcion($des){
        $this->descripcion = $this->db->real_escape_string($des);
    }
    function setImagen($imagen){
        $this->imagen = $this->db->real_escape_string($imagen);
    }
    function setPrecio($precio){
        $this->precio = $this->db->real_escape_string($precio);
    }
    function setStock($stock){
        $this->stock = $this->db->real_escape_string($stock);
    }
    function setOferta($oferta){
        $this->oferta = $this->db->real_escape_string($oferta);
    }

    //getters

    function getNombre(){
        return $this->nombre;
     }
     function getCategoria_Id(){
        return $this->categoria_id;
     }
     function getDescripcion(){
        return $this->descripcion;
     }
     function getImagen(){
        return $this->imagen;
     }
     function getStock(){
        return $this->stock;
     }
     function getPrecio(){
        return $this->precio;
     }
     function getOferta(){
        return $this->oferta;
     }
     function getId(){
        return $this->id;
     }
     public function getRandom($limite){
         $productos = $this->db->query("SELECT * FROM productos ORDER BY RAND() LIMIT {$limite} ");
         return $productos;
     }
     public function getAll(){
         $sql = "SELECT * FROM productos ORDER BY id DESC;";
         $productos = $this->db->query($sql);
         return $productos;
     }
     public function getOne(){
        $sql = "SELECT * FROM productos WHERE id = {$this->getId()} ;";
        $productos = $this->db->query($sql);
        return $productos->fetch_object();
    }
    public function getOneCarrito(){
        $sql = "SELECT * FROM productos WHERE id = {$this->getId()} AND  ;";
        $productos = $this->db->query($sql);
        return $productos->fetch_object();
    }
    public function search(){
        $sql = "SELECT * FROM productos WHERE nombre LIKE '%{$this->getNombre()}%'";
        $productos = $this->db->query($sql);
        return $productos;
    }
     public function delete(){
        $sql = "DELETE FROM productos WHERE id = {$this->id}";
        $delete = $this->db->query($sql);
        if($delete){
            return true;
        } else {
            return false;
        }
    }
     public function save(){
        $sql = "INSERT INTO productos VALUES(NULL,{$this->getCategoria_id()} ,'{$this->getNombre()}','{$this->getDescripcion()}',{$this->getPrecio()}, '{$this->getImagen()}' ,{$this->getStock()},'{$this->getOferta()}', CURDATE());";
        $save = $this->db->query($sql);
        $result = false;
        if($save){
            $result = true;
        }
        return $result;
     }
     public function edit(){
        $sql = "UPDATE productos SET categoria_id = {$this->getCategoria_id()}, nombre = '{$this->getNombre()}',descripcion = '{$this->getDescripcion()}', precio = {$this->getPrecio()} , stock = {$this->getStock()}, oferta = '{$this->getOferta()}'";
          if($this->getImagen() != null){ 
               $sql .= ",imagen = '{$this->getImagen()}' ";
             }
        $sql .= " WHERE id = {$this->getId()} ;";
        $save = $this->db->query($sql);
        $result = false;
        if($save){
            $result = true;
        }
        return $result;
     }
     public function getProductCat(){
        $sql = "SELECT p.*, c.nombre AS 'catnombre' FROM productos p INNER JOIN categorias c ON c.id = p.categoria_id WHERE categoria_id = {$this->getCategoria_id()};";
        $productos = $this->db->query($sql);
        return $productos;
    }
}
?>