<div id="principal">
<?php $base_url = "http://localhost/Ecomerce";?>
<h1>GESTIONAR CATEGORIAS</h1>
<div class="categorias">
    <?php while($cate = $categoria->fetch_object()):?>
        <p><?=$cate->nombre?></p>
    <?php endwhile;?>
</div>
    <a class="button-aside" id="button-cat" href="<?=$base_url?>/categoria/addcategoria">Crear categoria</a>
</div>