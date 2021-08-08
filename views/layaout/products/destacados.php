<?php $base_url = "http://localhost/Ecomerce";?>
        <div class="inicio">
        <div class="text-inicio">
                    <h1>NOS UNIERON ESTOS COLORES</h1>
                    <p>Campeones de America 2021.</p>
                    <a class="button-realizar" href="<?=$base_url?>/categoria/ver&id=5"> MIRAR LA COLECCION <i class="fas fa-long-arrow-alt-right"></i></a>
                </div>
                <video autoplay preload muted loop src="https://brand.assets.adidas.com/video/upload/q_auto,vc_auto/video/upload/AFA_Post_30ss_ECOM_1600x1600TB_bmc2rq.mp4">
            </div>
<h1>PRODUCTOS</h1>
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