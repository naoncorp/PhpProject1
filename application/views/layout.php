<html>
    <head>
        <title>
            Акция
        </title>
        <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
        <meta name='loginza-verification' content='1c7ff13ac1a45283873acd5ba713b274' />
        <link rel="stylesheet" href="<?php echo base_url();?>content/assets/countdown/jquery.countdown.css" />
          <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>content/plugin/css/style.css">
        <script type="text/javascript" src="<?php echo base_url();?>content/plugin/jquery-jplayer/jquery.jplayer.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>content/plugin/ttw-music-player-min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>content/js/myplaylist.js"></script>
        <link href="<?php echo base_url();?>content/css/nashpilot.css?2" type="text/css" rel="stylesheet">
        <link href="<?php echo base_url();?>content/js/fancybox/jquery.fancybox-1.3.4.css" type="text/css" rel="stylesheet">
        
        
        <script type="text/javascript" src="<?php echo base_url();?>content/js/jquery.pjax.js"></script>
         <script type="text/javascript" src="<?php echo base_url();?>content/js/nashpilot.js"></script>
         <script type="text/javascript" src="<?php echo base_url();?>content/js/fancybox/jquery.fancybox-1.3.4.js"></script>
         
        <link href="<?php echo base_url();?>content/plugin/skitter/css/skitter.styles.css?1" type="text/css" media="all" rel="stylesheet" />
	<link href="<?php echo base_url();?>content/plugin/skitter/css/highlight.black.css" type="text/css" media="all" rel="stylesheet" />
	<link href="<?php echo base_url();?>content/plugin/skitter/css/sexy-bookmarks-style.css" type="text/css" media="all" rel="stylesheet" />
	
	<script src="<?php echo base_url();?>content/plugin/skitter/js/jquery.easing.1.3.js"></script>
	<script src="<?php echo base_url();?>content/plugin/skitter/js/jquery.animate-colors-min.js"></script>
	
	<script src="<?php echo base_url();?>content/plugin/skitter/js/jquery.skitter.min.js"></script>
	<script src="<?php echo base_url();?>content/plugin/skitter/js/highlight.js"></script>
	<script src="<?php echo base_url();?>content/plugin/skitter/js/sexy-bookmarks-public.js"></script>
        
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>content/css/fireworks.css" media="screen" />
        <script type="text/javascript" src="<?php echo base_url();?>content/js/soundmanager2-nodebug-jsmin.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>content/js/fireworks.js"></script>
        
        <?php if(mktime() > $this->config->item('con_finish')) { ?>
        <script type="text/javascript">
        
        setTimeout(ff,3000);
        function ff() {
        var r=4+parseInt(Math.random()*16);
            for(var i=r; i--;)
            {
                setTimeout('createFirework(25,110,6,1,null,null,null,null,Math.random()>0.5,true)',(i+1)*(1+parseInt(Math.random()*1000)));
            }
         }
        //return false;
        </script> 
        <?php } ?>
        
        <script type="text/javascript" src="http://userapi.com/js/api/openapi.js?52"></script>
        <script type="text/javascript">
  VK.init({apiId: 3127362, onlyWidgets: true});
</script>

<script type="text/javascript">
function bpshow()
   
    {
        $("#bgmplayer").animate({marginLeft: "0px"}, 500 );
     document.getElementById('b-p').setAttribute('onclick', 'bphidden()');
    }
    
    function bphidden()
    {
        $("#bgmplayer").animate({marginLeft: "-373px"}, 500 );
        
     document.getElementById('b-p').setAttribute('onclick', 'bpshow()');
    }
    
    function cok()
    {
        var str = "myurl=" + document.location.href + "; path=/; domain=<?php echo $_SERVER['SERVER_NAME']; ?>;";
        document.cookie = str;
    }
    
    
</script>

<!--<?php 
//if(!isset($_COOKIE['vm']))
//{
//    setcookie('vm', '1', time()+360000);
    ?>
        <script>
    $(document).ready(function()
    {
        $("#various1").fancybox({
            'titlePosition'		: 'inside',
            'transitionIn'		: 'none',
            'transitionOut'		: 'none',
            'width' : '900px',
            'height': '70%'
            
            });
            
            $("#various1").trigger('click');
    });
    
</script>
        <?php
