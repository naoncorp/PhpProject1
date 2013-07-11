<?php
class Trylogin extends CI_Controller {
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
                    $this->load->view('trylogin/index');
               }
               else
               {
                    $data['url'] = 'trylogin/index';
                $this->load->view('layout', $data);
               }
            }
            else
            {  
                $data['url'] = 'trylogin/index';
                $this->load->view('layout', $data);
            }
        }
        
        function try_login()
        {
            
            session_start();
            //if ($this->ion_auth->logged_in())
            //{
            //    $this->ion_auth->logout();
            //}
            $type = 0;
            $wid = "33287";
            $key = "c4a2f386da3b25be543b6bb96028cf84";
            
            if (isset($_POST['token'])) {
                $type=1;
                $sig = md5($_POST['token'].$key);
                 if (false === ($authData = file_get_contents('http://loginza.ru/api/authinfo?token='.$_POST['token'].'&id='.$wid.'&sig='.$sig))) {
                 //elseif (false === ($authData = file_get_contents('http://loginza.ru/api/authinfo?token='.$_POST['token']))) {
                    $error = 'Ошибка получения данных.';
                }
             }
             else
             {
                 $error = 'Ошибка получения токена.';
             }
            //отправляем запрос на получение данных пользователя
           
            //если произошла ошибка
            if (isset($error)) {
                echo '<p>'.$error.'</p>';
            }
            else {
            //декодируем данные о пользователе из формата JSON
            $user = json_decode($authData);
            //var_dump($user);
            //если провайдер Вконтакте
            if($user->provider == 'http://vk.com/'){
                $uid = $user->uid;
                $provider = $user->provider;
                $firstname = $user->name->first_name;
                $lastname = $user->name->last_name;
                $identity = $user->identity;
                $email = $user->email;
                
                echo $uid;
                 echo $provider;
                 echo $firstname;
                 echo $lastname;
                 echo $identity;
                 echo $email;
            }
            //если провайдер Facebook
            if($user->provider == 'http://www.facebook.com/'){
                $email = $user->email;
            }
            elseif($user->provider == 'http://mail.ru/'){
                $email = $user->email;
            }
            elseif($user->provider == 'https://www.google.com/accounts/o8/ud'){
                $email = $user->email;
            }
            //Если провайдер Twitter
            else{
                echo '<p>Неизвестный провайдер.</p>';
            }
            }
            }
            
            
            
            /*$data['url'] = $_SESSION['myurl'];
           $this->load->model('trylogin_model');
           $expire = (60*60*24*365*2);
           if($type==0)
           {
                $qer = $this->trylogin_model->try_parse_auth_db($_POST['email'], md5($_POST['password'], $type));
                $cookie = array(
                   'name'   => 'uemail',
                   'value'  => $_POST['email'],
                   'expire' => $expire,
               );
           }
           else
           {
               $qer = $this->trylogin_model->try_parse_auth_db($email, "s", $type);
               $cookie = array(
                   'name'   => 'uemail',
                   'value'  => $email,
                    'expire' => $expire,
               );
           }
           $this->input->set_cookie($cookie);
           
           
           if($qer->num_rows() > 0)
           {
               $this->load->database('default', TRUE);
               $identity = 'prostouser@gmail.com';
               $password = '123qwerty456';
               $remember = TRUE; // Запомнить пользователя
               $this->ion_auth->login($identity, $password, $remember);
               
               if(isset($_SESSION['cyrrentid']))
               {
                   redirect($data['url']);
               }
               else
               {
                   redirect($data['url']);
               }
               
           }
           else
           {
               $_SESSION['error'] = "Неверный логин или пароль";
               redirect('trylogin');
           }
            }
        
        */
            
        }
 ?>