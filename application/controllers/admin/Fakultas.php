<?php

class Fakultas extends CI_Controller
{
    public function index()
    {
        $data['fakultas'] = $this->db->get('fakultas')->result_array();
        $this->load->view('templates_dashboard/header', $data);
        $this->load->view('templates_dashboard/sidebar');
        $this->load->view('templates_dashboard/topbar');
        $this->load->view('admin/fakultas/form_fakultas');
        $this->load->view('templates_dashboard/footer');
    }
    public function tambah_fakultas()
    {
        $this->form_validation->set_rules('nama_fakultas', 'Nama Fakultas', 'required', ['required' => 'Nama Fakultas Harus diisi!']);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates_dashboard/header');
            $this->load->view('templates_dashboard/sidebar');
            $this->load->view('templates_dashboard/topbar');
            $this->load->view('admin/fakultas/form_tambah_fakultas');
            $this->load->view('templates_dashboard/footer');
        } else {
            $nama_fakultas = $this->input->post('nama_fakultas');
            $data = ['nama_fakultas' => $nama_fakultas];
            $this->db->insert('fakultas', $data);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Fakultas Berhasil ditambahkan!
          </div>');

            redirect('admin/fakultas');
        }
    }
    public function edit_fakultas($id)
    {
        $data['id'] = $id;
        $data['fakultas'] = $this->db->get_where('fakultas', ['id_fakultas' => $id])->row_array();
        $this->form_validation->set_rules('nama_fakultas', 'Nama Fakultas', 'required', ['required' => 'Nama Fakultas Harus diisi!']);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates_dashboard/header', $data);
            $this->load->view('templates_dashboard/sidebar');
            $this->load->view('templates_dashboard/topbar');
            $this->load->view('admin/fakultas/form_edit_fakultas');
            $this->load->view('templates_dashboard/footer');
        } else {
            $nama_fakultas = $this->input->post('nama_fakultas');
            $set = ['nama_fakultas' => $nama_fakultas];
            $where = ['id_fakultas' => $id];
            $this->db->update('fakultas', $set, $where);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Fakultas Brhasil diubah!!
          </div>');

            redirect('admin/fakultas');
        }
    }
    public function hapus_fakultas($id)
    {
        $where = ['id_fakultas' => $id];
        $this->db->delete('fakultas', $where);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Fakultas Berhasil dihapus!!
      </div>');

        redirect('admin/fakultas');
    }
}
