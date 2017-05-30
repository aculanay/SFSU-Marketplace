<?php

class Listings_Model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    // Sends back an array containing six most recent listings to be displayed
    // on the Home Page

    public function getMyListings($username) {
        $query = $this->db->query("SELECT * FROM Items WHERE username = '$username';");
        return $query->result_array();
    }

    public function remove_listing($id) {
        $this->db->query("DELETE FROM Items WHERE itemid = '$id';");
    }

}