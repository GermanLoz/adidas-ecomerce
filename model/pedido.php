<?php
class Pedido{
    private $id;
    private $usuario_id;
    private $provincia;
    private $localidad;
    private $direccion;
    private $coste;
    private $estado;
    private $fecha;
    private $hora;
    private $db;
    
    public function __construct(){
        $this->db = Database::connect();
    }
    function setId($id){
        $this->id = $this->db->real_escape_string($id);
    }
    function setUsuario_id($usuario_id){
        $this->usuario_id = $this->db->real_escape_string($usuario_id);
    }
    function setProvincia($provincia){
        $this->provincia = $this->db->real_escape_string($provincia);
    }
    function setLocalidad($localidad){
        $this->localidad = $this->db->real_escape_string($localidad);
    }
    function setDireccion($direccion){
        $this->direccion= $this->db->real_escape_string($direccion);
    }
    function setCoste($coste){
        $this->coste = $this->db->real_escape_string($coste);
    }
    function setEstado($estado){
        $this->estado = $this->db->real_escape_string($estado);
    }
    function setFecha($fecha){
        $this->fecha = $this->db->real_escape_string($fecha);
    }
    function setHora($hora){
        $this->hora = $this->db->real_escape_string($hora);
    }

    //getters

    function getId(){
        return $this->id;
     }
     function getUsuario_id(){
        return $this->usuario_id;
     }
     function getProvincia(){
        return $this->provincia;
     }
     function getLocalidad(){
        return $this->localidad;
     }
     function getDireccion(){
        return $this->direccion;
     }
     function getCoste(){
        return $this->coste;
     }
     function getEstado(){
        return $this->estado;
     }
     function getFecha(){
        return $this->fecha;
     }
     function getHora(){
        return $this->hora;
     }
    public function getRandom($limite){
        $productos = $this->db->query("SELECT * FROM productos ORDER BY RAND() LIMIT {$limite} ");
        return $productos;
    }
    public function getAll(){
        $sql = "SELECT * FROM pedidos ORDER BY id DESC;";
        $productos = $this->db->query($sql);
        return $productos;
    }
    public function getOneByUser(){
       $sql = "SELECT p.id, p.coste FROM pedidos p "
              ."INNER JOIN lineas_pedidos lp ON lp.pedidos_id = p.id "
              ."WHERE usuario_id = {$this->getUsuario_id()} ORDER BY id DESC LIMIT 1;";
       $productos = $this->db->query($sql);
       return $productos->fetch_object();
   }
   public function getAllByUser(){
    $sql = "SELECT * FROM pedidos "
           ."WHERE usuario_id = {$this->getUsuario_id()} ORDER BY id DESC;";
    $productos = $this->db->query($sql);
    return $productos;
}
   public function getProductosByPedidos($id){
       $sql = "SELECT pr. *, lp.unidades FROM productos pr INNER JOIN lineas_pedidos lp ON pr.id = lp.producto_id  WHERE lp.pedidos_id = ($id) ";
       $productos = $this->db->query($sql);
       return $productos;
   }
    public function save(){
       $sql = "INSERT INTO pedidos VALUES(NULL,{$this->getUsuario_id()} ,'{$this->getProvincia()}','{$this->getDireccion()}',{$this->getCoste()}, 'confirm' ,CURDATE(), CURTIME());";
       $save = $this->db->query($sql);
       $result = false;
       if($save){
           $result = true;
       }
       return $result;
    }
    public function save_linea(){
        $sql = "SELECT LAST_INSERT_ID() AS 'pedido';";
        $query = $this->db->query($sql);
        $pedido_id = $query->fetch_object()->pedido;
           foreach($_SESSION['carrito'] as $elemento){
              $producto = $elemento['producto']; 
              $insert = "INSERT INTO lineas_pedidos VALUES(NULL, '{$elemento['unidades']}' ,{$pedido_id},{$producto->id});";
              $save = $this->db->query($insert);
           }
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
   public function getOne(){
    $sql = "SELECT * FROM pedidos WHERE id = {$this->getId()} ;";
    $pedido = $this->db->query($sql);
    return $pedido->fetch_object();
}
    public function updateOne(){
        $sql = "UPDATE pedidos SET estado='{$this->getEstado()}' WHERE id = {$this->getId()};";
        $estado = $this->db->query($sql);
        return $estado;
    }
}
?>