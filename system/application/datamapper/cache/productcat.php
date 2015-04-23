<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
$cache = array (
  'table' => 'productcats',
  'fields' => 
  array (
    0 => 'id',
    1 => 'position',
    2 => 'name_vietnamese',
    3 => 'name_english',
    4 => 'name_japanese',
    5 => 'logo',
    6 => 'url_vietnamese',
    7 => 'url_english',
    8 => 'parentcat_id',
    9 => 'seo_title_vietnamese',
    10 => 'seo_keyword_vietnamese',
    11 => 'seo_description_vietnamese',
    12 => 'seo_title_english',
    13 => 'seo_keyword_english',
    14 => 'seo_description_english',
    15 => 'created',
    16 => 'updated',
    17 => 'isShowInHot',
    18 => 'isShowInNew',
    19 => 'isShowInParentHot',
    20 => 'image',
    21 => 'numProductHomepage',
    22 => 'isShowLogo',
    23 => 'isHide',
    24 => 'tag',
    25 => 'facebook_image',
  ),
  'validation' => 
  array (
    'name' => 
    array (
      'label' => 'Tên danh mục',
      'rules' => 
      array (
        0 => 'trim',
        'max_length' => 200,
      ),
      'field' => 'name',
    ),
    'url' => 
    array (
      'label' => 'url',
      'rules' => 
      array (
        0 => 'trim',
        1 => 'unique',
      ),
      'field' => 'url',
    ),
    'id' => 
    array (
      'field' => 'id',
      'rules' => 
      array (
        0 => 'integer',
      ),
    ),
    'position' => 
    array (
      'field' => 'position',
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
    'name_japanese' => 
    array (
      'field' => 'name_japanese',
      'rules' => 
      array (
      ),
    ),
    'logo' => 
    array (
      'field' => 'logo',
      'rules' => 
      array (
      ),
    ),
    'url_vietnamese' => 
    array (
      'field' => 'url_vietnamese',
      'rules' => 
      array (
      ),
    ),
    'url_english' => 
    array (
      'field' => 'url_english',
      'rules' => 
      array (
      ),
    ),
    'parentcat_id' => 
    array (
      'field' => 'parentcat_id',
      'rules' => 
      array (
      ),
    ),
    'seo_title_vietnamese' => 
    array (
      'field' => 'seo_title_vietnamese',
      'rules' => 
      array (
      ),
    ),
    'seo_keyword_vietnamese' => 
    array (
      'field' => 'seo_keyword_vietnamese',
      'rules' => 
      array (
      ),
    ),
    'seo_description_vietnamese' => 
    array (
      'field' => 'seo_description_vietnamese',
      'rules' => 
      array (
      ),
    ),
    'seo_title_english' => 
    array (
      'field' => 'seo_title_english',
      'rules' => 
      array (
      ),
    ),
    'seo_keyword_english' => 
    array (
      'field' => 'seo_keyword_english',
      'rules' => 
      array (
      ),
    ),
    'seo_description_english' => 
    array (
      'field' => 'seo_description_english',
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
    'isShowInHot' => 
    array (
      'field' => 'isShowInHot',
      'rules' => 
      array (
      ),
    ),
    'isShowInNew' => 
    array (
      'field' => 'isShowInNew',
      'rules' => 
      array (
      ),
    ),
    'isShowInParentHot' => 
    array (
      'field' => 'isShowInParentHot',
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
    'numProductHomepage' => 
    array (
      'field' => 'numProductHomepage',
      'rules' => 
      array (
      ),
    ),
    'isShowLogo' => 
    array (
      'field' => 'isShowLogo',
      'rules' => 
      array (
      ),
    ),
    'isHide' => 
    array (
      'field' => 'isHide',
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
    'facebook_image' => 
    array (
      'field' => 'facebook_image',
      'rules' => 
      array (
      ),
    ),
    'parentcat' => 
    array (
      'field' => 'parentcat',
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
    'child' => 
    array (
      'field' => 'child',
      'rules' => 
      array (
      ),
    ),
    'productcatspec' => 
    array (
      'field' => 'productcatspec',
      'rules' => 
      array (
      ),
    ),
    'producthome' => 
    array (
      'field' => 'producthome',
      'rules' => 
      array (
      ),
    ),
  ),
  'has_one' => 
  array (
    'parentcat' => 
    array (
      'class' => 'productcat',
      'other_field' => 'child',
      'join_self_as' => 'child',
      'join_other_as' => 'parentcat',
      'join_table' => '',
      'reciprocal' => false,
      'auto_populate' => NULL,
      'cascade_delete' => true,
    ),
  ),
  'has_many' => 
  array (
    'child' => 
    array (
      'class' => 'productcat',
      'other_field' => 'parentcat',
      'join_self_as' => 'parentcat',
      'join_other_as' => 'child',
      'join_table' => '',
      'reciprocal' => false,
      'auto_populate' => NULL,
      'cascade_delete' => true,
    ),
    'product' => 
    array (
      'class' => 'product',
      'other_field' => 'productcat',
      'join_self_as' => 'productcat',
      'join_other_as' => 'product',
      'join_table' => '',
      'reciprocal' => false,
      'auto_populate' => NULL,
      'cascade_delete' => true,
    ),
    'productcatspec' => 
    array (
      'class' => 'productcatspec',
      'other_field' => 'productcat',
      'join_self_as' => 'productcat',
      'join_other_as' => 'productcatspec',
      'join_table' => '',
      'reciprocal' => false,
      'auto_populate' => NULL,
      'cascade_delete' => true,
    ),
    'producthome' => 
    array (
      'class' => 'producthome',
      'other_field' => 'productcat',
      'join_self_as' => 'productcat',
      'join_other_as' => 'producthome',
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