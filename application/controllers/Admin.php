<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    checkSessionLog();
  }

  public function index()
  {
    $info['title']  = 'Dashboard';
    $info['user']   = $this->auth_model->getUserSession();

    // GET COUNT POST
    $info['count_post'] = $this->admin_model->getPostCount();

    // GET COUNT MESSAGE
    $info['count_message'] = $this->admin_model->getMessageCount();

    // GET COUNT COMMENT
    $info['count_comment'] = $this->admin_model->getCommentCount();

    // GET COUNT VISITOR
    // https://stackoverflow.com/questions/37222184/codeigniter-how-to-do-hit-counter-for-each-news[/link]
    // https://stackoverflow.com/questions/31684064/hit-counter-in-codeigniter
    // https://stackoverflow.com/questions/13780817/visit-counter-stored-to-a-file-using-codeigniter
    $info['count_visitor'] = $this->admin_model->geVisitorCount();

    renderTemplate('admins/index', $info);
  }
}
