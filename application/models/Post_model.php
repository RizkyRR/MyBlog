<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Post_model extends CI_Model
{

  public function getPostCountPage()
  {
    $this->db->select('*');
    $this->db->from('blog');
    $this->db->join('category', 'category.category_id = blog.category_id', 'inner');

    $query = $this->db->get();
    return $query->num_rows();
  }

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

  public function getShowAllPost($limit, $offset)
  {
    $this->db->select('*, blog.slug as b_slug, category.slug as c_slug');
    $this->db->from('blog');
    $this->db->join('category', 'category.category_id = blog.category_id');
    $this->db->where('active', "Active");

    $this->db->order_by('created_at', 'desc');

    $this->db->limit($limit, $offset);

    $query = $this->db->get();
    return $query->result_array();
  }

  public function getReadPost($c_slug, $b_slug)
  {
    $this->db->select('*, blog.slug as b_slug, category.slug as c_slug');
    $this->db->from('blog');
    $this->db->join('category', 'category.category_id = blog.category_id');
    $this->db->where('category.slug', $c_slug);
    $this->db->where('blog.slug', $b_slug);

    $query = $this->db->get();
    return $query->row_array();
  }

  public function getPost()
  {
    $this->db->order_by('title', 'ASC');
    $query = $this->db->get('blog');
    return $query->result_array();
  }

  public function getPostBySlug($slug)
  {
    return $this->db->get_where('blog', ['blog_views' => $slug])->row_array();
  }

  public function updateViewCounter($id, $data)
  {
    // increase view 
    $this->db->where('slug', $id);
    $this->db->update('blog', $data);
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

  public function updateBySlug($slug, $data)
  {
    $this->db->where('slug', $slug);
    $this->db->update('blog', $data);
  }

  public function delete($id)
  {
    $this->db->where('blog_id', $id);
    $this->db->delete('blog');
  }
}
  
  /* End of file Post_model.php */
