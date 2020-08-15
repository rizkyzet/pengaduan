<?php
class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        akses_admin();
    }
    public function index()
    {
        $data['mahasiswa'] = $this->db->get_where('user', ['role_id' => 1])->num_rows();
        $data['pengaduan'] = $this->db->get('pengaduan')->num_rows();
        $data['prodi'] = $this->db->get('prodi')->num_rows();
        $data['fakultas'] = $this->db->get('fakultas')->num_rows();
        $this->load->view('templates_dashboard/header', $data);
        $this->load->view('templates_dashboard/sidebar');
        $this->load->view('templates_dashboard/topbar');
        $this->load->view('admin/form_dashboard');
        $this->load->view('templates_dashboard/footer');
    }
}
