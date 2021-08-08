<?php
require_once 'model/producto.php';

    class productoController{
        public function index(){
            $producto = new Producto();
            $productos = $producto->getRandom(10);
            require_once 'views/layaout/products/destacados.php';
        }
        public function search(){
            $keyword = $_POST['search'];
            $base_url = "http://localhost/Ecomerce";
            if($keyword != ''){
                $producto = new Producto();
                $producto->setNombre($keyword);
                $productos = $producto->search();
            } else { 
                header('location:'.$base_url);
            }
            require_once 'views/producto/search.php';
        }
        public function ver(){
            if(isset($_GET['id'])){
                $id= $_GET['id'];
                $producto = new Producto();
                $producto->setId($id);
                $pro = $producto->getOne();
            }
            require_once 'views/producto/ver.php';
        }

        public function gestion(){
            require_once 'model/producto.php';
            Utils::issAdmin();
            $producto = new Producto();
            $productos = $producto->getAll();
            require_once 'views/producto/gestion.php';
        }
        public function crear(){
            Utils::issAdmin();
            require_once 'views/producto/crear.php';
        }
        public function editar(){
            Utils::issAdmin();
            $base_url = "http://localhost/Ecomerce";
            if(isset($_GET['id'])){
            $edit = true;
            $id = $_GET['id'];
            $producto = new Producto();
            $producto->setId($id);
            $pro = $producto->getOne();
            require_once 'views/producto/crear.php';
            } else {
                header('location:'.$base_url.'/producto/gestion');
            }
        }
        public function delete(){
            $base_url = "http://localhost/Ecomerce";
            Utils::issAdmin();
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $producto = new Producto();
                $producto->setId($id);
                $delete = $producto->delete();
                if($delete){
                    $_SESSION['delete'] = 'complete';
                } else {
                    $_SESSION['delete'] = 'error';
                }
            }
            header('location:'.$base_url.'/producto/gestion');
        }
        public function save(){
            $base_url = "http://localhost/Ecomerce";
            Utils::issAdmin();
            if(isset($_POST)){
                $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
                $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
                $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
                $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
                $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
                $oferta = isset($_POST['oferta']) ? $_POST['oferta'] : false;
                if(isset($_FILES['imagen'])){ 
                    $file = $_FILES['imagen'];
                    $filename = $file['name'];
                    $mimetype = $file['type'];
                }
               // $imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;
                if($nombre && $descripcion && $stock && $precio && $categoria && $oferta){
                    $producto = new Producto();
                    $producto->setNombre($nombre);
                    $producto->setStock($stock);
                    $producto->setOferta($oferta);
                    $producto->setDescripcion($descripcion);
                    $producto->setPrecio($precio);
                    $producto->setCategoria_id($categoria);

                    if($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "image/png" || $mimetype == "image/git"){
                        if(!is_dir('uploads/images')){
                            mkdir('uploads/images', 0777, true);
                        }
                        $producto->setImagen($filename);
                        move_uploaded_file($file['tmp_name'], 'uploads/images/'.$filename);
                    }
                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
                        $producto->setId($id);
                        $save = $producto->edit();
                    }else{ 
                        $save = $producto->save();
                    }

                    if($save){
                        $_SESSION['producto'] = "Complete";
                    } else {
                        $_SESSION['producto'] = "Error";
                    }
                } else {
                    $_SESSION['producto'] = "Error";
                }
            header('location:'.$base_url.'/producto/gestion');
            }
        }
    }
?>