<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

    if (!$this->session->userdata('email')) {
      redirect('auth', 'refresh');
    }
  }

  public function index()
  {
    $info['title']     = 'User Page';
    $info['user']    = $this->auth_model->getUserSession();

    renderTemplate('users/index', $info);
  }

  public function edit()
  {
    $info['title']     = "Edit User Page";
    $info['user']    = $this->auth_model->getUserSession();

    $this->form_validation->set_rules('name', 'full name', 'trim|required|min_length[5]');

    if (isset($_FILES['image']['name'])) {
      $config['upload_path']    = './back-assets/img/profile/';
      $config['allowed_types']  = 'gif|jpg|png';
      $config['max_size']       = '2048';

      $this->load->library('upload', $config);

      if ($this->upload->do_upload('image')) {
        $old_image = $info['user']['image'];

        if ($old_image != 'default.jpg') {
          unlink(FCPATH . 'back-assets/img/profile/' . $old_image);
        }

        $new_image  = $this->upload->data('file_name');
        $data       = $this->db->set('image', $new_image);
      } else {
        $this->session->set_flashdata('error', $this->upload->display_errors());
      }
    }

    $data = [
      'name' => $this->security->xss_clean(html_escape($this->input->post('name', true)))
    ];

    if ($this->form_validation->run() == FALSE) {
      renderTemplate('users/edit-user', $info);
    } else {
      $this->user_model->updateUser($data);
      $this->session->set_flashdata('success', 'Updated !');
      redirect('user', 'refresh');
    }
  }

  public function changePassword()
  {
    $info['title']     = "Change Password";
    $info['user']    = $this->auth_model->getUserSession();

    $this->form_validation->set_rules('oldpass', 'current password', 'trim|required|min_length[6]');
    $this->form_validation->set_rules('newpass', 'new password', 'trim|required|min_length[6]|matches[repass]');
    $this->form_validation->set_rules('repass', 'retype new password', 'trim|required|min_length[6]|matches[newpass]');

    if ($this->form_validation->run() == FALSE) {
      renderTemplate('users/changepassword', $info);
    } else {
      $old_pass     = $this->security->xss_clean(html_escape($this->input->post('oldpass', true)));
      $newpass    = $this->security->xss_clean(html_escape($this->input->post('newpass', true)));

      if (!password_verify($old_pass, $info['user']['password'])) {
        $this->session->set_flashdata('error', 'Wrong current password !');
        redirect('user/changepassword', 'refresh');
      } else {
        if ($old_pass == $newpass) {
          $this->session->set_flashdata('error', 'New password cannot be the same as current password !');
          redirect('user/changepassword', 'refresh');
        } else {
          $hash_pass = password_hash($newpass, PASSWORD_DEFAULT);

          $data = [
            'password' => $hash_pass
          ];

          $this->user_model->updatePassword($data);
          $this->session->set_flashdata('success', 'Updated !');
          redirect('user/changepassword', 'refresh');
        }
      }
    }
  }
}
