<div class="anketa-result" style="background-image: url(<?php echo base_url();?>content/img/member-bg-<?php echo rand(1,6); ?>.png);">
    <div class="anketa-result-text">
        <?php 
        foreach($query as $item){
     ?>
        <div class="thankyou">
        <img src="<?php echo base_url(); echo substr($item->image_url, 0, strlen($item->image_url) - 4); echo "_mid"; echo substr($item->image_url, strlen($item->image_url) - 4, strlen($item->image_url));?>" />
        </div>
            <?php } ?>
        <h2>������� �� ��� �����!</h2>
<br />
<p>� ������� � ������ ����� 25 ����� �� ������ ��������� ��������. ���������� �� ����� <a href="http://nashpilot.ru">������</a>.</p>
<br />
<a class="ainput" href="<?php echo base_url(); echo "index.php"?>">�� ������� �������� ��������</a>
    </div>
</div>

