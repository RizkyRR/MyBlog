<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{


  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $info['title'] = "Home";
    $info['subheading'] = "Try to Build Something with My Idealism";

    // PAGINATION
    $config['base_url']     = base_url() . 'blog';
    $config['total_rows']   = $this->db->count_all_results();
    $config['per_page']     = 5;
    $config['num_links']    = 5;

    // STYLING
    $config['full_tag_open']    = '<div class="clearfix">';
    $config['full_tag_close']   = '</div>';

    $config['next_link']        = 'Older Posts &rarr';
    $config['next_tag_open']    = '<a class="btn btn-primary float-right">';
    $config['next_tag_close']   = '</a>';

    $config['prev_link']        = 'Newest Posts &larr';
    $config['prev_tag_open']    = '<a class="btn btn-primary float-left">';
    $config['prev_tag_close']   = '</a>';
    $config['attributes']       = array('class' => 'clearfix');

    // GENERATE PAGE
    $this->pagination->initialize($config);

    $info['start']   = $this->uri->segment(3);
    $info['post']    = $this->Post_model->getShowAllPost($config['per_page'], $info['start']);

    $info['pagination'] = $this->pagination->create_links();

    renderFrontTemplate('front-home/index', $info);
  }
}
  
  /* End of file Home.php */
