<div id="principal">
<h1>DETALLE</h1>
<?php 
    $base_url = "http://localhost/Ecomerce";
?>
    <?php if(isset($_SESSION['admin'])):?>
        <h3 class="cambiar">Cambiar estado del pedido<h3/>
        <div class="registrarse-form" id="Login">
         <form action="<?=$base_url?>/pedido/estado" method="POST">
            <input type="hidden" value="<?=$pedido->id?>" name="pedido_id"/>
                <select name="estado">
                    <option value="confirm" <?=$pedido->estado =='confirm' ? 'selected' : ' ' ?>>Pendiente</option>
                    <option value="preparation" <?=$pedido->estado == 'preparation' ? 'selected' : ' ' ?>>En preparacion</option>
                    <option value="ready" <?=$pedido->estado =='ready' ? 'selected' : ' ' ?> >Preparado para enviar</option>
                    <option value="send" <?=$pedido->estado =='send' ? 'selected' : ' ' ?> >Enviado</option>
                </select>
                <input type="submit" class="registrarse-button" value="cambiar estado"/>
         </form>
         </div>
  <h2 class="dire">direccion de envio</h2>
  <p class="info"><?= $pedido->direccion?></p>
  <p class="info"><?= $pedido->provincia?></p>
  <p class="info"><?= $pedido->fecha?></p>
<?php endif;?>

  <table class="pedido-confirmado" >
  <tr>
    <th>Imagen</th>
    <th>Nombre</th>
    <th>Precio</th>
    <th>Unidades</th>
    <th>Estado</th>
 </tr>
        <?php        
         while($producto = $productos->fetch_object()):?>
        <tr>
            <td><img class="carrito-img" src="<?=$base_url?>/uploads/images/<?=$producto->imagen?>"/></td>
            <td><?= $producto->nombre ?></td>
            <td><?= $producto->precio ?></td>
            <td><?= $producto->unidades ?></td>
            <td><?= Utils::showEstado($pedido->estado)?></td>
        </tr>
        <?php endwhile;?>
</table>
</div>