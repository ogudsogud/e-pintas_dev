<?php

function cek_login() {
    $log = get_instance();
    $user_session = $log->session->userdata('id_user');
    $user_session = $log->session->userdata('username');
    $user_session = $log->session->userdata('password');
    $user_session = $log->session->userdata('role');
    $user_session = $log->session->userdata('level');
    if($user_session) {
        redirect('dashboard');
    }
}

function cek_notlogin() {
        $log = get_instance();
        $user_session = $log->session->userdata('id_user');
        $user_session = $log->session->userdata('username');
        $user_session = $log->session->userdata('password');
        $user_session = $log->session->userdata('role');
        $user_session = $log->session->userdata('level');
        if(!$user_session) {
            redirect('auth/login');
        }
    }
