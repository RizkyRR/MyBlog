<?php

function sidebarMenu()
{
  $ci = &get_instance();

  $ci->db->order_by('id', 'ASC');

  $query = $ci->db->get('menu');
  return $query->result_array();
}

function sidebarSubMenu($menu_id)
{
  $ci = &get_instance();

  $ci->db->where('is_active', 1);
  $ci->db->where('menu_id', $menu_id);

  $ci->db->order_by('title', 'ASC');

  $query = $ci->db->get('sub_menu');
  return $query->result_array();
}
