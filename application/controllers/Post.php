<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Post extends CI_Controller
{


  public function __construct()
  {
    parent::__construct();
    checkSessionLog();
  }


  public function index()
  {
    $info['title'] = "Post";
    $info['user'] = $this->Auth_model->getUserSession();

    // SEARCHING
    if ($this->input->post('search', true)) {
      $info['keyword'] = $this->input->post('search', true);
      $this->session->set_userdata('keyword', $info['keyword']);
    } else {
      $info['keyword'] = $this->session->set_userdata('keyword');
    }

    // DB PAGINATION FOR SEARCHING
    $this->db->select('*');
    $this->db->from('blog');
    $this->db->join('category', 'category.category_id = blog.category_id');

    $this->db->like('blog_id', $info['keyword']);
    $this->db->or_like('title', $info['keyword']);
    $this->db->or_like('active', $info['keyword']);
    $this->db->or_like('name', $info['keyword']);

    // PAGINATION
    $config['base_url']     = base_url() . 'post';
    $config['total_rows']   = $this->db->count_all_results();
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
    $info['post']    = $this->Post_model->getAllPost($config['per_page'], $info['start'], $info['keyword']);

    $info['pagination'] = $this->pagination->create_links();

    // PASSING DATA
    renderTemplateDetail('posts/index', 'posts/detail-post', $info);
  }

  private function _uploadImage()
  {

    $config['upload_path'] = './back-assets/img/post_picture';
    $config['allowed_types'] = 'gif|jpg|png|jpeg|gif';
    $config['file_name'] = 'content_' . time();
    $config['max_size']  = '2000';
    $config['overwrite'] = true;
    // $config['max_width']  = '1024';
    // $config['max_height']  = '768';
    // $config['remove_space'] = TRUE;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('image')) {
      return $this->upload->data('file_name');
    }
  }

  public function addpost()
  {
    $info['title'] = "Add New Post";
    $info['user'] = $this->Auth_model->getUserSession();
    $info['category'] = $this->Category_model->getCategory();
    $getUser  = $this->Auth_model->checkUser($this->session->userdata('email'));

    $this->form_validation->set_rules('title', 'post title', 'trim|required|min_length[5]|is_unique[blog.title]', [
      'is_unique' => 'the title already exists, please use another title.'
    ]);
    $this->form_validation->set_rules('category_opt', 'category', 'trim|required');

    $this->form_validation->set_rules('content', 'content', 'trim|required|min_length[20]');
    $this->form_validation->set_rules('active_opt', 'is active', 'trim|required');

    $file = [
      'user_id' => $getUser['name'],
      'category_id' => $this->input->post('category_opt'),
      'title' => $this->security->xss_clean(html_escape($this->input->post('title', true))),
      'slug' => set_slug($this->input->post('title', true)),
      'picture' => $this->_uploadImage(),
      'short_content' => substr($this->input->post('content', true), 0, 100),
      'content' => $this->input->post('content', true),
      'pending' => 0,
      'public' => 1,
      'active' => $this->input->post('active_opt')
    ];

    if ($this->form_validation->run() == FALSE) {
      renderTemplate('posts/add-post', $info);
    } else {
      $this->Post_model->insert($file);

      $this->session->set_flashdata('success', 'Your data has been added !');
      redirect('post ', 'refresh');
    }
  }

  public function editPost($id)
  {
    $info['title'] = 'Edit Post';
    $info['user'] = $this->Auth_model->getUserSession();
    $info['data'] = $this->Post_model->getPostById($id);
    $info['category'] = $this->Category_model->getCategory();
    date_default_timezone_set('Asia/Jakarta');

    $this->form_validation->set_rules('title', 'post title', 'trim|required|min_length[5]');
    $this->form_validation->set_rules('category_opt', 'category', 'trim|required');
    $this->form_validation->set_rules('content', 'content', 'trim|required|min_length[20]');
    $this->form_validation->set_rules('active_opt', 'is active', 'trim|required');

    if (isset($_FILES['image']['name'])) {
      $config['upload_path']    = './back-assets/img/post_picture/';
      $config['allowed_types']  = 'gif|jpg|png';
      $config['max_size']       = '2048';

      $this->load->library('upload', $config);

      if ($this->upload->do_upload('image')) {
        $old_image = $info['data']['picture'];

        if ($old_image != 'default.jpg') {
          unlink(FCPATH . 'back-assets/img/post_picture/' . $old_image);
        }

        $new_image  = $this->upload->data('file_name');
        $data       = $this->db->set('picture', $new_image);
      } else {
        $this->session->set_flashdata('error', $this->upload->display_errors());
      }
    }

    $data = [
      'category_id' => $this->input->post('category_opt'),
      'title' => $this->security->xss_clean(html_escape($this->input->post('title', true))),
      'slug' => set_slug($this->input->post('title', true)),
      'short_content' => substr($this->input->post('content', true), 0, 100),
      'content' => $this->input->post('content', true),
      'active' => $this->input->post('active_opt'),
      'updated_at' => date('Y-m-d H:i:s')
    ];

    if ($this->form_validation->run() == FALSE) {
      renderTemplate('posts/edit-post', $info);
    } else {
      $this->Post_model->update($id, $data);
      $this->session->set_flashdata('success', 'Your post has been updated !');
      redirect('post', 'refresh');
    }
  }

  public function deletePost($id)
  {
    $rows = $this->db->get_where('blog', array('blog_id' => $id));
    $result = $rows->result();
    foreach ($result as $row) {
      unlink('./back-assets/img/post_picture/' . $row->picture);
    }

    $this->Post_model->delete($id);
    $this->session->set_flashdata('success', 'Your post has been deleted !');
    redirect('post', 'refresh');
  }

  // Read Post 
  public function read($c_slug = null, $b_slug = null)
  {
    if ($c_slug == null || $b_slug == null) {
      redirect('home', 'refresh');
    }

    $info['read'] = $this->Post_model->getReadPost($c_slug, $b_slug);
    $info['title'] = $info['read']['title'];

    renderFrontTemplate('posts/read-post', $info);
  }
}
  
  /* End of file Post.php */
