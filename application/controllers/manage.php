<?php

class Manage extends CI_Controller {
        
        function index()
        {
            $this->load->model('action_model');
            if (!$this->ion_auth->is_admin())
            {
                $this->session->set_flashdata('message', 'Для просмотра этой страницы вы должны быть администратором');
                redirect('auth');
            }
            else
            {
                if (isset($_SERVER['HTTP_X_PJAX']))
                {
                    $this->load->view('manage/index');
                }
                else
                {  
                    $data['url'] = 'manage/index';
                    $this->load->view('layout', $data);
                }
            }
            
        }
        
        function approved_list()
        {
            $this->load->model('action_model');
            if (!$this->ion_auth->is_admin())
            {
                $this->session->set_flashdata('message', 'Для просмотра этой страницы вы должны быть администратором');
                redirect('auth');
            }
            else
            {
            $this->load->model('manage_model');
            $data['query'] = $this->manage_model->approved_list();
            if (isset($_SERVER['HTTP_X_PJAX']))
            {
                $this->load->view('manage/approved_list',$data);
            }
            else
            {  
                $data['url'] = 'manage/approved_list';
                $this->load->view('layout', $data);
            }
            }
            
        }
        
        function approved_member($id)
        {
            $this->load->model('action_model');
            if (!$this->ion_auth->is_admin())
            {
                $this->session->set_flashdata('message', 'Для просмотра этой страницы вы должны быть администратором');
                redirect('auth');
            }
            else
            {
            $this->load->model('manage_model');
            $data['query'] = $this->manage_model->approved_member($id);
            if (isset($_SERVER['HTTP_X_PJAX']))
            {
                $this->load->view('manage/approved_member',$data);
            }
            else
            {  
                $data['url'] = 'manage/approved_member';
                $this->load->view('layout', $data);
            }
            }
            
        }
        
        function image_rotate($id, $direction)
        {
            $this->load->model('action_model');
            $this->load->model('manage_model');
            $data['query'] = $this->manage_model->approved_member($id);
            $this->load->library('image_lib');
            foreach ($data['query'] as $item) {
                $config['source_image']	= $item->image_url;
           }
            $config['image_library'] = 'gd2';
            
            if($direction == 'left') {$config['rotation_angle'] = '90';}
                else if ($direction == 'right') {$config['rotation_angle'] = '270';}
            
            $this->image_lib->initialize($config); 
            if ( ! $this->image_lib->rotate())
            {
                echo $this->image_lib->display_errors();
            }
            
            $config['source_image'] = substr($item->image_url, 0, strlen($item->image_url) - 4)."_mid".substr($item->image_url, strlen($item->image_url) - 4, strlen($item->image_url));
            $this->image_lib->initialize($config); 
            if ( ! $this->image_lib->rotate())
            {
                echo $this->image_lib->display_errors();
            }
            
            
            if (isset($_SERVER['HTTP_X_PJAX']))
            {
                $this->load->view('manage/approved_member',$data);
            }
            else
            {  
                $data['url'] = 'manage/approved_member';
                $this->load->view('layout', $data);
            }
        }
        
        function image_thumb_create($id, $aspect)
        {
            $this->load->model('action_model');
            $this->load->model('manage_model');
            $data['query'] = $this->manage_model->approved_member($id);
            $this->load->library('image_lib');
            foreach ($data['query'] as $item) {
                $config['source_image']	= $item->image_url;
           }
            $config['image_library'] = 'gd2';
            $config['create_thumb'] = TRUE; // ставим флаг создания эскиза
            $config['maintain_ratio'] = TRUE; // сохранять пропорции
            if($aspect == 0)
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
            
            if ( ! $this->image_lib->resize())
            {
                echo $this->image_lib->display_errors();
            }
            
            if (isset($_SERVER['HTTP_X_PJAX']))
            {
                $this->load->view('manage/approved_member',$data);
            }
            else
            {  
                $data['url'] = 'manage/approved_member';
                $this->load->view('layout', $data);
            }
        }
        
        function approved_true($id)
        {
            $this->load->model('action_model');
            if (!$this->ion_auth->is_admin())
            {
                $this->session->set_flashdata('message', 'Для просмотра этой страницы вы должны быть администратором');
                redirect('auth');
            }
            else
            {
            $this->load->model('manage_model');
            $this->manage_model->approved_true($id);
            if (isset($_SERVER['HTTP_X_PJAX']))
            {
                $this->load->view('manage/approved_true');
            }
            else
            {  
                $data['url'] = 'manage/approved_true';
                $this->load->view('layout', $data);
            }
            }
            
        }
        
        function trash_list()
        {
            $this->load->model('action_model');
            if (!$this->ion_auth->is_admin())
            {
                $this->session->set_flashdata('message', 'Для просмотра этой страницы вы должны быть администратором');
                redirect('auth');
            }
            else
            {
            $this->load->model('manage_model');
            $data['query'] = $this->manage_model->trash_list();
            if (isset($_SERVER['HTTP_X_PJAX']))
            {
                 $this->load->view('manage/trash_list',$data);
            }
            else
            {  
                $data['url'] = 'manage/trash_list';
                $this->load->view('layout', $data);
            }
            }
           
        }
        
        function trash_member($id)
        {
            $this->load->model('action_model');
            if (!$this->ion_auth->is_admin())
            {
                $this->session->set_flashdata('message', 'Для просмотра этой страницы вы должны быть администратором');
                redirect('auth');
            }
            else
            {
            $this->load->model('manage_model');
            $data['query'] = $this->manage_model->trash_member($id);
            if (isset($_SERVER['HTTP_X_PJAX']))
            {
                 $this->load->view('manage/trash_member',$data);
            }
            else
            {  
                $data['url'] = 'manage/trash_member';
                $this->load->view('layout', $data);
            }
            }
        }
        
        function trash_true($id)
        {
            $this->load->model('action_model');
            if (!$this->ion_auth->is_admin())
            {
                $this->session->set_flashdata('message', 'Для просмотра этой страницы вы должны быть администратором');
                redirect('auth');
            }
            else
            {
            $this->load->model('manage_model');
            $this->manage_model->trash_true($id);
            if (isset($_SERVER['HTTP_X_PJAX']))
            {
                 $this->load->view('manage/trash_true');
            }
            else
            {  
                $data['url'] = 'manage/trash_true';
                $this->load->view('layout', $data);
            }
            }
            
        }
        
        function trash_and_approved_true($id)
        {
            $this->load->model('action_model');
            if (!$this->ion_auth->is_admin())
            {
                $this->session->set_flashdata('message', 'Для просмотра этой страницы вы должны быть администратором');
                redirect('auth');
            }
            else
            {
            $this->load->model('manage_model');
            $this->manage_model->trash_and_approved_true($id);
            if (isset($_SERVER['HTTP_X_PJAX']))
            {
                 $this->load->view('manage/approved_trash_true');
            }
            else
            {  
                $data['url'] = 'manage/approved_trash_true';
                $this->load->view('layout', $data);
            }
            }
            
        }
        
        
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
