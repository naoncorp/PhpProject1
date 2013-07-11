<?php
// layout
class Layout extends CI_Controller {
        function index()
        {
            session_start();
            $this->load->model('action_model');
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
        
        }
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
