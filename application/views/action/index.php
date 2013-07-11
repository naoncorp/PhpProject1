
<?php 
    //задаем массив баннеров
    $an = array (
        array(
            'url' => 'http://nashpilot.ru/action286.html',
            'image_url' => 'http://nashpilot.ru/upload/an/lico.jpg'
        ),
        array (
            'url' => 'http://nashpilot.ru/article/iphone5.html',
            'image_url' => 'http://nashpilot.ru/upload/an/iphone.jpg'
        ),
        array (
            'url' => 'http://nashpilot.ru/',
            'image_url' => 'http://nashpilot.ru/upload/an/zuby.jpg'
        ),
        array (
            'url' => 'http://nashpilot.ru/',
            'image_url' => 'http://nashpilot.ru/upload/an/ctrikolor.jpg'
        ),
        array (
            'url' => 'http://nashpilot.ru/action336.html',
            'image_url' => 'http://nashpilot.ru/upload/an/tatu.jpg'
        )
    );
    //Индекс баннера по умолчанию равен 0
    $ani = 0;
?>
<?php if(mktime() < $this->config->item('con_finish')) 
            {?>
<h2>Категории текущих акций сайта DS Наш Пилот</h2>
<br />
    <div class="bg-menu-category">
    <ul id="menu_n_nav" class="menu_n">
            <?php foreach($category AS $item) { ?>  
            <li>
                <a href="/current/<?= $item->id ?>/actions.html">
                    <?= iconv("utf-8", "windows-1251", $item->title) ?>
                    <span><?= $item->count ?></span></a>
            </li>
            <?php } ?>
    </ul>
    </div>

    
<?php } ?>
<?php if(mktime() > $this->config->item('con_finish')) { ?>
    <h1 style="text-align: center; margin-bottom: 40px; font-size: 40px; color: #CF3200; font-family: calibri;">Победители конкурса</h1>
<?php } ?>
<div class="actions">
 <table>
     <tr>
     <?php 
              
     
        $i = 0; // нужен для нормальной генерации контента
        $m = 0;
        $l = 0; // просто счетчик элементов
        foreach($query as $item){
            $l++;
             $urli = base_url().substr($item->image_url, 0, strlen($item->image_url) - 4)."_thumb".substr($item->image_url, strlen($item->image_url) - 4, strlen($item->image_url));
               $size = getimagesize($urli);
               $bgpos = '';
                    if($size[0] > $size[1])
                           $bgpos = '50%';
                    else
                           $bgpos = '0%';
            
            $m++;
            $tpolls = "";
            $spolls = substr($item->count_poll, strlen($item->count_poll)-1, strlen($item->count_poll));
            $opolls = substr($item->count_poll, strlen($item->count_poll)-2, strlen($item->count_poll));
            if ($spolls == 1)
            {
                 if($opolls == 11)
                {
                    $tpolls = "голосов";
                }
                else{
                    $tpolls = "голос";
                }
            }
            else if ($spolls == 2 or $spolls == 3 or $spolls == 4)
            {
                if($opolls == 12 or $opolls == 13 or $opolls == 14)
                {
                    $tpolls = "голосов";   
                }
                else{
                    $tpolls = "голоса";
                }
            }
            else
            {
                $tpolls = "голосов";
            }
            
             if((mktime() > $this->config->item('con_finish')) & ($m < 4))
            {
                 ?>
                 
     
             
                 <?php if ($m==1) { ?>
                 <tr><td colspan="3">
                         <div id="prisers">
                             <div class="priser1">
                     <div class="photo">
                         <a class="member-link" href="<?php echo base_url(); ?>index.php/action/member/<?php echo $item->idAction; ?>">
                             <div class="bg-img-member"><div class="img" style="background-position: 50% <?php echo $bgpos; ?>; background-image: url('<?php echo base_url(); echo substr($item->image_url, 0, strlen($item->image_url) - 4); echo "_thumb"; echo substr($item->image_url, strlen($item->image_url) - 4, strlen($item->image_url));?>');"></div></div>
                            </a>
                     </div>
                     <div class="kubok">
                         <div class="buble-kubok">
                             <div class="img-kubok">
                                 <img src="<?php echo base_url(); ?>uploads/win/onepos.gif"/>
                                 <img src="<?php echo base_url(); ?>uploads/win/15000.png"/>
                             </div>
                         </div>
                         <div class="mesto">место</div>
                         <div class="name-priz">Сертификат Л'Этуаль</div>
                     </div>
                     <div class="name-member">
                         <p><?php echo $item->title; ?></p>
                     </div>
                     <div class="ppoll">
                         <div class="buble-ppoll">
                             <div class="count-ppoll">
                                 <span><?php echo $item->count_poll;?></span>
                             </div>
                         </div>
                         <div class="text-ppoll">
                             <?php echo $tpolls; ?>
                         </div>
                     </div>
                     
                     
                 </div>
                 <?php }?>
                 <?php if ($m==2) { ?>
                 <div class="priser2">
                     <div class="photo">
                         <a class="member-link" href="<?php echo base_url(); ?>index.php/action/member/<?php echo $item->idAction; ?>">
                             <div class="bg-img-member"><div class="img" style="background-position: 50% <?php echo $bgpos; ?>; background-image: url('<?php echo base_url(); echo substr($item->image_url, 0, strlen($item->image_url) - 4); echo "_thumb"; echo substr($item->image_url, strlen($item->image_url) - 4, strlen($item->image_url));?>');"></div></div>
                            </a>
                     </div>
                     <div class="kubok">
                         <div class="buble-kubok">
                             <div class="img-kubok">
                                 <img src="<?php echo base_url(); ?>uploads/win/twopos.gif"/>
                                 <img src="<?php echo base_url(); ?>uploads/win/10000.png"/>
                             </div>
                         </div>
                         <div class="mesto">
                             место
                         </div>
                         <div class="name-priz">Сертификат Л'Этуаль</div>
                     </div>
                     <div class="name-member">
                         <p><?php echo $item->title; ?></p>
                     </div>
                     <div class="ppoll">
                         <div class="buble-ppoll">
                             <div class="count-ppoll">
                                 <span><?php echo $item->count_poll;?></span>
                             </div>
                         </div>
                         <div class="text-ppoll">
                             <?php echo $tpolls; ?>
                         </div>
                     </div>
                 </div>
                 <?php }?>
                 <?php if ($m==3) { ?>
                 <div class="priser3">
                     <div class="photo">
                         <a class="member-link" href="<?php echo base_url(); ?>index.php/action/member/<?php echo $item->idAction; ?>">
                            <div class="bg-img-member"><div class="img" style="background-position: 50% <?php echo $bgpos; ?>; background-image: url('<?php echo base_url(); echo substr($item->image_url, 0, strlen($item->image_url) - 4); echo "_thumb"; echo substr($item->image_url, strlen($item->image_url) - 4, strlen($item->image_url));?>');"></div></div>
                            </a>
                     </div>
                     <div class="kubok">
                         <div class="buble-kubok">
                             <div class="img-kubok">
                                 <img src="<?php echo base_url(); ?>uploads/win/threepos.gif"/>
                                 <img src="<?php echo base_url(); ?>uploads/win/5000.png"/>
                             </div>
                         </div>
                         <div class="mesto">
                             место
                         </div>
                         <div class="name-priz">Сертификат Л'Этуаль</div>
                     </div>
                     <div class="name-member">
                         <p><?php echo $item->title; ?></p>
                     </div>
                     <div class="ppoll">
                         <div class="buble-ppoll">
                             <div class="count-ppoll">
                                 <span><?php echo $item->count_poll;?></span>
                             </div>
                         </div>
                         <div class="text-ppoll">
                             <?php echo $tpolls; ?>
                         </div>
                     </div>
                 </div>
                         </div>
                         </td></tr>
                 <?php } ?>
                     
            
     
     
     
     <?php
            }
            else
            {
                
                
            $i++;
            if($i > 4 | $i == 1 ){
     ?>
        </tr>  
     <?php 
                 // проверяем вставлять ли баннер или нет
                 if($l == 1 | (($l-1)%9) == 0)
                 {
                    if($ani < count($an))
                    { ?>

                    <tr>
                        <td colspan="3"><div style="margin-top:10px; margin-bottom:10px; "><a href="<?= $an[$ani]['url'] ?>"><img style="box-shadow: 0 0 2px black;" src="<?= $an[$ani]['image_url'] ?>"/></a></div></td>
                    </tr>
                 
                <?php  
                $ani++; }
                 }
      ?>
     <tr>
         <td>
             <div class="member-block">
             <a class="member-link" href="<?php echo base_url(); ?>index.php/action/member/<?php echo $item->idAction; ?>">
             <p><?php echo $item->title; ?></p>
             <div class="no-name">
                <div class="bg-img-member"><img src="<?php echo base_url(); echo substr($item->image_url, 0, strlen($item->image_url) - 4); echo "_thumb"; echo substr($item->image_url, strlen($item->image_url) - 4, strlen($item->image_url));?>"/></div>
                <div class="count-poll"><p><?php echo $item->count_poll;?></p></div>
                <p><?php echo $item->slogan; ?></p>
             </div>    
             </a>
             </div>
         </td>
     
    <?php $i=1; }
        
     else {
         
         ?>
         <td>
            <div class="member-block">
             <a class="member-link" href="<?php echo base_url(); ?>index.php/action/member/<?php echo $item->idAction; ?>">
             <p><?php echo $item->title; ?></p>
             <div class="no-name">
                <div class="bg-img-member"><img src="<?php echo base_url(); echo substr($item->image_url, 0, strlen($item->image_url) - 4); echo "_thumb"; echo substr($item->image_url, strlen($item->image_url) - 4, strlen($item->image_url));?>"/></div>
                <div class="count-poll"><p><?php echo $item->count_poll;?></p></div>
                <p><?php echo $item->slogan; ?></p>
             </div>    
             </a>
             </div>
         </td>
         <?php
         $i++;
     }
     
    
     
     }}
     ?>
    </table>
    
    <h2 style="margin-top:20px;">Категории текущих акций сайта DS Наш Пилот</h2>
<br />
    <div class="bg-menu-category">
    <ul style="position: relative; margin-bottom: 30px;" id="menu_n_nav" class="menu_n">
            <?php foreach($category AS $item) { ?>  
            <li>
                <a href="/current/<?= $item->id ?>/actions.html">
                    <?= iconv("utf-8", "windows-1251", $item->title) ?>
                    <span><?= $item->count ?></span></a>
            </li>
            <?php } ?>
    </ul>
    </div>
</div>

