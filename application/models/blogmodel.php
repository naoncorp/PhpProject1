<?php
class Blogmodel extends CI_Model {

    
    var $name = '';
    var $sex = '';

    function __construct() {
        parent::__construct();
    }
    
    function get_last_ten_entries()
    {
        $query = $this->db->get('test');
        return $query->result();
    }

    function insert_entry()
    {
        
        $this->name = 'Бумбурум';
        $this->sex = time();
        
        //$data = array(
          //     'name' => 'My title' ,
            //   'sex' => 'My Name' 
            //);
        $this->db->insert('test', $this);
    }

    //function update_entry()
    //{
        //$this->title   = $_POST['title'];
       // $this->content = $_POST['content'];
       // $this->date    = time();

       // $this->db->update('entries', $this, array('id' => $_POST['id']));
    //}

}
?>