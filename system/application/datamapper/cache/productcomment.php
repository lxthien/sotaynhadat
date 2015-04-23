<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
$cache = array (
  'table' => 'productComments',
  'fields' => 
  array (
    0 => 'id',
    1 => 'product_id',
    2 => 'title',
    3 => 'name',
    4 => 'email',
    5 => 'content',
    6 => 'likes',
    7 => 'dislikes',
    8 => 'creationDate',
    9 => 'active',
    10 => 'new_comment',
    11 => 'created',
    12 => 'updated',
  ),
  'validation' => 
  array (
    'id' => 
    array (
      'field' => 'id',
      'rules' => 
      array (
        0 => 'integer',
      ),
    ),
    'product_id' => 
    array (
      'field' => 'product_id',
      'rules' => 
      array (
      ),
    ),
    'title' => 
    array (
      'field' => 'title',
      'rules' => 
      array (
      ),
    ),
    'name' => 
    array (
      'field' => 'name',
      'rules' => 
      array (
      ),
    ),
    'email' => 
    array (
      'field' => 'email',
      'rules' => 
      array (
      ),
    ),
    'content' => 
    array (
      'field' => 'content',
      'rules' => 
      array (
      ),
    ),
    'likes' => 
    array (
      'field' => 'likes',
      'rules' => 
      array (
      ),
    ),
    'dislikes' => 
    array (
      'field' => 'dislikes',
      'rules' => 
      array (
      ),
    ),
    'creationDate' => 
    array (
      'field' => 'creationDate',
      'rules' => 
      array (
      ),
    ),
    'active' => 
    array (
      'field' => 'active',
      'rules' => 
      array (
      ),
    ),
    'new_comment' => 
    array (
      'field' => 'new_comment',
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
    'product' => 
    array (
      'field' => 'product',
      'rules' => 
      array (
      ),
    ),
  ),
  'has_one' => 
  array (
    'product' => 
    array (
      'class' => 'product',
      'other_field' => 'productcomment',
      'join_self_as' => 'productcomment',
      'join_other_as' => 'product',
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