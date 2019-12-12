<?php
function checkSessionLog()
{
  $ci = &get_instance();

  if (!$ci->session->userdata('email')) {
    redirect('auth');
  } else {
    $ci->session->userdata('email');

    // Karena ngecek http://localhost/sensus/menu "Menu"-nya segment = 1, 
    // Kalau http://localhost/sensus/menu/add "add"nya segment = 2 dst
    $menu = $ci->uri->segment(1);

    //  Metode ini hanya menjawab jika submenu banyak
    $ci->db->get_where('sub_menu', ['level' => $menu])->row_array();
  }
}
