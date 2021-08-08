<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once 'config/parametros.php';?>
<?php require_once 'functions/ut.php';?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=$base_url ?>/assets/styles.css">
    <link rel="stylesheet" href="<?=$base_url ?>/assets/responsive.css">
    <script src="https://kit.fontawesome.com/b90e9e4354.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@300;400;500;600&family=Kanit:ital,wght@1,100;1,200;1,300;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400;600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@300;400;500;600&display=swap" rel="stylesheet">
    <title>Adidas</title>
</head>
<body>
    <!-- CABECERA -->
    <header>
<body>
        <div class="logo">
            <img src="<?=$base_url ?>/assets/img/adidas.png">
        </div>
        <?php $categorias = Utils::showCategoria(); ?>
        <nav>
            <ul>
                <button class="button-search"><i class="fas fa-search"></i></button>
                <li><a class="user-nav-user" href="<?=$base_url?>/usuario/iniciar_sesion"><i class="far fa-user"></i></a></li>
                <li><a class="user-nav" href="<?=$base_url?>/carrito/index"><i class="fas fa-shopping-cart"></i></a></li>
                <button class="menu-button"><i class="fas fa-align-justify"></i></button>
                <div class="link">
                <div class="logo-res">
                    <img src="<?=$base_url?>/assets/img/adidas.png">
                    <div class="close">
                        <button class="close"><i class="fas fa-times"></i></button>
                    </div>
                </div>
                <li><a href="<?=$base_url?>">INICIO</a></li>
                <?php while($cat = $categorias->fetch_object()):?>
                    <li><a href="<?=$base_url?>/categoria/ver&id=<?=$cat->id?>"><?=$cat->nombre?></a></li>
                <?php endwhile;?>
                <li class="search">
                    <button class="close-search"><i class="fas fa-angle-left"></i></button>
                <form action="<?=$base_url?>/producto/search" method="POST">
                        <input placeholder="Buscar" name="search" type="text"/>
                        <input type="submit"/>
                    <i id="lupa" class="fas fa-search"></i>
                </form>
            </li>
            </ul>
        </nav>
    </header>
    <div id="content">