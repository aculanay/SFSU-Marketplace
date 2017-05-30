<?php

class Registration_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function email_unique($str){
        if ($str == 'test')
                {
                        $this->form_validation->set_message('username_check', 'The {field} field can not be the word "test"');
                        return FALSE;
                }
                else
                {
                        return TRUE;
                }
    }

    public function db_submit($data){
        //Password is not escaped, since it is not a string and should not be modified
        $this->db->insert("Users", $data);
        return true;
    }
}