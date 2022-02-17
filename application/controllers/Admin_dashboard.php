<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'desc' => 'Melihat data Dashboard'
        ];
        $page = 'dashboard/index';
        template($page, $data);
    }
}
