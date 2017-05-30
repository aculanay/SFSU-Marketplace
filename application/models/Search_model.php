<?php
class Search_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }


    public function get_items($search, $category, $condition, $sort){
        $search = trim($search);

        // SELECT * FROM Items

        $this->db->select('*');
        $this->db->from('Items');

        if($category === "All" && $condition === "Any"){
            // WHERE name LIKE $search

            $this->db->like('name', $search);
        }else if($category !== "All" && $condition === "Any"){

            // WHERE category = $category AND WHERE name LIKE $search
            $this->db->where('category', $category);
        }else if($condition !== "Any" && $category === "All"){
            // WHERE condition = $condition AND WHERE name LIKE $search
            $this->db->where('condition', $condition);
        }else{
            // WHERE category = $category AND WHERE condition = $condition AND WHERE 'name' LIKE $search
            $this->db->where('category', $category);
            $this->db->where('condition', $condition);
        }

        if($search !== ""){
            $this->db->like('name', $search);
        }

        if( isset($sort) && strcmp($sort, "ASC") == 0){
            $this->db->order_by('price', 'ASC');
        }else if ( isset($sort) && strcmp($sort, "DESC") == 0 ){
            $this->db->order_by('price', 'DESC');
        }

        $query = $this->db->get();

        return $query->result_array();

    }

    /* Queries database, looking for the item with the
     * unique itemid number it is given, returns result
     * to the search model's load_details function*/
    public function get_details($id){
        $this->db->select('*');

        $this->db->from('Items');
        $this->db->where('itemid', $id);

        $query = $this->db->get();

        return $query->result_array();
    }


}