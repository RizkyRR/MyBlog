<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends CI_Controller
{

  public function index()
  {
    $info['title'] = "Contact Me";
    $info['subheading'] = "Have questions? I have answers.";


    renderFrontTemplate('front-contact/index', $info);
  }

  public function sendMessage()
  {
    $data = [
      'name' => $this->input->post('name', true),
      'email' => $this->input->post('email', true),
      'phone' => $this->input->post('phone', true),
      'message_content' => $this->input->post('message', true),
      'is_reply' => 0
    ];

    $this->Message_model->insert($data);
  }
}
  
  /* End of file Contact.php */
