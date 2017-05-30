<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

    /** For all the functions in here, the real page is located in the about/xxxx file. The header and footer are
     *  placed on each side, sandwiching the content in the middle. header.php will load bootstrap, and takes the
     *  title of the page as an argument. footer.php includes the legal stuff at the bottom of the page. */
    public function index()
    {
        $this->load->helper('url');
        $title = array(
            'title' => 'About Group 12');
        $this->load->view('header', $title);
        $this->load->view('pages/about');
        $this->load->view('footer');
    }

    public function members($page) {
        $this->load->helper('url');
        switch($page) {
            case('aculanay'):
                $title = array(
                    'title' => 'About AJ Culanay');
                $this->load->view('header', $title);
                $this->load->view('pages/about_culanay');
                $this->load->view('footer');
                break;
            case('nhoffman'):
                $title = array(
                    'title' => 'About Nicholas Hoffman');
                $this->load->view('header', $title);
                $this->load->view('pages/about_hoffman');
                $this->load->view('footer');
                break;
            case('vlee'):
                $title = array(
                    'title' => 'About Vivian Lee');
                $this->load->view('header', $title);
                $this->load->view('pages/about_lee');
                $this->load->view('footer');
                break;
            case('mserna'):
                $title = array(
                    'title' => 'About Matthew Serna');
                $this->load->view('header', $title);
                $this->load->view('pages/about_mserna');
                $this->load->view('footer');
                break;
            case('ssoult'):
                $title = array(
                    'title' => 'About Steven Soult');
                $this->load->view('header', $title);
                $this->load->view('pages/about_soult');
                $this->load->view('footer');
                break;
            case('jvinter-jensen'):
                $title = array(
                    'title' => 'About Jonas Vinter-Jensen');
                $this->load->view('header', $title);
                $this->load->view('pages/about_vinter-jensen');
                $this->load->view('footer');
                break;
        }
    }
}