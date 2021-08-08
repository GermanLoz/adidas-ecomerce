<div id="principal">
<?php $base_url = "http://localhost/Ecomerce";?>
        <h1>Crear categoria</h1>
    <form class="form-cat"  action="<?=$base_url?>/categoria/save" method="POST">
        <input type="text" name="nombre" placeholder="Nombre"/>
        <input type="submit" value="Guardar"/>
    </form>
</div>