<?php 
require_once 'model/usuario.php';
require_once 'config/db.php';


class usuarioController{
    public function index(){
          echo "controlador Usuario, accion index";
    }
    public function registro(){
        require_once 'views/usuario/registro.php';
    }
    public function save(){
  $base_url = "http://localhost/Ecomerce";
      if(isset($_POST)){
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;
      if($nombre && $apellido && $email && $password){
            $usuario = new Usuario(); 
            $usuario->setNombre($nombre);
            $usuario->setApellido($apellido);
            $usuario->setEmail($email);
            $usuario->setPassword($password);
            $save = $usuario->saveDate();
     if($save){
            $_SESSION['register'] = 'Completado';
    }else{
            $_SESSION['register'] = 'Error';
        }
    }else{
            $_SESSION['register'] = 'Error';
    }
      } else {
          $_SESSION['register'] = 'Error';
          header('location:'.$base_url.'/usuario/registro');
        }
        header('location:'.$base_url.'/usuario/registro');
      }
      public function iniciar_sesion(){
        require_once 'views/usuario/login.php';
      }
      public function login(){
  $base_url = "http://localhost/Ecomerce";
      if(isset($_POST)){
        $usuario = new Usuario();
        $usuario->setEmail($_POST['email']);
        $usuario->setPassword($_POST['password']);
        $identidad = $usuario->login();
        if($identidad && is_object($identidad)){
           $_SESSION['identidad'] = $identidad;
          if($identidad->rol == 'admin'){
            $_SESSION['admin'] = true;
          } else{
            $_SESSION['error_login'] = 'Email o contraseña incorrecta';
            }
          }
        }
        header('location:'.$base_url);
        }
        public function cerrarSesion(){
      $base_url = "http://localhost/Ecomerce";
          if(isset($_SESSION['identidad'])){
            unset($_SESSION['identidad']);
          header('location:'.$base_url);
          }
          if(isset($_SESSION['admin'])){
            unset($_SESSION['admin']);
          header('location:'.$base_url);

          }
      }
    }
?>