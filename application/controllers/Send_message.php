<?php

/**
 * Created by PhpStorm.
 * User: aculanay
 * Date: 4/25/17
 * Time: 6:46 AM
 */

class Send_message extends CI_Controller{

    public function __construct()
    {
        parent::__construct();

        /** loads 'search_model' so we can call get_items()
         *  and form helper
         *  Url helper is needed for bootstrap. */
        $this->load->helper('form');
        $this->load->helper('url');
    }

    public function index(){

        //loads upload_view.php
        $title = array(
            'title' => 'Send a message');
        $this->load->view('header', $title);
        $this->load->view('/messaging/sendMessage_view');
        $this->load->view('footer');

    }

}