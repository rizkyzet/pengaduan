<?php
class Mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        akses_admin();
    }
    public function index()
    {

        $data['judul'] = 'Data Mahasiswa';

        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('prodi', 'user.id_prodi = prodi.id_prodi');
        $this->db->join('fakultas', 'prodi.id_fakultas = fakultas.id_fakultas');
        $this->db->where('role_id', 1);
        $data['mahasiswa'] = $this->db->get()->result_array();

        $this->load->view('templates_dashboard/header', $data);
        $this->load->view('templates_dashboard/sidebar');
        $this->load->view('templates_dashboard/topbar');
        $this->load->view('admin/mahasiswa/form_mahasiswa', $data);
        $this->load->view('templates_dashboard/footer');
    }

    public function tambah_mahasiswa()
    {


        $this->form_validation->set_rules('npm', 'NPM', 'required|trim');
        $this->form_validation->set_rules('psw', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('no_tlp', 'No Telepon', 'required|trim');

        $this->form_validation->set_rules('prodi', 'Prodi', 'required|trim');

        $data['judul'] = 'Tambah Data Mahasiswa';
        $data['prodi'] = $this->db->get('prodi')->result_array();

        $data['fakultas'] = $this->db->get('fakultas')->result_array();

        if ($this->form_validation->run() == false) {


            $this->load->view('templates_dashboard/header', $data);
            $this->load->view('templates_dashboard/sidebar');
            $this->load->view('templates_dashboard/topbar');
            $this->load->view('admin/mahasiswa/tambah_mahasiswa');
            $this->load->view('templates_dashboard/footer');
        } else {

            $set = [
                "npm" => $this->input->post('npm'),
                "psw" => password_hash($this->input->post('psw'), PASSWORD_DEFAULT),
                "nama" => $this->input->post('nama'),
                "jk" => $this->input->post('jk'),
                "alamat" => $this->input->post('alamat'),
                "no_tlp" => $this->input->post('no_tlp'),
                "gambar" => 'default.png',
                "id_prodi" => $this->input->post('prodi'),
                "role_id" => 1

            ];
            $this->db->insert("user", $set);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Data Mahasiswa Berhasil ditambahkan!
          </div>');

            redirect('admin/mahasiswa/tambah_mahasiswa');
        }
    }

    public function hapus_mahasiswa($kode)
    {
        $this->db->delete('user', ['npm' => $kode]);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Data Mahasiswa Berhasil dihapus!
          </div>');
        redirect('admin/mahasiswa');
    }

    public function edit_mahasiswa($kode)
    {
        $this->form_validation->set_rules('npm', 'NPM', 'required|trim');
        $this->form_validation->set_rules('psw', 'Password', 'min_length[5]');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('no_tlp', 'No Telepon', 'required|trim');

        $this->form_validation->set_rules('prodi', 'Prodi', 'required|trim');
        $data['prodi'] = $this->db->get('prodi')->result_array();
        $data['kode'] = $kode;
        $data['fakultas'] = $this->db->get('fakultas')->result_array();

        $data['judul'] = 'Edit Mahasiswa';
        $data['mahasiswa'] = $this->db->get_where('user', ['npm' => $kode])->row_array();
        if ($this->form_validation->run() == false) {
            $this->load->view('templates_dashboard/header', $data);
            $this->load->view('templates_dashboard/sidebar');
            $this->load->view('templates_dashboard/topbar');
            $this->load->view('admin/mahasiswa/edit_mahasiswa');
            $this->load->view('templates_dashboard/footer');
        } else {
            $password = $this->input->post('psw');

            if ($password) {
                $set = [
                    "npm" => $this->input->post('npm'),
                    "psw" => password_hash($password, PASSWORD_DEFAULT),
                    "nama" => $this->input->post('nama'),
                    "jk" => $this->input->post('jk'),
                    "alamat" => $this->input->post('alamat'),
                    "no_tlp" => $this->input->post('no_tlp'),
                    "id_prodi" => $this->input->post('prodi'),
                    "role_id" => 1

                ];
                $where = ['npm' => $kode];

                $this->db->update('user', $set, $where);
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                Data Mahasiswa Berhasil diubah! Password Baru : ' . $password . '
              </div>');

                redirect('admin/mahasiswa');
            } else {
                $set = [
                    "npm" => $this->input->post('npm'),

                    "nama" => $this->input->post('nama'),
                    "jk" => $this->input->post('jk'),
                    "alamat" => $this->input->post('alamat'),
                    "no_tlp" => $this->input->post('no_tlp'),
                    "id_prodi" => $this->input->post('prodi'),
                    "role_id" => 1

                ];
                $where = ['npm' => $kode];

                $this->db->update('user', $set, $where);
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                Data Mahasiswa Berhasil diubah!
              </div>');

                redirect('admin/mahasiswa');
            }
        }
    }
}
