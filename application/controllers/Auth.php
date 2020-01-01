<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  private function _login()
  {
    $email = $this->security->xss_clean(html_escape($this->input->post('email', true)));
    $pass  = $this->security->xss_clean(html_escape($this->input->post('password', true)));

    $user = $this->Auth_model->userLogin($email);

    if (password_verify($pass, $user['password'])) {
      $file = [
        'email'   => $user['email']
      ];

      $this->session->set_userdata($file);
      // $this->Auth_model->updateUserOnline($this->session->userdata('email'));


      redirect('admin', 'refresh');
    } else {
      $this->session->set_flashdata('error', 'Wrong Password !');
      redirect('auth');
    }
  }

  private function _sendEmail($token, $type)
  {
    $config = [
      'protocol'   => 'smtp',
      'smtp_host'  => 'ssl://smtp.googlemail.com',
      'smtp_user'  => '111201408226@mhs.dinus.ac.id',
      'smtp_pass'  => 'number68',
      'smtp_port'  => 465,
      'mailtype'  => 'html',
      'charset'  => 'utf-8',
      'newline'  => "\r\n"
    ];

    $this->load->library('email', $config);
    $this->email->initialize($config);

    $this->email->from('111201408226@mhs.dinus.ac.id', 'rizkyrahmadianto.com');
    $this->email->to($this->input->post('email', true));
    /*$this->email->cc('another@example.com');
		$this->email->bcc('and@another.com');*/

    if ($type == 'forgot') {
      $this->email->subject('Reset Password');
      $this->email->message('Click this link to reset your password : 
						<a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Now</a>');
    }

    if ($this->email->send()) {
      return TRUE;
    } else {
      return FALSE;
    }
  }

  public function index()
  {
    $info['title'] = 'Log In';

    $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|xss_clean');
    $this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('back-templates/header_auth', $info);
      $this->load->view('auths/login');
      $this->load->view('back-templates/footer_auth');
    } else {
      $this->_login();
    }

    if ($this->session->userdata('email')) {
      redirect('admin', 'refresh');
    }
  }

  // forgotPassword()
  public function forgotPassword()
  {
    $info['title'] = 'Forgot Password';

    $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|xss_clean');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('back-templates/header_auth', $info);
      $this->load->view('auths/forgot-pass');
      $this->load->view('back-templates/footer_auth');
    } else {
      $data = [
        'email'   => $this->security->xss_clean(html_escape($this->input->post('email', true))),
        'is_active' => 1
      ];

      if ($this->Auth_model->checkUserEmail($data)) {
        $token = base64_encode(random_bytes(32));

        $user_token = [
          'email'     => $this->security->xss_clean(html_escape($this->input->post('email', true))),
          'token'     => $token,
          'created_at'  => time()
        ];

        $this->Auth_model->insertChangePass($user_token);
        $this->_sendEmail($token, 'forgot');

        $this->session->set_flashdata('success', 'please check your email to reset your password !');
        redirect('auth/forgotpassword', 'refresh');
      } else {
        $this->session->set_flashdata('error', 'email is not registered or activated !');
        redirect('auth/forgotpassword', 'refresh');
      }
    }
  }

  // resetPassword()
  public function resetPassword()
  {
    $email = $this->input->get('email');
    $token = $this->input->get('token');

    if ($this->db->get_where('user', ['email' => $email])->row_array()) {
      if ($this->db->get_where('user_token', ['token' => $token])->row_array()) {
        $this->session->set_userdata('reset_email', $email);
        $this->changePassword();
      } else {
        $this->session->set_flashdata('error', 'reset password failed, wrong token.');
        redirect('auth', 'refresh');
      }
    } else {
      $this->session->set_flashdata('error', 'reset password failed, wrong email.');
      redirect('auth', 'refresh');
    }
  }

  // changePassword()
  public function changePassword()
  {
    if (!$this->session->userdata('reset_email')) {
      redirect('auth', 'refresh');
    }

    $info['title'] = "Change Password";

    $this->form_validation->set_rules('pass', 'new password', 'trim|required|xss_clean|min_length[6]|matches[repeat_pass]');
    $this->form_validation->set_rules('repeat_pass', 'repeat new password', 'trim|required|xss_clean|min_length[6]|matches[pass]');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('back-templates/header_auth', $info);
      $this->load->view('auths/change_pass');
      $this->load->view('back-templates/footer_auth');
    } else {
      $password   = $this->security->xss_clean(html_escape($this->input->post('pass', true)));
      $hash_pass  = password_hash($password, PASSWORD_DEFAULT);
      $email     = $this->session->userdata('reset_email');

      $this->Auth_model->updateUserPass($hash_pass, $email);
      $this->Auth_model->deleteUserToken($email);

      $this->session->unset_userdata('reset_email');

      $this->session->set_flashdata('success', $email . ' password has been changed. Please login !');
      redirect('auth', 'refresh');
    }
  }

  // logout()
  public function logout()
  {
    // $this->Auth_model->updateUserOffline($this->session->userdata('email'));

    $this->session->unset_userdata('email');
    // $this->session->unset_userdata('role_id');

    $this->session->set_flashdata('success', 'You have been logout !');
    redirect('auth', 'refresh');
  }

  // denied()
  public function denied()
  {
    $info['title']  = "Oops! Access Denied";
    $this->load->view('back-templates/header', $info);
    $this->load->view('auths/denied');
  }
}
