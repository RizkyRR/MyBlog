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

    // $this->db->where('is_reply', 0);
    $query = $this->db->get('message', $limit, $offset);
    return $query->result_array();
  }

  public function getAllMessageSent($limit, $offset, $keyword)
  {
    $this->db->select('*');
    $this->db->from('message');
    $this->db->join('message_sent', 'message_sent.message_id = message.id');

    if ($keyword) {
      $this->db->or_like('email', $keyword);
    }

    $this->db->order_by('reply_at', 'DESC');

    $this->db->limit($limit, $offset);

    $query = $this->db->get();
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

  public function send($data)
  {
    $this->db->insert('message_sent', $data);
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

  public function delete_sent($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('message_sent');
  }
}
  
  /* End of file Message_model.php */
