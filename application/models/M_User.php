<?php

class M_User extends CI_Model
{
    public function getAllUser()
    {
        return $this->db->get('user')->result_array();
    }

    function insertUser($data)
    {
        $this->db->insert('user', $data);
    }

    function updateUser($data, $id)
    {
        $this->db->where('id_user', $id);
        $this->db->update('user', $data);
        return TRUE;
    }
}
