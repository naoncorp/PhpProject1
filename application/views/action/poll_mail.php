<div class="anketa" style="background-image: url(<?php echo base_url();?>content/img/member-bg-<?php echo rand(1,6); ?>.png);">
<div class="anketa-title">
        <h1>������� ������������</h1>
    </div>
    <?php

$attributes = array('class' => 'poll-mail-form');
echo form_open('action/poll_message_mail/'.$id,$attributes);
?>
        
        <?php
        if(isset($error))
        {
            ?> 
        <p class="err-block"><?= $error ?></p> 
                <?php }
        ?>
    <table>
    <tr>
        <td>
            <div class="block-30">
            <?php echo form_label('���', 'name');?></br>
            <?php echo form_input('name', '');?>
            </div>
        </td>
        <td>
            <div class="block-30">
            <?php echo form_label('�������', 'surname');?></br>
            <?php echo form_input('surname', '');?>
            </div>
        </td>
    
    
        <td>
            <div class="block-30">
            <?php echo form_label('Email', 'email');?></br>
            <?php echo form_input('email', '');?>
            </div>
        </td>
        </tr>
    <tr>    
        <td colspan="3">
            <div class="block-100">
            <input style="float: right;" name="mysubmit" type="submit" value="���"/>
            <p>�� ��� email ������ ������, ������� �� �������, �� ����������� ���� �����.</p>
            </div>
        </td>
        
        </tr>
    </table>
   
    
    
<?php

echo form_close();

?>
</div>
