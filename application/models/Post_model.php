<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Post_model extends CI_Model
{

  // Category DataTables
  var $column_order = array(null, 'title', null, 'created_at', 'active', null); //set column field database for datatable orderable 
  var $column_search = array('blog_id', 'title', 'active', 'name'); //set column field database for datatable searchable
  var $order = array('created_at' => 'desc');  // default order

  private function _getPostDatatablesQuery()
  {
    $this->db->select('*, blog.slug as b_slug');
    $this->db->from('blog');
    $this->db->join('category', 'category.category_id = blog.category_id');

    $i = 0;
    foreach ($this->column_search as $post) { // loop column
      if (@$_POST['search']['value']) { // if datatable send POST for search
        if ($i === 0) { // first loop
          $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
          $this->db->like($post, $_POST['search']['value']);
        } else {
          $this->db->or_like($post, $_POST['search']['value']);
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

  function getPostDatatables()
  {
    $this->_getPostDatatablesQuery();
    if (@$_POST['length'] != -1)
      $this->db->limit(@$_POST['length'], @$_POST['start']);
    $query = $this->db->get();
    return $query->result();
  }

  function count_filtered()
  {
    $this->_getPostDatatablesQuery();
    $query = $this->db->get();
    return $query->num_rows();
  }

  function count_all()
  {
    $this->db->from('blog');
    return $this->db->count_all_results();
  }
  // Category DataTables

  public function getPostCountPage()
  {
    $this->db->select('*');
    $this->db->from('blog');
    $this->db->join('category', 'category.category_id = blog.category_id', 'inner');

    $query = $this->db->get();
    return $query->num_rows();
  }

  public function getShowPostCountPage()
  {
    $this->db->select('*');
    $this->db->from('blog');
    $this->db->join('category', 'category.category_id = blog.category_id', 'inner');
    $this->db->where('active', "Active");
    $this->db->where('pending', 0);

    $query = $this->db->get();
    return $query->num_rows();
  }

  public function getAllPost($limit, $offset, $keyword)
  {
    $this->db->select('*, blog.slug as b_slug');
    $this->db->from('blog');
    $this->db->join('category', 'category.category_id = blog.category_id');

    if ($keyword) {
      $this->db->like('blog_id', $keyword);
      $this->db->or_like('title', $keyword);
      $this->db->or_like('active', $keyword);
      $this->db->or_like('name', $keyword); // category
    }

    $this->db->order_by('created_at', 'DESC');

    $this->db->limit($limit, $offset);

    $query = $this->db->get();
    return $query->result_array();
  }

  public function getShowAllPost($limit, $offset)
  {
    $this->db->select('*, blog.slug as b_slug, category.slug as c_slug');
    $this->db->from('blog');
    $this->db->join('category', 'category.category_id = blog.category_id');
    $this->db->where('active', "Active");
    $this->db->where('pending', 0);

    $this->db->order_by('created_at', 'desc');

    $this->db->limit($limit, $offset);

    $query = $this->db->get();
    return $query->result_array();
  }

  public function getReadPost($c_slug, $b_slug)
  {
    $this->db->select('*, blog.slug as b_slug, category.slug as c_slug');
    $this->db->from('blog');
    $this->db->join('category', 'category.category_id = blog.category_id');
    $this->db->where('category.slug', $c_slug);
    $this->db->where('blog.slug', $b_slug);

    $query = $this->db->get();
    return $query->row_array();
  }

  public function getPost()
  {
    $this->db->order_by('title', 'ASC');
    $query = $this->db->get('blog');
    return $query->result_array();
  }

  public function getPostBySlug($slug)
  {
    return $this->db->get_where('blog', ['blog_views' => $slug])->row_array();
  }

  public function updateViewCounter($id, $data)
  {
    // increase view 
    $this->db->where('slug', $id);
    $this->db->update('blog', $data);
  }

  public function insert($data)
  {
    $this->db->insert('blog', $data);
  }

  public function getPostById($id)
  {
    return $this->db->get_where('blog', ['blog_id' => $id])->row_array();
  }

  public function update($id, $data)
  {
    $this->db->where('blog_id', $id);
    $this->db->update('blog', $data);
  }

  public function updateBySlug($slug, $data)
  {
    $this->db->where('slug', $slug);
    $this->db->update('blog', $data);
  }

  public function send($id, $data)
  {
    $this->db->where('blog_id', $id);
    $this->db->update('blog', $data);

    return $this->db->affected_rows();
  }

  public function delete($id)
  {
    $this->db->where('blog_id', $id);
    $this->db->delete('blog');

    return $this->db->affected_rows();
  }
}
  
  /* End of file Post_model.php */
