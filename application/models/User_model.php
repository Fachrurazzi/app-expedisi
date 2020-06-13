<?php

class User_model extends CI_Model {
    public function get_user($username,$password)
    {
        return $this->db->query("select * from user where username = ? and password = ? limit 1",[$username,$password])->row_array();
    }
}
