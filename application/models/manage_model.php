<?php
class Manage_model extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    function approved_list()
    {
        $this->db->from('action');
        $where = "approved = FALSE AND trash != TRUE";
        $this->db->where($where);
        $this->db->order_by('idAction','desc');
        
        $query = $this->db->get();
        return $query->result();
    }
    
    function approved_member($id)
    {
        $this->db->from('action');
        $where = "idAction = $id";
        $this->db->where($where);
        
        $query = $this->db->get();
        return $query->result();
    }
    
    function approved_true($id)
    {
        $data = array(
               'approved' => TRUE
            );
        
        $where = "idAction = $id";
        $this->db->where($where);
        $this->db->update('action', $data);
    }
    
    function trash_list()
    {
        $this->db->from('action');
        $where = "approved = FALSE AND trash = TRUE";
        $this->db->where($where);
        $this->db->order_by('idAction','desc');
        
        $query = $this->db->get();
        return $query->result();
    }
    
    function trash_member($id)
    {
        $this->db->from('action');
        $where = "idAction = $id";
        $this->db->where($where);
        
        $query = $this->db->get();
        return $query->result();
    }
    
    function trash_true($id)
    {
        $data = array(
               'trash' => TRUE,
            'approved' => FALSE
            );
        
        $where = "idAction = $id";
        $this->db->where($where);
        $this->db->update('action', $data);
        
        $DB2 = $this->load->database('default', TRUE);
        
        $where1 = "Action_idAction = $id";
        $DB2->where($where1);
        $DB2->limit(1);
        $DB2->delete('poll');
        
    }
    
    
    function trash_and_approved_true($id)
    {
        $data = array(
               'trash' => FALSE,
               'approved' => TRUE
            );
        
        $where = "idAction = $id";
        $this->db->where($where);
        $this->db->update('action', $data);
        
        $DB3 = $this->load->database('default', TRUE);
        $DB3->from('action');
        $where = "idAction = $id";
        $DB3->where($where);
        
        $query = $DB3->get();
        $dataPoll = array();
        $mail = "";
        foreach ($query->result() as $item)
        {
            $mail = $item->email;
            $phone = $item->phone;
            $dataPoll = array(
               'phone' => $item->phone,
               'vote' => '1',
               'Action_idAction' => $id,
               'approved_vote' => TRUE,
               'email' => $item->email
            );
        }
        $DB4 = $this->load->database('default', TRUE);
        $where3 = "phone = $phone OR email = '$mail'";
        $DB4->where($where3);
        $DB4->delete('poll'); 
        
        $DB2 = $this->load->database('default', TRUE);
        
        $DB2->insert('poll', $dataPoll);
        
    }
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
