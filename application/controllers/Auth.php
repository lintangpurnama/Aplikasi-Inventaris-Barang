<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model', 'Auth');
    }

    public function index()
    {
        $data = [
            'title' => 'Login'
        ];
        $page = 'index';
        $this->_template($page, $data);
    }

    public function forget()
    {
        $this->_validation('forget');

        if ($this->form_validation->run() == false) {
            $data = [
                'title' => 'Forget Password'
            ];
            $page = 'forget';
            $this->_template($page, $data);
        } else {
            $this->_sendEmailForgotPassword();
        }
    }

    public function forgotpassword($email, $token)
    {
        $cek = $this->Auth->getDataTokenBy(['email' => $email, 'token' => $token]);
        if ($cek->num_rows() > 0) {
            $this->_validation('form-reset');
            if ($this->form_validation->run() ==  FALSE) {
                $data = [
                    'title' => 'Reset Password'
                ];
                $page = 'formnewpassword';
                $this->_template($page, $data);
            } else {
                # update password
                $dataupdate = [
                    'password' => password_hash($this->input->post('newpassword'), PASSWORD_DEFAULT),
                    'updated_at' => date('Y-m-d H:i:s')
                ];
                $where = [
                    'email' => $email
                ];

                $update = $this->Auth->update($dataupdate, $where);
                if ($update > 0) {
                    $deleteToken = $this->Auth->deleteToken(['email' => $email]);
                    if ($deleteToken > 0) {
                        $this->session->set_flashdata('success', 'Password berhasil diperbaharui, silahkan login');
                        redirect('auth');
                    } else {
                        $this->session->set_flashdata('error', 'Server Sedang Sibuk Silahkan coba lagi nanti');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Server Sedang Sibuk Silahkan coba lagi nanti');
                }
            }
        } else {
            $this->session->set_flashdata('error', 'Data tidak di temukan di sistem kami');
            redirect('auth');
        }
    }

    private function _sendEmailForgotPassword()
    {
        $email   = $this->input->post('email');
        $token   = random_string('alnum', 100); //gendret token
        $cek     = $this->Auth->getDataBy(['a.is_active' => '1', 'email' => $email]);
        if ($cek->num_rows() > 0) {
            $data = [
                'email' => $email,
                'token' => $token
            ];
            $insertToken = $this->Auth->insertToken($data);
            if ($insertToken > 0) {
                $config = configemail();
                $this->email->initialize($config);
                $this->email->from('support@it.com', 'tim suport inventory');
                $this->email->to($email);
                $this->email->subject('lupa password');
                $body = $this->load->view('auth/email', $data, true);

                $this->email->message($body);
                if ($this->email->send()) {
                    $this->session->set_flashdata('success', 'Silahkan cek email kamu untuk merubah password');
                    redirect('auth');
                } else {



                    echo $this->email->print_debugger();
                }
            } else {
                $this->session->set_flashdata('error', 'Server sedang sibuk mohon coba lagi nanti');
                redirect('forget');
            }
        } else {
            $this->session->set_flashdata('error', 'Email Tidak Terdaftar');
            redirect('forget');
        }
    }


    public function _template($page = null, $data = null)
    {
        $this->load->view('auth/template/header', $data);
        $this->load->view('auth/' . $page, $data);
        $this->load->view('auth/template/footer', $data);
    }

    private function _validation($type)
    {
        if ($type == 'form-reset') {
            $this->form_validation->set_rules(
                'newpassword',
                'Password Baru',
                'trim|required|min_length[8]',
                [
                    'required' => '%s wajib di isi',
                    'min_length' => '%s wajib 8 karakter'
                ]
            );
            $this->form_validation->set_rules(
                'confirmpassword',
                'Konfirmasi Password Baru',
                'trim|required|min_length[8]|matches[newpassword]',
                [
                    'required' => '%s wajib di isi',
                    'matches' => '%s tidak cocok'
                ]
            );
        }
        if ($type == 'forget') {
            $this->form_validation->set_rules(
                'email',
                'email',
                'trim|required|valid_email',
                [
                    'required' => '%s wajib di isi',
                    'valid_email' => '%s wajib berisi email valid'
                ]
            );
        }
    }
}
