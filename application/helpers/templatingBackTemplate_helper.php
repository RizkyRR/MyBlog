<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
function renderTemplate($page = null, $data = array())
{
  $ci = &get_instance();

  $data['profile'] = $ci->Profile_model->getProfileById(1);

  $ci->load->view('back-templates/header', $data);
  $ci->load->view('back-templates/sidebar', $data);
  $ci->load->view('back-templates/topbar', $data);
  $ci->load->view($page, $data);
  $ci->load->view('back-templates/footer');
}

function renderTemplateDetail($page = null, $p_detail = null, $data = array())
{
  $ci = &get_instance();

  $data['profile'] = $ci->Profile_model->getProfileById(1);

  $ci->load->view('back-templates/header', $data);
  $ci->load->view('back-templates/sidebar', $data);
  $ci->load->view('back-templates/topbar', $data);
  $ci->load->view($page, $data);
  $ci->load->view($p_detail, $data);
  $ci->load->view('back-templates/footer');
}

function renderFrontTemplate($page = null, $data = array())
{
  $ci = &get_instance();

  $data['profile'] = $ci->Profile_model->getProfileById(1);
  $data['link_profile'] = $ci->Profile_model->getLinkProfile();

  $ci->load->view('front-templates/header', $data);
  $ci->load->view('front-templates/navbar', $data);
  $ci->load->view($page, $data);
  $ci->load->view('front-templates/footer', $data);
}
