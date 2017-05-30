<?php

/**
 * Created by PhpStorm.
 * User: Vivian
 * Date: 4/10/17
 * Time: 7:07 PM
 */
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('Home_model');
    }

    public function index()
    {
        $this->load->view('header');
        $data['recent_listings'] = $this->Home_model->getRecentListings();
        $this->load->view('home_view', $data);
        $this->load->view('footer');
    }
}