<?php if(isset($pro)):?>
    <?php $base_url = "http://localhost/Ecomerce";?>
    <div class="detalle">
            <div class="description">
                <div>
                    <p class="title-product"><?= $pro->nombre?></p>
                    <p class="descripcion"><?= $pro->descripcion?></p>
            </div>
            <div>
                <img src="<?=$base_url?>/uploads/images/<?= $pro->imagen?>">
            </div>
            </div>
                <div class="pago">
                    <p class="title-product"><?= $pro->nombre?></p>
                    <p class="precio-product">$<?= $pro->precio?></p>
                    <a class="button-pedido" href="<?=$base_url?>/carrito/add&id=<?=$pro->id?>">AÑADIR AL CARRITO <i class="fas fa-long-arrow-alt-right"></i></a>
                </div>
        </div>
<?php else:?>
    <p>No existe el producto</p>
<?php endif;?>