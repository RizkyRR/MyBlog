<?php
function newCommentInfo()
{
  $ci = &get_instance();

  // $ci->db->select('product_name');
  $query = $ci->db->get_where('comment', 'is_reply = 0');
  return $query->result_array();
}

function newCommentCount()
{
  $ci = &get_instance();

  $ci->db->select('COUNT(*)');
  $ci->db->from('comment');
  $ci->db->where('is_reply = 0');
  return $ci->db->count_all_results();
}

function newMessageInfo()
{
  $ci = &get_instance();

  // $ci->db->select('product_name');
  $query = $ci->db->get_where('message', 'is_reply = 0');
  return $query->result_array();
}

function newMessageCount()
{
  $ci = &get_instance();

  $ci->db->select('COUNT(*)');
  $ci->db->from('message');
  $ci->db->where('is_reply = 0');
  return $ci->db->count_all_results();
}
