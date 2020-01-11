<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
  public function getMenuCountPage()
  {
    $query = $this->db->get('menu');
    return $query->num_rows();
  }

  public function getSubMenuCountPage()
  {
    $this->db->select('*');
    $this->db->from('sub_menu');
    $this->db->join('menu', 'menu.id = sub_menu.menu_id', 'inner');

    $query = $this->db->get();
    return $query->num_rows();
  }

  public function getMenuById($id)
  {
    return $this->db->get_where('menu', ['id' => $id])->row_array();
  }

  public function getAllMenu($limit, $offset, $keyword)
  {
    if ($keyword) {
      $this->db->like('menu', $keyword);
    }

    $this->db->order_by('menu', 'ASC');

    $query = $this->db->get('menu', $limit, $offset);
    return $query->result_array();
  }

  //for submenu get menu
  public function getAllMenu_()
  {
    $query = $this->db->get('menu');
    return $query->result_array();
  }
  //for submenu get menu

  public function getSearchMenu($limit, $offset)
  {
    $keyword = $this->input->post('search', true);
    $this->db->or_like('menu', $keyword);

    return $this->db->get('menu', $limit, $offset)->result_array();
  }

  public function insertMenu($file)
  {
    $this->db->insert('menu', $file);
  }

  public function updateMenu($data)
  {
    $this->db->where('id', $this->input->post('id'));
    $this->db->update('menu', $data);
  }

  public function deleteMenu($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('menu');
  }

  public function getAllSubMenu($limit, $offset, $keyword)
  {
    if ($keyword) {
      $this->db->like('title', $keyword);
      $this->db->or_like('menu', $keyword);
      $this->db->or_like('url', $keyword);
      $this->db->or_like('icon', $keyword);
      $this->db->or_like('level', $keyword);
    }

    // $this->db->select('sub_menu.*, menu.menu');
    $this->db->select('*, sub_menu.id as submenu_id');
    $this->db->from('sub_menu');
    $this->db->join('menu', 'menu.id = sub_menu.menu_id');

    $this->db->order_by('title', 'ASC'); // must be specify which the part of table

    $this->db->limit($limit, $offset);
    $query = $this->db->get();
    return $query->result_array();
  }

  public function getAllSubMenu_()
  {
    $query = $this->db->get('sub_menu');
    return $query->result_array();
  }

  public function getTotalRow()
  {
    $this->db->select('COUNT(*)');
    $this->db->from('sub_menu');
    $this->db->join('menu', 'sub_menu.menu_id = menu.id');

    return $this->db->count_all_results();
  }

  public function getSubMenuById($id)
  {
    return $this->db->get_where('sub_menu', ['id' => $id])->row_array();
  }

  public function insertSubMenu($data)
  {
    $this->db->insert('sub_menu', $data);
  }

  public function updateSubMenu($data)
  {
    $this->db->where('id', $this->input->post('id'));
    $this->db->update('sub_menu', $data);
  }

  public function deleteSubMenu($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('sub_menu');
  }
}
  
  /* End of file Menu_model.php */
