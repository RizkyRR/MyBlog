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

    $this->message->insert($data);

    // Try trigger with pusher
    // http://mfikri.com/artikel/crud-realtime-codeigniter
    // https://www.webslesson.info/2017/02/facebook-style-notifications-in-php.html
    // https://dashboard.pusher.com/apps/924269/keys
    /* require __DIR__ . '/vendor/autoload.php';
    $options = array(
      'cluster' => 'ap1',
      'useTLS' => true
    );

    $pusher = new Pusher\Pusher(
      'f52e75c32c7cdaeab0d2', //ganti dengan App_key pusher Anda
      'cbe2d4a0bbcbd935bcd6', //ganti dengan App_secret pusher Anda
      '924269', //ganti dengan App_id pusher Anda
      $options
    );

    $data['message'] = 'success';
    $pusher->trigger('my-channel', 'my-event', $data); */
  }
}
  
  /* End of file Contact.php */
