<div class="poll" style="background-image: url(<?php echo base_url();?>content/img/member-bg-<?php echo rand(1,6); ?>.png);">
<div class="poll-title"><h1>� �������!</h1></div>
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
<?php echo form_label('������� ��� ���������� �����', 'phone');?></br>
<?php echo "+7  "; echo form_input('phone', '');?>
<p class="phone-about">� �������: 9278940111 (��� 8 ��� +7)</p>

<p>�� ��� ����� ������ ���������� ��� � �����, ������� ���������� ����� ������ � ��������� ���� ��� ������������� ������ ������. �������� ��� ������� ����� ������ ��� ����, ����� ���� ������� ��� ������������� ���� ���, ����� �� ����� �������������� ���� ��� ������������ ������� ����� �� �����. �������� ������ ������!</p>

<input name="mysubmit" type="submit" value="���"/>
<?php
echo form_close();
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
</div>
