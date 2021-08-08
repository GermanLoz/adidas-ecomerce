<?php 
require_once 'model/pedido.php';
require_once 'functions/ut.php';

    class pedidoController{
        public function hacer(){
            require_once 'views/pedido/hacer.php';
        }
        public function add(){
            $base_url = "http://localhost/Ecomerce";
            if(isset($_SESSION['identidad'])){
                $usuario_id = $_SESSION['identidad']->id; 
                $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false;
                $localidad = isset($_POST['localidad']) ? $_POST['localidad'] : false;
                $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
                $stats = Utils::estadistica();
                $coste = $stats['total'];
                if($provincia && $localidad && $direccion){ 
                    $pedido = new Pedido();
                    $pedido->setProvincia($provincia);
                    $pedido->setLocalidad($localidad);
                    $pedido->setDireccion($direccion);
                    $pedido->setUsuario_id($usuario_id);
                    $pedido->setCoste($coste);
                    $save = $pedido->save();
                    $save_linea = $pedido->save_linea();
                }
                if($save && $save_linea){
                        $_SESSION['pedido'] = 'complete';
                    } else {
                        $_SESSION['pedido'] = 'failed';
                    }
                    header('location:'.$base_url.'/pedido/confirmado');
            } else {
                $_SESSION['pedido'] = 'failed';
                header('location:'.$base_url.'/pedido/confirmado');
            }
    }
    public function confirmado(){
        if($_SESSION['identidad']){
        $pedido = new Pedido();
        $identidad = $_SESSION['identidad'];
        $pedido->setUsuario_id($identidad->id);
        $pedido = $pedido->getOneByUser();
        $pedido_producto = new Pedido();
        $productos = $pedido_producto->getProductosByPedidos($pedido->id);
      }

        require_once 'views/pedido/confirmado.php';
    }
    public function mispedidos(){
        $base_url = "http://localhost/Ecomerce";
        $identidad = Utils::isIdentidad();
        if($identidad){
            $usuario_id = $_SESSION['identidad']->id;
            $pedido = new Pedido(); 
            $pedido->setUsuario_id($usuario_id);
            $pedidos = $pedido->getAllByUser();
            require_once 'views/pedido/mis_pedidos.php';
        } 
    }
    public function detalle(){
        $base_url = "http://localhost/Ecomerce";
        $identidad = Utils::isIdentidad();
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $pedido = new Pedido();
            $pedido->setId($id);
            $pedido = $pedido->getOne();
            $pedido_producto = new Pedido();
            $productos = $pedido_producto->getProductosByPedidos($id);
            if(isset($pedido)){
                require_once 'views/pedido/detalle.php';
            }
        } else {
            require_once 'views/pedido/mis_pedidos.php';
        }
    }
    public function gestion(){
        $base_url = "http://localhost/Ecomerce";
        Utils::issAdmin();
        $gestion = true;
        $pedido = new Pedido();
        $pedidos = $pedido->getAll();
        require_once 'views/pedido/mis_pedidos.php';
    }
    public function estado(){
        $base_url = "http://localhost/Ecomerce";
        Utils::issAdmin();
        if(isset($_POST)){
            $id = $_POST['pedido_id'];
            $estado = $_POST['estado'];
            if( $estado && $id){
                $pedido = new Pedido();
                $pedido->setId($id);
                $pedido->setEstado($estado);
                $pedido->updateOne();
            header('location:'.$base_url.'/pedido/detalle&id='.$id);
            }
        }
        else{
            header('location:'.$base_url);
        }
    }
} 
?>