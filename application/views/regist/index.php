<div class="anketa" style="background-image: url(<?php echo base_url();?>content/img/member-bg-<?php echo rand(1,6); ?>.png);">
<?php

$attributes = array('class' => 'anketa_form');
echo form_open('regist/release',$attributes);
?>
    <div class="about-login">
        <p><?php if(isset($_SESSION['error']))
        {
            echo $_SESSION['error'];
            $_SESSION['error'] = "";
        } ?>
        </p>
        <p>Давайте познакомимся</p>
    </div>
    <table>
    <tr>
        <td>
            <div class="anketa-block">
            <?php echo form_label('Имя', 'lastname');?></br>
            <?php echo form_password('lastname', '');?>
            </div>
        </td>
        <td>
            <div class="anketa-block">
            <?php echo form_label('Фамилия', 'firstname');?></br>
            <?php echo form_password('firstname', '');?>
            </div>
        </td>
        <td>
            <div class="anketa-block">
            <?php echo form_label('Email', 'email');?></br>
            <?php echo form_input('email', '');?>
            </div>
        </td>
        
        </tr>
    </table>
   
    
    
<?php

echo form_close();

?>
</div>
