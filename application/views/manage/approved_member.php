
<div class="member" style="background-image: url(<?php echo base_url();?>content/img/member-bg-<?php echo rand(1,6); ?>.png);">

 
     <?php 
        foreach($query as $item){
     ?>
     
    <div class="member-block">
        <div class="block-img"><img src="<?php echo base_url(); echo substr($item->image_url, 0, strlen($item->image_url) - 4); echo "_mid"; echo substr($item->image_url, strlen($item->image_url) - 4, strlen($item->image_url)); echo "?"; echo rand(0,10000);?>"/></div>
    <div class="member-info">
             
        <br />
        <p class="member-info-fio"><?php echo $item->title; ?></p>
        <p class="member-info-fio"><?php echo $item->slogan; ?></p>
        <p class="member-info-autor">Автор:</p>
        <p class="member-info-fio"><?php echo $item->surname; ?> <?php echo $item->name; ?> <?php echo $item->patronymic; ?></p>
             <p>Email: <?php echo $item->email; ?></p>
             <p>Телефон: <?php echo $item->phone; ?></p>
    </div>      
    </div>
    
    <div class="manage-button">
        
        <p><a class="member-info-button" href="<?php echo base_url();?>index.php/manage/image_rotate/<?php echo $item->idAction; ?>/left">Повернуть изображение влево</a>
            <a class="member-info-button" href="<?php echo base_url();?>index.php/manage/image_rotate/<?php echo $item->idAction; ?>/right">Повернуть изображение вправо</a>
           </p><p> <a class="member-info-button" href="<?php echo base_url();?>index.php/manage/image_thumb_create/<?php echo $item->idAction; ?>/0">Пересоздать миниатюру для горизонтального изображения</a>
            <a class="member-info-button" href="<?php echo base_url();?>index.php/manage/image_thumb_create/<?php echo $item->idAction; ?>/1">Пересоздать миниатюру для вертикального изображения</a>
           </p><p><a class="member-info-button" href="<?php echo base_url();?>index.php/manage/approved_true/<?php echo $item->idAction; ?>">Одобрить</a>
            <a class="member-info-button" href="<?php echo base_url();?>index.php/manage/trash_true/<?php echo $item->idAction; ?>">Удалить</a></p>
        
    </div>
     <?php 
     
     }
     ?>
    
</div>
