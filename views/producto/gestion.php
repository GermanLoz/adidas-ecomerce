<div id="principal">
<h1>gestion de producto</h1>
<?php $base_url = "http://localhost/Ecomerce";?>
<div class="categorias">
<!-- MENSAJES AGREGAR  -->
<?php if(isset($_SESSION['producto']) && $_SESSION['producto'] == 'Complete'):?>
            <p class="correcto">Producto agregado correctamente</p>
    <?php endif; ?>
    <?php if(isset($_SESSION['producto']) && $_SESSION['producto'] == 'Error'):?>
            <p class="error">No se pudo agregar</p>
    <?php endif; ?>
<!-- MENSAJES AGREGAR END  -->
<!-- MENSAJES DELETE  -->
<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'):?>
            <p class="correcto">Producto eliminado correctamente</p>
    <?php endif; ?>
    <?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'error'):?>
            <p class="error">No se pudo eliminar</p>
    <?php endif; ?>
<!-- MENSAJES DELETE END  -->


    <?php while($pro = $productos->fetch_object()):?>
        <a class="button-delete" href="<?=$base_url?>/producto/delete&id=<?=$pro->id?>">ELIMINAR</a>
        <a class="button-edit" href="<?=$base_url?>/producto/editar&id=<?=$pro->id?>">EDITAR</a>
        <p><?=$pro->nombre?></p>

    <?php endwhile;?>
<!-- DELETE SESSIONES-->
    <?php Utils::deleteSession('producto');?>
    <?php Utils::deleteSession('delete');?>
    <?php Utils::deleteSession('editar');?>
<!-- DELETE SESSIONES END -->
</div>
    <a class="button-aside" id="button-cat" href="<?=$base_url?>/producto/crear">AGREGAR PRODUCTO</a>
</div>
