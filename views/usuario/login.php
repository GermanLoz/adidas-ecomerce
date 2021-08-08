<div id="principal">
<?php $base_url = "http://localhost/Ecomerce/usuario";?>
<?php $base_url_r = "http://localhost/Ecomerce/";?> 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
<h1>LOGIN</h1>
<aside id="aside">
<?php if(!isset($_SESSION['identidad'])): ?>
            <div id="login">
                    <a href="<?=$base_url?>/registro" class="button-realizar">REGISTRARSE <i class="fas fa-long-arrow-alt-right"></i></a>
                <?php else: ?>
            <div class="admin-cont">
                <?php endif; ?>
        <?php if(isset($_SESSION['admin'])): ?>
                <a class="button-aside" href="<?=$base_url_r?>pedido/gestion">Gestionar Pedidos</a>
                <a class="button-aside" href="<?=$base_url_r?>producto/gestion">Gestionar Productos</a>
                <a class="button-aside" href="<?=$base_url_r?>categoria/index">Gestionar Categorias</a>
        </div>
        <?php endif; ?>
        <?php if(isset($_SESSION['identidad'])): ?>
            <div class="mis">
                    <a class="button-realizar" href="<?=$base_url_r?>/pedido/mispedidos">MIS PEDIDOS</a>
            </div>   
        <?php endif; ?>
            </div>
        </aside>
        <div class="registrarse-form" id="Login">
        <?php
            if(isset($_SESSION['register']) && $_SESSION['register'] == 'Completado') :?>
                <p class="correcto">Registro completado correctamente</p>
        <?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'Error'):?>
                <p class="error">Itroduce los datos correctamente</p>
        <?php endif;?>
        <?php Utils::deleteSession('register');?>
<?php if(isset($_SESSION['identidad'])): ?>
    <a href="<?=$base_url?>/cerrarSesion" class="button-cerrar-session">CERRAR SESION</a>
    <h3 class="user">
        HOLA
        <?= $_SESSION['identidad']->nombre ?>
        <?= $_SESSION['identidad']->apellidos ?>
    </h3>
<?php else: ?>       
        <form class="iniciar-sesion" action="<?=$base_url?>/login" method="POST">
                <label for="Email">Email</label>
                <input type="email" name="email" placeholder="Email"/>
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Contraseña"/>
                <input class="registrarse-button" type="submit" value="Iniciar sesion"/>
            </div>
        </form>
<?php endif; ?>

</div>