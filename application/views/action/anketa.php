<div class="anketa" style="background-image: url(<?php echo base_url();?>content/img/member-bg-<?php echo rand(1,6); ?>.png);">

    <div class="anketa-title">
        <h1>��������� ������</h1>
    </div>
<?php
if(isset($error)){ ?>
     <p class="err-block"><?= $error ?></p> 
     <?php } 

     else if(isset($_SESSION['error'])) { ?>
     <p class="err-block"><?= $_SESSION['error'] ?></p> 
     <?php
     $_SESSION['error'] = ""; 
     
     } 

echo validation_errors();

if(isset($posts_form))
    {
        $css = "style=\"background-color: #FFE5E5;\"";
    }

$attributes = array('class' => 'anketa_form');
echo form_open_multipart('action/anketa_save', $attributes);
?>
<table>
    <tr>
        <td>
            <div class="anketa-block">
            <?php echo form_label('�������', 'surname');?></br>
            <input type="text" name="surname" value="<?= @$posts_form['surname'] ?>" />
            </div>
        </td>
         <td>
             <div class="anketa-block">
            <?php echo form_label('���', 'name');?></br>
            <input type="text" name="name" value="<?= @$posts_form['name'] ?>" />
            </div>
        </td>
        <td>
             <div class="anketa-block">
            <?php echo form_label('��������', 'patronymic');?></br>
            <input type="text" name="patronymic" value="<?= @$posts_form['patronymic'] ?>" />
            </div>
        </td>
        
    </tr>
    <tr>
       <td>
             <div class="anketa-block">
            <?php echo form_label('Email', 'email');?></br>
            <input type="text" name="email" value="<?= @$posts_form['email'] ?>" />
            </div>
        </td>
        <td>
             <div class="anketa-block">
           <?php echo form_label('���������� �������', 'phone');?></br>
            <input type="text" name="phone" value="<?= @$posts_form['phone'] ?>" />
            <span class="about-input">� �������: 9278940321 (��� +7 ��� 8)</span>
           
           </div>
        </td>
        <td>
             <div <?= @$css ?> class="anketa-block">
            <?php echo form_label('���� ���������� ����', 'image');?></br>
            <?php echo form_upload('userfile', '');?>
            </div>
        </td>
    </tr>
    <tr>
        <td >
             <div class="anketa-block">
           <?php echo form_label('������� �������� ����', 'title');?></br>
            <input type="text" name="title" value="<?= @$posts_form['title'] ?>" />
            <span class="about-input">���-��� �����</span>
           </div>
        </td>
        <td colspan="2">
             <div class="anketa-block-title">
           <?php echo form_label('���������� ������ � ����', 'slogan');?></br>
            <input type="text" name="slogan" value="<?= @$posts_form['slogan'] ?>" />
            <span class="about-input">���-���� ����</span>
           </div>
        </td>
    </tr>
   
    <tr>
        <td colspan="2">
             <div <?= @$css ?> class="anketa-block-captcha">
            <p>��� ����� ���������, ��� �� �������.</br>
            ������� ����� � �������� � ���� �����, �������� �������:</p>
            <?php echo $image;?>
            <input type="text" name="captcha" value="" />
            </div>
        </td>
        <td>
            <div class="anketa-block" style="height: 94px; margin-top: 1px;">
            <input type="submit" value="� ���!" />
            </div>
        </td>
    </tr>
</table>

<?php

echo form_close();
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
</div>
