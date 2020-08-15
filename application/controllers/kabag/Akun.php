<?php

class Akun extends CI_Controller

{
    public function __construct()
    {
        parent::__construct();
        akses_kabag();
    }
    public function index()
    {
        $data['user'] = $this->User_model->getUserByLogin();
        $data['user_role'] = $this->db->get_where('user_role', ['role_id' => $data['user']['role_id']])->row_array();
        $this->load->view('templates_dashboard/header', $data);
        $this->load->view('templates_dashboard/sidebar_kabag');
        $this->load->view('templates_dashboard/topbar');
        $this->load->view('kabag/akun/form_info_akun');
        $this->load->view('templates_dashboard/footer');
    }
    public function edit_akun()
    {
        $data['user'] = $this->User_model->getUserByLogin();
        $data['user_role'] = $this->db->get_where('user_role', ['role_id' => $data['user']['role_id']])->row_array();


        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('no_tlp', 'No Telepon', 'required|trim');
        if ($this->form_validation->run() == false) {

            $this->load->view('templates_dashboard/header', $data);
            $this->load->view('templates_dashboard/sidebar_kabag');
            $this->load->view('templates_dashboard/topbar');
            $this->load->view('kabag/akun/form_edit_akun');
            $this->load->view('templates_dashboard/footer');
        } else {

            $nama = $this->input->post('nama');
            $jk = $this->input->post('jk');
            $alamat = $this->input->post('alamat');
            $no_tlp = $this->input->post('no_tlp');
            $gambar = $_FILES['gambar']['name'];

            $set = [
                'nama' => $nama,
                'jk' => $jk,
                'alamat' => $alamat,
                'no_tlp' => $no_tlp
            ];

            if ($gambar) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '20048';
                $config['file_name'] = $data['user']['nik'];
                $config['overwrite'] = true;
                $config['upload_path'] = './assets/img/foto_profil';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $foto_lama = $data['user']['gambar'];
                    $foto_baru = $this->upload->data('file_name');
                    if ($foto_lama != 'default.png') {
                        if ($foto_lama != $foto_baru) {

                            array_map('unlink', glob(FCPATH . "assets/img/foto_profil/$foto_lama"));
                        }
                    }


                    $set = array_merge($set, ['gambar' => $foto_baru]);
                } elseif ($this->upload->display_errors()) {
                    $this->session->set_flashdata('pesan_upload', '<div class="alert alert-danger" role="alert"><h4 class="alert-heading">Upload failed!</h4><p>' . $this->upload->display_errors() . '</p></div>');
                    redirect('kabag/akun/');
                }
            }

            $where = ['id' => $data['user']['id']];
            $this->db->update('user', $set, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Info Akun anda Berhasil diubah!
          </div>');

            redirect('kabag/akun');
        }
    }

    public function ubah_password()
    {

        $this->form_validation->set_rules('password_sekarang', 'Password Sekarang', 'required', ['required' => 'Kata Sandi harus diisi!']);
        $this->form_validation->set_rules('password_baru', 'Password Baru', 'required|matches[konfirmasi_password]', ['required' => 'Kata Sandi harus diisi!', 'matches' => 'Password harus sama!']);
        $this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password', 'required|matches[password_baru]', ['required' => 'Kata Sandi harus diisi!', 'matches' => 'Password harus sama!']);
        if ($this->form_validation->run() == false) {

            $this->load->view('templates_dashboard/header');
            $this->load->view('templates_dashboard/sidebar_kabag');
            $this->load->view('templates_dashboard/topbar');
            $this->load->view('kabag/akun/form_ubah_password');
            $this->load->view('templates_dashboard/footer');
        } else {
            $user = $this->User_model->getUserByLogin();
            $password_lama = $this->input->post('password_sekarang');
            $password_baru = $this->input->post('password_baru');


            $cek_password_lama = password_verify($password_lama, $user['psw']);

            if ($cek_password_lama) {

                $set = [
                    'psw' => password_hash($password_baru, PASSWORD_DEFAULT)
                ];

                $where = [
                    'id' => $user['id']
                ];

                $this->db->update('user', $set, $where);
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                Password Berhasil diubah!
              </div>');

                redirect('kabag/akun/ubah_password');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
               Password Lama anda salah!
              </div>');

                redirect('kabag/akun/ubah_password');
            }
        }
    }
}
