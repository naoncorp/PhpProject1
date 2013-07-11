<div class="poll" style="background-image: url(<?php echo base_url();?>content/img/member-bg-<?php echo rand(1,6); ?>.png);">
<div class="poll-title"><h1>Я голосую!</h1></div>
<?php

echo validation_errors();
$attributes = array('class' => 'poll-form');
echo form_open('action/poll_message', $attributes);
?>
<p class="err-block">
<?php
if(isset($error))
{echo $error;}
?>
    </p>
<?php echo form_label('Введите Ваш контактный номер', 'phone');?></br>
<?php echo "+7  "; echo form_input('phone', '');?>
<p class="phone-about">В формате: 9278940111 (без 8 или +7)</p>

<p>На Ваш номер придет бесплатная смс с кодом, который необходимо будет ввести в следующем поле для подтверждения своего голоса. Внимание Ваш телефон нужен только для того, чтобы один человек мог проголосовать один раз, далее он нигде использоваться нами или передаваться третьим лицам не будет. Гарантия Нашего Пилота!</p>

<input name="mysubmit" type="submit" value="Вот"/>
<?php
echo form_close();
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
</div>
