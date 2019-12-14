<?php
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
