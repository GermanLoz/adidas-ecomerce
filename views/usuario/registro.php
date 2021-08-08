<?php $base_url = "http://localhost/Ecomerce/usuario";?> 

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
<h1>REGISTRARSE</h1>
        <div class="registrarse-form" id="Login">
        <?php
            if(isset($_SESSION['register']) && $_SESSION['register'] == 'Completado') :?>
                <p class="correcto">Registro completado correctamente</p>
        <?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'Error'):?>
                <p class="error">Itroduce los datos correctamente</p>
        <?php endif;?>
        <?php Utils::deleteSession('register');?>
        
        <form action="<?=$base_url ?>/save" method="POST">
                <label for="Nombre">Nombre</label>
                <input type="text" name="nombre" placeholder="Nombre"/>
                <label for="apellido">Apellido</label>
                <input type="text" name="apellido" placeholder="Apellido"/>
                <label for="Email">Email</label>
                <input type="email" name="email" placeholder="Email"/>
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Contraseña"/>
                <input class="registrarse-button" type="submit" value="REGISTRARSE"/>
            </div>
        </form>