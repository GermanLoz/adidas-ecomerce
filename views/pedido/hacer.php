<?php
    $base_url = "http://localhost/Ecomerce";
?>
<?php if(isset($_SESSION['identidad'])):?>
    <h1 id="entrega" class="title-carrito">INFORMACION DE ENTREGA</h1>
    <div class="ver-prod">
        <a class="button-realizar" href="<?=$base_url?>/carrito/index">Ver los productos y el precio</a>
    </div>
    <h4>Direccion para el envio</h4>
    <div class="registrarse-form">
    <form action="<?=$base_url?>/pedido/add" id ="form-envio" method="POST">
        <input type="text" name="provincia" placeholder="Provincia" required/>
        <input type="text" name="localidad" placeholder="Localidad" required/>
        <input type="text" name="direccion" placeholder="Direccion" required/>
        <input type="submit" class="button-realizar" value="CONFIRMAR"/>
    </form>
</div>
</div>
<?php else: ?>
    <h1>Necesitas registrarte</h1>
    <p>O iniciar sesion</p>

<?php endif; ?>