<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Message_Sent extends CI_Controller
{


  public function __construct()
  {
    parent::__construct();
    checkSessionLog();
  }

  public function index()
  {
    $info['title'] = "Message Sent";
    $info['user'] = $this->auth_model->getUserSession();

    // SEARCHING
    if ($this->input->post('search', true)) {
      $info['keyword'] = $this->input->post('search', true);
      $this->session->set_userdata('keyword', $info['keyword']);
    } else {
      $info['keyword'] = $this->session->set_userdata('keyword');
    }

    // DB PAGINATION FOR SEARCHING

    $this->db->like('email', $info['keyword']);

    // PAGINATION
    $config['base_url']     = base_url() . 'message_sent/index';
    $config['total_rows']   = $this->message_model->getSentCountPage();
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
    $info['message_sent']    = $this->message_model->getAllMessageSent($config['per_page'], $info['start'], $info['keyword']);

    $info['pagination'] = $this->pagination->create_links();

    // PASSING DATA
    renderTemplateDetail('message_sents/index', 'message_sents/detail-message', $info);
  }

  public function delete($id)
  {
    $getId = $this->message_model->getMessageById($id);

    $this->message_model->delete_sent($id);
    $this->session->set_flashdata('success', 'Message reply to ' . $getId['email'] . ' has been deleted !');
    redirect('Message_Sent', 'refresh');
  }
}
  
  /* End of file Message_Sent.php */
