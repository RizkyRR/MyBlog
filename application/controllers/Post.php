<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Post extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    checkSessionLog();

    // $this->load->library(['upload']);
  }

  public function index()
  {
    $info['title'] = "Post";
    $info['user'] = $this->auth_model->getUserSession();
    $info['profile'] = $this->profile_model->getProfileById(1);

    $this->load->view('back-templates/header', $info);
    $this->load->view('back-templates/sidebar', $info);
    $this->load->view('back-templates/topbar', $info);
    $this->load->view('posts/index', $info);
    $this->load->view('back-templates/footer');
  }

  public function getPostDatatables()
  {
    $list = $this->post_model->getPostDatatables();
    $data = array();
    $no = @$_POST['start'];
    foreach ($list as $item) {
      $no++;
      $row = array();
      $row[] = $no . ".";
      $row[] = $item->title;
      $row[] = $item->short_content;
      $row[] = date('d M Y H:i:s', strtotime($item->created_at));

      if ($item->active == "Active") {
        $status = '<p class="badge badge-success">Active</p>';
      } else {
        $status = "<p class='badge badge-danger'>Inactive</p>";
      }

      $row[] = $status;

      if ($item->pending == 1) {
        $btnPending = '<button type="button" name="send_post" id="' . $item->blog_id . '" class="btn btn-sm btn-success send-post btn-circle" title="Send Post"><i class="fas fa-paper-plane"></i></button>';
      } else {
        $btnPending = '';
      }

      // add html for action
      $row[] = '<a href="javascript:void(0)" class="btn btn-sm btn-danger button-delete btn-circle" id="' . $item->blog_id . '" onclick="deletePost(' . $item->blog_id . ')" title="Delete Post"><i class="fas fa-trash"></i></a>

      <a href="' . base_url() . 'blog-post-edit/' . $item->blog_id . '" class="btn btn-sm btn-warning btn-circle" title="Edit Post"><i class="fas fa-pencil-alt"></i></a>
      
      ' . $btnPending . '';

      $data[] = $row;
    }
    $output = array(
      "draw" => @$_POST['draw'],
      "recordsTotal" => $this->post_model->count_all(),
      "recordsFiltered" => $this->post_model->count_filtered(),
      "data" => $data,
    );

    // output to json format
    echo json_encode($output);
  }

  private function _uploadImage()
  {
    $config['upload_path'] = './back-assets/img/post_picture';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $config['encrypt_name'] = TRUE;
    $config['max_size']  = '1024';
    $config['overwrite'] = true;
    // $config['max_width']  = '1024';
    // $config['max_height']  = '768';
    // $config['remove_space'] = TRUE;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('image')) {
      return $this->upload->data('file_name');
    } else {
      $this->session->set_flashdata('error', $this->upload->display_errors());
      redirect($this->agent->referrer(), 'refresh');
    }
  }

  public function addpost()
  {
    $info['title'] = "Add New Post";
    $info['user'] = $this->auth_model->getUserSession();
    $info['category'] = $this->category_model->getCategory();
    $getUser  = $this->auth_model->checkUser($this->session->userdata('email'));
    date_default_timezone_set('Asia/Jakarta');

    $this->form_validation->set_rules('title', 'post title', 'trim|required|min_length[5]|is_unique[blog.title]', [
      'is_unique' => 'the title already exists, please use another title.'
    ]);
    $this->form_validation->set_rules('category_opt', 'category', 'trim|required');

    $this->form_validation->set_rules('content', 'content', 'trim|required|min_length[20]');
    $this->form_validation->set_rules('active_opt', 'is active', 'trim|required');


    if ($this->form_validation->run() == FALSE) {
      renderTemplate('posts/add-post', $info);
    } else {
      if (!empty($_FILES['image']['name'])) {
        $data = [
          'user_id' => $getUser['name'],
          'category_id' => $this->input->post('category_opt'),
          'title' => $this->input->post('title', true),
          'slug' => set_slug($this->input->post('title', true)),
          'picture' => $this->_uploadImage(),
          'short_content' => substr($this->input->post('content', true), 0, 100),
          'content' => $this->input->post('content', true),
          'created_at' => date('Y-m-d H:i:s'),
          'pending' => 1,
          'public' => 1,
          'active' => $this->input->post('active_opt')
        ];

        $this->post_model->insert($data);

        $this->session->set_flashdata('success', 'The article has been saved and ready to post!');
        redirect('blog-post-menu ', 'refresh');
      } else {
        $this->session->set_flashdata('error', 'The article failed to save, please try again!');
        redirect('blog-post-add ', 'refresh');
      }
    }
  }

  public function editPost($id)
  {
    $info['title'] = 'Edit Post';
    $info['user'] = $this->auth_model->getUserSession();
    $info['data'] = $this->post_model->getPostById($id);
    $info['category'] = $this->category_model->getCategory();
    date_default_timezone_set('Asia/Jakarta');

    $this->form_validation->set_rules('title', 'post title', 'trim|required|min_length[5]');
    $this->form_validation->set_rules('category_opt', 'category', 'trim|required');
    $this->form_validation->set_rules('content', 'content', 'trim|required|min_length[20]');
    $this->form_validation->set_rules('active_opt', 'is active', 'trim|required');

    if (!empty($_FILES['image']['name'])) {
      $old_image = $this->input->post('old_image');

      if ($old_image != null) {
        @unlink(FCPATH . 'back-assets/img/post_picture/' . $old_image);
      }

      $data = [
        'category_id' => $this->input->post('category_opt'),
        'title' => $this->input->post('title', true),
        'slug' => set_slug($this->input->post('title', true)),
        'picture' => $this->_uploadImage(),
        'short_content' => substr($this->input->post('content', true), 0, 100),
        'content' => $this->input->post('content', true),
        'active' => $this->input->post('active_opt'),
        'updated_at' => date('Y-m-d H:i:s')
      ];
    } else {
      $data = [
        'category_id' => $this->input->post('category_opt'),
        'title' => $this->input->post('title', true),
        'slug' => set_slug($this->input->post('title', true)),
        'short_content' => substr($this->input->post('content', true), 0, 100),
        'content' => $this->input->post('content', true),
        'active' => $this->input->post('active_opt'),
        'updated_at' => date('Y-m-d H:i:s')
      ];
    }

    if ($this->form_validation->run() == FALSE) {
      renderTemplate('posts/edit-post', $info);
    } else {
      $this->post_model->update($id, $data);

      $this->session->set_flashdata('success', 'Your post has been updated !');
      redirect('blog-post-menu', 'refresh');
    }
  }

  public function deletePost($id)
  {
    $response = array();

    $rows = $this->db->get_where('blog', array('blog_id' => $id));
    $result = $rows->result();

    foreach ($result as $row) {
      if ($row->picture != null) {
        @unlink('./back-assets/img/post_picture/' . $row->picture);
      }
    }

    $delete = $this->post_model->delete($id);

    if ($delete > 0) {
      $response['status'] = true;
    } else {
      $response['status'] = false;
    }

    echo json_encode($response);
  }

  public function sendPost()
  {
    $response = array();

    $id = $this->input->post('post_id');

    $data = [
      'pending' => 0
    ];

    $send = $this->post_model->send($id, $data);

    if ($send > 0) {
      $response['status'] = true;
    } else {
      $response['status'] = false;
    }

    echo json_encode($response);
  }
}
  
  /* End of file Post.php */
