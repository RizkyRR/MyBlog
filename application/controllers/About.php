<?php

defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{

  public function index()
  {
    $info['title'] = "About Me";
    $info['subheading'] = "Hey, Hello";

    renderFrontTemplate('front-about/index', $info);
  }
}
  
  /* End of file About.php */
