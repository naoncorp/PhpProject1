<div class="poll" style="background-image: url(<?php echo base_url();?>content/img/member-bg-<?php echo rand(1,6); ?>.png);">
<div class="poll-title"><h1>Я голосую!</h1></div>
<?php

echo validation_errors();
$attributes = array('class' => 'poll-form');
echo form_open('action/hook', $attributes);
?>
<p class="err-block">
<?php
if(isset($status))
{echo $status;}
?>
    </p>
<?php echo form_label('Введите Ваш контактный номер', 'phone');?></br>
<?php echo form_input('phone', '');?>
<p class="phone-about">В формате: +79278940111</p>

<?php echo form_label('Введите Ваш email', 'email');?></br>
<?php echo form_input('email', '');?>

<p> </p>
<?php echo form_label('Введите код', 'code');?></br>
<?php echo form_input('code', '');?>


<input name="mysubmit" type="submit" value="Вот"/>
<?php
echo form_close();
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
</div>
