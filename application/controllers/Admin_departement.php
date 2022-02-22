<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_departement extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_departement_model', 'departement');
    }
    public function index()
    {
        $departementData = $this->departement->getAllData();
        $data = [
            'title' => 'Data Departement',
            'desc' => 'Melihat data Data Departement',
            'departementData' => $departementData->result()
        ];
        $page = 'departement/index';
        template($page, $data);
    }
    public function create()
    {
        $this->_validation();
        if ($this->form_validation->run() ==  FALSE) {
            $data = [
                'title' => 'Tambah Data Departement',
                'desc' => 'Tambah Data Departement',
            ];
            $page = 'departement/create';
            template($page, $data);
        } else {
            $this->db->set('id', 'UUID()', FALSE);
            $datainsert = [
                'departement_name' => $this->input->post('name')
            ];
            $insert = $this->departement->insert($datainsert);
            if ($insert > 0) {
                $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
            } else {
                $this->session->set_flashdata('error', 'server sedang sibuk');
            }
            redirect('departement');
        }
    }

    public function delete($id)
    {
        $cek = $this->departement->getDataBy(['id' => $id]);
        if ($cek->num_rows() > 0) {
            $delete = $this->departement->delete(['id' => $id]);
            if ($delete > 0) {
                $this->session->set_flashdata('success', 'Data Berhasil dihapus');
            }else{
                $this->session->set_flashdata('error', 'Server Sedang Sibuk');
            }
        } else {
            $this->session->set_flashdata('error', 'data tidak ada');
        }
        redirect('departement');
    }

    private function _validation($name = null)
    {
        $postname = $this->input->post('name');
        if ($postname = !$name) {
            $is_unique = '|is_unique[m_departement.departement_name]';
        } else {
            $is_unique = '';
        }
        $this->form_validation->set_rules(
            'name',
            'Nama Department',
            'trim|required' . $is_unique,
            [
                'required' => '%s Wajib Diisi',
                'is_unique' => '%s Sudah Ada'
            ]
        );
    }
}
