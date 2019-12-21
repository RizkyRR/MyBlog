<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Message_model extends CI_Model
{

  public function getAllMessage($limit, $offset, $keyword)
  {
    if ($keyword) {
      $this->db->like('id', $keyword);
      $this->db->or_like('name', $keyword);
      $this->db->or_like('email', $keyword);
      $this->db->or_like('phone', $keyword);
    }

    $this->db->order_by('created_at', 'ASC');

    $this->db->where('is_reply', 0);
    $query = $this->db->get('message', $limit, $offset);
    return $query->result_array();
  }

  public function getMessage()
  {
    $this->db->order_by('created_at', 'ASC');
    $query = $this->db->get('message');
    return $query->result_array();
  }

  public function insert($data)
  {
    $this->db->insert('message', $data);
  }

  public function getMessageById($id)
  {
    return $this->db->get_where('message', ['id' => $id])->row_array();
  }

  public function update($id, $data)
  {
    $this->db->where('id', $id);
    $this->db->update('message', $data);
  }

  public function delete($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('message');
  }
}
  
  /* End of file Message_model.php */
