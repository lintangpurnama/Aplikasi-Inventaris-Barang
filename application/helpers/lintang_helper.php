<?php

function configemail()
{
    $config = [
        'protocol' => 'smtp',
        'smtp_host' => 'ssl://smtp.gmail.com',
        'smtp_user' => 'lindev101@gmail.com',
        'smtp_pass' => 'Ganteng123',
        'smtp_port' => '465',
        'wordwrap' => 'TRUE',
        'mailtype' => 'html',
        'charset' => 'UTF-8',
        'newline' => "\r\n",
    ];
    return $config;
}

function template($page = null, $data = null)
{
    $ci = get_instance();
    $ci->load->view('admin/template/header', $data);
    $ci->load->view('admin/template/topbar', $data);
    $ci->load->view('admin/template/sidebar', $data);
    $ci->load->view('admin/' . $page, $data);
    $ci->load->view('admin/template/footer', $data);
}
