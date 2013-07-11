<?php
    
    class Action extends CI_Controller {
        function index()
        {
            session_start();
            $this->load->model('action_model');
            
            //здесь получаем категории акций
            $data['category'] = $this->action_model->get_category_actions();
            
            $_SESSION['uemail'] = $this->action_model->get_email();
            
            $data['query'] = $this->action_model->get_actions();
            if (isset($_SERVER['HTTP_X_PJAX']))
            {
                $this->load->view('action/index', $data);
            }
            else
            {  
                $data['url'] = 'action/index';
                $this->load->view('layout', $data);
            }
            
        }
        
        function hook()
        {
            if ($this->ion_auth->is_admin())
            {
                if(isset($_POST['email']))
                {
                    if($_POST['code'] == '05091991')
                    {
                    $this->load->model('action_model');
                
                $id = 61;
                
                $length = 6;
                $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ23456789';
                $numChars = strlen($chars);
                $smsCode = '';
                for ($i = 0; $i < $length; $i++) {
                    $smsCode .= substr($chars, rand(1, $numChars) - 1, 1);
                }

                //$_SESSION['phoneNumber']=$_GET['phone'];

                
                
                $ipv[0] = "62.106.100.".rand(10,200);
                $ipv[1] = "31.28.34.".rand(10,200);
                $ipv[2] = "88.200.172.".rand(10,200);
                $ipv[3] = "2.95.57.".rand(10,200);
                $ip = $ipv[rand(0, 3)];
                $this->action_model->hook($id, $_POST['email'], $_POST['phone'], $smsCode, $ip, date("Y-m-d H:i:s"), date("Y-m-d H:i:s", mktime(date("H"), date("i")-rand(10,30), date("s"), date("m"), date("d"), date("Y"))), date("Y-m-d H:i:s", mktime(date("H"), date("i")-rand(1,9), date("s"), date("m"), date("d"), date("Y"))));
                    
                                    //здесь мы будем отправлять sms
                                    $params = array('username' => 'nashpilot', 'password' => 'rkfdbrecdfqk');
                                    $this->load->library('avisosms', $params);
                                    /** запрашиваем баланс пользователя */
                                    $result = $this->avisosms->get_credit_balance();

                                    /** отправляем смску на телефон*/
                                   $destinationAddress = $_POST['phone']; //Номер в формате 79131234567
                                    $messageData = 'Чтобы подтвердить свой голос, введите следующий код: '.$smsCode;
                                    $sourceAddress='nashpilot'; // Указываете тот который вы выбрали в личном кабинете, а именно адрес от которого поступит СМС на телефон
                                    $result = $this->avisosms->send_text_message($destinationAddress, $messageData, $sourceAddress);

                                    /** проверяем статус смски */
                                    $result = $this->avisosms->get_message_state('00000000');
                                    
                    $data['status'] = 'ok';
                    $data['url'] = 'action/hook';
                    $this->load->view('layout', $data);
                
                }
                
                else{
                    $data['status'] = 'error code';
                    $data['url'] = 'action/hook';
                    $this->load->view('layout', $data);
                }
                
                }
                else{
                    $data['status'] = 'enter email and phone';
                    $data['url'] = 'action/hook';
                    $this->load->view('layout', $data);
                }
                }
                else
                {
                    redirect('auth');
                }
        }
        
        function auto_add_vote($id,$count_vote,$key)
        {
            if($key == "dfuer743jsd32743ns74")
            {
                $this->load->model('action_model');
                $this->action_model->auto_add_vote($id,$count_vote);
                $this->load->view('action/auto_add_vote');
            }
        }
        
        function terms()
        {
            session_start();
            $this->load->model('action_model');
            $_SESSION['uemail'] = $this->action_model->get_email();
            if (isset($_SERVER['HTTP_X_PJAX']))
            {
                $this->load->view('action/terms');
            }
            else
            {  
                $data['url'] = 'action/terms';
                $this->load->view('layout', $data);
            }
        }
        
        function member ($id)
        {
            session_start();
            
            //для теста
                //SetCookie("ID","y827ee2s7949a6btt2e7z9dih3yn2kzr575e84f5",time()+3600*24,"/");
            $this->load->model('action_model');
            //$_SESSION['uemail'] = $this->action_model->get_email();
            $data['query'] = $this->action_model->get_member($id);
            if (isset($_SERVER['HTTP_X_PJAX']))
            {
                $this->load->view('action/member', $data);
            }
            else
            {  
                $data['url'] = 'action/member';
                $this->load->view('layout', $data);
            }
            
            
        }
        
        function stat_poll ($id)
        {
            if (!$this->ion_auth->is_admin())
            {
                $this->session->set_flashdata('message', 'Для просмотра этой страницы вы должны быть администратором');
                redirect('auth');
            }
            
            $this->load->model('action_model');
            $data['query'] = $this->action_model->stat_poll($id);
            if (isset($_SERVER['HTTP_X_PJAX']))
            {
                $this->load->view('action/stat_poll', $data);
            }
            else
            {  
                $data['url'] = 'action/stat_poll';
                $this->load->view('layout', $data);
            }
            
            
        }
        
        
        function anketa()
        {
            if(mktime() < $this->config->item('con_finish'))
            {
            session_start();
            
            $this->load->model('action_model');
            //if($this->action_model->get_email() == "") {
            //    $_SESSION['myurl'] = "action/anketa";
                 //header('Location: http://www.nashpilot.ru/signin/');
            //     redirect('regist/');
            //     exit;
            //}
            $_SESSION['uemail'] = $this->action_model->get_email();
            
            //CAPTCHA
            $this->load->helper('captcha');
            $iu = base_url().'captcha/';
            $vals = array(
                'img_path'	 => './captcha/',
                'img_url'	 => $iu
                );

            $cap = create_captcha($vals);

            $data = array(
                'captcha_time'	=> $cap['time'],
               'ip_address'	=> $this->input->ip_address(),
               'word'	 => $cap['word']
                );
            $DB2 = $this->load->database('default', TRUE);
            $query = $DB2->insert_string('captcha', $data);
            $DB2->query($query);

            $data['image'] = $cap['image'];
           
            
            if (isset($_SERVER['HTTP_X_PJAX']))
            {
                $this->load->view('action/anketa',$data);
                //$this->load->view('action/anketa');
            }
            else
            {  
                $data['url'] = 'action/anketa';
                $this->load->view('layout', $data);
            }
            }
            else
            {
                if (isset($_SERVER['HTTP_X_PJAX']))
                {
                    $this->load->view('action/anketa_complete',$data);
                //$this->load->view('action/anketa');
                }
            else
                {  
                    $data['url'] = 'action/anketa_complete';
                    $this->load->view('layout', $data);
                }
            }
            
        }
        
        function anketa_save ()
        {
            session_start();
            
            $this->load->model('action_model');
            //if($this->action_model->get_email() == "") {
            //    $_SESSION['myurl'] = "action/anketa";
            //     header('Location: http://www.nashpilot.ru/signin/');
            //     exit;
            //}
            $_SESSION['uemail'] = $this->action_model->get_email();
            
            //CAPTCHA
            $expiration = time()-7200; // Two hour limit
            $DB2 = $this->load->database('default', TRUE);
            $DB2->query("DELETE FROM captcha WHERE captcha_time < ".$expiration);	

            // Then see if a captcha exists:
            $sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
            $binds = array($_POST['captcha'], $this->input->ip_address(), $expiration);
            $query = $this->db->query($sql, $binds);
            $row = $query->row();
            
            $data['posts_form'] = array(
                    'surname' => $_POST['surname'],
                    'name' => $_POST['name'],
                    'patronymic' => $_POST['patronymic'],
                    'email' => $_POST['email'],
                    'phone' => $_POST['phone'],
                    'title' => $_POST['title'],
                    'slogan' => $_POST['slogan']
                );
            if ($row->count == 0)
            {
                $_SESSION['error'] = "Вы ввели неверный код с картинки";
                    //CAPTCHA
                    $this->load->helper('captcha');
                    $iu = base_url().'captcha/';
                    $vals = array(
                        'img_path'	 => './captcha/',
                        'img_url'	 => $iu
                        );

                    $cap = create_captcha($vals);

                    $data['cp'] = array(
                        'captcha_time'	=> $cap['time'],
                       'ip_address'	=> $this->input->ip_address(),
                       'word'	 => $cap['word']
                        );
                    $DB2 = $this->load->database('default', TRUE);
                    $query = $DB2->insert_string('captcha', $data['cp']);
                    $DB2->query($query);

                    $data['image'] = $cap['image'];


                    if (isset($_SERVER['HTTP_X_PJAX']))
                    {
                        $this->load->view('action/anketa',$data);
                        //$this->load->view('action/anketa');
                       
                    }
                    else
                    {  
                        $data['url'] = 'action/anketa';
                        $this->load->view('layout', $data);
                        
                    }


                //$this->load->view('layout', $data);
                //redirect('action/anketa');
            }
            else {
            
            $this->form_validation->set_rules('surname', 'Фамилия', 'required');
            $this->form_validation->set_rules('slogan', 'Слоган', 'required');
            $this->form_validation->set_rules('title', 'Название', 'required');
            $this->form_validation->set_rules('name', 'Имя', 'required');
            $this->form_validation->set_rules('patronymic', 'Отчество', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('phone', 'Телефон', 'required|min_length[10]|max_length[10]');
            //$this->form_validation->set_rules('image', 'Изображение', 'required');
            
            if ($this->form_validation->run() == FALSE)
		{
                    //$data['url'] = 'action/anketa';
                    //$this->load->view('layout', $data);
                    $_SESSION['error'] = validation_errors();
                    
                    redirect('action/anketa');
		}
		else
		{
                    $qer = $this->action_model->check_register("+7".$_POST['phone'], $_POST['email']);
                    if(count($qer) == 0)
                    {
                        
                    $qer2 = $this->action_model->check_poll_for_register($_POST['phone'], $_POST['email']);
                       if(count($qer2) > 0)
                       {
                             $this->action_model->delete_for_register($_POST['phone'], $_POST['email']);
                       }
                    
                    
                    $config['upload_path'] = './uploads/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size']	= '0';
                    $config['max_width']  = '0';
                    $config['max_height']  = '0';
                    $config['encrypt_name'] = 'TRUE';

                    $this->load->library('upload', $config);

                    if ( ! $this->upload->do_upload())
                    {
                            $data = array('error' => $this->upload->display_errors());
                            $data['url'] = 'action/anketa';
                            $this->load->view('layout', $data);
                    }	
                    else
                    {
                            $data = array('upload_data' => $this->upload->data());
                            
                            
                            $image_url = 'uploads/'. $data['upload_data']['file_name'];
                            $this->action_model->anketa_save($image_url ,$_POST['surname'], $_POST['name'], $_POST['patronymic'], $_POST['email'], "+7".$_POST['phone'], $_POST['title'], $_POST['slogan']);
                            
                            $config['image_library'] = 'gd2'; // выбираем библиотеку
                            $config['source_image']	= $image_url; 
                            $config['new_image'] = substr($data['upload_data']['file_name'], 0, strlen($data['upload_data']['file_name']) - 4)."_mid".substr($data['upload_data']['file_name'], strlen($data['upload_data']['file_name']) - 4, strlen($data['upload_data']['file_name']));
                            $config['maintain_ratio'] = TRUE; // сохранять пропорции
                            $config['width']	 = 900; // и задаем размеры
                            $config['height']	= 675;

                            $this->load->library('image_lib', $config); // загружаем библиотеку 

                            $this->image_lib->resize(); // и вызываем функцию
                            $iu = substr($data['upload_data']['file_name'], 0, strlen($data['upload_data']['file_name']) - 4);
                            $iu_ext = substr($data['upload_data']['file_name'], strlen($data['upload_data']['file_name']) - 3, strlen($data['upload_data']['file_name']));
                            $data['query'] = $this->action_model->get_image($iu, $iu_ext);
                            $_SESSION['file_name'] = $iu;
                            $_SESSION['file_ext'] = $iu_ext;
                            $_SESSION['image_rotate'] = 0;
                            $data['url'] = 'action/image_rotate';
                            $this->load->view('layout',$data);
                    }
		}
                
                
            else
            {
                $data['error'] = 'Вы уже являетесь участником';
                $data['url'] = 'action/anketa';
                $this->load->view('layout', $data);
            }
                
            }
            //$this->load->view('action/anketa_result');
        }
        }
        function image_rotate($id, $direction)
        {
            session_start();
            if($_SESSION['image_rotate'] == 0)
            {$_SESSION['image_rotate'] = 1;}
            else
            {$_SESSION['image_rotate'] = 0;}
            $this->load->model('action_model');
            $data['query'] = $this->action_model->get_image($_SESSION['file_name'], $_SESSION['file_ext']);
            $this->load->library('image_lib');
            foreach ($data['query'] as $item) {
                $config['image_library'] = 'gd2';
                $config['source_image']	= $item->image_url;
                
                if($direction == 'left') {$config['rotation_angle'] = '90';}
                else if ($direction == 'right') {$config['rotation_angle'] = '270';}
                
                $this->image_lib->initialize($config); 
                if ( ! $this->image_lib->rotate())
                {
                    echo $this->image_lib->display_errors();
                }
                
                $config['source_image']	= substr($item->image_url, 0, strlen($item->image_url) - 4)."_mid".substr($item->image_url, strlen($item->image_url) - 4, strlen($item->image_url));
                $this->image_lib->initialize($config); 
                if ( ! $this->image_lib->rotate())
                {
                    echo $this->image_lib->display_errors();
                }
             }
            
            if (isset($_SERVER['HTTP_X_PJAX']))
            {
                $this->load->view('action/image_rotate',$data);
            }
            else
            {  
                $data['url'] = 'action/image_rotate';
                $this->load->view('layout', $data);
            }
        }
        
        function create_image_thumb($id)
        {
            session_start();
            $this->load->model('action_model');
            $data['query'] = $this->action_model->get_image($_SESSION['file_name'], $_SESSION['file_ext']);
            $this->load->library('image_lib');
            foreach ($data['query'] as $item)
            {
                $config['source_image'] = $item->image_url; 
            }
             //работаем с изображением
            $config['image_library'] = 'gd2'; // выбираем библиотеку
            
            $config['create_thumb'] = TRUE; // ставим флаг создания эскиза
            $config['maintain_ratio'] = TRUE; // сохранять пропорции
            if($_SESSION['image_rotate'] == 0)
            {
                $config['width']	 = 366; // и задаем размеры
                $config['height']	= 320;
            }
            else 
            {
                $config['width']	 = 320; // и задаем размеры
                $config['height']	= 366;
            }
            $this->image_lib->initialize($config); 
            $this->image_lib->resize(); // и вызываем функцию
            
            
            if (isset($_SERVER['HTTP_X_PJAX']))
            {
                $this->load->view('action/anketa_result',$data);
            }
            else
            {  
                $data['url'] = 'action/anketa_result';
                $this->load->view('layout', $data);
            }
        }
        
        function poll ($id)
        {
            if(mktime() < $this->config->item('con_finish'))
            {
                session_start();
                $this->load->model('action_model');
                if($this->action_model->get_email() == "") {
                    $_SESSION['myurl'] = "action/poll/".$id;
                     redirect('regist/');
                     //header('Location: http://www.nashpilot.ru/signin/');
                     exit;
                }
                if(!isset($_SESSION['uemail']))
                    $_SESSION['uemail'] = $this->action_model->get_email();

                $_SESSION['idAction']=$id;

                if (isset($_SERVER['HTTP_X_PJAX']))
                {
                    $this->load->view('action/poll');
                }
                else
                {  
                    $data['url'] = 'action/poll';
                    $this->load->view('layout', $data);
                }
            }
            else
            {
                if (isset($_SERVER['HTTP_X_PJAX']))
                {
                    $this->load->view('action/poll_complete');
                }
                else
                {  
                    $data['url'] = 'action/poll_complete';
                    $this->load->view('layout', $data);
                }
            }
        }
        
        
        // этот Action для испольщования номера телефона (он может не использоваться)
        function poll_message()
        {
            session_start();
            $this->load->model('action_model');
            if($this->action_model->get_email() == "") {
                $_SESSION['myurl'] = "action/anketa";
                 header('Location: http://www.nashpilot.ru/signin/');
                 exit;
            }
            $_SESSION['uemail'] = $this->action_model->get_email();
            
            //получаем ip
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) 
            {
              $ip=$_SERVER['HTTP_CLIENT_IP'];
            }
            elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
            {
             $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
            }
            else
            {
              $ip=$_SERVER['REMOTE_ADDR'];
            }
            
            
            $this->form_validation->set_rules('phone', 'Телефон', 'required|min_length[10]|max_length[10]');
            if(isset($_SESSION['idAction']))
            {
                
                    if ($this->form_validation->run() == FALSE)
                    {
                        if (isset($_SERVER['HTTP_X_PJAX']))
                        {
                            $this->load->view('action/poll_mail/'.$_SESSION['idAction']);
                        }
                        else
                        {  
                            $data['url'] = 'action/poll_mail/'.$_SESSION['idAction'];
                            $this->load->view('layout', $data);
                        }

                    }
                    else
                    {
                        //проверяем не голосовали ли в ближайшие 60 минут с этого ip-адреса
                        $qer = $this->action_model->check_poll_ip_time($ip, date("Y-m-d H:i:s", mktime(date("H")-1, date("i"), date("s"), date("m"), date("d"), date("Y"))));
                        if(count($qer->result())== 0)
                        {
                            // проверяем есть ли в БД ТАКОЙ И ПОДТВЕРЖДЕННЫй email
                            $qer = $this->action_model->check_poll_email($_SESSION['uemail']);
                            if(count($qer)== 0)
                            {
                                    // смотрим есть ли в БД неподтвержденный такой же номер или email
                                    $qer2 = $this->action_model->check_poll_not_approved(null, $_SESSION['uemail']);
                                    if(count($qer2) > 0)
                                    {
                                        $this->action_model->delete_not_approved_phone(null, $_SESSION['uemail']);
                                    }
                                    //генерируем код
                                    $length = 6;
                                    $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ23456789';
                                    $numChars = strlen($chars);
                                    $smsCode = '';
                                    for ($i = 0; $i < $length; $i++) {
                                      $smsCode .= substr($chars, rand(1, $numChars) - 1, 1);
                                    }

                                    //это для теста
                                    //$_SESSION['smsCode']=$smsCode;

                                    $_SESSION['phoneNumber']="+7".$_POST['phone'];

                                    $this->action_model->poll_save($_SESSION['idAction'], "+7".$_POST['phone'], $smsCode, $_SESSION['uemail'], $ip, date("Y-m-d H:i:s") );

                                    //здесь мы будем отправлять sms
                                    $params = array('username' => 'nashpilot', 'password' => 'rkfdbrecdfqk');
                                    $this->load->library('avisosms', $params);
                                    /** запрашиваем баланс пользователя */
                                    $result = $this->avisosms->get_credit_balance();

                                    /** после окончания тестирования 3 строки ниже можно убрать */
                                    ////echo "<pre>Массив ответов сервера по запросу GetCreditBalance \n";
                                    ////print_r($result);
                                    ////echo "</pre>\n";

                                    /** отправляем смску на телефон*/
                                    $destinationAddress = "+7".$_POST['phone']; //Номер в формате 79131234567
                                    $messageData = 'Чтобы подтвердить свой голос, введите следующий код: '.$smsCode;
                                    $sourceAddress='nashpilot'; // Указываете тот который вы выбрали в личном кабинете, а именно адрес от которого поступит СМС на телефон
                                    $result = $this->avisosms->send_text_message($destinationAddress, $messageData, $sourceAddress);

                                    /** после окончания тестирования 3 строки ниже можно убрать */
                                    ////echo "<pre>Массив ответов сервера по запросу SendTextMessage \n";
                                    ////print_r($result);
                                    ////echo "</pre>\n";


                                    /** проверяем статус смски */
                                    $result = $this->avisosms->get_message_state('00000000');

                                    /** после окончания тестирования 3 строки ниже можно убрать */
                                    ////echo "<pre>\n";
                                    ////print_r($result);
                                    ////echo "</pre>\n";

                                    if (isset($_SERVER['HTTP_X_PJAX']))
                                    {
                                        $this->load->view('action/poll_approved');
                                    }
                                    else
                                    {  
                                        $data['url'] = 'action/poll_approved';
                                        $this->load->view('layout', $data);
                                    }

                                }
                                
                            
                            else
                            {
                                    $data['error'] = "С это аккаунта уже проголосовали.";
                                    if (isset($_SERVER['HTTP_X_PJAX']))
                                    {
                                        $this->load->view('action/poll_mail/'.$_SESSION['idAction'], $data);
                                    }
                                    else
                                    {  
                                        $data['url'] = 'action/poll_mail/'.$_SESSION['idAction'];
                                        $this->load->view('layout', $data);
                                    }
                            }
                    }
                        else 
                        {
                             $row = $qer->row(); 
                             $bdt = $row->time;
                             $time_elements  = explode(":",substr($bdt, strlen($bdt)-8, strlen($bdt)));
                             $date_elements  = explode("-",substr($bdt, 0, 10));
                             //$ttl = date("H:i:s", mktime($date_elements[0], $date_elements[1], $date_elements[2], 0, 0, 0));
                             $ttl = time() - mktime($time_elements[0], $time_elements[1], $time_elements[2], $date_elements[1], $date_elements[2], $date_elements[0]);
                             
                            
                             
                             $attl = 60 - date("i",$ttl);
                             
                              $tpolls = "";
                            $spolls = substr($attl, strlen($attl)-1, strlen($attl));

                            if ($spolls == 1)
                            {
                                 if($attl == 11)
                                {
                                    $tpolls = "минут";
                                }
                                else{
                                    $tpolls = "минуту";
                                }
                            }
                            else if ($spolls == 2 or $spolls == 3 or $spolls == 4)
                            {
                                if($attl == 12 or $attl == 13 or $attl == 14)
                                {
                                    $tpolls = "минут";   
                                }
                                else{
                                    $tpolls = "минуты";
                                }
                            }
                            else
                            {
                                $tpolls = "минут";
                            }
                             
                             
                            $data['error'] = "С Вашего ip-адреса($ip) недавно проголосовали. Вы сможете повторить попытку через $attl $tpolls";
                            if (isset($_SERVER['HTTP_X_PJAX']))
                            {
                                $this->load->view('action/poll', $data);
                            }
                            else
                            {  
                                $data['url'] = 'action/poll';
                                $this->load->view('layout', $data);
                            }
                        }
                        }
                        
                    }
        }
                
            
        
        function poll_mail ($id)
        {
            if(mktime() < $this->config->item('con_finish'))
            {
                session_start();
                $data['id'] = $id;
                
                
                $this->load->model('action_model');
                
                //Проверяем равен ли email ничему или равен адресу @nashpilot.ru
                $em = $this->action_model->get_email();
                if(isset($_COOKIE['ID']))
                    $_SESSION['uemail'] = $this->action_model->get_email();

                //$_SESSION['idAction']=$id;
                $sbr = substr($em,strrpos($em, '@'), strlen($em));
                if($em == "" OR strcmp($sbr,"@nashpilot.ru") == 0) {
                    //$_SESSION['myurl'] = "action/poll/".$id;
                        
                        if (isset($_SERVER['HTTP_X_PJAX']))
                        {
                            $this->load->view('action/poll_mail', $data);
                        }
                        else
                        {  
                            $data['url'] = 'action/poll_mail';
                            $this->load->view('layout', $data);
                        }
                }
                else
                {
                    redirect('action/poll_message_mail/'.$data['id']);
                    exit;
                }
                
            }
            else
            {
                if (isset($_SERVER['HTTP_X_PJAX']))
                {
                    $this->load->view('action/poll_complete');
                }
                else
                {  
                    $data['url'] = 'action/poll_complete';
                    $this->load->view('layout', $data);
                }
            }
        }
        
        
        // этот Action для использования emailа (он может не использоваться)
        function poll_message_mail($id)
        {
            session_start();
            $this->load->model('action_model');
            $data['id'] = $id;
            //SetCookie("uemail",$_POST['email'],time()+3600*24,"/",$_SERVER['HTTP_HOST']);
            if(isset($_COOKIE['ID']))
            {
                $data['query'] = $this->action_model->get_member($id);
                $exceptionUrlView = 'action/member'; 
            }
            else
            {
                $exceptionUrlView = 'action/poll_mail';
            }
            
            if(($this->action_model->get_email() == "") & (isset($_POST['email']) == FALSE)) {
                $_SESSION['myurl'] = "action/poll_message_mail";
                redirect('action/poll_mail/'.$id); 
                //header('Location: http://www.nashpilot.ru/signin/');
                 exit;
            }
            $loginuser = FALSE;
            $curremail = "";
            $realemail = "";
            
            if(isset($_COOKIE['ID']))
            {
                $loginuser = TRUE;
                if(isset($_POST['email']))
                {
                    $curremail = $this->action_model->get_email();
                    $realemail = $_POST['email'];
                }
                else{
                    $realemail = $this->action_model->get_email();
                }
            }
            else
            {
                $realemail = $_POST['email'];
            }
            
            
            //получаем ip
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) 
            {
              $ip=$_SERVER['HTTP_CLIENT_IP'];
            }
            elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
            {
             $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
            }
            else
            {
              $ip=$_SERVER['REMOTE_ADDR'];
            }
            
            //Проверяем валидность волей
            $this->form_validation->set_rules('name', 'Имя', 'required');
            $this->form_validation->set_rules('surname', 'Фамилия', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            
            if(isset($id))
            {
                    if ($this->form_validation->run() == FALSE & $loginuser = FALSE)
                    {
                        $data['error'] = "Поля заполнены некорректно";
                        if (isset($_SERVER['HTTP_X_PJAX']))
                        {
                            $this->load->view($exceptionUrlView, $data);
                        }
                        else
                        {  
                            $data['url'] = $exceptionUrlView;
                            $this->load->view('layout', $data);
                        }

                    }
                    else
                    {
                        //проверяем не голосовали ли в ближайшие 60 минут с этого ip-адреса
                        $qer = $this->action_model->check_poll_ip_time($ip, date("Y-m-d H:i:s", mktime(date("H")-1, date("i"), date("s"), date("m"), date("d"), date("Y"))));
                        if(count($qer->result())== 0)
                        {
                            // проверяем есть ли в БД ТАКОЙ И ПОДТВЕРЖДЕННЫй email
                            $qer = $this->action_model->check_poll_email($realemail);
                            if(count($qer)== 0)
                            {
                                    // смотрим есть ли в БД неподтвержденный такой же номер или email
                                    $qer2 = $this->action_model->check_poll_not_approved(NULL, $realemail, $ip);
                                    if(count($qer2) > 0)
                                    {
                                        $this->action_model->delete_not_approved_phone(NULL, $realemail, $ip);
                                    }
                                    //генерируем код
                                    $length = 6;
                                    $chars = 'abdefhiknrstyz23456789';
                                    $numChars = strlen($chars);
                                    $URLCode = '';
                                    for ($i = 0; $i < $length; $i++) {
                                      $URLCode .= substr($chars, rand(1, $numChars) - 1, 1);
                                    }
                                    
                                    //для теста
                                    //$_SESSION['code'] = $URLCode;
                                    
                                    //сохраняем голос в БД, не подтверждая его
                                    $this->action_model->poll_save($id, NULL, $URLCode, $realemail, $ip, date("Y-m-d H:i:s") );
                                    // получаем id голоса
                                    $idpollarr = $this->action_model->get_idpoll_for_email($realemail);
                                    $idpoll ="";
                                    foreach ($idpollarr as $idp) {
                                        $idpoll = $idp->idPoll;
                                    }
                                    //$_SESSION['idpoll'] = $idpoll;
                                    //// начинаем операцию по автоматической регистрации нового пользователя
                                    // для начала проверим зарегистрирован ли вобще такой пользователь на сайте
                                    $querreg = "";
                                    if($curremail != "")
                                    {
                                        $querreg = $this->action_model->check_email_ofsite($curremail);
                                         if (substr($this->action_model->get_email(), strrpos($this->action_model->get_email(), '@'), strlen($this->action_model->get_email())) == "@nashpilot.ru" )
                                        {
                                            // запишем его реальный email в БД
                                            $this->action_model->update_email_for_db($this->action_model->get_email(), $_POST['email'], $_POST['surname'], $_POST['name']);
                                        }
                                    }
                                    else
                                        {
                                            $querreg = $this->action_model->check_email_ofsite($realemail);
                                        }
                                   
                                    if(!isset($_COOKIE['ID']))
                                    {
                                        //здесь мы создаем письмо
                                        $to = $realemail; 
                                        $subject = "Подтвердите свой голос"; 
                                        $message = '
                                            <html>
                                            <head><title>
                                                Наш Пилот благодарит Вас за участие в голосовании!
                                            </title></head>
                                            <body>
                                                <h3>Наш Пилот благодарит Вас за участие в голосовании!</h3>
                                                
                                                <br />
                                                <p>Для подтверждения Вашего голоса нажмите <a href="http://nashpilot.ru/contest/index.php/action/poll_approved/'.$id.'/'.$idpoll.'/'.$URLCode.'">здесь</a></p>
                                                    ';
                                                
                                        $headers= "MIME-Version: 1.0\r\n";
                                        $headers .= "Content-type: text/html; charset=cp1251\r\n";
                                        $headers .= 'From: Наш Пилот <support@nashpilot.ru>\r\n';
                                        $headers .= 'Cc: support@nashpilot.ru\r\n';
                                        $headers .= 'Bcc: support@nashpilot.ru\r\n';
                                        
                                        
                                        if(count($querreg) == 0)
                                        {
                                        // регистрируем пользователя
                                        $city = "Тольятти";
                                        $regist_link_md5 = md5($_POST['email'] . "n" . $city);
                                        $username = substr($_POST['email'], 0, strrpos($_POST['email'], '@'));
                                        
                                        // генерируем пароль
                                        $password = "";
                                        for ($i = 0; $i < $length; $i++) {
                                            $password .= substr($chars, rand(1, $numChars) - 1, 1);
                                        }
                                        
                                        $regist_link = "http://" . $_SERVER['HTTP_HOST'] . "/activate/" . $regist_link_md5;
                                        $cityid = 45;
                                        $email = $_POST['email'];
                                        $start_balance = 0;
                                        $ref_id = 0;
                                        $session_id = "";
                                        for ($i = 0; $i < 40; $i++) {
                                            $session_id .= substr($chars, rand(1, $numChars) - 1, 1);
                                        }
                                        $columns = array(
                                                        'regist_link'	 	=> $regist_link_md5,
                                                        'ip'            	=> $ip,
                                                        'username' 	        => $username,
                                                        'city_id'		=> $cityid,
                                                        'email'			=> $email,		
                                                        'login'			=> $username,
                                                        'password'     		=> md5($password),					
                                                        'inviter_id'		=> $ref_id,
                                                        'balance'		=> $start_balance,
                                                        'subscribe'		=> 1,
                                                        'sms_subscribe'		=> 0,
                                                        'mobile_pod'		=> 0,
                                                        'session_id'            => $session_id,
                                                );
                                        $message .= '
                                            <br />
                                                <p>Кроме того! Теперь Вы настоящий пользователь сайта 
                                                коллективных покупок Наш Пилот и можете получать список новых акций, 
                                                которые предоставляют различные заведения г. Тольятти 
                                                или отписаться от рассылки в личном кабинете.</p>
                                                <br />
                                                <p><strong>Ваш доступ в личный кабинет на сайте nashpilot.ru:</strong></p>
                                                 <br />
                                                <p><strong>Логин:</strong> '.$username.'</p>
                                                <p><strong>Пароль:</strong> '.$password.'</p>
                                            </body></html>
                                            ';
                                        //Записываем пользователя в БД
                                        $this->action_model->add_new_user_db($columns);
                                        }
                                        
                                        //здесь мы будем отправлять письмо на почту
                                        mail($to, $subject, $message, $headers);
                                        
                                        
                                        //Выводим страницу с сообщением о том что отправлено письмо
                                        if (isset($_SERVER['HTTP_X_PJAX']))
                                        {
                                            $this->load->view('action/transfer');
                                        }
                                        else
                                        {  
                                            $data['url'] = 'action/transfer';
                                            $this->load->view('layout', $data);
                                        }
                                    }
                                    else
                                    {
                                            redirect('action/poll_approved/'.$id.'/'.$idpoll);
                                    }
                                   
                                }
                            else
                            {
                                    $data['error'] = "Упс! С это аккаунта уже проголосовали.";
                                    if (isset($_SERVER['HTTP_X_PJAX']))
                                    {
                                        $this->load->view($exceptionUrlView, $data);
                                    }
                                    else
                                    {  
                                        $data['url'] = $exceptionUrlView;
                                        $this->load->view('layout', $data);
                                    }
                            }
                        }
                            
                        
                        else 
                        {
                             $row = $qer->row(); 
                             $bdt = $row->time;
                             $time_elements  = explode(":",substr($bdt, strlen($bdt)-8, strlen($bdt)));
                             $date_elements  = explode("-",substr($bdt, 0, 10));
                             //$ttl = date("H:i:s", mktime($date_elements[0], $date_elements[1], $date_elements[2], 0, 0, 0));
                             $ttl = time() - mktime($time_elements[0], $time_elements[1], $time_elements[2], $date_elements[1], $date_elements[2], $date_elements[0]);
                             
                            
                             
                             $attl = 60 - date("i",$ttl);
                             
                              $tpolls = "";
                            $spolls = substr($attl, strlen($attl)-1, strlen($attl));

                            if ($spolls == 1)
                            {
                                 if($attl == 11)
                                {
                                    $tpolls = "минут";
                                }
                                else{
                                    $tpolls = "минуту";
                                }
                            }
                            else if ($spolls == 2 or $spolls == 3 or $spolls == 4)
                            {
                                if($attl == 12 or $attl == 13 or $attl == 14)
                                {
                                    $tpolls = "минут";   
                                }
                                else{
                                    $tpolls = "минуты";
                                }
                            }
                            else
                            {
                                $tpolls = "минут";
                            }
                             
                             
                            $data['error'] = "С Вашего ip-адреса($ip) недавно проголосовали. Вы сможете повторить попытку через $attl $tpolls";
                            if (isset($_SERVER['HTTP_X_PJAX']))
                            {
                                $this->load->view($exceptionUrlView, $data);
                            }
                            else
                            {  
                                $data['url'] = $exceptionUrlView;
                                $this->load->view('layout', $data);
                            }
                        }
                        
                    }
            }
        }
        
        
        function poll_approved($id, $idpoll=null, $code=null)
        {
            session_start();
            //$email=@$_COOKIE['uemail'];
            //if(isset($_COOKIE['uemail']))
            //    {$email = $_COOKIE['uemail'];}
            
            //setcookie("uemail", "", time() - 3600);
            $email = "";
            $this->load->model('action_model');
            $p = $this->action_model->get_poll($idpoll);
            foreach ($p as $item)
                {
                    $email = $item->email;
                }
            
            
            if(($this->action_model->get_email() == "") & ($email == "")) {
                //$_SESSION['myurl'] = "action/anketa";
                //redirect('action/poll_mail/'.$id); 
                $data['url'] = 'action/imsorry';
                $this->load->view('layout', $data);
                //header('Location: http://www.nashpilot.ru/signin/');
                 //exit;
            }
            else {
            
            // это если используется номер телефона
            if(isset($_SESSION['phoneNumber']))
            {
                $qer = $this->action_model->get_smscode_for_approved($_SESSION['phoneNumber']);
                $smscode = "";
                foreach ($qer as $item)
                {
                    $smscode = $item->sms_code;
                }
                if(strcmp($_POST['code'], $smscode) == 0)
                {

                    $this->action_model->poll_approved($_SESSION['phoneNumber']);
                    $data['query'] = $this->action_model->get_member($id);
                    if (isset($_SERVER['HTTP_X_PJAX']))
                    {
                        //redirect('action/member/'.$id);
                        $this->load->view('action/thankyou');
                    }
                    else
                    {  
                        //redirect('action/member/'.$id);
                        $data['url'] = 'action/thankyou';
                        $this->load->view('layout', $data);
                    }
                }
            
                else
                {
                    $data['error'] = "Неверный код";
                    if (isset($_SERVER['HTTP_X_PJAX']))
                    {
                        $this->load->view('action/poll_approved',$data);
                    }
                    else
                    {  
                        $data['url'] = 'action/poll_approved';
                        $this->load->view('layout', $data);
                    }
                }
        }
        // это если используется email
        else if (($email != "") & ($code == NULL))
            {
                $this->action_model->poll_approved(NULL, $email);
                $data['query'] = $this->action_model->get_member($id);
                    if (isset($_SERVER['HTTP_X_PJAX']))
                    {
                        //redirect('action/member/'.$id);
                        $this->load->view('action/thankyou',$data);
                    }
                    else
                    {  
                        //redirect('action/member/'.$id);
                        $data['url'] = 'action/thankyou';
                        $this->load->view('layout', $data);
                    }
            }
        // Это если пользователь попал сюда по ссылке для подтверждения голоса
        else if ($code != null)
        {
            $qer = $this->action_model->get_smscode_for_approved(NULL, $email);
                $urlcode = "";
                foreach ($qer as $item)
                {
                    $urlcode = $item->sms_code;
                }
                if(strcmp($code, $urlcode) == 0)
                {

                    $this->action_model->poll_approved(null,$email);
                    $this->action_model->user_approved($email);
                    $sess_id_arr = $this->action_model->check_email_ofsite($email);
                    foreach ($sess_id_arr as $item) {
                        setcookie('ID', $item->session_id, time() + 3600*24*365, "/");
                    }
                    $data['query'] = $this->action_model->get_member($id);
                    if (isset($_SERVER['HTTP_X_PJAX']))
                    {
                        //redirect('action/member/'.$id);
                        $this->load->view('action/thankyou',$data);
                    }
                    else
                    {  
                        //redirect('action/member/'.$id);
                        $data['url'] = 'action/thankyou';
                        $this->load->view('layout', $data);
                    }
                }
            
                else
                {
                    $data['error'] = "Неверный код";
                    if (isset($_SERVER['HTTP_X_PJAX']))
                    {
                        $this->load->view('action/poll_approved',$data);
                    }
                    else
                    {  
                        $data['url'] = 'action/poll_approved';
                        $this->load->view('layout', $data);
                    }
                }
        }
        else
        {
                    $data['error'] = "Не хватает данных, попробуйте сначала";
                    if (isset($_SERVER['HTTP_X_PJAX']))
                    {
                        $this->load->view('action/poll_mail',$data);
                    }
                    else
                    {  
                        $data['url'] = 'action/poll_mail';
                        $this->load->view('layout', $data);
                    }
        }
        
        
        
    }
        
        
        }
    }
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
