<?php if(isset($categoria)):?>
    <?php $base_url = "http://localhost/Ecomerce";?>
    <div id="principal">
    <h1 class="categorias-title"><?=$categoria->nombre?></h1>
<?php if($productos->num_rows == 0 ):?>
        <p class="pedido-agrega">No existen productos</p>
<?php else:?>
    <div class="cont-product">
<?php while($pro = $productos->fetch_object()):?>
            <div class="product">
            <a id="des" href="<?=$base_url?>/producto/ver&id=<?=$pro->id?>">
                <img src="<?=$base_url?>/uploads/images/<?= $pro->imagen?>">
                <p class="precio-product">$<?= $pro->precio?></p>
                <p class="title-product"><?= $pro->nombre?></p>
            </a>
            </div>
            <?php endwhile;?>
        </div>
<?php endif;?>
<?php else:?>
    <h1>La categoria no existe</h1>
<?php endif;?>
</div>