<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    /** For the function below, the real page is located in the welcome_message file. The header and footer are
     *  placed on each side, sandwiching the content in the middle. header.php will load bootstrap, and takes the
     *  title of the page as an argument. footer.php includes the legal stuff at the bottom of the page. */

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('Home_model');
    }

    public function index()
    {
        $this->load->helper('url');
        $this->load->view('header');
        $data['recent_listings'] = $this->Home_model->getRecentListings();
        $this->load->view('home_view', $data);
        $this->load->view('footer');
    }
}
