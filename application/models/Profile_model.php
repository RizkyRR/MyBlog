<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Profile_model extends CI_Model
{

  public function getProfileById($id)
  {
    return $this->db->get_where('blog_profile', ['id' => $id])->row_array();
  }

  public function getProfileDetailById($id)
  {
    return $this->db->get_where('blog_profile_detail', ['blog_profile_id' => $id])->result_array();
  }

  // public function getAllProfileById($id)
  // {
  //   $this->db->select('*');
  //   $this->db->from('blog_profile');
  //   $this->db->join('blog_profile_detail', 'blog_profile_detail.blog_profile_id = blog_profile.id');
  //   $this->db->join('blog_image', 'blog_image.blog_profile_id = blog_profile.id');
  //   $this->db->where('blog_profile.id', $id);

  //   $query = $this->db->get();

  //   if ($query->num_rows() != 0) {
  //     return $query->row_array();
  //   } else {
  //     return false;
  //   }
  // }

  public function insertProfileDetail($data)
  {
    $this->db->insert('blog_profile_detail', $data);
  }

  public function update($id, $data)
  {
    $this->db->where('id', $id);
    $this->db->update('blog_profile', $data);
  }

  public function getSocialLink()
  {
    $query = $this->db->get('link_blog_profile');
    return $query->result_array();
  }
}

/* End of file Profile_model.php */
