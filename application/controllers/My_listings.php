<?php

/**
 * Created by PhpStorm.
 * User: Vivian
 * Date: 5/20/17
 * Time: 3:09 PM
 */
class My_listings extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Listings_model');
    }

    public function index() {
        $this->load->view('header');
        if (isset($this->session->login) && $this->session->login && isset($this->session->username)) {
            $username = $this->session->username;
            $data['myListings'] = $this->Listings_model->getMyListings($username);
            $this->load->view('myListings_view', $data);
        } else {
            $this->load->view('login/login_view');
        }
        $this->load->view('footer');
    }

    public function delete_listing() {
        $this->load->view('header');
        if (isset($this->session->login) && $this->session->login && isset($this->session->username)) {
            $id = $this->uri->segment(3);
            $username = $this->session->username;
            $this->Listings_model->remove_listing($id);
            $data['myListings'] = $this->Listings_model->getMyListings($username);
            $this->load->view('myListings_view', $data);
        } else {
            $this->load->view('login/login_view');
        }
        $this->load->view('footer');
    }
}