<head>
    <?php 
     $i = 0;
        foreach($query as $item){
                
                $i += (int)$item->vote;
                $p = $item->surname." ".$item->name." ".$item->patronymic; 
                $title = $p;
            }
    
            $tpolls = "";
            $i = (string)$i;
            $spolls = substr($i, $i-1, $i);
            $opolls = substr($i, $i-2, $i);
            echo $spolls;
            echo $opolls;
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
</head>

<div class="member" style="background-image: url(<?php echo base_url();?>content/img/member-bg-<?php echo rand(1,6); ?>.png);">

 
    
     
    <div class="member-block" style="padding:40px;">
             
        <p class="member-info-autor">Автор:</p>
        <p class="member-info-fio"><?php echo $p; ?></p>
             <p class="member-info-poll"><?php echo $i; echo " ";?> <span style="color:black; font-size: 21px;"><?php echo $tpolls;?></span></p>
             
             <table class="stat">
                 <tr class="stat-shapka">
                     <td>№</td>
                     <td>Id голоса</td>
                     <td>Телефон</td>
                     <td>Email</td>
                     <td>Голоса</td>
                     <td>ip</td>
                     <td>Время</td>
                 </tr>
                  <?php 
                    $k=0;
                    foreach($query as $item){
                        $k++;
                        //$up = base_url()."index.php/action/member/".$item->idAction;
                 ?>
                 <tr>
                     <td><?php echo $k;?></td>
                     <td><?php echo $item->idPoll; ?></td>
                     <td><?php echo $item->phone; ?></td>
                     <td><?php echo $item->email; ?></td>
                     <td><?php echo $item->vote; ?></td>
                     <td><?php echo $item->ip_address; ?></td>
                     <td><?php echo $item->time; ?></td>
                 </tr>
                  <?php 
     
                    }
                    ?>
             </table>
             
         </div>
             
    </div>
    
    
    
    
</div>

