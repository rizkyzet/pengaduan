<?php
class Pengaduan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        akses_kabag();
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
        $this->load->view('templates_dashboard/sidebar_kabag');
        $this->load->view('templates_dashboard/topbar');
        $this->load->view('kabag/pengaduan/form_pengaduan');
        $this->load->view('templates_dashboard/footer');
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
        $this->load->view('templates_dashboard/sidebar_kabag');
        $this->load->view('templates_dashboard/topbar');
        $this->load->view('kabag/pengaduan/form_cek_responden');
        $this->load->view('templates_dashboard/footer');
    }
}
