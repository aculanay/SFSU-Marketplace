<?php

/**
 * Created by PhpStorm.
 * User: aculanay
 * Date: 4/9/17
 * Time: 1:15 PM
 */
class Login extends CI_Controller{

    public function __construct()
    {
        parent::__construct();

        /** loads 'search_model' so we can call get_items()
         *  and form helper
         *  Url helper is needed for bootstrap. */
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('login_model');
        
        // These constants are used to pass what action was taken to login_view
        define('SUCCESS', '1');
        define('FAILURE', '-1');
        define('LOGOUT', '2');
    }

    public function index(){

        //loads login_view.php
        $this->load->view('header');
        $this->load->view('login/login_view');
        $this->load->view('footer');
    }
    
    // This function logs the user out. It should only be called by the header's
    // logout button.
    public function logout() {
        unset($this->session->username);
        $this->session->login = false;
        $data['login'] = LOGOUT;
        
        $this->load->view('header');
        $this->load->view('login/login_view', $data);
        $this->load->view('footer');
        
    }
    
    // This function takes the data from the login form and attempts to log the
    // user in. Incorrect data will display an error message in the login_view.
    public function submit() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        if($this->login_model->verify($username, $password)) {
            $this->session->username = $username;
            $this->session->login = true;
            $data['login'] = SUCCESS;
            $this->load->view('header');
            $this->load->view('login/login_view', $data);
        } else {
            $data['login'] = FAILURE;
            $this->load->view('header');
            $this->load->view('login/login_view', $data);
        }
        
        $this->load->view('footer');
    }
    
    public function forgot($choice  = null) {
        $this->load->view('header');
        if(isset($choice)) {
            $data['choice'] = $choice;
            $this->load->view('login/forgot', $data);
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $username = $this->login_model->userdata($email);
            if(isset($username)) {
                if(isset($password) && strlen($password) > 1) {
                    $this->login_model->updatepass($username, $password);
                    $data['choice'] = 4;
                    $this->load->view('login/forgot', $data);
                } else {
                    $data['username'] = $username;
                    $this->load->view('login/forgot', $data);
                }
            } else {
                $data['choice'] = 3;
                $this->load->view('login/forgot', $data);
            }
        }
        $this->load->view('footer');
    }
}