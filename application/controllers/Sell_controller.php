<?php

//Controller for sell_view and sell_model. If user is logged in, update sell_view to display Sell button on Homepage. 
class Sell_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // sell_model doesn't exist
        // $this->load->model('sell_model');

        //Needed for Bootstrap
        $this->load->helper('form');
        $this->load->helper('url');
    }

    public function index() {
        //loads sell_view.php
        $title = array(
            'title' => 'Post your item');
        $this->load->view('header', $title);
        $this->load->view('sell_view');
        $this->load->view('footer');

    }

}
