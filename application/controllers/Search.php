<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller{

    public function __construct()
    {
        parent::__construct();

        /** loads 'search_model' so we can call get_items()
         *  and form helper
         *  Url helper is needed for bootstrap. */
        $this->load->model('search_model');
        $this->load->helper('form');
        $this->load->helper('url');
    }

    /** For the functions below, the real page is located in the search_view file. The header and footer are
     *  placed on each side, sandwiching the content in the middle. header.php will load bootstrap, and takes the
     *  title of the page as an argument. footer.php includes the legal stuff at the bottom of the page. */

    public function index(){

        //loads seach_view.php
        $title = array(
            'title' => 'Vertical Prototype');
        $this->load->view('header', $title);
        $this->load->view('search_view');
        $this->load->view('footer');
    }

    public function execute_search()
    {
        // receives the input from the form
        $keyword = $_GET['searchquery'];//$this->input->post('searchquery');
        $category = $_GET['Category']; //$this->input->post('Category');
        $condition = $_GET['Condition']; //$this->input->post('Condition');
        if( isset( $_GET['sort-select'])){
            $sort = $_GET['sort-select'];
        }else{
            $sort = null;
        }

        /* passes the search keyword to get_items()
        and stores the data in an array named 'results' */
        $res['results'] = $this->search_model->get_items($keyword, $category, $condition, $sort);

        $query = array(
            'searchquery' => $keyword,
            'category'    => $category,
            'condition'   => $condition
        );

        $data = $res + $query;
        // loads the search_view page, passing it data from get_items()
        $title = array(
            'title' => 'Vertical Prototype');
        $this->load->view('header', $title);
        $this->load->view('listing_view', $data);
        $this->load->view('footer');
    }

    /* Gets itemid from listing_view.php, and calls get_details function
     * in the Search model. Takes data that returns from get_details
     * function, and passes it to listingPage_view.php */
    public function load_details(){

        $id = $this->uri->segment(3);
        $data['results']= $this->search_model->get_details($id);
        $this->load->view('header');
        $this->load->view('listingPage_view', $data);
        $this->load->view('footer');

    }
    
    public function load_description(){
        //loads the view for the item description
        $title = array(
            'title' => 'Description');
        $this->load->view('header', $title);
        $this->load->view('listingPage_view');
        $this->load->view('footer');
    }

    public function category_books() {

        $data['results'] = $this->search_model->get_items('', 'books', 'Any', null);

        $this->load->view('header');
        $this->load->view('listing_view', $data);
        $this->load->view('footer');
    }

    public function category_furniture() {

        $data['results'] = $this->search_model->get_items('', 'furniture', 'Any', null);

        $this->load->view('header');
        $this->load->view('listing_view', $data);
        $this->load->view('footer');
    }

    public function category_electronics() {

        $data['results'] = $this->search_model->get_items('', 'electronics', 'Any', null);

        $this->load->view('header');
        $this->load->view('listing_view', $data);
        $this->load->view('footer');
    }

}