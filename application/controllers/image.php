<?php
 class Image extends CI_Controller {
        function index($id)
        {
            $id = (int)$id;
              $query = "SELECT `image` FROM `action` WHERE `idAction`=".$id;
              // ��������� ������ � �������� ����
              $res = mysql_query($query);
              if ( mysql_num_rows( $res ) == 1 ) {
                $image = mysql_fetch_array($res);
                // �������� �������� ���������, ���������� � ���, ��� ������ ����� ������������ ���� �����������
                header("Content-type: image/*");
                // �  �������� ��� ����
                echo $image['image'];
              }
            
            }
        
 }      
 

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
