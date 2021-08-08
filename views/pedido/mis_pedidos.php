
<div id="principal">
<?php if($pedidos):?>
  <h1>MIS PEDIDOS</h1>
<?php else:?>
<h1>NO HAY PEDIDOS</h1>
<?php endif;?>
<?php $stats = Utils::estadistica(); ?>
<table class="pedido-confirmado">
  <tr>
    <th>N pedido</th>
    <th>Coste</th>
    <th>Fecha</th>
 </tr>
 <?php while($ped = $pedidos->fetch_object()):?>
        <tr>
            <td><a href="<?=$base_url?>/pedido/detalle&id=<?=$ped->id?>"><?= $ped->id?></a></td>
            <td><?= $ped->coste?></td>
            <td><?= $ped->fecha?></td>
        </tr>
        <?php endwhile;?>
</table>
 </div>