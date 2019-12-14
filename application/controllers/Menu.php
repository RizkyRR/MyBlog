<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

    checkSessionLog();
  }

  /* MENU CONTROLL */

  public function index()
  {
    $info['title']     = 'Management Menu';
    $info['user']    = $this->Auth_model->getUserSession();

    // SEARCHING
    if ($this->input->post('search', true)) {
      $info['keyword'] = $this->input->post('search', true);
      $this->session->set_userdata('keyword', $info['keyword']);
    } else {
      $info['keyword'] = $this->session->set_userdata('keyword');
    }
    // SEARCHING

    // DB PAGINATION FOR SEARCHING
    $this->db->like('id', $info['keyword']);
    $this->db->or_like('menu', $info['keyword']);
    $this->db->from('menu');
    // DB PAGINATION FOR SEARCHING

    $config['base_url']     = base_url() . 'menu/index';
    $config['total_rows']   = $this->db->count_all_results();
    $config['per_page']     = 5;
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
    // STYLING

    $this->pagination->initialize($config);

    $info['start']   = $this->uri->segment(3);
    $info['menu']    = $this->Menu_model->getAllMenu($config['per_page'], $info['start'], $info['keyword']);

    $info['pagination'] = $this->pagination->create_links();

    renderTemplate('menus/index', $info);
  }

  public function addMenu()
  {
    $info['title']    = "Add New Menu";
    $info['user']    = $this->Auth_model->getUserSession();

    $this->form_validation->set_rules('name', 'menu name', 'trim|required|min_length[3]');

    $data = [
      'menu' => $this->security->xss_clean(html_escape($this->input->post('name', true)))
    ];

    if ($this->form_validation->run() == false) {
      renderTemplate('menus/add_menu', $info);
    } else {
      $this->Menu_model->insertMenu($data);
      $this->session->set_flashdata('success', 'Added !');
      redirect('menu', 'refresh');
    }
  }

  public function editMenu($id)
  {
    $info['title']     = 'Edit Menu';
    $info['user']      = $this->Auth_model->getUserSession();
    $info['id']        = $this->Menu_model->getMenuById($id);

    $this->form_validation->set_rules('name', 'menu name', 'trim|required|min_length[3]');

    $file = ["menu" => $this->security->xss_clean(html_escape($this->input->post('name', true)))];

    if ($this->form_validation->run() == false) {
      renderTemplate('menus/edit_menu', $info);
    } else {
      $this->Menu_model->updateMenu($file);
      $this->session->set_flashdata('success', 'Updated !');
      redirect('menu', 'refresh');
    }
  }

  public function deleteMenu($id)
  {
    $this->Menu_model->deleteMenu($id);
    $this->session->set_flashdata('success', 'Deleted !');
    redirect('menu', 'refresh');
  }

  /* END OF MENU CONTROLL */

  /* SUBMENU CONTROLL */

  public function subMenu()
  {
    $info['title']         = 'Management Sub Menu';
    $info['user']          = $this->Auth_model->getUserSession();

    // SEARCHING
    if ($this->input->post('search', true)) {
      $info['keyword'] = $this->input->post('search', true);
      $this->session->set_userdata('keyword', $info['keyword']);
    } else {
      $info['keyword'] = $this->session->set_userdata('keyword');
    }
    // SEARCHING

    // DB PAGINATION FOR SEARCHING
    $this->db->select('*');
    $this->db->from('sub_menu');
    $this->db->join('menu', 'menu.id = sub_menu.menu_id');

    $this->db->like('title', $info['keyword']);
    $this->db->or_like('menu', $info['keyword']);
    $this->db->or_like('url', $info['keyword']);
    $this->db->or_like('icon', $info['keyword']);
    $this->db->or_like('level', $info['keyword']);

    // $this->db->from('sub_menu');
    // DB PAGINATION FOR SEARCHING

    /* Untuk menambahkan fitur jumlah berapa rows cari yang ada bisa menggunakan cara
            $info['total_rows'] = $config['total_rows']; ->(lalu dilempar ke views)
            // <h5>Results: <?= $total_rows ?></h5> 
        */

    $config['base_url']     = base_url() . 'menu/submenu';
    $config['total_rows']   = $this->db->count_all_results();
    $config['per_page']     = 10;
    $config['num_links']    = 5; // set this num links to give limit show page, 5 means [1,2,3,4,5,next]

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
    // STYLING

    $this->pagination->initialize($config);

    $info['start']      = $this->uri->segment(3);
    $info['submenu']    = $this->Menu_model->getAllSubMenu($config['per_page'], $info['start'], $info['keyword']);

    $info['pagination'] =  $this->pagination->create_links();

    renderTemplate('submenus/index', $info);
  }

  public function addSubMenu()
  {
    $info['title']         = 'Add New Management Sub Menu';
    $info['user']          = $this->Auth_model->getUserSession();
    $info['submenu']    = $this->Menu_model->getAllSubMenu_();
    $info['menu']        = $this->Menu_model->getAllMenu_();

    $this->form_validation->set_rules('name', 'submenu name', 'trim|required|min_length[3]');
    $this->form_validation->set_rules('menu_opt', 'menu option', 'trim|required');
    $this->form_validation->set_rules('url', 'url', 'trim|required|min_length[3]');
    $this->form_validation->set_rules('icon', 'icon', 'trim|required|min_length[3]');
    $this->form_validation->set_rules('level', 'level', 'trim|required|min_length[3]|matches[url]');
    $this->form_validation->set_rules('active', 'active submenu');

    $data = [
      'menu_id'   => $this->security->xss_clean(html_escape($this->input->post('menu_opt', true))),
      'url'       => $this->security->xss_clean(html_escape($this->input->post('url', true))),
      'title'     => $this->security->xss_clean(html_escape($this->input->post('name', true))),
      'icon'      => $this->security->xss_clean(html_escape($this->input->post('icon', true))),
      'level'       => $this->security->xss_clean(html_escape($this->input->post('level', true))),
      'is_active' => $this->security->xss_clean(html_escape($this->input->post('active', true)))
    ];

    if ($this->form_validation->run() == FALSE) {
      renderTemplate('submenus/add_submenu', $info);
    } else {
      $this->Menu_model->insertSubMenu($data);
      $this->session->set_flashdata('success', 'Added !');
      redirect('menu/submenu', 'refresh');
    }
  }

  public function editSubMenu($id)
  {
    $info['title']      = 'Edit Management Sub Menu';
    $info['user']       = $this->Auth_model->getUserSession();
    $info['submenu']    = $this->Menu_model->getSubMenuById($id);
    $info['menu']       = $this->Menu_model->getAllMenu_();

    $this->form_validation->set_rules('menu_opt', 'menu option', 'trim|required');
    $this->form_validation->set_rules('name', 'submenu name', 'trim|required|min_length[3]');
    $this->form_validation->set_rules('url', 'url', 'trim|required|min_length[3]');
    $this->form_validation->set_rules('icon', 'icon', 'trim|required|min_length[3]');
    $this->form_validation->set_rules('level', 'level', 'trim|required|min_length[3]|matches[url]');
    $this->form_validation->set_rules('active', 'active submenu');

    if ($this->input->post('active', true) == null) {
      $status = 0; // if condition not null it means checked
    } else {
      $status = 1;
    }

    $data = [
      'menu_id'   => $this->security->xss_clean(html_escape($this->input->post('menu_opt', true))),
      'title'     => $this->security->xss_clean(html_escape($this->input->post('name', true))),
      'url'       => $this->security->xss_clean(html_escape($this->input->post('url', true))),
      'icon'      => $this->security->xss_clean(html_escape($this->input->post('icon', true))),
      'level'       => $this->security->xss_clean(html_escape($this->input->post('level', true))),
      'is_active' => $status
    ];

    if ($this->form_validation->run() == FALSE) {
      renderTemplate('submenus/edit_submenu', $info);
    } else {
      $this->Menu_model->updateSubMenu($data);
      $this->session->set_flashdata('success', 'Edited !');
      redirect('menu/submenu', 'refresh');
    }
  }

  public function deleteSubMenu($id)
  {
    $this->Menu_model->deleteSubMenu($id);
    $this->session->set_flashdata('success', 'Deleted !');
    redirect('menu/submenu', 'refresh');
  }

  /* END OF SUBMENU CONTROLL */
}
  
  /* End of file Menu.php */
