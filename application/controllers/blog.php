<?php
    class Blog extends CI_Controller {
        function index()
        {
           
            //$this->load->model('Blogmodel');
            
            //$data['query'] = $this->Blogmodel->insert_entry();
            //$data['query'] = $this->Blogmodel->get_last_ten_entries();
            session_start();
            $_SESSION['test']='Hello world!';     
            
            $this->load->view('blog');
        }
        
        function comments ()
        {
            echo "А это другой Action";
        }
    }
?>