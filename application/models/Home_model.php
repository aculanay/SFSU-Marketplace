<?php

class Home_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    // Sends back an array containing six most recent listings to be displayed
    // on the Home Page.
    public function getRecentListings() {
        $query = $this->db->query("SELECT * FROM Items ORDER BY itemid DESC LIMIT 6");
        return $query->result_array();
    }

}
