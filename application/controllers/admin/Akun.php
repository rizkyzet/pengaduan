<?php
class Akun extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        akses_admin();
    }
    public function index()
    {
        $data['user'] = $this->User_model->getUserByLogin();
        $data['user_role'] = $this->db->get_where('user_role', ['role_id' => $data['user']['role_id']])->row_array();
        $this->load->view('templates_dashboard/header', $data);
        $this->load->view('templates_dashboard/sidebar');
        $this->load->view('templates_dashboard/topbar');
        $this->load->view('admin/akun/form_info_akun');
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
            $this->load->view('templates_dashboard/sidebar');
            $this->load->view('templates_dashboard/topbar');
            $this->load->view('admin/akun/form_edit_akun');
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
                    // $foto_lama = $data['user']['gambar'];
                    // if ($foto_lama != 'default.png') {
                    //     unlink(FCPATH . 'assets/img/foto_profil/' . $foto_lama);
                    // }

                    $foto_baru = $this->upload->data('file_name');
                    $set = array_merge($set, ['gambar' => $foto_baru]);
                } elseif ($this->upload->display_errors()) {
                    $this->session->set_flashdata('pesan_upload', '<div class="alert alert-danger" role="alert"><h4 class="alert-heading">Upload failed!</h4><p>' . $this->upload->display_errors() . '</p></div>');
                    redirect('admin/akun/');
                }
            }

            $where = ['id' => $data['user']['id']];
            $this->db->update('user', $set, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Info Akun anda Berhasil diubah!
          </div>');

            redirect('admin/akun');
        }




        // tutup fungsi
    }

    public function ubah_password()
    {

        $this->form_validation->set_rules('password_sekarang', 'Password Sekarang', 'required', ['required' => 'Kata Sandi harus diisi!']);
        $this->form_validation->set_rules('password_baru', 'Password Baru', 'required|matches[konfirmasi_password]', ['required' => 'Kata Sandi harus diisi!', 'matches' => 'Password harus sama!']);
        $this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password', 'required|matches[password_baru]', ['required' => 'Kata Sandi harus diisi!', 'matches' => 'Password harus sama!']);
        if ($this->form_validation->run() == false) {

            $this->load->view('templates_dashboard/header');
            $this->load->view('templates_dashboard/sidebar');
            $this->load->view('templates_dashboard/topbar');
            $this->load->view('admin/akun/form_ubah_password');
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

                redirect('admin/akun/ubah_password');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
               Password Lama anda salah!
              </div>');

                redirect('admin/akun/ubah_password');
            }
        }
    }
    public function data_admin()
    {
        $data['admin'] = $this->db->get_where('user', ['role_id' => 2])->result_array();
        $this->load->view('templates_dashboard/header', $data);
        $this->load->view('templates_dashboard/sidebar');
        $this->load->view('templates_dashboard/topbar');
        $this->load->view('admin/akun/form_data_admin');
        $this->load->view('templates_dashboard/footer');
    }
    public function tambah_admin()
    {
        $this->form_validation->set_rules('nik', 'NIK', 'required|trim|is_unique[user.nik]', ['required' => 'NIK harus diisi!', 'is_unique' => 'NIK sudah tersedia!']);
        $this->form_validation->set_rules('psw', 'Password', 'required', ['required' => 'Kata Sandi harus diisi!']);
        $this->form_validation->set_rules('nama', 'Nama', 'required', ['required' => 'Nama harus diisi!']);
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required', ['required' => 'Jenis Kelamin harus diisi!']);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', ['required' => 'Jenis Kelamin harus diisi!']);
        $this->form_validation->set_rules('no_tlp', 'No Telepon', 'required|numeric', ['required' => 'No Telepon harus diisi!', 'numeric' => 'Nomor Telepon harus angka!']);
        if ($this->form_validation->run() == false) {

            $this->load->view('templates_dashboard/header');
            $this->load->view('templates_dashboard/sidebar');
            $this->load->view('templates_dashboard/topbar');
            $this->load->view('admin/akun/form_tambah_admin');
            $this->load->view('templates_dashboard/footer');
        } else {
            $set = [
                'npm' => '',
                'nik' => $this->input->post('nik'),
                'psw' => password_hash($this->input->post('psw'), PASSWORD_DEFAULT),
                'nama' => $this->input->post('nama'),
                'jk' => $this->input->post('jk'),
                'alamat' => $this->input->post('alamat'),
                'no_tlp' => $this->input->post('no_tlp'),
                'gambar' => 'default.png',
                'id_prodi' => 0,
                'role_id' => 2,
            ];

            $this->db->insert('user', $set);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Admin Telah Ditambah! | Password : ' . $this->input->post('psw') . ' 
           </div>');

            redirect('admin/akun/data_admin');
        }
    }
    public function edit_admin($id)
    {
        $data['admin'] = $this->db->get_where('user', ['id' => $id])->row_array();


        $this->form_validation->set_rules('nama', 'Nama', 'required', ['required' => 'Nama harus diisi!']);
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required', ['required' => 'Jenis Kelamin harus diisi!']);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', ['required' => 'Jenis Kelamin harus diisi!']);
        $this->form_validation->set_rules('no_tlp', 'No Telepon', 'required|numeric', ['required' => 'No Telepon harus diisi!', 'numeric' => 'Nomor Telepon harus angka!']);
        if ($this->form_validation->run() == false) {

            $this->load->view('templates_dashboard/header', $data);
            $this->load->view('templates_dashboard/sidebar');
            $this->load->view('templates_dashboard/topbar');
            $this->load->view('admin/akun/form_edit_admin');
            $this->load->view('templates_dashboard/footer');
        } else {

            $kata_sandi = $this->input->post('psw');
            if ($kata_sandi == '') {
                $set = [
                    'nama' => $this->input->post('nama'),
                    'jk' => $this->input->post('jk'),
                    'alamat' => $this->input->post('alamat'),
                    'no_tlp' => $this->input->post('no_tlp'),
                    'gambar' => 'default.png',
                    'id_prodi' => 0,
                    'role_id' => 2,
                ];
            } else {
                $set = [

                    'psw' => password_hash($this->input->post('psw'), PASSWORD_DEFAULT),
                    'nama' => $this->input->post('nama'),
                    'jk' => $this->input->post('jk'),
                    'alamat' => $this->input->post('alamat'),
                    'no_tlp' => $this->input->post('no_tlp'),
                    'gambar' => 'default.png',
                    'id_prodi' => 0,
                    'role_id' => 2,
                ];
            }
            $where = ['id' => $id];
            $this->db->update('user', $set, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Data admin telah diubah! 
           </div>');

            redirect('admin/akun/data_admin');
        }
    }

    public function hapus_admin($id)
    {
        $where = [
            'id' => $id
        ];
        $this->db->delete('user', $where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
    Admin telah dihapus! 
           </div>');

        redirect('admin/akun/data_admin');
    }
}
