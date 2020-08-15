<?php

class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        akses_kabag();
    }

    public function grafik()
    {

        $data['pengaduan'] = $this->db->get('pengaduan')->result_array();
        $data['kd_pengaduan'] = $data['pengaduan'][0]['kd_pengaduan'];
        $data['pertanyaan'] = $this->db->get_where('pertanyaan', ['kd_pengaduan' => $data['pengaduan'][0]['kd_pengaduan']])->result_array();
        $this->load->view('templates_dashboard/header', $data);
        $this->load->view('templates_dashboard/sidebar_kabag');
        $this->load->view('templates_dashboard/topbar');
        $this->load->view('kabag/laporan/form_laporan_grafik');
        $this->load->view('templates_dashboard/footer');
    }
    public function ajax_table_pertanyaan()
    {
        $kd_pengaduan = $this->input->post('kd_pengaduan');
        $data['pertanyaan'] = $this->db->get_where('pertanyaan', ['kd_pengaduan' => $kd_pengaduan])->result_array();
        $data['kd_pengaduan'] = $kd_pengaduan;

        $this->load->view('kabag/laporan/ajax_table_pertanyaan', $data);
    }

    public function ajax_grafik()
    {

        $kd_pengaduan = $this->input->post('kd_pengaduan');
        $this->db->select('*');
        $this->db->from('jawab');
        $this->db->join('user', 'jawab.npm=user.npm');
        $this->db->where(['kd_pengaduan' => $kd_pengaduan]);
        $responden = $this->db->get()->num_rows();

        $this->db->select('*');
        $this->db->from('jawab');
        $this->db->join('user', 'jawab.npm=user.npm');
        $this->db->where(['kd_pengaduan' => $kd_pengaduan]);
        $data['nama_responden'] = $this->db->get()->result_array();

        $kd_pertanyaan = $this->input->post('kd_pertanyaan');
        $data['pertanyaan'] = $this->db->get_where('pertanyaan', ['kd_pertanyaan' => $kd_pertanyaan])->row_array();
        $data['sb'] = $this->db->get_where('detail_jawab', ['kd_pertanyaan' => $kd_pertanyaan, 'hasil' => 'sb'])->num_rows();
        $data['b'] = $this->db->get_where('detail_jawab', ['kd_pertanyaan' => $kd_pertanyaan, 'hasil' => 'b'])->num_rows();
        $data['c'] = $this->db->get_where('detail_jawab', ['kd_pertanyaan' => $kd_pertanyaan, 'hasil' => 'c'])->num_rows();
        $data['k'] = $this->db->get_where('detail_jawab', ['kd_pertanyaan' => $kd_pertanyaan, 'hasil' => 'k'])->num_rows();
        $data['sk'] = $this->db->get_where('detail_jawab', ['kd_pertanyaan' => $kd_pertanyaan, 'hasil' => 'sk'])->num_rows();

        if ($data['sb'] or $data['b'] or $data['c'] or $data['k'] or $data['sk']) {

            $data['psb'] = round(($data['sb'] / $responden) * 100);
            $data['pb'] = round(($data['b'] / $responden) * 100);
            $data['pc'] = round(($data['c'] / $responden) * 100);
            $data['pk'] = round(($data['k'] / $responden) * 100);
            $data['psk'] = round(($data['sk'] / $responden) * 100);
        } else {
            $data['psb'] = 0;
            $data['pb'] = 0;
            $data['pc'] = 0;
            $data['pk'] = 0;
            $data['psk'] = 0;
        }

        $data['jumlah_responden'] = $responden;

        $this->load->view('kabag/laporan/ajax_grafik', $data);
    }

    public function pengaduan()
    {
        $data['pengaduan'] = $this->db->get('pengaduan')->result_array();
        $this->load->view('templates_dashboard/header', $data);
        $this->load->view('templates_dashboard/sidebar_kabag');
        $this->load->view('templates_dashboard/topbar');
        $this->load->view('kabag/laporan/form_laporan_pengaduan');
        $this->load->view('templates_dashboard/footer');
    }
    public function cetak_lap_pengaduan($kd_pengaduan)
    {
        $mpdf = new \Mpdf\Mpdf();

        $data['pengaduan'] = $this->db->get_where('pengaduan', ['kd_pengaduan' => $kd_pengaduan])->row_array();
        $data['pertanyaan'] = $this->db->get_where('pertanyaan', ['kd_pengaduan' => $kd_pengaduan])->result_array();


        foreach ($data['pertanyaan'] as $index => $tanya) {
            $sb = $this->db->get_where('detail_jawab', ['kd_pertanyaan' => $tanya['kd_pertanyaan'], 'hasil' => 'sb'])->num_rows();
            $b = $this->db->get_where('detail_jawab', ['kd_pertanyaan' => $tanya['kd_pertanyaan'], 'hasil' => 'b'])->num_rows();
            $c = $this->db->get_where('detail_jawab', ['kd_pertanyaan' => $tanya['kd_pertanyaan'], 'hasil' => 'c'])->num_rows();
            $k = $this->db->get_where('detail_jawab', ['kd_pertanyaan' => $tanya['kd_pertanyaan'], 'hasil' => 'k'])->num_rows();
            $sk = $this->db->get_where('detail_jawab', ['kd_pertanyaan' => $tanya['kd_pertanyaan'], 'hasil' => 'sk'])->num_rows();

            $hasil[$index] = [
                'sb' => $sb,
                'b' => $b,
                'c' => $c,
                'k' => $k,
                'sk' => $sk
            ];
        }

        foreach ($hasil as $hsl) {
            $tampung_sb[] = $hsl['sb'];
            $tampung_b[] = $hsl['b'];
            $tampung_c[] = $hsl['c'];
            $tampung_k[] = $hsl['k'];
            $tampung_sk[] = $hsl['sk'];
        }

        $total_kriteria = [
            'total_sb' => array_sum($tampung_sb),
            'total_b' => array_sum($tampung_b),
            'total_c' => array_sum($tampung_c),
            'total_k' => array_sum($tampung_k),
            'total_sk' => array_sum($tampung_sk),
        ];

        $data['hasil'] = $hasil;
        $data['total'] = $total_kriteria;

        $this->db->select('*');
        $this->db->from('jawab');
        $this->db->join('user', 'jawab.npm=user.npm');
        $this->db->where(['kd_pengaduan' => $kd_pengaduan]);
        $responden = $this->db->get()->num_rows();

        $data['responden'] = $responden;
        $html = $this->load->view('kabag/laporan/cetak_laporan_pengaduan', $data, true);

        $mpdf->AddPage(
            'L' // L - landscape, P - portrait

        ); // margin footer
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }


    public function saran()
    {
        $data['pengaduan'] = $this->db->get('pengaduan')->result_array();
        $data['saran'] = $this->db->get_where('jawab', ['kd_pengaduan' => $data['pengaduan'][0]['kd_pengaduan']])->result_array();

        $this->load->view('templates_dashboard/header', $data);
        $this->load->view('templates_dashboard/sidebar_kabag');
        $this->load->view('templates_dashboard/topbar');
        $this->load->view('kabag/laporan/form_laporan_saran');
        $this->load->view('templates_dashboard/footer');
    }

    public function ajax_saran()
    {
        $kd_pengaduan = $this->input->post('kd_pengaduan');

        $data['saran'] = $this->db->get_where('jawab', ['kd_pengaduan' => $kd_pengaduan])->result_array();

        $this->load->view('kabag/laporan/ajax_table_saran', $data);
    }

    public function cetak_lap_saran()
    {
        $mpdf = new \Mpdf\Mpdf();
        $kd_pengaduan = $this->input->post('kd_pengaduan');
        $data['pengaduan'] = $this->db->get_where('pengaduan', ['kd_pengaduan' => $kd_pengaduan])->row_array();
        $data['saran'] = $this->db->get_where('jawab', ['kd_pengaduan' => $kd_pengaduan])->result_array();

        $html = $this->load->view('kabag/laporan/cetak_laporan_saran', $data, true);

        $mpdf->AddPage(
            'L' // L - landscape, P - portrait

        ); // margin footer
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }
}
