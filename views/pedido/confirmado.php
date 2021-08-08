<div id="principal">
<?php 
    $base_url = "http://localhost/Ecomerce";
?>
<?php if(isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete' ):?>
<div id="principal">
 <h1>PEDIDO CONFIRMADO</h1>
<p class="pedido-agrega" id="pedido-guardado">
   Tu pedido a sido guardado con exito una vez realices la transferencia 
   bancaria con el coste del pedido, sera procesado y enviado.
</p>
  <?php if(isset($pedido))?>
  <?php 
      unset($_SESSION['carrito'])
      ?>
  <table class="pedido-confirmado">
  <tr>
    <th>Imagen</th>
    <th>Nombre</th>
    <th>Precio</th>
    <th>Unidades</th>
 </tr>
        <?php
         while($producto = $productos->fetch_object()):?>
        <tr>
            <td><img class="carrito-img" src="<?=$base_url?>/uploads/images/<?=$producto->imagen?>"/></td>
            <td><?= $producto->nombre ?></td>
            <td><?= $producto->precio ?></td>
            <td><?= $producto->unidades ?></td>
        </tr>
        <?php endwhile;?>
</table>
<?php elseif(!isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'complete' ):?>
 <h1>Tu pedido no a podido ser completado</h1>
 <?php endif;?>
</div>
</div>