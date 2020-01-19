<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Blog_Profile extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

    checkSessionLog();
  }

  public function index()
  {
    $info['title'] = "Blog Profile";
    $info['user'] = $this->Auth_model->getUserSession();
    $info['link'] = $this->Profile_model->getSocialLink();

    $data = $this->Profile_model->getProfileById(1);
    $data_detail = $this->Profile_model->getProfileDetailById($data['id']);

    if ($data_detail > 0) {
      foreach ($data_detail as $val) {
        $info['data_detail'][] = $val;
      }
    }

    $this->form_validation->set_rules('name', 'blog name', 'trim|required');
    $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
    $this->form_validation->set_rules('phone', 'phone number', 'trim|required|min_length[7]|max_length[12]|numeric');
    $this->form_validation->set_rules('icon', 'icon', 'trim|required');
    $this->form_validation->set_rules('url[]', 'url', 'trim|required');

    $file = [
      'name' => $this->input->post('name', true),
      'email' => $this->input->post('email', true),
      'phone' => $this->input->post('phone', true),
      'about' => $this->input->post('about', true),
      'icon' => $this->input->post('icon', true)
    ];

    if ($this->form_validation->run() == FALSE) {
      renderTemplate('admins/blog-profile', $info);
    } else {
      $this->Profile_model->update(1, $file);

      // remove the blog profile detail
      $this->db->where('blog_profile_id', 1);
      $this->db->delete('blog_profile_detail');

      // Store to blog_profile_detail
      $count_link = count($this->input->post('link'));
      for ($i = 0; $i < $count_link; $i++) {
        $links = [
          'blog_profile_id' => 1,
          'link_blog_profile_id' => $this->input->post('link')[$i],
          'url' => $this->input->post('url')[$i]
        ];

        $this->Profile_model->insertProfileDetail($links);
      }

      $this->session->set_flashdata('success', 'Your data has been updated !');
      redirect('Blog_Profile', 'refresh');
    }
  }

  public function getTableLinkRow()
  {
    $link = $this->Profile_model->getSocialLink();
    echo json_encode($link);
  }
}
  
  /* End of file Blog_Profile.php */
