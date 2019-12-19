<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Category_model extends CI_Model
{

  public function getAllCategory($limit, $offset, $keyword)
  {
    if ($keyword) {
      $this->db->like('category_id', $keyword);
      $this->db->or_like('name', $keyword);
    }

    $this->db->order_by('name', 'ASC');

    $query = $this->db->get('category', $limit, $offset);
    return $query->result_array();
  }

  public function getCategory()
  {
    $this->db->order_by('name', 'ASC');
    $query = $this->db->get('category');
    return $query->result_array();
  }

  public function insert($data)
  {
    $this->db->insert('category', $data);
  }

  public function getCategoryById($id)
  {
    return $this->db->get_where('category', ['category_id' => $id])->row_array();
  }

  public function update($id, $data)
  {
    $this->db->where('category_id', $id);
    $this->db->update('category', $data);
  }

  public function delete($id)
  {
    $this->db->where('category_id', $id);
    $this->db->delete('category');
  }
}
  
  /* End of file Category_model.php */