//}
    ?>-->

    </head>
    <?php if(mktime() > $this->config->item('con_finish')){ ?>
    <body id="bod">
        <?php } else {?>
            <body id="bod">
            <?php } ?>
       
        <div id="fireworks-template">
            <div id="fw" class="firework"></div>
            <div id="fp" class="fireworkParticle"><img src="<?php echo base_url();?>content/img/particles.gif" alt="" /></div>
           </div>

           <div id="fireContainer"></div>
        <a id="various1" href="#inline1" style="display:none;"></a>
        <div style="display: none;">
		<div style="width:auto;height:auto;overflow: auto;position:relative;"><div id="inline1" style="width:700px; overflow:auto;">
                        </div></div>
	</div>
        
        
        <div class='loader' style='display:none;'><img src='<?php echo base_url();?>content/img/load.gif'>
        <p>секундочку...</p>
        </div>
        <?php 
            if(isset($cookie_set))
            {
                if($cookie_set == FALSE)
                {
        ?>
        <div class="cock-error">
            <h2>Ой!</h2>
            <p>Кажется в Вашем браузере проблема с Cookies.</p>
            <p>Вам нужно разрешить Cookies в своем браузере.</p>
            <p>Когда проблема будет устранена, обновите страничку.</p>
            <p><a target="_blank" href="http://strana-sovetov.com/computers/programms/3896-enable-cookies.html">О_о А как это, включить Cookies?</a></p>
        </div>
        <?php }} ?>
        
        <div id="shapka">
            
            <div class="timer">
                <?php if(mktime() > $this->config->item('con_finish')) { ?>
                <h2 style="font-size: 30px; color: #597732; margin-top: 44px;">Голосование окончено</h2>
                <?php } else { ?>
                <div><p>До окончания конкурса осталось</p></div>
                <div id="countdown"></div>
                <?php } ?>
            </div>
            
            <div class="shapka-back">
                <div class="shapka-top">
                    <a href="http://nashpilot.ru" title="На главную сайта"><img class="logo" src="http://nashpilot.ru/upload/logo/logo.png"/></a>
                    
                </div>
                <div class="top-menu">
                        <ul>
                            <li class="bg_<?php echo rand(1,5);?>"><a href="<?php echo base_url();?>index.php">Участники</a></li>
                            <?php if(mktime() < $this->config->item('con_finish')){ ?><li class="bg_<?php echo rand(1,5);?>"><a href="<?php echo base_url();?>index.php/action/anketa">Участвовать в конкурсе</a></li><?php } ?>
                            <li class="bg_<?php echo rand(1,5);?>"><a href="<?php echo base_url();?>index.php/action/terms">Условия конкурса</a></li>
                        </ul>
                    </div>
            </div>
            
            
            
        </div>
        <div id="page">
             <div class="login-block">
                 
                 <?php 
                 if (isset($_COOKIE['ID'])) 
                     {?>
                     
                     <p>Я <span class="name"><?php echo $this->action_model->get_email(); ?></span></p>
                     <p><a onclick="cok()" class="signin" href="http://www.nashpilot.ru/signin/" >Это не я</a></p>
                     <?php } else { ?>
                         
                         <p>Я <span class="name">Посетитель</span></p>
                         <p><a onclick="cok()" class="signin" href="http://www.nashpilot.ru/signin/">Стать собой</a></p>
                    <?php } ?>
                     
            </div>
            
            <div id="content">
                
                <?php 
                
                if(isset($url)==true) {
                    if(isset($query))
                    {
                        $data['query'] = $query;
                        $this->load->view($url, $data);
                    }
                    else
                    {
                        $this->load->view($url);
                    }
                }
                else
                {
                    $this->load->view('action/index'); 
                }
                
                 ?>
            </div>
            
            
        </div>
        <div id="footer">
            <p style="text-align:center; color: white; padding: 20px;">© 2012-2013 НашПилот</p>
            </div>
        <div id="footer-bottom">
                
            </div>
        <?php if($this->ion_auth->is_admin()) { ?>
        <div class="admin-panel">
            <div class="admin-panel-c">
                <table class="admin-panel-c-p"><tr>
                <td><a href="<?php echo base_url();?>index.php/manage/approved_list" >Неподтвержденные участники</a></td>
                <td><a href="<?php echo base_url();?>index.php/manage/trash_list" >Удаленные участники</a></td>
                <td class="admin-admin"><p>Admin</p></td>
                </tr></table>
            </div>
        </div>
        <?php } ?>
                <script src="<?php echo base_url();?>content/assets/countdown/jquery.countdown.js"></script>
		<script src="<?php echo base_url();?>content/assets/js/script.js?2"></script>
    </body>
</html>
