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
    $info['user']   = $this->Auth_model->getUserSession();

    // GET EARNINGS MONTHLY https://stackoverflow.com/questions/16717274/calculate-monthly-totals-using-php


    // GET EARNINGS ANNUAL / A YEAR

    // GET USER COUNT

    // GET ONLINE USER 

    $this->load->view('back-templates/header', $info);
    $this->load->view('back-templates/sidebar', $info);
    $this->load->view('back-templates/topbar', $info);
    $this->load->view('admins/index', $info);
    $this->load->view('back-templates/footer');
  }
}
