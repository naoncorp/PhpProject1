<div class="anketa" style="background-image: url(<?php echo base_url();?>content/img/member-bg-<?php echo rand(1,6); ?>.png);">
<?php

$attributes = array('class' => 'anketa_form');
echo form_open('trylogin/try_login',$attributes);
?>
    <div class="about-login">
        <p><?php if(isset($_SESSION['error']))
        {
            echo $_SESSION['error'];
            $_SESSION['error'] = "";
        } ?>
        </p>
        <p>Чтобы участвовать в конкурсе или голосовать за участников, Вы должны быть зарегистрированы на нашем основном сайте <a href="http://deals.nashpilot.ru">nashpilot.ru</a></p>
        <p>Если Вы уже зарегистрированы, просто введите логин и пароль, либо войдите через социальную сеть.</p>
    </div>
    <table>
    <tr>
        <td>
            <div class="anketa-block">
            <?php echo form_label('Email', 'email');?></br>
            <?php echo form_input('email', '');?>
            </div>
        </td>
        <td rowspan="2" >
            <div class="soc-login">
                
                <script src="http://loginza.ru/js/widget.js" type="text/javascript"></script>
                <p>Также Вы можете войти используя:</p>
                <p>
                    <a href="https://loginza.ru/api/widget?token_url=http://contest.nashpilot.ru/trylogin/try_login&provider=google&providers_set=google,facebook,mailruapi" class="loginza vkontakte_button"><img src="http://deals.nashpilot.ru/inc/images/social/google.png"/></a>
                    <a href="https://loginza.ru/api/widget?token_url=http://contest.nashpilot.ru/trylogin/try_login&provider=facebook&providers_set=google,facebook,mailruapi" class="loginza facebook_button"><img src="http://deals.nashpilot.ru/inc/images/social/facebook.png"/></a>
                    <a href="https://loginza.ru/api/widget?token_url=http://contest.nashpilot.ru/trylogin/try_login&provider=mailruapi&providers_set=google,facebook,mailruapi" class="loginza twitter_button"><img src="http://deals.nashpilot.ru/inc/images/social/mail.png"/></a>
                    <a href="https://loginza.ru/api/widget?token_url=http://contest.nashpilot.ru/trylogin/try_login&provider=vkontakte&providers_set=google,facebook,mailruapi,vkontakte," class="loginza twitter_button"><img src="http://deals.nashpilot.ru/inc/images/social/mail.png"/></a>
              </p>
              <input type="submit" value="Я все!" />
            <p style="margin-top:20px;"><a href="http://deals.nashpilot.ru/regist/">Зарегистрироваться!</a></p>
            
            </div> 
        </td>
    </tr>
         <tr><td>
            <div class="anketa-block">
            <?php echo form_label('Пароль', 'password');?></br>
            <?php echo form_password('password', '');?>
            </div>
        </td>
    </tr>
    </table>
   
    
    
<?php

echo form_close();

?>
</div>


