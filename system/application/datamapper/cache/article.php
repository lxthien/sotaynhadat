<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
$cache = array (
  'table' => 'articles',
  'fields' => 
  array (
    0 => 'id',
    1 => 'old_id',
    2 => 'newscatalogue_id',
    3 => 'newstopic_id',
    4 => 'position',
    5 => 'pagi',
    6 => 'code',
    7 => 'title_vietnamese',
    8 => 'title_none',
    9 => 'short_vietnamese',
    10 => 'full_vietnamese',
    11 => 'title_english',
    12 => 'short_english',
    13 => 'full_english',
    14 => 'title_japanese',
    15 => 'short_japanese',
    16 => 'full_japanese',
    17 => 'image',
    18 => 'active',
    19 => 'recycle',
    20 => 'author',
    21 => 'show_comment',
    22 => 'catalogue_hot',
    23 => 'navigation',
    24 => 'menu_active',
    25 => 'hot',
    26 => 'dir',
    27 => 'view_count',
    28 => 'home_hot',
    29 => 'home_hot_position',
    30 => 'tag',
    31 => 'created',
    32 => 'updated',
    33 => 'file1',
    34 => 'file2',
    35 => 'file3',
    36 => 'file4',
    37 => 'file5',
    38 => 'clicks',
  ),
  'validation' => 
  array (
    'title_vietnamese' => 
    array (
      'label' => 'Tiêu đề tin tức',
      'rules' => 
      array (
        0 => 'trim',
        1 => 'required',
      ),
      'field' => 'title_vietnamese',
    ),
    'title_none' => 
    array (
      'label' => 'Tiêu đề không dấu',
      'rules' => 
      array (
        0 => 'trim',
        1 => 'required',
      ),
      'field' => 'title_none',
    ),
    'short_vietnamese' => 
    array (
      'label' => 'Tin ngắn',
      'rules' => 
      array (
        0 => 'trim',
        1 => 'required',
      ),
      'field' => 'short_vietnamese',
    ),
    'full_vietnamese' => 
    array (
      'label' => 'Tin đầy đủ',
      'rules' => 
      array (
        0 => 'trim',
        1 => 'required',
      ),
      'field' => 'full_vietnamese',
    ),
    'newscatalogue' => 
    array (
      'label' => 'Danh mục',
      'rules' => 
      array (
        0 => 'required',
      ),
      'field' => 'newscatalogue',
    ),
    'id' => 
    array (
      'field' => 'id',
      'rules' => 
      array (
        0 => 'integer',
      ),
    ),
    'old_id' => 
    array (
      'field' => 'old_id',
      'rules' => 
      array (
      ),
    ),
    'newscatalogue_id' => 
    array (
      'field' => 'newscatalogue_id',
      'rules' => 
      array (
      ),
    ),
    'newstopic_id' => 
    array (
      'field' => 'newstopic_id',
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
    'pagi' => 
    array (
      'field' => 'pagi',
      'rules' => 
      array (
      ),
    ),
    'code' => 
    array (
      'field' => 'code',
      'rules' => 
      array (
      ),
    ),
    'title_english' => 
    array (
      'field' => 'title_english',
      'rules' => 
      array (
      ),
    ),
    'short_english' => 
    array (
      'field' => 'short_english',
      'rules' => 
      array (
      ),
    ),
    'full_english' => 
    array (
      'field' => 'full_english',
      'rules' => 
      array (
      ),
    ),
    'title_japanese' => 
    array (
      'field' => 'title_japanese',
      'rules' => 
      array (
      ),
    ),
    'short_japanese' => 
    array (
      'field' => 'short_japanese',
      'rules' => 
      array (
      ),
    ),
    'full_japanese' => 
    array (
      'field' => 'full_japanese',
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
    'active' => 
    array (
      'field' => 'active',
      'rules' => 
      array (
      ),
    ),
    'recycle' => 
    array (
      'field' => 'recycle',
      'rules' => 
      array (
      ),
    ),
    'author' => 
    array (
      'field' => 'author',
      'rules' => 
      array (
      ),
    ),
    'show_comment' => 
    array (
      'field' => 'show_comment',
      'rules' => 
      array (
      ),
    ),
    'catalogue_hot' => 
    array (
      'field' => 'catalogue_hot',
      'rules' => 
      array (
      ),
    ),
    'navigation' => 
    array (
      'field' => 'navigation',
      'rules' => 
      array (
      ),
    ),
    'menu_active' => 
    array (
      'field' => 'menu_active',
      'rules' => 
      array (
      ),
    ),
    'hot' => 
    array (
      'field' => 'hot',
      'rules' => 
      array (
      ),
    ),
    'dir' => 
    array (
      'field' => 'dir',
      'rules' => 
      array (
      ),
    ),
    'view_count' => 
    array (
      'field' => 'view_count',
      'rules' => 
      array (
      ),
    ),
    'home_hot' => 
    array (
      'field' => 'home_hot',
      'rules' => 
      array (
      ),
    ),
    'home_hot_position' => 
    array (
      'field' => 'home_hot_position',
      'rules' => 
      array (
      ),
    ),
    'tag' => 
    array (
      'field' => 'tag',
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
    'file1' => 
    array (
      'field' => 'file1',
      'rules' => 
      array (
      ),
    ),
    'file2' => 
    array (
      'field' => 'file2',
      'rules' => 
      array (
      ),
    ),
    'file3' => 
    array (
      'field' => 'file3',
      'rules' => 
      array (
      ),
    ),
    'file4' => 
    array (
      'field' => 'file4',
      'rules' => 
      array (
      ),
    ),
    'file5' => 
    array (
      'field' => 'file5',
      'rules' => 
      array (
      ),
    ),
    'clicks' => 
    array (
      'field' => 'clicks',
      'rules' => 
      array (
      ),
    ),
    'newstopic' => 
    array (
      'field' => 'newstopic',
      'rules' => 
      array (
      ),
    ),
    'newscomment' => 
    array (
      'field' => 'newscomment',
      'rules' => 
      array (
      ),
    ),
  ),
  'has_one' => 
  array (
    'newscatalogue' => 
    array (
      'class' => 'newscatalogue',
      'other_field' => 'article',
      'join_self_as' => 'article',
      'join_other_as' => 'newscatalogue',
      'join_table' => '',
      'reciprocal' => false,
      'auto_populate' => NULL,
      'cascade_delete' => true,
    ),
    'newstopic' => 
    array (
      'class' => 'newstopic',
      'other_field' => 'article',
      'join_self_as' => 'article',
      'join_other_as' => 'newstopic',
      'join_table' => '',
      'reciprocal' => false,
      'auto_populate' => NULL,
      'cascade_delete' => true,
    ),
  ),
  'has_many' => 
  array (
    'newscomment' => 
    array (
      'class' => 'newscomment',
      'other_field' => 'article',
      'join_self_as' => 'article',
      'join_other_as' => 'newscomment',
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