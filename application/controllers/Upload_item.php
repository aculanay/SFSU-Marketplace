<?php

class Upload_item extends CI_Controller{

    public function __construct()
    {
        parent::__construct();

        /** loads 'search_model' so we can call get_items()
         *  and form helper
         *  Url helper is needed for bootstrap. */
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('Upload_model');
        $this->load->model('Search_model');
    }

    public function index(){

        //loads upload_view.php
        $this->load->view('header');

        if (isset($this->session->login) && $this->session->login && isset($this->session->username)) {
            //$username = $this->session->username;
            $this->load->view('upload_view', array('error' => ' ' ));

        } else {
            $this->load->view('login/login_view');
        }
        $this->load->view('footer');
    }

    public function upload(){

        $this->input->post('upload-item');

        $this->form_validation->set_rules('item-name', 'Item name', 'trim|required|alpha_numeric_spaces|alpha_dash|max_length[20]');
        $this->form_validation->set_rules('category-select','Category', 'required');
        $this->form_validation->set_rules('item-condition', 'Item Condition', 'required');
        $this->form_validation->set_rules('description','Description', 'required');
        $this->form_validation->set_rules('price', 'Price', 'trim|required|numeric');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('header');
            $this->load->view('upload_view');
            $this->load->view('footer');

        }
        else
        {
            $data = array(
                'username' => $this->session->username,
                'name' => $this->input->post('item-name'),
                'category' => $this->input->post('category-select'),
                'condition' => $this->input->post('item-condition'),
                'description' => $this->input->post('description'),
                'price' => $this->input->post('price'),
                'duration' => $this->input->post('listing-duration'),
                'image' => $this->input->post('image_name'),
                'date' =>  date("Y-m-d")
            );

            $itemid = $this->Upload_model->insert_item($data);

            //redirects to the details page of the uploaded item
            redirect(base_url() . "index.php/search/load_details/{$itemid}");
        }
    }

    // Codeigniter's documentation on file uploading:
    // https://www.codeigniter.com/userguide3/libraries/file_uploading.html
    public function do_upload(){
        $this->input->post('upload-item');

        // preferences for image upload
        $config['upload_path']          = './images/item_images/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2048;
        $config['max_width']            = 1500;
        $config['max_height']           = 1500;
        $config['file_name']            = $this->input->post('image-name');

        $this->load->library('upload', $config);

        // form validation
        $this->form_validation->set_rules('item-name', 'Item name', 'trim|required|max_length[20]');
        $this->form_validation->set_rules('category-select','Category', 'required');
        $this->form_validation->set_rules('item-condition', 'Item Condition', 'required');
        $this->form_validation->set_rules('description','Description', 'required');
        $this->form_validation->set_rules('price', 'Price', 'trim|required|numeric');

        $this->upload->do_upload('userfile');
        $error = array('error' => $this->upload->display_errors());

        if (empty($_FILES['userfile']['name']))
        {
            $this->form_validation->set_rules('userfile', 'Image', 'required',
                array('required' => $error['error']));
        }


        if ($this->form_validation->run() == FALSE )
        {
            $this->load->view('header');

            $this->load->view('upload_view');

            $this->load->view('footer');

        }
        else
        {
            // gets the name of the file uploaded by user
            $uploaded_file = $this->upload->data();
            $tempfile = $uploaded_file['file_name'];

            // random string to be used for file name
            $fileid = $this->input->post('image-name');

            // extracts extension from the file name from user
            $extension = pathinfo($tempfile, PATHINFO_EXTENSION);

            // concatenates unique file id with extension
            $filename = $fileid . '.' . $extension;

            $data = array(
                'username' => $this->session->username,
                'name' => $this->input->post('item-name'),
                'category' => $this->input->post('category-select'),
                'condition' => $this->input->post('item-condition'),
                'description' => $this->input->post('description'),
                'price' => $this->input->post('price'),
                'duration' => $this->input->post('listing-duration'),
                'image' => $filename,
                'date' =>  date("Y-m-d")
            );

            $this->create_thumbnail($filename);

            $itemid = $this->Upload_model->insert_item($data);

            //redirects to the details page of the uploaded item
            redirect(base_url() . "index.php/search/load_details/{$itemid}");
        }

    }

    public function create_thumbnail($filename){

        // preferences for image resizing.
        $config['image_library']    = 'gd2';
        $config['source_image']     = './images/item_images/' . $filename;
        $config['new_image']        = './images/item_images/thumbnail_' . $filename;
        $config['maintain_ratio']   = TRUE;
        $config['width']            = 200;
        $config['height']           = 200;

        $this->load->library('image_lib', $config);

        $this->image_lib->resize();
    }

}