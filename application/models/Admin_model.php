<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  public function getPostCount()
  {
    $this->db->select('COUNT(*)');
    $this->db->from('blog');
    return $this->db->count_all_results();
  }

  public function getMessageCount()
  {
    $this->db->select('COUNT(*)');
    $this->db->from('message');
    return $this->db->count_all_results();
  }

  public function getCommentCount()
  {
    $this->db->select('COUNT(*)');
    $this->db->from('comment');
    return $this->db->count_all_results();
  }

  public function geVisitorCount()
  {
    $this->db->select("SUM(blog_views) AS count_views");
    $query = $this->db->get_where('blog', 'active = "Active"');
    return $query->row_array();
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
