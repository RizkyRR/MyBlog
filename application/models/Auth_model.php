<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  public function getUser()
  {
    $this->db->order_by('name', 'ASC');
    $query = $this->db->get('user');
    return $query->result_array();
  }

  public function checkUser($data)
  {
    return $this->db->get_where('user', ['email' => $data])->row_array();
  }

  public function getUserSession()
  {
    return $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
  }

  public function insertToken($data)
  {
    $this->db->insert('user_token', $data);
  }

  public function deleteUserToken($data)
  {
    $this->db->where('email', $data);
    $this->db->delete('user_token');
  }

  public function deleteUser($data)
  {
    $this->db->where('email', $data);
    $this->db->delete('user');
  }

  public function updateUser($data)
  {
    $this->db->set('is_active', 1);
    $this->db->where('email', $data);
    $this->db->update('user');
  }

  public function userLogin($data)
  {
    return $this->db->get_where('user', ['email' => $data])->row_array();
  }

  public function checkUserEmail($data)
  {
    return $this->db->get_where('user', $data)->row_array();
  }

  public function insertChangePass($data)
  {
    $this->db->insert('user_token', $data);
  }

  public function updateUserPass($data, $value)
  {
    $this->db->set('password', $data);
    $this->db->where('email', $value);
    $this->db->update('user');
  }

  public function updateUserOnline($data)
  {
    $this->db->set('online', 1);
    $this->db->where('email', $data);
    $this->db->update('user');
  }

  public function updateUserOffline($data)
  {
    $this->db->set('online', 0);
    $this->db->where('email', $data);
    $this->db->update('user');
  }
}
