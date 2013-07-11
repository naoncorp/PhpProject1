<?php
class Trylogin_model extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    function try_parse_auth_db($email, $password, $type)
    {
        $DB2 = $this->load->database('nashpilot', TRUE);
         
        $DB2->select('email, password');
        $DB2->from('users');
        $DB2->where('email', $email); 
        if($type==0)
        {
            $DB2->where('password', $password); 
        }
        
        //$DB2->where($where);
        
        $query = $DB2->get();
        return $query;
    }
}
?>
