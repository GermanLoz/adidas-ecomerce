<?php
class Utils{
    public static function deleteSession($nombre){
        if(isset($_SESSION["{$nombre}"])){
        $_SESSION["{$nombre}"] = null;
        unset($_SESSION["{$nombre}"]);
        }
    return $nombre;
    }
    public static function issAdmin(){
        $base_url = "http://localhost/Ecomerce";
        if(!isset($_SESSION['admin'])){ 
        header('location:'.$base_url);
    } else {
        return true;
        }
    }
    public static function estadistica(){
        $stats = array (
            'pord' => 0,
            'count' => 0,
            'total' => 0
        );
        if(isset($_SESSION['carrito'])){
            $stats['prod'] = count($_SESSION['carrito']);
            foreach($_SESSION['carrito'] as $producto){
                $stats['count'] += count($_SESSION['carrito']) + $producto['unidades'] - number_format(count($_SESSION['carrito']));
                $stats['total'] += $producto['precio'] * $producto['unidades'];
            }
        }
        return $stats;
    }
    public static function showCategoria(){
        require_once 'model/categoria.php';
        $categoria = new Categoria();
        $categorias = $categoria->getAll();
        return $categorias;
    }
    public static function isIdentidad(){
        $base_url = "http://localhost/Ecomerce";
        if(!isset($_SESSION['identidad'])){ 
        header('location:'.$base_url);
    } else {
        return true;
        }
    }
    public static function showEstado($estado){
        $value = 'pendiente';
        if($estado == 'confirm'){
            $value = 'Pendiente';
        }
       else if($estado == 'preparation'){
            $value = 'En preparacion';
       }
       else if($estado == 'ready'){
            $value = 'Preparado';
       }
       else if($estado == 'send'){
           $value = 'Enviado';
       }
       return $value;
    }
}
?>