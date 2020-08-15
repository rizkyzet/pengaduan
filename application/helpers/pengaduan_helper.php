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
