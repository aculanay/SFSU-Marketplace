<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Messaging extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('messaging_model');
        $this->load->helper('form');
    }

    public function index() {
        $this->load->view('header');

        if (isset($this->session->login) && $this->session->login && isset($this->session->username)) {
            $username = $this->session->username;
            $data['messages'] = $this->messaging_model->getMessages($username);
            $this->load->view('messaging/messaging_view', $data);
        } else {
            $this->load->view('login/login_view');
        }

        $this->load->view('footer');
    }

    public function open($messageid) {
        $this->load->view('header');

        if (isset($this->session->login) && $this->session->login && isset($this->session->username)) {
            $username = $this->session->username;
            $data['message'] = $this->messaging_model->openMessage($messageid, $username);
            $this->load->view('messaging/reply_view', $data);
        } else {
            $this->load->view('login/login_view');
        }

        $this->load->view('footer');
    }

    public function send($recipient = NULL, $subject = NULL) {
        $this->load->helper('form');
        $this->load->view('header');

        if (isset($this->session->login) && $this->session->login && isset($this->session->username)) {
            $data['sender'] = $this->session->username;
            if (isset($recipient)) {
                $data['recipient'] = urldecode($recipient);
            }
            if (isset($subject)) {
                $sub = "I want to buy your " . urldecode($subject);
                $data['subject'] = $sub;
            }
            $this->load->view('messaging/sendMessage_view', $data);
        } else {
            $this->load->view('login/login_view');
        }
        
        $this->load->view('footer');
    }

    public function send_message() {
        $this->load->view('header');

        if (isset($this->session->login) && $this->session->login && isset($this->session->username)) {
            $username = $this->session->username;
            $recipient = $this->input->post('recipient');
            $subject = $this->input->post('subject');
            $contents = $this->input->post('contents');
            
            $data['sent'] = $this->messaging_model->sendMessage($username, $recipient, $subject, $contents);
            $this->load->view('messaging/sendMessage_view', $data);
        } else {
            $this->load->view('login/login_view');
        }
        
        $this->load->view('footer');
    }

}
