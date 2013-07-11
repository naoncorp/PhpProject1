<div class="image-rotate" style="background-image: url(<?php echo base_url();?>content/img/member-bg-<?php echo rand(1,6); ?>.png);">
<?php foreach ($query as $item) {
    ?>

    <div class="image-rotate-text">
        
    <h2><?php echo $item->surname; echo " "; echo $item->name; echo " "; echo $item->patronymic; ?></h2>
    <p>Если ваше изображение отображается неверно, поверните его и затем нажмите кнопку "А так сойдет";</p>
    </div>
<div class="back-img">
    <a class="rotate-left" href="<?php echo base_url();?>index.php/action/image_rotate/<?php echo $item->idAction; ?>/left"><img src="<?php echo base_url();?>content/img/rotate-left.png"/></a>
    <a class="rotate-right" href="<?php echo base_url();?>index.php/action/image_rotate/<?php echo $item->idAction; ?>/right"><img src="<?php echo base_url();?>content/img/rotate-right.png"/></a>
    <img src="<?php echo base_url(); echo substr($item->image_url, 0, strlen($item->image_url) - 4); echo "_mid"; echo substr($item->image_url, strlen($item->image_url) - 4, strlen($item->image_url));?>"/>
    
</div>
<p></p>
<p>

</p>
<p><a class="submit" href="<?php echo base_url();?>index.php/action/create_image_thumb/<?php echo $item->idAction; ?>">А так сойдет</a></p>
<?php }?>
</div>