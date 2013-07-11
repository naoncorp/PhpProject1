
<div class="actions">
<h1>Неподтвержденные участники</h1>
 <table>
     <?php 
        $i = 0;
        foreach($query as $item){
            
           
            $i++;
            if($i > 4 ){
     ?>
     <tr>
         <td>
             <div class="member-block">
             <a href="<?php echo base_url();?>index.php/manage/approved_member/<?php echo $item->idAction ?>">
                 <div class="bg-img-member"><img src="<?php echo base_url(); echo substr($item->image_url, 0, strlen($item->image_url) - 4); echo "_thumb"; echo substr($item->image_url, strlen($item->image_url) - 4, strlen($item->image_url));?>"/></div>
                 <p><?php echo $item->title; ?></p>
             </a>
             </div>
         </td>
     
    <?php $i=1; }
        else if ($i == 1) {
            ?>
           <tr>
         <td>
             <div class="member-block">
             <a href="<?php echo base_url();?>index.php/manage/approved_member/<?php echo $item->idAction ?>">
                 <div class="bg-img-member"><img src="<?php echo base_url(); echo substr($item->image_url, 0, strlen($item->image_url) - 4); echo "_thumb"; echo substr($item->image_url, strlen($item->image_url) - 4, strlen($item->image_url));?>"/></div>
                 <p><?php echo $item->title; ?></p>
             </a>
             </div>
         </td>  
             
    <?php  
           } 
     else {
         
         ?>
         <td>
             <div class="member-block">
             <a href="<?php echo base_url();?>index.php/manage/approved_member/<?php echo $item->idAction ?>">
                 <div class="bg-img-member"><img src="<?php echo base_url(); echo substr($item->image_url, 0, strlen($item->image_url) - 4); echo "_thumb"; echo substr($item->image_url, strlen($item->image_url) - 4, strlen($item->image_url));?>"/></div>
                 <p><?php echo $item->title; ?></p>
             </a>
             </div>
         </td>
         <?php
         $i++;
     }
     
     if(($i % 4) == 0)
         { 
         ?>
         </tr>
     <?php }
     
     }
     ?>
    </table>
</div>


