<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
$cache = array (
  'table' => 'showrooms',
  'fields' => 
  array (
    0 => 'id',
    1 => 'showroomcat_id',
    2 => 'name_vietnamese',
    3 => 'name_english',
    4 => 'created',
    5 => 'updated',
  ),
  'validation' => 
  array (
    'name' => 
    array (
      'label' => 'Tên showroom',
      'rules' => 
      array (
        0 => 'trim',
        'max_length' => 200,
      ),
      'field' => 'name',
    ),
    'id' => 
    array (
      'field' => 'id',
      'rules' => 
      array (
        0 => 'integer',
      ),
    ),
    'showroomcat_id' => 
    array (
      'field' => 'showroomcat_id',
      'rules' => 
      array (
      ),
    ),
    'name_vietnamese' => 
    array (
      'field' => 'name_vietnamese',
      'rules' => 
      array (
      ),
    ),
    'name_english' => 
    array (
      'field' => 'name_english',
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
    'showroomphoto' => 
    array (
      'field' => 'showroomphoto',
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
    'showroomphoto' => 
    array (
      'class' => 'showroomphoto',
      'other_field' => 'showroom',
      'join_self_as' => 'showroom',
      'join_other_as' => 'showroomphoto',
      'join_table' => '',
      'reciprocal' => false,
      'auto_populate' => NULL,
      'cascade_delete' => true,
    ),
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