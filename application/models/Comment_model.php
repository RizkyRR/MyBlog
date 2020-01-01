<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Comment_model extends CI_Model
{

  public function getAllComment($limit, $offset, $keyword)
  {
    $this->db->select('*, comment.content AS c_content');
    $this->db->from('comment');
    $this->db->join('blog', 'blog.blog_id = comment.blog_id');

    if ($keyword) {
      $this->db->like('title', $keyword);
      $this->db->or_like('username', $keyword);
      $this->db->or_like('c_content', $keyword);
    }

    $this->db->order_by('datetime', 'DESC');

    $this->db->limit($limit, $offset);

    $query = $this->db->get();
    return $query->result_array();
  }

  public function getComment()
  {
    $this->db->order_by('comment_id', 'ASC');
    $query = $this->db->get('comment');
    return $query->result_array();
  }

  public function insert($data)
  {
    $this->db->insert('comment', $data);
  }

  public function getCommentById($id)
  {
    // return $this->db->get_where('comment', ['comment_id' => $id])->row_array();
    $this->db->select('*, comment.content AS c_content');
    $this->db->from('comment');
    $this->db->join('blog', 'blog.blog_id = comment.blog_id');
    $this->db->where('comment.comment_id', $id);

    $query = $this->db->get();

    if ($query->num_rows() != 0) {
      return $query->row_array();
    } else {
      return false;
    }
  }

  public function update($id, $data)
  {
    $this->db->where('comment_id', $id);
    $this->db->update('comment', $data);
  }

  public function getNewCommentInfo()
  {
    // $this->db->select('product_name');
    $this->db->order_by('datetime', 'desc');
    $this->db->limit(5);

    $query = $this->db->get_where('comment', 'is_reply = 0');

    return $query->result_array();
  }

  public function getNewCommentCount()
  {
    $this->db->select('COUNT(*)');
    $this->db->from('comment');
    $this->db->where('is_reply = 0');
    return $this->db->count_all_results();
  }

  public function delete($id)
  {
    $this->db->where('comment_id', $id);
    $this->db->delete('comment');
  }
}
  
  /* End of file Comment_model.php */
