<?php
class Pengaduan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        akses_mahasiswa();
    }

    public function judul()
    {
        $data['pengaduan'] = $this->db->get('pengaduan')->result_array();
        foreach ($data['pengaduan'] as $index => $pengaduan) {
            $cek = $this->db->get_where('jawab', ['npm' => $this->session->userdata('npm'), 'kd_pengaduan' => $pengaduan['kd_pengaduan']])->row_array();
            if ($cek) {
                $tampungcek[$index] = 'disabled';
            } else {
                $tampungcek[$index] = '';
            }
        };
        $data['cek'] = $tampungcek;

        $this->load->view('templates_dashboard/header', $data);
        $this->load->view('templates_dashboard/sidebar_mahasiswa');
        $this->load->view('templates_dashboard/topbar');
        $this->load->view('mahasiswa/pengaduan/form_pengaduan');
        $this->load->view('templates_dashboard/footer');
    }
    public function isi($kd_pengaduan)
    {
        $data['kd_pengaduan'] = $kd_pengaduan;
        $data['pengaduan'] = $this->db->get_where('pengaduan', ['kd_pengaduan' => $kd_pengaduan])->row_array();
        $data['pertanyaan'] = $this->db->get_where('pertanyaan', ['kd_pengaduan' => $kd_pengaduan])->result_array();

        foreach ($data['pertanyaan'] as $index => $tanya) {

            $this->form_validation->set_rules('hasil[' . $index . ']', 'pertanyaan', 'required', ['required' => 'Pertanyaan Belum dijawab']);
        }
        // $this->form_validation->set_rules('saran', 'Saran', 'required', ['required' => 'Saran harus diisi!']);
        if ($this->form_validation->run() == false) {

            $this->load->view('templates_dashboard/header', $data);
            $this->load->view('templates_dashboard/sidebar_mahasiswa');
            $this->load->view('templates_dashboard/topbar');
            $this->load->view('mahasiswa/pengaduan/form_isi');
            $this->load->view('templates_dashboard/footer');
        } else {
            $kd_pengaduan = $this->input->post('kd_pengaduan');
            $kd_pertanyaan = $this->input->post('kd_pertanyaan');
            $hasil = $this->input->post('hasil');
            $saran = $this->input->post('saran');
            $data_jawab = [
                'npm' => $this->session->userdata('npm'),
                'kd_pengaduan' => $kd_pengaduan,
                'tgl_jawab' => date('Y-m-d'),
                'saran' => $saran
            ];
            $this->db->insert('jawab', $data_jawab);
            $kd_jawab = $this->db->insert_id();
            foreach ($hasil as $index => $h) {
                $data_detail = [
                    'kd_jawab' => $kd_jawab,
                    'kd_pertanyaan' => $kd_pertanyaan[$index],
                    'hasil' => $h
                ];
                $this->db->insert('detail_jawab', $data_detail);
            }
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                Terima Kasih, Data pengaduan berhasil diisi!
              </div>');

            redirect('mahasiswa/pengaduan/judul');
        }
    }
}
