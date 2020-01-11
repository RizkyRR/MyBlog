<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Comment extends CI_Controller
{


  public function __construct()
  {
    parent::__construct();
    checkSessionLog();
  }


  public function index()
  {
    $info['title'] = "Comment";
    $info['user'] = $this->Auth_model->getUserSession();

    // SEARCHING
    if ($this->input->post('search', true)) {
      $info['keyword'] = $this->input->post('search', true);
      $this->session->set_userdata('keyword', $info['keyword']);
    } else {
      $info['keyword'] = $this->session->set_userdata('keyword');
    }

    // DB PAGINATION FOR SEARCHING

    $this->db->like('title', $info['keyword']);
    $this->db->or_like('username', $info['keyword']);

    // PAGINATION
    $config['base_url']     = base_url() . 'comment/index';
    $config['total_rows']   = $this->Comment_model->getCommentCountPage();
    $config['per_page']     = 10;
    $config['num_links']    = 5;

    // STYLING
    $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';
    $config['full_tag_close']   = '</ul></nav></div>';

    $config['first_link']       = 'First';
    $config['first_tag_open']   = '<li class="page-item">';
    $config['first_tag_close']  = '</li>';

    $config['last_link']        = 'Last';
    $config['last_tag_open']    = '<li class="page-item">';
    $config['last_tag_close']   = '</li>';

    $config['next_link']        = '&raquo';
    $config['next_tag_open']    = '<li class="page-item">';
    $config['next_tag_close']   = '</li>';

    $config['prev_link']        = '&laquo';
    $config['prev_tag_open']    = '<li class="page-item">';
    $config['prev_tag_close']   = '</li>';

    $config['cur_tag_open']     = '<li class="page-item active"><a class="page-link">';
    $config['cur_tag_close']    = '</a></li>';

    $config['num_tag_open']     = '<li class="page-item">';
    $config['num_tag_close']    = '</li>';
    $config['attributes']       = array('class' => 'page-link');

    // GENERATE PAGE
    $this->pagination->initialize($config);

    $info['start']   = $this->uri->segment(3);
    $info['comment']    = $this->Comment_model->getAllComment($config['per_page'], $info['start'], $info['keyword']);

    $info['pagination'] = $this->pagination->create_links();

    // PASSING DATA
    renderTemplate('comments/index', $info);
  }

  public function addComment()
  {
    # code...
  }

  public function editComment($id)
  {
    $info['title'] = 'Edit Comment';
    $info['user'] = $this->Auth_model->getUserSession();
    $info['data'] = $this->Comment_model->getCommentById($id);

    $this->form_validation->set_rules('is_hide', 'hide comment', 'trim');

    if ($this->input->post('is_hide', true) == null) {
      $ishide = 0; // if condition not null it means checked
    } else {
      $ishide = 1;
    }

    $data = [
      'is_hide' => $ishide
    ];

    if ($this->form_validation->run() == FALSE) {
      renderTemplate('comments/edit-comment', $info);
    } else {
      $this->Comment_model->update($id, $data);
      $this->session->set_flashdata('success', 'Your comment data has been updated !');
      redirect('comment', 'refresh');
    }
  }

  public function comment_count_data()
  {
    $data = $this->Comment_model->getNewCommentCount();
    echo json_encode($data);
  }

  public function comment_notif_data()
  {
    $data = $this->Comment_model->getNewCommentInfo();
    echo json_encode($data);
  }

  public function deleteComment($id)
  {
    $this->Comment_model->delete($id);
    $this->session->set_flashdata('success', 'Data comment has been deleted !');
    redirect('comment', 'refresh');
  }

  /* public function commentUpdate()
  {
    $id  = $this->input->post('id', true);

    if ($this->input->post('check_hide') == 1) {
      $status = 1;
    } else {
      $status = 0;
    }

    $file = [
      'is_hide' => $status
    ];

    $this->Comment_model->update($id, $file);
    $this->session->set_flashdata('success', 'Updated !');
  } */
}
  
  /* End of file Comment.php */
