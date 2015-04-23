<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
$cache = array (
  'table' => 'contact',
  'fields' => 
  array (
    0 => 'id',
    1 => 'name',
    2 => 'title',
    3 => 'hotline',
    4 => 'phone',
    5 => 'email',
    6 => 'content',
    7 => 'created',
    8 => 'updated',
  ),
  'validation' => 
  array (
    'title' => 
    array (
      'label' => 'Tiêu đề',
      'rules' => 
      array (
        0 => 'trim',
        1 => 'required',
      ),
      'field' => 'title',
    ),
    'name' => 
    array (
      'label' => 'Tên',
      'rules' => 
      array (
        0 => 'trim',
        'max_length' => 200,
        1 => 'required',
      ),
      'field' => 'name',
    ),
    'email' => 
    array (
      'label' => 'Địa chỉ email',
      'rules' => 
      array (
        0 => 'trim',
        1 => 'required',
        2 => 'email',
      ),
      'field' => 'email',
    ),
    'content' => 
    array (
      'label' => 'Nội dung',
      'rules' => 
      array (
        0 => 'trim',
        1 => 'required',
      ),
      'field' => 'content',
    ),
    'id' => 
    array (
      'field' => 'id',
      'rules' => 
      array (
        0 => 'integer',
      ),
    ),
    'hotline' => 
    array (
      'field' => 'hotline',
      'rules' => 
      array (
      ),
    ),
    'phone' => 
    array (
      'field' => 'phone',
      'rules' => 
      array (
      ),
    ),
    'created' => 
    array (
      'field' => 'created',
      'rules' => 
      array (
      ),
    ),
    'updated' => 
    array (
      'field' => 'updated',
      'rules' => 
      array (
      ),
    ),
  ),
  'has_one' => 
  array (
  ),
  'has_many' => 
  array (
  ),
  '_field_tracking' => 
  array (
    'get_rules' => 
    array (
    ),
    'matches' => 
    array (
    ),
    'intval' => 
    array (
      0 => 'id',
    ),
  ),
);