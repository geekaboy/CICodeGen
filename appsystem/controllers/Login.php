<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    //========================= PUBLIC=========================================//
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->login_view();
    }

    public function login_view()
    {

        //@Plugin & Appjs
        $data['plugin'] = array();
        $data['appjs'] = array();

        //@VIEW
        $this->load->view('login/login_view');
    }

    public function login_fail_view()
    {
        //@Plugin & Appjs
        $data['plugin'] = array();
        $data['appjs'] = array();

        //@VIEW
        $this->load->view('login/login_fail_view');
    }

    public function check_login()
    {

        $data_post = $this->input->post();
        $this->load->helper('ip_address');

        if (isset($data_post['username']) && isset($data_post['password'])) {

            $user = $this->db->get_where('cse_v2.sys_user', array('username' => $data_post['username']))->row();
            if (count($user) > 0) {
                if ($user->password == md5($data_post['password'])) {

                    $sdata = array(
                        'is_login' => TRUE,
                        'id' => $user->id,
                        'username' => $data_post['username'],
                        'fullname' => $user->fullname,
                        'faculty' => $user->faculty,
                        'user_type' => $user->user_type,
                        'login_time' => date('Y-m-d H:i:s'),
                    );
                    $this->session->set_userdata($sdata);


                    redirect('home');
                } else {
                    redirect('login/login_fail_view');
                }
            } else {
                redirect('login/login_fail_view');
            }
        } else {
            // echo "asdasd";
            // exit();
            redirect('login/login_fail_view');
        }
    }

    public function logout()
    {

        $this->session->sess_destroy();
        redirect('login');
    }


    //========================= PRIVATE=======================================//



}//End class
