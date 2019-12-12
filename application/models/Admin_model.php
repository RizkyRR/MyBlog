<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  public function getUserCount()
  {
    $this->db->select('COUNT(*)');
    $this->db->from('user');
    return $this->db->count_all_results();
  }

  public function getUserOnline()
  {
    $this->db->select("SUM(online) AS isonline");
    $query = $this->db->get_where('user', 'online = 1');
    return $query->row_array();
  }

  public function getuseression()
  {
    return $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
  }

  public function getAllMenu()
  {
    $this->db->where('id !=', 1);
    $query = $this->db->get('user_menu');
    return $query->result_array();
  }
}
