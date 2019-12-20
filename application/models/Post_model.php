<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Post_model extends CI_Model
{

  public function getAllPost($limit, $offset, $keyword)
  {
    $this->db->select('*, blog.slug as b_slug');
    $this->db->from('blog');
    $this->db->join('category', 'category.category_id = blog.category_id');

    if ($keyword) {
      $this->db->like('blog_id', $keyword);
      $this->db->or_like('title', $keyword);
      $this->db->or_like('active', $keyword);
      $this->db->or_like('name', $keyword); // category
    }

    $this->db->order_by('created_at', 'DESC');

    $this->db->limit($limit, $offset);

    $query = $this->db->get();
    return $query->result_array();
  }

  public function getPost()
  {
    $this->db->order_by('title', 'ASC');
    $query = $this->db->get('blog');
    return $query->result_array();
  }

  public function insert($data)
  {
    $this->db->insert('blog', $data);
  }

  public function getPostById($id)
  {
    return $this->db->get_where('blog', ['blog_id' => $id])->row_array();
  }

  public function update($id, $data)
  {
    $this->db->where('blog_id', $id);
    $this->db->update('blog', $data);
  }

  public function delete($id)
  {
    $this->db->where('blog_id', $id);
    $this->db->delete('blog');
  }
}
  
  /* End of file Post_model.php */
