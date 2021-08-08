<div id="principal">
<?php $base_url = "http://localhost/Ecomerce";?>
<?php if(isset($edit) && isset($pro) && is_object($pro)):?>
    <?php 
          $url_action = $base_url."/producto/save&id=".$pro->id;
          $title="EDITAR $pro->nombre";
          ?>
<?php else:?>
    <?php
        $title="AGREGAR PRODUCTO";
        $url_action = "$base_url/producto/save";
          ?>
<?php endif;?>
<h1><?=$title?></h1>


<form class="form-product" action="<?=$url_action?>" method="POST" enctype="multipart/form-data">
        <input type="text" placeholder="Nombre" name="nombre"
               value="<?= isset($pro) && is_object($pro) ? $pro->nombre: ""?>" 
        />
        <textarea placeholder="Descripcion" name="descripcion"><?= isset($pro) && is_object($pro) ? $pro->descripcion : '' ?></textarea>
        <input type="text" placeholder="Precio" name="precio"
               value="<?= isset($pro) && is_object($pro) ? $pro->precio : ""?>"
        />
        <input type="text" placeholder="Oferta" name="oferta"
               value="<?= isset($pro) && is_object($pro) ? $pro->oferta : ""?>"
        />
        <input type="number" placeholder="Stock" name="stock"
               value="<?= isset($pro) && is_object($pro) ? $pro->stock : ""?>"
        />
        <?php $categoria = Utils::showCategoria(); ?>
        <select type="categoria" name="categoria">
                <?php while($cat = $categoria->fetch_object()): ?>
                    <option value="<?= $cat->id?>" <?= isset($pro) && is_object($pro) && $cat->id == $pro->categoria_id ? 'selected' : " "?>>
                    <?=$cat->nombre?>
                    </option>
                <?php endwhile; ?>
        </select>
        <input type="file" name="imagen" placeholder="IMAGEN">
        <?php if(isset($pro) && is_object($pro) && !empty($pro->imagen)): ?>
                <img src="<?=$base_url?>/uploads/images/<?=$pro->imagen?>">
        <?php endif; ?>
        </input>
        <input type="submit" class="button-aside" value="AGREGAR"/>
</form>
</div>