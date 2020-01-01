<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

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

  // Read Post 
  private function view_count($b_slug)
  {
    $slug = $this->Post_model->getPostBySlug($b_slug);
    $check_visitor = $this->input->cookie(urldecode($b_slug), false);
    $ip = $this->input->ip_address();

    if ($check_visitor == false) {
      $cookie = [
        'name' => urldecode($b_slug),
        'value' => "$ip",
        'expire' => time() + 7200,
        'secure' => false
      ];

      $this->input->set_cookie($cookie);

      $getPrevViews = $slug['blog_views'];

      $data = [
        'blog_views' => $getPrevViews + 1
      ];

      $this->Post_model->updateViewCounter(urldecode($b_slug), $data);
    }
  }

  public function read($c_slug = null, $b_slug = null)
  {
    if ($c_slug == null || $b_slug == null) {
      redirect('home', 'refresh');
    }

    $info['read'] = $this->Post_model->getReadPost($c_slug, $b_slug);
    $info['title'] = $info['read']['title'];

    $data = [
      'blog_views' => $info['read']['blog_views'] + 1
    ];

    // $this->Post_model->updateBySlug($b_slug, $data);

    $this->view_count($b_slug);

    renderFrontTemplate('posts/read-post', $info);
  }
}
  
  /* End of file Home.php */
