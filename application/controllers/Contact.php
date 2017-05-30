<?php

/**
 * Created by PhpStorm.
 * User: Nick_2
 * Date: 4/17/2017
 * Time: 8:48 PM
 */
class Contact extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        /**
         * and form helper
         * Url helper is needed for bootstrap.
         */
        $this->load->helper('form');
        $this->load->helper('url');
    }

    public function index()
    {
        //loads contact_view.php
        $title = array(
            'title' => 'Contact Us!');
        $this->load->view('header', $title);
        $this->load->view('contact_view');
        $this->load->view('footer');
    }


}