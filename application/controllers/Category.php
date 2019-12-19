<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{


  public function __construct()
  {
    parent::__construct();
    checkSessionLog();
  }


  public function index()
  {
    $info['title'] = "Category";
    $info['user'] = $this->Auth_model->getUserSession();

    // SEARCHING
    if ($this->input->post('search', true)) {
      $info['keyword'] = $this->input->post('search', true);
      $this->session->set_userdata('keyword', $info['keyword']);
    } else {
      $info['keyword'] = $this->session->set_userdata('keyword');
    }

    // DB PAGINATION FOR SEARCHING
    $this->db->like('category_id', $info['keyword']);
    $this->db->or_like('name', $info['keyword']);
    $this->db->from('category');

    // PAGINATION
    $config['base_url']     = base_url() . 'category/index';
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
    $info['category']    = $this->Category_model->getAllCategory($config['per_page'], $info['start'], $info['keyword']);

    $info['pagination'] = $this->pagination->create_links();

    // PASSING DATA
    renderTemplate('categories/index', $info);
  }

  public function addNew()
  {
    $info['title'] = "Add Category";
    $info['user'] = $this->Auth_model->getUserSession();

    $this->form_validation->set_rules('name', 'category name', 'trim|required|min_length[5]|is_unique[category.name]', [
      'is_unique' => 'category has been registered, please use another category.'
    ]);

    $file = [
      'name' => $this->security->xss_clean(html_escape($this->input->post('name', true))),
      'slug' => set_slug($this->input->post('name', true)),
      'visible' => $this->security->xss_clean(html_escape($this->input->post('visible', true)))
    ];

    if ($this->form_validation->run() == FALSE) {
      renderTemplate('categories/add-category', $info);
    } else {
      $this->Category_model->insert($file);
      $this->session->set_flashdata('success', 'Your data has been added !');
      redirect('category', 'refresh');
    }
  }

  public function edit($id)
  {
    $info['title']     = 'Edit Category';
    $info['user']      = $this->Auth_model->getUserSession();
    $info['detail']    = $this->Category_model->getCategoryById($id);

    $this->form_validation->set_rules('name', 'category name', 'trim|required|min_length[3]');

    if ($this->input->post('visible', true) == null) {
      $status = 0; // if condition not null it means checked
    } else {
      $status = 1;
    }

    $file = [
      'name' => $this->security->xss_clean(html_escape($this->input->post('name', true))),
      'slug' => set_slug($this->input->post('name', true)),
      'visible' => $status
    ];

    if ($this->form_validation->run() == false) {
      renderTemplate('categories/edit-category', $info);
    } else {
      $this->Category_model->update($id, $file);
      $this->session->set_flashdata('success', 'Data category has been updated !');
      redirect('category', 'refresh');
    }
  }

  public function delete($id)
  {
    $this->Category_model->delete($id);
    $this->session->set_flashdata('success', 'Data category has been deleted !');
    redirect('category', 'refresh');
  }
}
  
  /* End of file Category.php */
