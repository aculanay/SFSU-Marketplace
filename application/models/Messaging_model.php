<?php

class Messaging_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getMessages($username) {
        $query = $this->db->query("SELECT * FROM Messages WHERE sender = '$username' OR recipient = '$username' ORDER BY timestamp DESC");
        return $query->result_array();
    }

    public function openMessage($messageid, $username) {
        $query = $this->db->query("SELECT * FROM Messages WHERE messageid = '$messageid' AND (sender = '$username' OR recipient = '$username')");
        return $query->result_array();
    }

    public function sendMessage($sender, $recipient, $subject, $contents) {
        try {
            $usercheck = $this->db->query("SELECT COUNT(*) AS count FROM Users WHERE username = " . $this->db->escape($recipient));
            $usercheck = $usercheck->result_array();
            if ($usercheck[0]['count'] > 0) {
                $timestamp = time();
                $query = "INSERT INTO Messages (sender, recipient, subject, contents, timestamp) VALUES (" . $this->db->escape($sender) . ", "
                        . $this->db->escape($recipient) . ", " . $this->db->escape($subject) . ", " . $this->db->escape($contents) . ", " . $this->db->escape($timestamp) . ")";
                $this->db->query($query);
                return 1;
            } else {
                return -1;
            }
        } catch (Exception $e) {
            return 0;
        }
    }
}
