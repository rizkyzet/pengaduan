<?php
class Auth extends CI_Controller
{

    public function index()

    {

        $this->form_validation->set_rules("npm", "NPM", "required");
        $this->form_validation->set_rules("kata_sandi", "Kata Sandi", "required");


        if ($this->form_validation->run() == false) {


            $this->load->view("auth/login_new");
        } else {
            $nomor_induk = $this->input->post("npm");
            $kata_sandi = $this->input->post("kata_sandi");

            $cek_mahasiswa = $this->db->get_where('user', ['npm' => $nomor_induk]);
            $cek_user = $this->db->get_where('user', ['nik' => $nomor_induk]);


            if ($cek_mahasiswa->num_rows() > 0) {
                $mahasiswa = $cek_mahasiswa->row_array();
                if (password_verify($kata_sandi, $mahasiswa['psw'])) {
                    $data_session = [
                        'npm' => $mahasiswa['npm'],
                        'role_id' => $mahasiswa['role_id']
                    ];
                    $this->session->set_userdata($data_session);
                    redirect('mahasiswa/akun');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                    Password Salah!
                  </div>');

                    redirect('auth');
                }
            } elseif ($cek_user->num_rows() > 0) {
                $user = $cek_user->row_array();
                if (password_verify($kata_sandi, $user['psw'])) {
                    if ($user['role_id'] == 2) {
                        $data_session = [
                            'nik' => $user['nik'],
                            'role_id' => $user['role_id']
                        ];
                        $this->session->set_userdata($data_session);
                        redirect('admin/akun');
                    } elseif ($user['role_id'] == 3) {
                        $data_session = [
                            'nik' => $user['nik'],
                            'role_id' => $user['role_id']
                        ];
                        $this->session->set_userdata($data_session);
                        redirect('kabag/akun');
                    }
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                    Password Salah!
                  </div>');

                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                User tidak ditemukan!
              </div>');

                redirect('auth');
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
}
