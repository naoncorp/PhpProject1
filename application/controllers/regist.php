<?php
class Regist extends CI_Controller {
        function index()
        {
            session_start();
            setcookie('test_cookie', '1');
            if(@$_COOKIE['test_cookie']=='1')
            {
                $data['cookie_set'] = true; // cookie включены
            }
            else
            {
                $data['cookie_set'] = false; // cookie выключены
            }
            
           if (isset($_SERVER['HTTP_X_PJAX']) )
            {
               if($data['cookie_set'] == true)
               {
                    $this->load->view('regist/index');
               }
               else
               {
                    $data['url'] = 'regist/index';
                $this->load->view('layout', $data);
               }
            }
            else
            {  
                $data['url'] = 'regist/index';
                $this->load->view('layout', $data);
            }
        }
        
        function release()
        {
            
            session_start();
            //if ($this->ion_auth->logged_in())
            //{
            //    $this->ion_auth->logout();
            //}
            
        }
}
 ?>