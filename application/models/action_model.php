<?php
class Action_model extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    function get_category_actions()
    {
        $DB2 = $this->load->database('nashpilot', TRUE);
        $DB2->select('actions_categories.id, actions_categories.title, COUNT( actions_categories.title ) AS count');
        $DB2->from('actions, actions_categories');
        $where = "actions.category_id = actions_categories.id AND actions.status = 3 AND actions.end_date > NOW() AND actions.start_date <= NOW()";
        $DB2->where($where);
        $DB2->group_by('actions_categories.id');
        
        $query = $DB2->get();
        return $query->result();
    }
    
    function get_actions()
    {
        $DB2 = $this->load->database('default', TRUE);
        $DB2->select('action.idAction, action.image_url, action.title, action.slogan, SUM(poll.vote) AS count_poll');
        $DB2->from('action, poll');
        $where = "action.approved = TRUE AND poll.approved_vote = 1 AND poll.vote != 0 AND action.idAction = poll.Action_idAction";
        $DB2->where($where);
        $DB2->group_by('action.idAction');
        $DB2->order_by('count_poll','desc');
        
        
        $query = $DB2->get();
        return $query->result();
    }
    
    function get_email()
    {
        if (isset($_COOKIE['ID']))
        {
        $id = $_COOKIE['ID'];
        $DB1 = $this->load->database('nashpilot', TRUE);
        $DB1->select('email');
        $DB1->from('users');
        $where = "session_id = '$id'";
        $DB1->where($where);
        $query = $DB1->get();
        $result = "";
        foreach($query->result() as $item)
        {
            $result = $item->email;
        }
        
        if($result == "")
        {
            $DB2 = $this->load->database('nashpilot', TRUE);
            $DB2->select('email');
            $DB2->from('users');
            $where = "id = '$id'";
            $DB2->where($where);
            $query2 = $DB2->get();
            foreach($query2->result() as $item2)
            {
                $result = $item2->email;
            }
            
            return $result;
        }
        return $result;
        //$cookie = array('name'   => 'uemail', 'value'  => $result);
        //$this->input->set_cookie($cookie);
        
        }
        else
        {
            return "";
        }
    }
    
    function get_member($id)
    {
        $DB2 = $this->load->database('default', TRUE);
        $DB2->select('action.idAction, action.image_url, action.title, action.slogan, SUM(poll.vote) AS count_poll');
        $DB2->from('action, poll');
        $where = "action.idAction = $id AND poll.approved_vote = 1 AND action.approved = TRUE AND poll.vote != 0 AND action.idAction = poll.Action_idAction";
        $DB2->where($where);
        $DB2->group_by('action.idAction');
        $DB2->order_by('count_poll','desc');
        
        
        $query = $DB2->get();
        return $query->result();
    }
    
    function stat_poll($id)
    {
        $DB2 = $this->load->database('default', TRUE);
        $DB2->select('poll.idPoll, poll.vote, poll.phone, poll.email, poll.ip_address, poll.time, action.surname, action.name, action.patronymic');
        $DB2->from('poll,action');
        $where = "poll.Action_idAction = action.idAction AND poll.approved_vote = TRUE AND poll.Action_idAction = $id";
        $DB2->where($where);
        
        $query = $DB2->get();
        return $query->result();
    }
    
    function get_image($image_name, $ext)
    {
        $DB2 = $this->load->database('default', TRUE);
        $DB2->from('action');
        $image_url = 'uploads/'.$image_name.'.'.$ext;
        //$where = "image_url = $image_url";
        $DB2->where('image_url',$image_url);
        $query = $DB2->get();
        return $query->result();
    }
    
    function anketa_save($image_url ,$surname, $name, $patronymic, $email, $phone, $title, $slogan)
    {
        //$DB2->set('phone', $phone);
        //$DB2->insert('action');
        $DB2 = $this->load->database('default', TRUE);
        $dataAction = array(
               'image_url' => $image_url,
               'surname' => $surname ,
               'name' => $name,
               'patronymic' => $patronymic,
               'email' => $email,
               'phone' => $phone,
               'title' => $title,
               'slogan' => $slogan
            );
        
        $DB2->insert('action', $dataAction); 
        
        $DB2->select_max('idAction', 'newAction');
        $query = $DB2->get('action');
        $nA = '';
        foreach ($query->result() as $row)
        {
            $nA = $row->newAction;
        }
        $dataPoll = array(
               'phone' => $phone ,
               'vote' => '1' ,
               'Action_idAction' => $nA,
               'approved_vote' => TRUE,
               'email' => $email
            );
        
        $DB2->insert('poll', $dataPoll);
        
    }
    
    function check_poll_phone($phone)
    {
        $DB2 = $this->load->database('default', TRUE);
        $DB2->from('poll');
        $where = "phone = $phone AND approved_vote = TRUE";
        $DB2->where($where);
        $query = $DB2->get();
        return $query->result();
    }
    
     function check_poll_email($uemail)
    {
        $DB2 = $this->load->database('default', TRUE);
         $DB2->from('poll');
        $where = "email = '$uemail' AND approved_vote = TRUE";
        $DB2->where($where);
        $query = $DB2->get();
        return $query->result();
    }
    
    function check_poll_ip_time($ip, $time)
    {
        $DB2 = $this->load->database('default', TRUE);
        $DB2->from('poll');
        $where = "ip_address = '$ip' AND time > '$time' AND approved_vote = TRUE";
        $DB2->where($where);
        $query = $DB2->get();
        return $query;
    }
    
    function check_poll_not_approved($phone=null, $uemail=null, $ip=null)
    {
        $DB2 = $this->load->database('default', TRUE);
        $DB2->from('poll');
        if($phone != null & $uemail != null)
        {
            $where = "(phone = $phone OR email = '$uemail' OR ip_address = '$ip') AND approved_vote = FALSE";
        }
        else
        {
            $where = "(email = '$uemail' OR ip_address = '$ip') AND approved_vote = FALSE";
        }
        
        $DB2->where($where);
        $query = $DB2->get();
        return $query->result();
    }
    
    function delete_not_approved_phone($phone=null, $uemail=null, $ip=null)
    {
        $DB2 = $this->load->database('default', TRUE);
        $DB2->from('poll');
        if($phone != null & $uemail != null)
        {
            $where = "(phone = $phone OR email = '$uemail' OR ip_address = '$ip') AND approved_vote = FALSE";
        }
        else
        {
            $where = "(email = '$uemail' OR ip_address = '$ip') AND approved_vote = FALSE";
        }
        
        $DB2->where($where);
        $DB2->delete('poll'); 
    }
    
    function check_register($phone, $uemail)
    {
        $DB2 = $this->load->database('default', TRUE);
        $DB2->from('action');
        $where = "(phone = $phone OR email = '$uemail') AND trash = FALSE";
        $DB2->where($where);
        $query = $DB2->get();
        return $query->result();
    }
    
    function check_poll_for_register($phone, $uemail)
    {
        $DB2 = $this->load->database('default', TRUE);
        $DB2->from('poll');
        $where = "phone = $phone OR email = '$uemail'";
        $DB2->where($where);
        $query = $DB2->get();
        return $query->result();
    }
    
    function get_idpoll_for_email($email)
    {
        $DB2 = $this->load->database('default', TRUE);
        $DB2->from('poll');
        $where = "email = '$email'";
        $DB2->where($where);
        $query = $DB2->get();
        return $query->result();
    }
    
    function get_poll ($idpoll)
    {
        $DB2 = $this->load->database('default', TRUE);
        $DB2->from('poll');
        $where = "idPoll = '$idpoll'";
        $DB2->where($where);
        $query = $DB2->get();
        return $query->result();
    }
    
    function delete_for_register($phone, $uemail)
    {
        $DB2 = $this->load->database('default', TRUE);
        $where = "phone = $phone OR email = '$uemail'";
        $DB2->where($where);
        $DB2->delete('poll'); 
    }
    
    function poll_save($id, $phone, $sms_code, $email, $ip, $time)
    {
        $DB2 = $this->load->database('default', TRUE);
        $DB2->set('Action_idAction', $id);
        if($phone != NULL)
        {$DB2->set('phone', $phone);}
        $DB2->set('vote', '1');
        $DB2->set('sms_code', $sms_code);
        $DB2->set('email', $email);
        $DB2->set('ip_address', $ip);
        $DB2->set('time', $time);
        $DB2->insert('poll');
    }
    
    function hook($id, $email, $phone, $sms_code, $ip, $time, $regtime, $access_time)
    {
        $DB1 = $this->load->database('default', TRUE);
        $DB1->set('Action_idAction', $id);
        $DB1->set('phone', $phone);
        $DB1->set('vote', '1');
        $DB1->set('sms_code', $sms_code);
        $DB1->set('email', $email);
        $DB1->set('ip_address', $ip);
        $DB1->set('time', $time);
        $DB1->set('approved_vote', TRUE);
        $DB1->insert('poll');
        
        $DB2 = $this->load->database('nashpilot', TRUE);
        $data = array(
               'email_pod' => TRUE,
               'subscribe' => FALSE,
               'ip' => $ip,
               'lastlogin' => $access_time,
               'registdate' => $regtime 
            );
        $where = "email = '$email'";
        $DB2->where($where);
        $DB2->update('users',$data);
        
        $login  = explode("@",$email);
        
        $DB3 = $this->load->database('nashpilot', TRUE);
               $DB3->set('date', $access_time);
               $DB3->set('ip',$ip);
               $DB3->set('login', $login[0]);
               $DB3->set('result','1'); 
        $DB3->insert('access_log');
        
    }
    
    function update_email_for_db($oldemail, $newemail, $surname, $name)
    {
        $DB2 = $this->load->database('nashpilot', TRUE);
        $data = array(
               'name' => $surname.' '.$name,
               'email' => $newemail,
            );
        $where = "email = '$oldemail'";
        $DB2->where($where);
        $DB2->update('users',$data);
    }
    
    function add_new_user_db($columns)
    {
        $DB3 = $this->load->database('nashpilot', TRUE);
               $DB3->set('regist_link', $columns['regist_link']);
               $DB3->set('ip', $columns['ip']);
               $DB3->set('username', $columns['username']);
               $DB3->set('city_id', $columns['city_id']);
               $DB3->set('email', $columns['email']);
               $DB3->set('login', $columns['login']);
               $DB3->set('password', $columns['password']);
               $DB3->set('inviter_id', $columns['inviter_id']);
               $DB3->set('balance', $columns['balance']);
               $DB3->set('subscribe', $columns['subscribe']);
               $DB3->set('sms_subscribe', $columns['sms_subscribe']);
               $DB3->set('mobile_pod', $columns['mobile_pod']);
               $DB3->set('session_id', $columns['session_id']);
        $DB3->insert('users');
    }
    
    function check_email_ofsite($email)
    {
        $DB2 = $this->load->database('nashpilot', TRUE);
        $DB2->from('users');
        $where = "email = '$email'";
        $DB2->where($where);
        $query = $DB2->get();
        return $query->result();
    }
    
    function poll_approved($phone, $email)
    {
        $DB2 = $this->load->database('default', TRUE);
        $data = array(
               'approved_vote' => TRUE
            );
        if($phone != NULL)
        {
            $where = "phone = '$phone'";
        }
        else
        {
            $where = "email = '$email'";
        }
        $DB2->where($where);
        $DB2->update('poll',$data);
    }
    
   
    
    function user_approved($email)
    {
        $DB2 = $this->load->database('nashpilot', TRUE);
        $data = array(
               'subscribe_pod' => 1,
               'email_pod' => 1
            );
        $where = "email = '$email'";
        $DB2->where($where);
        $DB2->update('users',$data);
    }
    
    function get_smscode_for_approved ($phone, $email)
    {
        
        $DB2 = $this->load->database('default', TRUE);
        $DB2->from('poll');
        if($phone != null)
        $where = "phone = $phone";
        else
            $where = "email = '$email'";
        $DB2->where($where);
        $query = $DB2->get();
        return $query->result();
    }
    
    function auto_add_vote($id,$count_vote)
    {
        $DB2 = $this->load->database('default', TRUE);
        $DB2->set('vote','vote+'.$count_vote,FALSE);
        $where = "Action_idAction = $id";
        $DB2->where($where);
        $DB2->limit(1);
        $DB2->update('poll');
    }
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
