<?php

/**
 * Created by PhpStorm.
 * User: Vivian
 * Date: 4/17/17
 * Time: 2:54 PM
 */
class Individual_listing extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
    }

    public function index()
    {

        //loads seach_view.php
        $title = array(
            'title' => 'Item');
        $this->load->view('header', $title);
        $this->load->view('listingPage_view');
        $this->load->view('footer');
    }
}