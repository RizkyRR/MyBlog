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
    $info['user'] = $this->auth_model->getUserSession();
    $info['profile'] = $this->profile_model->getProfileById(1);

    $this->load->view('back-templates/header', $info);
    $this->load->view('back-templates/sidebar', $info);
    $this->load->view('back-templates/topbar', $info);
    $this->load->view('categories/index', $info);
    $this->load->view('modals/category-modal');
    $this->load->view('back-templates/footer');
  }

  public function getCategoryDatatables()
  {
    $list = $this->category_model->getCategoryDatatables();
    $data = array();
    $no = @$_POST['start'];
    foreach ($list as $item) {
      $no++;
      $row = array();
      $row[] = $no . ".";
      $row[] = $item->name;
      $row[] = $item->slug;

      if ($item->visible == "visible") {
        $status = '<p class="badge badge-success">Visible</p>';
      } else {
        $status = "<p class='badge badge-danger'>Invisible</p>";
      }

      $row[] = $status;

      // add html for action
      $row[] = '<a href="javascript:void(0)" class="btn btn-sm btn-warning btn-circle" onclick="editCategory(' . $item->category_id . ')" title="edit data"><i class="fas fa-pencil-alt"></i></a>

        <!-- <a href="javascript:void(0)" onclick="deleteCategory(' . $item->category_id . ')" class="btn btn-danger btn-xs" title="delete data"><i class="fa fa-trash-o"></i> Delete</a> -->';

      $data[] = $row;
    }
    $output = array(
      "draw" => @$_POST['draw'],
      "recordsTotal" => $this->category_model->count_all(),
      "recordsFiltered" => $this->category_model->count_filtered(),
      "data" => $data,
    );

    // output to json format
    echo json_encode($output);
  }

  public function category_data()
  {
    $data = $this->category_model->getCategory();
    echo json_encode($data);
  }

  public function addCategory()
  {
    $response = array();
    $info['user'] = $this->auth_model->getUserSession();

    if ($this->input->post('category_visible', true) != null) {
      $status = 'visible'; // if condition not null it means checked
    } else {
      $status = 'invisible';
    }

    $data = [
      'name' => $this->input->post('category_name', true),
      'slug' => set_slug($this->input->post('category_name', true)),
      'visible' => $status
    ];

    $insert = $this->category_model->insert($data);

    if ($insert > 0) {
      $response['status'] = 'true';
      $response['message'] = 'Category has been saved!';
    } else {
      $response['status'] = 'false';
      $response['message'] = 'Category failed to save, please try again!';
    }

    echo json_encode($response);
  }

  public function editCategory($id)
  {
    $data = $this->category_model->getCategoryById($id);
    echo json_encode($data);
  }

  public function updateCategory()
  {
    $response = array();

    $id = $this->input->post('category_id');

    if ($this->input->post('category_visible', true) != null) {
      $status = 'visible'; // if condition not null it means checked
    } else {
      $status = 'invisible';
    }

    $data = [
      'name' => $this->input->post('category_name', true),
      'slug' => set_slug($this->input->post('category_name', true)),
      'visible' => $status
    ];

    $update = $this->category_model->update($id, $data);

    if ($update > 0) {
      $response['status'] = 'true';
      $response['message'] = 'Category has been updated!';
    } else {
      $response['status'] = 'false';
      $response['message'] = 'Category failed to update, please trye again!';
    }

    echo json_encode($response);
  }

  public function edit($id)
  {
    $info['title']     = 'Edit Category';
    $info['user']      = $this->auth_model->getUserSession();
    $info['detail']    = $this->category_model->getCategoryById($id);

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
      $this->category_model->update($id, $file);
      $this->session->set_flashdata('success', 'Data category has been updated !');
      redirect('category', 'refresh');
    }
  }

  public function delete($id)
  {
    $this->category_model->delete($id);
    $this->session->set_flashdata('success', 'Data category has been deleted !');
    redirect('category', 'refresh');
  }
}
  
  /* End of file Category.php */
