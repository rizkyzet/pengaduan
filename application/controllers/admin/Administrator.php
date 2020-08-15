<?php

class Administrator extends CI_Controller
{
    public function index()
    {
        $data['admin'] = $this->db->get_where('user', ['role_id' => 2])->result_array();
        $this->load->view('templates_dashboard/header', $data);
        $this->load->view('templates_dashboard/sidebar');
        $this->load->view('templates_dashboard/topbar');
        $this->load->view('admin/administrator/form_data_admin');
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
            $this->load->view('admin/administrator/form_tambah_admin');
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

            redirect('admin/administrator');
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
            $this->load->view('admin/administrator/form_edit_admin');
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

            redirect('admin/administrator');
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

        redirect('admin/administrator');
    }
}
