<?php
session_start();
require_once 'autoload.php';
require_once 'views/layaout/header.php';
require_once 'config/parametros.php';
require_once 'config/db.php';
require_once 'functions/ut.php';
require_once 'views/layaout/sidebar.php';
require_once 'views/layaout/header.php';

function set_error(){
    $error = new errorController();
    $error->error();
}

if(isset($_GET['controller'])){
    $nombre_controlador = $_GET['controller'].'Controller';
}
  else if(!isset($_GET['controller']) && !isset($_GET['action'])){
      $nombre_controlador = controller_default;
} else{
    set_error();
    exit();
}


if(class_exists($nombre_controlador)){
    $base_url = "http://localhost/Ecomerce";
    $controlador = new $nombre_controlador();
    if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){
        $action = $_GET['action'];
        $controlador->$action();
    }  elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
        $action_default = action_default;
        $controlador->$action_default();

    }
     else{
        set_error();
    }
}else{
    set_error();
}

require_once "views/layaout/footer.php";
?>
