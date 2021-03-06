<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Category_model extends CI_Model
{
  // Category DataTables
  var $column_order = array(null, 'name', 'slug', 'visible'); //set column field database for datatable orderable 
  var $column_search = array('name', 'slug', 'visible'); //set column field database for datatable searchable
  var $order = array('category_id' => 'desc');  // default order

  private function _getCategoryDatatablesQuery()
  {
    $this->db->select('*');
    $this->db->from('category');
    $this->db->where('category.category_id > 0');

    $i = 0;
    foreach ($this->column_search as $category) { // loop column
      if (@$_POST['search']['value']) { // if datatable send POST for search
        if ($i === 0) { // first loop
          $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
          $this->db->like($category, $_POST['search']['value']);
        } else {
          $this->db->or_like($category, $_POST['search']['value']);
        }
        if (count($this->column_search) - 1 == $i) //last loop
          $this->db->group_end(); //close bracket
      }
      $i++;
    }

    if (isset($_POST['order'])) { // here order processing
      $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
    } else if (isset($this->order)) {
      $order = $this->order;
      $this->db->order_by(key($order), $order[key($order)]);
    }
  }

  function getCategoryDatatables()
  {
    $this->_getCategoryDatatablesQuery();
    if (@$_POST['length'] != -1)
      $this->db->limit(@$_POST['length'], @$_POST['start']);
    $query = $this->db->get();
    return $query->result();
  }

  function count_filtered()
  {
    $this->_getCategoryDatatablesQuery();
    $query = $this->db->get();
    return $query->num_rows();
  }

  function count_all()
  {
    $this->db->from('category');
    return $this->db->count_all_results();
  }
  // Category DataTables

  public function getCountPage()
  {
    $query = $this->db->get('category');
    return $query->num_rows();
  }

  public function getAllCategory($limit, $offset, $keyword)
  {
    if ($keyword) {
      $this->db->like('category_id', $keyword);
      $this->db->or_like('name', $keyword);
    }

    $this->db->order_by('name', 'ASC');

    $query = $this->db->get('category', $limit, $offset);
    return $query->result_array();
  }

  public function getCategory()
  {
    $this->db->order_by('name', 'ASC');
    $query = $this->db->get('category');
    return $query->result_array();
  }

  public function insert($data)
  {
    $this->db->insert('category', $data);

    return $this->db->insert_id();
  }

  public function getCategoryById($id)
  {
    return $this->db->get_where('category', ['category_id' => $id])->row_array();
  }

  public function update($id, $data)
  {
    $this->db->where('category_id', $id);
    $this->db->update('category', $data);

    return $this->db->affected_rows();
  }

  public function delete($id)
  {
    $this->db->where('category_id', $id);
    $this->db->delete('category');
  }
}
  
  /* End of file Category_model.php */
