<?php 
require_once 'model/categoria.php';
require_once 'model/producto.php';

class categoriaController{
    public function index(){
        $categoria = new Categoria();
        $categoria = $categoria->getAll();
        require_once 'views/categoria/index.php';
    }
    public function addcategoria(){
        require_once 'views/categoria/crear.php';
    }
    public function ver(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $categoria = new Categoria();
            $categoria->setId($id);
            $categoria = $categoria->getOne();
            $producto = new Producto();
            $producto->setCategoria_id($id);
            $productos = $producto->getProductCat();
        }
        require_once 'views/categoria/ver.php';
}
    public function save(){
        $base_url = "http://localhost/Ecomerce";
        Utils::issAdmin();
        if(isset($_POST) && isset($_POST['nombre'])){
        $categoria = new Categoria();
        $categoria->setNombre($_POST['nombre']);
        $categoria->save();
        }
        header('location:'.$base_url.'/categoria/index');
    }
}
?>