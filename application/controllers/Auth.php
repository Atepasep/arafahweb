<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        // $this->load->library('session');
        $this->load->model('user_model','userappsmodel');
    }

    public function index()
    {
        $data['title'] = 'Login Pengguna Aplikasi';
        $this->load->view('layouts/login-header', $data);
        $this->load->view('auth/login');
        $this->load->view('layouts/login-footer');
    }

    public function cekAuth()
    {
        $this->_login();
    }

    private function _login()
    {
        $htmlsalahpassword = '<div class="alert alert-important alert-danger alert-dismissible font-kecil" role="alert">
                                        <div class="d-flex">
                                        <div>
                                            <svg class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" /><path d="M12 8v4" /><path d="M12 16h.01" /></svg>
                                        </div>
                                        <div>
                                            Periksa Username, Password atau User tidak aktif !
                                        </div>
                                        </div>
                                        <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                                    </div>';
        $htmltidakditemukan = '<div class="alert alert-important alert-danger alert-dismissible font-kecil" role="alert">
                                    <div class="d-flex">
                                    <div>
                                        <svg class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" /><path d="M12 8v4" /><path d="M12 16h.01" /></svg>
                                    </div>
                                    <div>
                                        Pengguna tidak ditemukan, Sign Up terlebih  dahulu !
                                    </div>
                                    </div>
                                    <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                                </div>';
        $htmlbelumsetcabang = '<div class="alert alert-important alert-info alert-dismissible font-kecil" role="alert">
                                    <div class="d-flex">
                                    <div>
                                        <svg class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" /><path d="M12 8v4" /><path d="M12 16h.01" /></svg>
                                    </div>
                                    <div>
                                        Cabang belum diset, Hubungi administrator Data !
                                    </div>
                                    </div>
                                    <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                                </div>';
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        // $user = $this->db->get_where('user', ['username' => $username])->row_array();
        $user = $this->userappsmodel->getdatabyuser($username)->row_array();
        if(isset($username) && isset($password)){
            if ($user) {
                if ($password == $user['password'] && $user['aktif'] == 1) {
                    if(strlen($user['cabang'])==0){
                        $this->session->set_flashdata('message', $htmlbelumsetcabang);
                        $url = base_url('Auth');
                        redirect($url);
                    } else {
                        if(strlen($user['cabang'])==3){
                            $this->session->set_userdata('cabangaktif',$user['cabang']);
                        }
                        $user_data = [
                            'getinarafah' => true,
                            'userid' => $user['id'],
                        ];
                        $this->session->set_userdata($user_data);
                        

                        $this->session->set_userdata('bl',date('m'));
                        $this->session->set_userdata('th',date('Y'));

                        $url = base_url('Main');
                        redirect($url);
                    }
                } else {
                    $this->session->set_flashdata('message', $htmlsalahpassword);
                    $url = base_url('Auth');
                    redirect($url);
                }
            } else {
                $this->session->set_flashdata('message', $htmltidakditemukan);
                $url = base_url('Auth');
                redirect($url);
            }
        }else{
            $url = base_url('Auth');
            redirect($url);
        }
    }

    public function setcabangaktif(){
        $cabang = $_POST['plh'];
        $this->session->set_userdata('cabangaktif',$cabang);
        $url = base_url('');
        redirect($url);
    }

    public function logout()
    {
        // $this->loginmodel->islogout($this->session->userdata('idprofil'));
        $this->session->sess_destroy();
        $url = base_url('Auth');
        redirect($url);
    }
}
