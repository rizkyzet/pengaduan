<?php
class Prodi extends CI_Controller
{
    public function index()
    {
        $this->db->select('fakultas.nama_fakultas,prodi.*');
        $this->db->from('fakultas');
        $this->db->join('prodi', 'fakultas.id_fakultas=prodi.id_fakultas');

        $data['prodi'] = $this->db->get()->result_array();


        $this->load->view('templates_dashboard/header', $data);
        $this->load->view('templates_dashboard/sidebar');
        $this->load->view('templates_dashboard/topbar');
        $this->load->view('admin/prodi/form_prodi');
        $this->load->view('templates_dashboard/footer');
    }
    public function tambah_prodi()
    {
        $data['fakultas'] = $this->db->get('fakultas')->result_array();
        $this->form_validation->set_rules('fakultas', 'Fakultas', 'required', ['required' => 'Fakultas Harus diisi!']);
        $this->form_validation->set_rules('prodi', 'Prodi', 'required', ['required' => 'Prodi Harus diisi!']);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates_dashboard/header', $data);
            $this->load->view('templates_dashboard/sidebar');
            $this->load->view('templates_dashboard/topbar');
            $this->load->view('admin/prodi/form_tambah_prodi');
            $this->load->view('templates_dashboard/footer');
        } else {
            $fakultas = $this->input->post('fakultas');
            $prodi = $this->input->post('prodi');
            $set = ['id_fakultas' => $fakultas, 'nama_prodi' => $prodi];
            $this->db->insert('prodi', $set);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Prodi Berhasil ditambah!
          </div>');

            redirect('admin/prodi');
        }
    }
    public function edit_prodi($id_prodi)
    {
        $data['prodi'] = $this->db->get_where('prodi', ['id_prodi' => $id_prodi])->row_array();
        $data['fakultas'] = $this->db->get('fakultas')->result_array();
        $data['id_prodi'] = $id_prodi;
        $this->form_validation->set_rules('fakultas', 'Fakultas', 'required', ['required' => 'Fakultas Harus diisi!']);
        $this->form_validation->set_rules('prodi', 'Prodi', 'required', ['required' => 'Prodi Harus diisi!']);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates_dashboard/header', $data);
            $this->load->view('templates_dashboard/sidebar');
            $this->load->view('templates_dashboard/topbar');
            $this->load->view('admin/prodi/form_edit_prodi');
            $this->load->view('templates_dashboard/footer');
        } else {
            $fakultas = $this->input->post('fakultas');
            $prodi = $this->input->post('prodi');
            $set = ['id_fakultas' => $fakultas, 'nama_prodi' => $prodi];
            $where = ['id_prodi' => $id_prodi];
            $this->db->update('prodi', $set, $where);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Prodi Berhasil diubah!
          </div>');

            redirect('admin/prodi');
        }
    }
    public function hapus_prodi($id_prodi)
    {
        $this->db->delete('prodi', ['id_prodi' => $id_prodi]);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Prodi Berhasil dihapus!
          </div>');

        redirect('admin/prodi');
    }
}
