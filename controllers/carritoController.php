<?php 
require_once 'model/producto.php';
    class carritoController{
        public function index(){
            require_once 'functions/ut.php';
            if(isset($_SESSION['carrito'])){
                $carrito = $_SESSION['carrito'];
            }
            require_once 'views/carrito/index.php';
        }
        public function add(){
            $base_url = "http://localhost/Ecomerce";
            if(isset($_GET['id'])){
                $producto_id = $_GET['id'];
            }
             else{
               header('location:'.$base_url."/carrito/index");
             }
             if(isset($_SESSION['carrito'])){
                 $counter = 0 ;
                 foreach($_SESSION['carrito'] as $indice => $elemento){
                     if($elemento['id_producto'] == $producto_id){
                         $_SESSION['carrito'][$indice]['unidades']++;
                         $counter++ ;
                     }
                 }
             }

             if(!isset($counter) || $counter == 0){ 
             $producto = new Producto();
             $producto->setId($producto_id);
             $producto = $producto->getOne();

             if(is_object($producto)){
                $_SESSION['carrito'][] = array(
                    "id_producto" => $producto->id,
                    "precio" => $producto->precio,
                    "unidades" => 1,
                    "producto" => $producto
                 );
               }
             }
             header('location:'.$base_url."/carrito/index");
        }
        public function remove(){
            $base_url = "http://localhost/Ecomerce";
            if(isset($_GET['index'])){
                $index = $_GET['index'];
                unset($_SESSION['carrito'][$index]);
                header('location:'.$base_url."/carrito/index");
            }
        }
        public function menos(){
            $base_url = "http://localhost/Ecomerce";
            if(isset($_GET['index'])){
                $index = $_GET['index'];
                $_SESSION['carrito'][$index]['unidades']--;
                if($_SESSION['carrito'][$index]['unidades'] == 0){
                    unset($_SESSION['carrito'][$index]);
                }
                header('location:'.$base_url."/carrito/index");
            }
        }
        public function mas(){
            $base_url = "http://localhost/Ecomerce";
            if(isset($_GET['index'])){
                $index = $_GET['index'];
                $_SESSION['carrito'][$index]['unidades']++;
                header('location:'.$base_url."/carrito/index");
            }
        }
        public function delete(){
            $base_url = "http://localhost/Ecomerce";
            unset($_SESSION['carrito']);
            header('location:'.$base_url."/carrito/index");
        }
    }
?>