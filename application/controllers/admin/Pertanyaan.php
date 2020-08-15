<?php
class Pertanyaan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        akses_admin();
    }
    public function data($kd_pengaduan)
    {
        $data['pertanyaan'] = $this->db->get_where('pertanyaan', ['kd_pengaduan' => $kd_pengaduan])->result_array();

        $this->load->view('templates_dashboard/header', $data);
        $this->load->view('templates_dashboard/sidebar');
        $this->load->view('templates_dashboard/topbar');
        $this->load->view('admin/pertanyaan/form_pertanyaan');
        $this->load->view('templates_dashboard/footer');
    }
    public function edit_pertanyaan($kd_pertanyaan)
    {

        $data['pertanyaan'] = $this->db->get_where('pertanyaan', ['kd_pertanyaan' => $kd_pertanyaan])->row_array();
        $this->form_validation->set_rules('isi', 'Isi Pertanyaan', 'required', ['required' => 'Pertanyaan Harus diisi']);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates_dashboard/header', $data);
            $this->load->view('templates_dashboard/sidebar');
            $this->load->view('templates_dashboard/topbar');
            $this->load->view('admin/pertanyaan/edit_pertanyaan');
            $this->load->view('templates_dashboard/footer');
        } else {
            $set = ['isi' => $this->input->post('isi')];
            $where = ['kd_pertanyaan' => $kd_pertanyaan];
            $this->db->update('pertanyaan', $set, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Pertanyaan Berhasil diubah!
          </div>');

            redirect('admin/pertanyaan/data/' . $data['pertanyaan']['kd_pengaduan']);
        }
    }
    public function tambah_pertanyaan($kd_pengaduan)
    {
        $data['kd_pengaduan'] = $kd_pengaduan;
        $this->form_validation->set_rules('isi', 'Isi Pertanyaan', 'required', ['required' => 'Pertanyaan Harus diisi']);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates_dashboard/header', $data);
            $this->load->view('templates_dashboard/sidebar');
            $this->load->view('templates_dashboard/topbar');
            $this->load->view('admin/pertanyaan/tambah_pertanyaan');
            $this->load->view('templates_dashboard/footer');
        } else {
            $set = [
                'kd_pengaduan' => $kd_pengaduan,
                'isi' => $this->input->post('isi')
            ];

            $this->db->insert('pertanyaan', $set);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Pertanyaan Berhasil ditambah!
          </div>');

            redirect('admin/pertanyaan/data/' . $kd_pengaduan);
        }
    }

    public function hapus_pertanyaan($kd_pertanyaan, $kd_pengaduan)

    {
        $where = ['kd_pertanyaan' => $kd_pertanyaan];
        $this->db->delete('pertanyaan', $where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Pertanyaan Berhasil dihapus!
          </div>');

        redirect('admin/pertanyaan/data/' . $kd_pengaduan);
    }
}
