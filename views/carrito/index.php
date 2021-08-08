<?php $base_url = "http://localhost/Ecomerce";?>
<div id="principal">
<?php if( isset($_SESSION['identidad']) && isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1) :?>
    <?php foreach($carrito as $indice => $elemento):
            $producto = $elemento['producto'];?>
<?php endforeach;?>
    <h1 class="title-carrito">TU CARRITO</h1>
<?php $stats = Utils::estadistica(); ?>
<div class="info-pedido">
                    <p>TOTAL[<?= $stats['prod']?> productos]<span><?=$stats['total']?></span></p>
                </div>
<?php foreach($carrito as $indice => $elemento):
            $producto = $elemento['producto'];?>
            <div class="container-carrito">
                <div class="carrito-prod-cont">
                    <img src="<?=$base_url?>/uploads/images/<?=$producto->imagen?>">
                    <div class="detalle-carrito-prod">
                        <div class="price">
                            <p><?=$producto->precio?></p>
                            <a class="close-prod" href="<?=$base_url?>/carrito/remove&index=<?=$indice?>"><i class="fas fa-times"></i></a>
                        </div>
                    <div class="info-producto">
                        <p><?= $producto->nombre?></p>
                        <p>SOLAR YELLOW / BLACK</p>
                        <p id="tamaño">TAMAÑO: 38.5-40 (M)</p>
                    </div>
                        <div class="prod-unidades">
                            <p><?= $elemento['unidades']?></p>
                            <div class="buttons">
                                <a href="<?=$base_url?>/carrito/mas&index=<?=$indice?>"><i class="fas fa-arrow-up"></i></a>
                                <a href="<?=$base_url?>/carrito/menos&index=<?=$indice?>"><i class="fas fa-arrow-down"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
                <a class="button-realizar" href="<?=$base_url?>/pedido/hacer"> IR A PAGAR <i class="fas fa-long-arrow-alt-right"></i></a>
              </div>
              <div class="pago">
                  <a class="button-pedido" href="<?=$base_url?>/pedido/hacer"> IR A PAGAR <i class="fas fa-long-arrow-alt-right"></i></a>
                  <div class="pedido-data">
                    <h1 class="pago-resumen-title">RESUMEN DEL PEDIDO</h1>
                      <div class="cont-letters">
                          <div id="top-p"><?= $stats['count']?> PRODCUTOS </div>
                          <div class="right">$<?=$stats['total']?></div>
                        </div>
                      <div class="cont-letters">
                        <div class="top">TOTAL</div>
                        <div class="right" id="top">$<?=$stats['total']?></div>
                      </div>
                      <div class="entrega">
                          <p id="en">ENTREGA</p>
                          <p class="gra">GRATIS</p>
                      </div>
                  </div>
              </div>
<?php else:?>
    <?php if(!isset($_SESSION['identidad'])) :?>
        <h1 class="title-carrito">Inicia sesion</h1>
        <?php else:?>
            <h1 class="title-carrito">TU CARRITO</h1>
            <?php endif;?>
            <?php if(!isset($_SESSION['carrito'])) :?>
            <p class="pedido-agrega">Agrega productos al carrito</p>
    <?php endif;?>
<?php endif;?>
</div>