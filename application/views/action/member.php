<head>
    <?php 
     
        foreach($query as $item){
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
            
     ?>
        <?php $p = $item->title."на nashpilot.ru"; 
        $title = $p;
        ?> 
    <?php } ?>
     <?php if($this->ion_auth->is_admin()) { ?>
        <script>
            $(document).ready(function () {
                if(document.getElementById('trash-true'))
                    {
                        $('#trash-true').parent().remove();
                        $('#stat-true').parent().remove();
                    }
                $('.admin-panel-c-p tr').append($('<td><a id="trash-true" href="<?php echo base_url();?>index.php/manage/trash_true/<?php echo $item->idAction; ?>">В корзину</a></td>'));
                $('.admin-panel-c-p tr').append($('<td><a id="stat-true" href="<?php echo base_url();?>index.php/action/stat_poll/<?php echo $item->idAction; ?>">Статистика голосования</a></td>'));
            
        });
              
        </script>
    <?php } ?>
</head>

<div class="member" style="background-image: url(<?php echo base_url();?>content/img/member-bg-<?php echo rand(1,6); ?>.png);">
<?php
        if(isset($error))
        {
            ?> 
        <p class="err-block"><?= $error ?></p> 
                <?php }
        ?>
 
     <?php 
     
        foreach($query as $item){
            $up = base_url()."index.php/action/member/".$item->idAction;
     ?>
     
    <div class="member-block">
        <div class="block-img"><a href="<?php echo base_url(); echo substr($item->image_url, 0, strlen($item->image_url) - 4); echo "_mid"; echo substr($item->image_url, strlen($item->image_url) - 4, strlen($item->image_url));?>"><img src="<?php echo base_url(); echo substr($item->image_url, 0, strlen($item->image_url) - 4); echo "_mid"; echo substr($item->image_url, strlen($item->image_url) - 4, strlen($item->image_url));?>"/></a></div>
    <div class="member-info">
             
        <br />
        <p class="member-info-fio"><?php echo $item->title; ?></p>
            <p class="member-info-slogan"><?php echo $item->slogan; ?></p> <br />
            <p class="member-info-poll"><?php echo $item->count_poll; echo " ";?> <span style="color:black; font-size: 21px;"><?php echo $tpolls;?></span></p>
             <?php if(mktime() < $this->config->item('con_finish')) { ?><p><a class="member-info-button" href="<?php echo base_url() ?>index.php/action/poll_mail/<?php echo $item->idAction; ?>">Мне нравится!</a></p><?php } ?>
             <p style="margin-bottom: 6px;">Поделиться с друзьями:</p>
             <div id="buttonLikes">
      <!--Вконтакте-->
        <div>
        <a rel="nofollow" onclick="window.open(this.href,<?php echo $p; ?>,'top=200, left=400, height=300, width=600'); return false" href="http://vkontakte.ru/share.php?url=<?php echo $up; ?>" target="blank"><img title="Поделиться в Вконтакте" alt="Поделиться Вконтакте" src="<?php echo base_url() ?>uploads/Connected/vkontakte.png" /></a>
            </div>
      <!--facebook-->
      <div>
        <a rel="nofollow" onclick="window.open(this.href,'description','top=200, left=400, height=300, width=600'); return false" href="http://www.facebook.com/sharer.php?u=<?php echo $up; ?>" target="blank" onclick="" ><img title="Поделиться в Facebook" alt="Поделиться в Facebook" src="<?php echo base_url() ?>uploads/Connected/facebook.png" /></a>
            </div>
        
      <!--Одноклассники-->
      <div><a rel="nofollow" onclick="window.open(this.href,'description','top=200, left=400, height=300, width=600'); return false" target="_blank" href="http://www.odnoklassniki.ru/dk?st.cmd=addShare&st.s=1&st._surl=<?php echo $up; ?>" >
    <img src="<?php echo base_url() ?>uploads/Connected/odnoklassniki.png" title="Поделиться в Одноклассниках" alt="Поделиться в Одноклассниках" />
    </a></div>

      <!--Twitter-->
       <div> 
       
      
        <a rel="nofollow" onclick="window.open(this.href,'description','top=200, left=400, height=300, width=600'); return false" target="_blank"  href="http://twitter.com/share?&url=<?php echo $up; ?>&via=nashpilot" >
<img src="<?php echo base_url() ?>uploads/Connected/twitter.png" title="Поделиться в Twitter" alt="Поделиться в Twitter" />
</a>
            </div>
           
        
        <div>
            <a rel="nofollow" onclick="window.open(this.href,'description',''); return false" target="_blank" href="http://www.livejournal.com/update.bml?event=<?php echo $up; ?>">
<img src="<?php echo base_url() ?>uploads/Connected/livejournal.png" title="Поделиться в Livejournal" alt="Поделиться в Livejournal" />
</a>

        </div>
        <div>
            
        </div>
        
      
       <!--Google+--> 
       <div><g:plusone></g:plusone>
       <script type="text/javascript">
        (function() {
          var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
          po.src = 'https://apis.google.com/js/plusone.js';
          var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
        })();
      </script>
       </div>
       </div>

         </div>
             
    </div>      
    </div>
    
    <div class="comments-member-block">
        <div id="vk_comments"></div>
        <script type="text/javascript">
        var elements = document.getElementsByClassName("vk-comments");
        for(var i=0;i<=elements.length-1;i++)
        {
         //удаляем элемент
            elements[i].parentNode.removeChild(elements[i]);
        }
        
        
            VK.Widgets.Comments("vk_comments", {limit: 20, width: "900", attach: "*"},"<?php echo base_url();?>index.php/action/member/<?php echo $item->idAction; ?>");
        
        
        </script>
    </div>
     <?php 
     
     }
     ?>
    
</div>

