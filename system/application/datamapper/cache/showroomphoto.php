<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
$cache = array (
  'table' => 'showroomphotos',
  'fields' => 
  array (
    0 => 'id',
    1 => 'showroom_id',
    2 => 'image',
    3 => 'name',
    4 => 'position',
    5 => 'created',
    6 => 'updated',
  ),
  'validation' => 
  array (
    'name' => 
    array (
      'label' => 'Tên hình ảnh',
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
    'showroom_id' => 
    array (
      'field' => 'showroom_id',
      'rules' => 
      array (
      ),
    ),
    'image' => 
    array (
      'field' => 'image',
      'rules' => 
      array (
      ),
    ),
    'position' => 
    array (
      'field' => 'position',
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
    'showroom' => 
    array (
      'field' => 'showroom',
      'rules' => 
      array (
      ),
    ),
  ),
  'has_one' => 
  array (
    'showroom' => 
    array (
      'class' => 'showroom',
      'other_field' => 'showroomphoto',
      'join_self_as' => 'showroomphoto',
      'join_other_as' => 'showroom',
      'join_table' => '',
      'reciprocal' => false,
      'auto_populate' => NULL,
      'cascade_delete' => true,
    ),
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