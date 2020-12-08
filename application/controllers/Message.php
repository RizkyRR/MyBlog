<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Message extends CI_Controller
{


  public function __construct()
  {
    parent::__construct();
    checkSessionLog();
  }


  public function index()
  {
    $info['title'] = "Message";
    $info['user'] = $this->auth_model->getUserSession();

    // SEARCHING
    if ($this->input->post('search', true)) {
      $info['keyword'] = $this->input->post('search', true);
      $this->session->set_userdata('keyword', $info['keyword']);
    } else {
      $info['keyword'] = $this->session->set_userdata('keyword');
    }

    // DB PAGINATION FOR SEARCHING
    $this->db->like('id', $info['keyword']);
    $this->db->or_like('name', $info['keyword']);
    $this->db->or_like('email', $info['keyword']);
    $this->db->or_like('phone', $info['keyword']);

    // PAGINATION
    $config['base_url']     = base_url() . 'message/index';
    $config['total_rows']   = $this->message_model->getMessageCountPage();
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
    $info['message']    = $this->message_model->getAllMessage($config['per_page'], $info['start'], $info['keyword']);

    $info['pagination'] = $this->pagination->create_links();

    // PASSING DATA
    renderTemplate('messages/index', $info);
  }

  private function _sendEmail($replyTo, $message)
  {
    // https://stackoverflow.com/questions/10663277/how-to-send-an-email-with-content-from-a-view-in-codeigniter
    // https://stackoverflow.com/questions/16631740/sending-email-using-templates-in-codeigniter
    // https://stackoverflow.com/questions/9095528/send-html-mail-using-codeigniter
    // https://stackoverflow.com/questions/16558402/using-a-html-mail-template-with-codeigniter
    // https://stackoverflow.com/questions/16297887/codeigniter-how-to-html-template-for-emails
    // http://manojpatial.com/send-email-using-html-email-template-in-codeigniter/

    // https://mdbootstrap.com/plugins/jquery/email-templates/

    // https://www.rumahweb.com/journal/cara-setting-smtp-codeigniter/
    $config = [
      'protocol'   => 'smtp',
      'smtp_host'  => 'ssl://',
      'smtp_user'  => 'admin@email.com',
      'smtp_pass'  => 'password',
      'smtp_port'  => 465,
      'mailtype'  => 'html',
      'charset'  => 'utf-8',
      'newline'  => "\r\n",
      'wordwrap' => TRUE
    ];

    $this->load->library('email', $config);
    $this->email->initialize($config);

    // Email dan nama pengirim
    $this->email->from('admin@email.com', 'email.com');

    // Email penerima
    $this->email->to($replyTo); // Ganti dengan email tujuan

    // Lampiran email, isi dengan url/path file
    // $this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

    // Subject email
    $this->email->subject('Message Reply Order');

    // Isi email
    $this->email->message($message);

    //Send mail
    if ($this->email->send()) {
      $this->session->set_flashdata("success", "Congragulation Email Send Successfully.");
    } else {
      $this->session->set_flashdata("error", "You have encountered an error");
      redirect('message', 'refresh');
    }
  }

  public function reply($id)
  {
    $info['title'] = 'Reply Message';
    $info['user'] = $this->auth_model->getUserSession();
    $info['data'] = $this->message_model->getMessageById($id);

    $getId = $info['data'];

    $this->form_validation->set_rules('message_reply', 'message', 'trim|required|min_length[3]');

    $file = [
      'message_id' => $this->input->post('id', true),
      'message_reply' => $this->input->post('message_reply', true)
    ];

    if ($this->form_validation->run() == false) {
      renderTemplate('messages/message-reply', $info);
    } else {
      $this->_sendEmail($this->input->post('email'), $this->input->post('message_reply'));

      $this->message_model->send($file);

      $isreply = [
        'is_reply' => 1
      ];

      $this->message_model->update($id, $isreply);

      $this->session->set_flashdata('success', 'Message from ' . $getId['email'] . ' has been sent !');
      redirect('message', 'refresh');
    }
  }

  public function message_count_data()
  {
    $data = $this->message_model->getNewMessageCount();
    echo json_encode($data);
  }

  public function message_notif_data()
  {
    $data = $this->message_model->getNewMessageInfo();
    echo json_encode($data);
  }

  public function delete($id)
  {
    $getId = $this->message_model->getMessageById($id);

    $this->message_model->delete($id);
    $this->session->set_flashdata('success', 'Message from ' . $getId['email'] . ' has been deleted !');
    redirect('message', 'refresh');
  }
}
  
  /* End of file Message.php */
