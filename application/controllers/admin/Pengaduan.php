<?php
class Pengaduan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        akses_admin();
    }

    public function index()
    {

        $data['pengaduan'] = $this->db->get('pengaduan')->result_array();
        $data['jumlah_mahasiswa'] = $this->db->get_where('user', ['role_id' => 1])->num_rows();

        foreach ($data['pengaduan'] as $index => $pengaduan) {
            $cek = $this->db->get_where('jawab', ['kd_pengaduan' => $pengaduan['kd_pengaduan']])->num_rows();
            if ($cek) {

                $tampung_cek[$index] = $cek;
            } else {
                $tampung_cek[$index] = 0;
            }
        }
        $data['sudah_isi'] = $tampung_cek;


        $this->load->view('templates_dashboard/header', $data);
        $this->load->view('templates_dashboard/sidebar');
        $this->load->view('templates_dashboard/topbar');
        $this->load->view('admin/pengaduan/form_pengaduan');
        $this->load->view('templates_dashboard/footer');
    }

    public function tambah_pengaduan()
    {
        $data['kode'] = "KS-" . date('Ymd') . "-" . time();
        $this->form_validation->set_rules('judul', 'Judul pengaduan', 'required');
        $this->form_validation->set_rules('pertanyaan[]', 'Pertanyaan', 'required');


        if ($this->form_validation->run() == false) {
            $data['jumlah_pertanyaan'] = set_value('jumlah_pertanyaan');
            $this->load->view('templates_dashboard/header', $data);
            $this->load->view('templates_dashboard/sidebar');
            $this->load->view('templates_dashboard/topbar');
            $this->load->view('admin/pengaduan/tambah_pengaduan');
            $this->load->view('templates_dashboard/footer');
        } else {


            $kode = $this->input->post('kode');
            $pengaduan = $this->input->post('judul');
            $pertanyaan = $this->input->post('pertanyaan');



            $data_pengaduan = [
                'kd_pengaduan' => $kode,
                'judul_pengaduan' => $pengaduan,
                'tgl_dibuat' => date('Y-m-d')
            ];

            $this->db->insert('pengaduan', $data_pengaduan);

            foreach ($pertanyaan as $tanya) {

                $this->db->insert('pertanyaan', ['kd_pengaduan' => $kode, 'isi' => $tanya]);
            }

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            pengaduan Berhasil dibuat!
          </div>');

            redirect('admin/pengaduan');
        }
    }

    public function get_jumlah()
    {

        $data['jumlah'] = $this->input->post('jumlah');
        $this->load->view('admin/pengaduan/ajax_jumlah_pertanyaan', $data);
    }


    public function edit_pengaduan($kd)
    {
        $data['pengaduan'] = $this->db->get_where('pengaduan', ['kd_pengaduan' => $kd])->row_array();
        $this->form_validation->set_rules('judul', 'Judul pengaduan', 'required', ['required' => 'Judul Harus di Isi']);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates_dashboard/header', $data);
            $this->load->view('templates_dashboard/sidebar');
            $this->load->view('templates_dashboard/topbar');
            $this->load->view('admin/pengaduan/edit_pengaduan');
            $this->load->view('templates_dashboard/footer');
        } else {
            $judul = $this->input->post('judul');
            $set = [
                'judul_pengaduan' => $judul
            ];
            $where = ['kd_pengaduan' => $kd];
            $this->db->update('pengaduan', $set, $where);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            pengaduan Berhasil diubah!
          </div>');

            redirect('admin/pengaduan');
        }
    }
    public function hapus_pengaduan($kd_pengaduan)
    {
        $this->db->delete('pengaduan', ['kd_pengaduan' => $kd_pengaduan]);
        $this->db->delete('pertanyaan', ['kd_pengaduan' => $kd_pengaduan]);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Pengaduan Berhasil dihapus!
          </div>');

        redirect('admin/pengaduan');
    }

    public function cek_responden($kd_pengaduan)
    {

        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('prodi', 'user.id_prodi = prodi.id_prodi');
        $this->db->join('fakultas', 'prodi.id_fakultas = fakultas.id_fakultas');

        $this->db->where('role_id', 1);
        $data['mahasiswa'] = $this->db->get()->result_array();


        foreach ($data['mahasiswa'] as $index => $mhs) {
            $result = $this->db->get_where('jawab', ['npm' => $mhs['npm'], 'kd_pengaduan' => $kd_pengaduan])->row_array();
            $cek = $this->db->get_where('jawab', ['npm' => $mhs['npm'], 'kd_pengaduan' => $kd_pengaduan])->num_rows();
            if ($cek) {
                $status[$index]['status'] = 'Sudah Mengisi';
                $status[$index]['tanggal'] = $result['tgl_jawab'];
            } else {
                $status[$index]['status'] = 'Belum Mengisi';
                $status[$index]['tanggal'] = '-';
            }
        }

        $data['status'] = $status;
        $this->load->view('templates_dashboard/header', $data);
        $this->load->view('templates_dashboard/sidebar');
        $this->load->view('templates_dashboard/topbar');
        $this->load->view('admin/pengaduan/form_cek_responden');
        $this->load->view('templates_dashboard/footer');
    }
}
