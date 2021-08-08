<div id="principal">
<h1><?=$keyword?></h1>
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
</div>
