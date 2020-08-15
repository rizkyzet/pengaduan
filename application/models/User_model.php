<?php
class User_model extends CI_Model
{

    public function getUserByLogin()
    {
        $role = $this->session->userdata('role_id');

        if ($role == 1) {
            $data_user = $this->db->get_where('user', ['npm' => $this->session->userdata('npm')])->row_array();
        } else {
            $data_user = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();
        }
        return $data_user;
    }
}
