<?php

function akses_admin()
{
    $ci = get_instance();
    if (!$ci->session->userdata('role_id')) {
        $ci->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
        Anda Belum Login!
        </div>');
        redirect('auth');
    } elseif ($ci->session->userdata('role_id') == 1) {
        redirect('mahasiswa');
    } elseif ($ci->session->userdata('role_id') == 3) {
        redirect('kabag');
    };
}

function akses_mahasiswa()
{
    $ci = get_instance();
    if (!$ci->session->userdata('role_id')) {
        $ci->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
        Anda Belum Login!
        </div>');
        redirect('auth');
    } elseif ($ci->session->userdata('role_id') == 2) {
        redirect('admin');
    } elseif ($ci->session->userdata('role_id') == 3) {
        redirect('kabag');
    };
}

function akses_kabag()
{
    $ci = get_instance();
    if (!$ci->session->userdata('role_id')) {
        $ci->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
        Anda Belum Login!
        </div>');
        redirect('auth');
    } elseif ($ci->session->userdata('role_id') == 2) {
        redirect('admin');
    } elseif ($ci->session->userdata('role_id') == 1) {
        redirect('mahasiswa');
    };
}

function get_title()
{
    $ci = get_instance();
    $title1 = ucwords(str_replace("_", " ", $ci->uri->segment(2)));

    $explode_title2 = explode('_', $ci->uri->segment(3));
    if ($explode_title2) {
        $title2 = ucwords(implode(' ', $explode_title2));
    } else {
        $title2 = $ci->uri->segment(3);
    }

    if ($title2) {
        return "$title1 &mdash; $title2";
    } else {
        return $title1;
    }
}

function get_role()
{
    $ci = get_instance();
    $role_id = $ci->session->userdata('role_id');

    $result = $ci->db->get_where('user_role', ['role_id' => $role_id])->row_array();

    return ucwords($result['nama_role']);
}
