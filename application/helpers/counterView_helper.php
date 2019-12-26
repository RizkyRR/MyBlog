<?php defined('BASEPATH') or exit('No direct script access allowed.');

if (!function_exists('count_visitor')) {
  function count_visitor()
  {
    $filecounter = (APPPATH . 'logs/counterviews.txt');
    $visitor = file($filecounter);
    $visitor[0]++;
    $file = fopen($filecounter, 'w');
    fputs($file, $visitor[0]);
    fclose($file);
    return $visitor[0];
  }
}
