<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
| 	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['scaffolding_trigger'] = 'scaffolding';
|
| This route lets you set a "secret" word that will trigger the
| scaffolding feature for added security. Note: Scaffolding must be
| enabled in the controller in which you intend to use it.   The reserved 
| routes must come before any wildcard or regular expression routes.
|
*/
//redirect for old website to new



$route['default_controller'] 	            = "home";
$route['scaffolding_trigger'] 	            = "";
$route['admin']					            = "admin/login";

$route['media/(:any)']                      = 'media/resize/$1';

$route['dang-tin-rao-vat-nha-dat-mien-phi']                        = 'festates/postFree';

$route['thong-ke-theo-dien-tich/(:any)/(:any)']    = "festates/staticByAreas";
$route['thong-ke-theo-muc-gia/(:any)/(:any)']      = "festates/staticByPrices";

//router for page single
$route['gioi-thieu.html']                   = "home/pagesigle/$1";
$route['quy-dinh-su-dung.html']             = "home/pagesigle/$1";
$route['huong-dan-dang-tin.html']           = "home/postGuide";
$route['bang-gia-quang-cao-tin-vip.html']   = "home/pagesigle/$1";
$route['site-map.html']                     = "home/sitemap";

$route['tim-kiem/(:num)']                   = "home/searchNews/$1";
$route['tim-kiem']                          = "home/searchNews";

$route['lien-he.html']                      = "fcontact";
$route['dang-tin-vip.html']                 = "fcontact/contact";


$route['kiem-tra-email']                    = "fuser/emailCheck";
$route['kiem-tra-email-sign-up']            = "fuser/emailCheckSignup";
$route['email-sign-up']                     = "fuser/emailSignup";
$route['kiem-tra-account']                  = "fuser/usernameCheck";

// router for company
$route['doanh-nghiep/(:any)/(:num)']        = "fcompany/cat/$2";
$route['doanh-nghiep/(:any)/(:any)']        = "fcompany/detail/$3";
$route['doanh-nghiep/(:any)']               = "fcompany/cat/$1";

// router for news
$route['tin-tuc']                           = "fnews";
$route['tin-tuc/(:any)/(:num)']             = "fnews/cat/$2";
$route['tin-tuc/(:any)/(:any)']             = "fnews/detail/$3";
$route['tin-tuc/(:any)']                    = "fnews/cat/$1";

// router for cam nang
$route['cam-nang']                          = "fguides";
$route['cam-nang/(:any)/(:num)']            = "fguides/cat/$2";
$route['cam-nang/(:any)/(:any)']            = "fguides/detail/$3";
$route['cam-nang/(:any)']                   = "fguides/cat/$1";


$route['du-an']                             = "fprojects";
$route['du-an/(:any)/(:num)']               = "fprojects/cat/$2";
$route['du-an/(:any)/(:any)']               = "fprojects/detail/$3";
$route['du-an/(:any)']                      = "fprojects/cat/$1";
$route['tim-kiem-du-an']                    = "fprojects/searchProject";


$route['dang-ky']                           = "fuser/regiter";
$route['dang-nhap']                         = "fuser/login";
$route['quen-mat-khau']                     = "fuser/forgetPassword";
$route['dang-xuat']                         = "fuser/logout";
$route['trang-ca-nhan']                     = "fuser/account";
$route['doi-mat-khau']                      = "fuser/changePassword";
$route['thay-doi-thong-tin']                = "fuser/changeAccount";
$route['dang-tin']                          = "fuser/post";
//$route['chinh-sua-tin-da-dang/(:num)']      = "fuser/listPostByUser/$1";
$route['chinh-sua-tin-da-dang']             = "fuser/listPostByUser";
$route['chinh-sua-tin/(:num)']              = "fuser/editPost/$1";
$route['xoa-tin/(:num)']                    = "fuser/deletePost/$1";

$route['the-gioi-doanh-nhan/(:num)']        = "fnewsother/index";
$route['the-gioi-doanh-nhan/(:any)']        = "fnewsother/detail/$1";
$route['the-gioi-doanh-nhan']               = "fnewsother/index";

$route['tu-van-luat/(:num)']                = "fnewsother/index";
$route['tu-van-luat/(:any)']                = "fnewsother/detail/$1";
$route['tu-van-luat']                       = "fnewsother/index";

$route['tin-du-an/(:num)']                  = "fnewsother/index";
$route['tin-du-an/(:any)']                  = "fnewsother/detail/$1";
$route['tin-du-an']                         = "fnewsother/index";

// router for tag
$route['^tags/(:any)']               		= "home/tags/$1";
$route['^tags-dang-tin/(:any)']             = "home/tagsDangTin/$1";
$route['^tags']                      		= "home/tags";

// Router pagination
// Ex: http://sotaynhadat.vn/ban-nha-mat-pho/tp-vung-tau/ba-ria-vung-tau/2
$route['ban-dat/(:any)/(:any)/(:num)']                         = "festates/getEstateByTypeDistrict";
$route['ban-nha-rieng/(:any)/(:any)/(:num)']                   = "festates/getEstateByTypeDistrict";
$route['ban-dat-nen-du-an/(:any)/(:any)/(:num)']               = "festates/getEstateByTypeDistrict";
$route['ban-nha-mat-pho/(:any)/(:any)/(:num)']                 = "festates/getEstateByTypeDistrict";
$route['ban-can-ho-chung-cu/(:any)/(:any)/(:num)']             = "festates/getEstateByTypeDistrict";
$route['ban-biet-thu-nha-lien-ke/(:any)/(:any)/(:num)']        = "festates/getEstateByTypeDistrict";
$route['ban-nha-hang-khach-san/(:any)/(:any)/(:num)']          = "festates/getEstateByTypeDistrict";
$route['ban-nha-kho-nha-xuong/(:any)/(:any)/(:num)']           = "festates/getEstateByTypeDistrict";
$route['ban-dat-lam-du-an/(:any)/(:any)/(:num)']               = "festates/getEstateByTypeDistrict";
$route['ban-loai-bat-dong-san-khac/(:any)/(:any)/(:num)']      = "festates/getEstateByTypeDistrict";

$route['cho-thue-phong-tro-nha-tro/(:any)/(:any)/(:num)']      = "festates/getEstateByTypeDistrict";
$route['cho-thue-dat/(:any)/(:any)/(:num)']                    = "festates/getEstateByTypeDistrict";
$route['cho-thue-nha-rieng/(:any)/(:any)/(:num)']              = "festates/getEstateByTypeDistrict";
$route['cho-thue-can-ho-chung-cu/(:any)/(:any)/(:num)']        = "festates/getEstateByTypeDistrict";
$route['cho-thue-mat-bang-kinh-doanh/(:any)/(:any)/(:num)']    = "festates/getEstateByTypeDistrict";
$route['cho-thue-van-phong/(:any)/(:any)/(:num)']              = "festates/getEstateByTypeDistrict";
$route['cho-thue-biet-thu/(:any)/(:any)/(:num)']               = "festates/getEstateByTypeDistrict";
$route['cho-thue-nha-hang-khach-san/(:any)/(:any)/(:num)']     = "festates/getEstateByTypeDistrict";
$route['cho-thue-dat-xuong-kho-bai/(:any)/(:any)/(:num)']      = "festates/getEstateByTypeDistrict";
$route['cho-thue-loai-bat-dong-san-khac/(:any)/(:any)/(:num)'] = "festates/getEstateByTypeDistrict";
$route['sang-nhuong-quan-cua-hang/(:any)/(:any)/(:num)'] 	   = "festates/getEstateByTypeDistrict";

// ------------------------------------------------------------------------------------------


$route['nha-dat-ban-(:any)/(:any)/(:num)']              = "festates/getEstateByAddress";
$route['nha-dat-cho-thue-(:any)/(:any)/(:num)']         = "festates/getEstateByAddress";
$route['nhu-cau-nha-dat-(:any)/(:any)/(:num)']          = "festates/getEstateByAddress";

$route['nha-dat-ban-(:any)/(:num)']             = "festates/getEstateByCity";
$route['nha-dat-cho-thue-(:any)/(:num)']        = "festates/getEstateByCity";
$route['nhu-cau-nha-dat-(:any)/(:num)']         = "festates/getEstateByCity";

$route['nha-dat-ban-(:any)/(:any)']             = "festates/getEstateByAddress";
$route['nha-dat-cho-thue-(:any)/(:any)']        = "festates/getEstateByAddress";
$route['nhu-cau-nha-dat-(:any)/(:any)']         = "festates/getEstateByAddress";


// Phân trang menu cấp 2 của Tỉnh/TP
$route['ban-dat/(:any)/(:num)']                         = "festates/estateByTypeCity";
$route['ban-nha-rieng/(:any)/(:num)']                   = "festates/estateByTypeCity";
$route['ban-dat-nen-du-an/(:any)/(:num)']               = "festates/estateByTypeCity";
$route['ban-nha-mat-pho/(:any)/(:num)']                 = "festates/estateByTypeCity";
$route['ban-can-ho-chung-cu/(:any)/(:num)']             = "festates/estateByTypeCity";
$route['ban-biet-thu-nha-lien-ke/(:any)/(:num)']        = "festates/estateByTypeCity";
$route['ban-nha-hang-khach-san/(:any)/(:num)']          = "festates/estateByTypeCity";
$route['ban-nha-kho-nha-xuong/(:any)/(:num)']           = "festates/estateByTypeCity";
$route['ban-dat-lam-du-an/(:any)/(:num)']               = "festates/estateByTypeCity";
$route['ban-loai-bat-dong-san-khac/(:any)/(:num)']      = "festates/estateByTypeCity";

$route['cho-thue-phong-tro-nha-tro/(:any)/(:num)']             = "festates/estateByTypeCity";
$route['cho-thue-dat/(:any)/(:num)']                           = "festates/estateByTypeCity";
$route['cho-thue-nha-rieng/(:any)/(:num)']                     = "festates/estateByTypeCity";
$route['cho-thue-can-ho-chung-cu/(:any)/(:num)']               = "festates/estateByTypeCity";
$route['cho-thue-mat-bang-kinh-doanh/(:any)/(:num)']           = "festates/estateByTypeCity";
$route['cho-thue-van-phong/(:any)/(:num)']                     = "festates/estateByTypeCity";
$route['cho-thue-biet-thu/(:any)/(:num)']                      = "festates/estateByTypeCity";
$route['cho-thue-nha-hang-khach-san/(:any)/(:num)']            = "festates/estateByTypeCity";
$route['cho-thue-dat-xuong-kho-bai/(:any)/(:num)']             = "festates/estateByTypeCity";
$route['cho-thue-loai-bat-dong-san-khac/(:any)/(:num)']        = "festates/estateByTypeCity";
$route['sang-nhuong-quan-cua-hang/(:any)/(:num)']              = "festates/estateByTypeCity";


//router for menu level 2
$route['ban-dat/(:any)/(:any)']                         = "festates/getEstateByTypeDistrict";
$route['ban-nha-rieng/(:any)/(:any)']                   = "festates/getEstateByTypeDistrict";
$route['ban-dat-nen-du-an/(:any)/(:any)']               = "festates/getEstateByTypeDistrict";
$route['ban-nha-mat-pho/(:any)/(:any)']                 = "festates/getEstateByTypeDistrict";
$route['ban-can-ho-chung-cu/(:any)/(:any)']             = "festates/getEstateByTypeDistrict";
$route['ban-biet-thu-nha-lien-ke/(:any)/(:any)']        = "festates/getEstateByTypeDistrict";
$route['ban-nha-hang-khach-san/(:any)/(:any)']          = "festates/getEstateByTypeDistrict";
$route['ban-nha-kho-nha-xuong/(:any)/(:any)']           = "festates/getEstateByTypeDistrict";
$route['ban-dat-lam-du-an/(:any)/(:any)']               = "festates/getEstateByTypeDistrict";
$route['ban-loai-bat-dong-san-khac/(:any)/(:any)']      = "festates/getEstateByTypeDistrict";

$route['cho-thue-phong-tro-nha-tro/(:any)/(:any)']      = "festates/getEstateByTypeDistrict";
$route['cho-thue-dat/(:any)/(:any)']                    = "festates/getEstateByTypeDistrict";
$route['cho-thue-nha-rieng/(:any)/(:any)']              = "festates/getEstateByTypeDistrict";
$route['cho-thue-can-ho-chung-cu/(:any)/(:any)']        = "festates/getEstateByTypeDistrict";
$route['cho-thue-mat-bang-kinh-doanh/(:any)/(:any)']    = "festates/getEstateByTypeDistrict";
$route['cho-thue-van-phong/(:any)/(:any)']              = "festates/getEstateByTypeDistrict";
$route['cho-thue-biet-thu/(:any)/(:any)']               = "festates/getEstateByTypeDistrict";
$route['cho-thue-nha-hang-khach-san/(:any)/(:any)']     = "festates/getEstateByTypeDistrict";
$route['cho-thue-dat-xuong-kho-bai/(:any)/(:any)']      = "festates/getEstateByTypeDistrict";
$route['cho-thue-loai-bat-dong-san-khac/(:any)/(:any)'] = "festates/getEstateByTypeDistrict";
$route['sang-nhuong-quan-cua-hang/(:any)/(:any)']       = "festates/getEstateByTypeDistrict";


// Trang menu cấp 2 của Tỉnh/TP
$route['ban-dat/(:any)']                                = "festates/estateByTypeCity";
$route['ban-nha-rieng/(:any)']                          = "festates/estateByTypeCity";
$route['ban-dat-nen-du-an/(:any)']                      = "festates/estateByTypeCity";
$route['ban-nha-mat-pho/(:any)']                        = "festates/estateByTypeCity";
$route['ban-can-ho-chung-cu/(:any)']                    = "festates/estateByTypeCity";
$route['ban-biet-thu-nha-lien-ke/(:any)']               = "festates/estateByTypeCity";
$route['ban-nha-hang-khach-san/(:any)']                 = "festates/estateByTypeCity";
$route['ban-nha-kho-nha-xuong/(:any)']                  = "festates/estateByTypeCity";
$route['ban-dat-lam-du-an/(:any)']                      = "festates/estateByTypeCity";
$route['ban-loai-bat-dong-san-khac/(:any)']             = "festates/estateByTypeCity";

$route['cho-thue-phong-tro-nha-tro/(:any)']             = "festates/estateByTypeCity";
$route['cho-thue-dat/(:any)']                           = "festates/estateByTypeCity";
$route['cho-thue-nha-rieng/(:any)']                     = "festates/estateByTypeCity";
$route['cho-thue-can-ho-chung-cu/(:any)']               = "festates/estateByTypeCity";
$route['cho-thue-mat-bang-kinh-doanh/(:any)']           = "festates/estateByTypeCity";
$route['cho-thue-van-phong/(:any)']                     = "festates/estateByTypeCity";
$route['cho-thue-biet-thu/(:any)']                      = "festates/estateByTypeCity";
$route['cho-thue-nha-hang-khach-san/(:any)']            = "festates/estateByTypeCity";
$route['cho-thue-dat-xuong-kho-bai/(:any)']             = "festates/estateByTypeCity";
$route['cho-thue-loai-bat-dong-san-khac/(:any)']        = "festates/estateByTypeCity";
$route['sang-nhuong-quan-cua-hang/(:any)']              = "festates/estateByTypeCity";



$route['can-mua/(:any)/(:any)']                 = "festates/getEstateByTypeDistrict";
$route['can-thue/(:any)/(:any)']                = "festates/getEstateByTypeDistrict";
$route['hop-tac-dau-tu/(:any)/(:any)']          = "festates/getEstateByTypeDistrict";

//Router for estate follow city
$route['nha-dat-ban-(:any)']                    = "festates/getEstateByCity";
$route['nha-dat-cho-thue-(:any)']               = "festates/getEstateByCity";
$route['nhu-cau-nha-dat-(:any)']                = "festates/getEstateByCity";


// router default
$route['admin/(:any)']				        ="admin/$1";
$route['nha-dat-ban/(:any)/(:num)']         = "festates/cat/$2";
$route['nha-dat-cho-thue/(:any)/(:num)']    = "festates/cat/$2";
$route['nhu-cau-nha-dat/(:any)/(:num)']     = "festates/cat/$2";
$route['(:any)/(:any)/(:any)']              = "fuser/postDetail/$1";

// router for estates
$route['nha-dat-ban']                       = "festates";
$route['nha-dat-ban/(:num)']                = "festates";
$route['nha-dat-ban/(:any)']                = "festates/cat/$1";

$route['nha-dat-cho-thue']                  = "festates";
$route['nha-dat-cho-thue/(:num)']           = "festates";
$route['nha-dat-cho-thue/(:any)']           = "festates/cat/$1";

$route['nhu-cau-nha-dat']                   = "festates";
$route['nhu-cau-nha-dat/(:num)']            = "festates";
$route['nhu-cau-nha-dat/(:any)']            = "festates/cat/$1";


$route['tim-kiem-bat-dong-san(:any)']               = "festates/searchView/$1";
$route['tim-kiem-bat-dong-san(:any)/(:num)']        = "festates/searchView/$1";
$route['tim-kiem-bat-dong-san']                     = "festates/search";

/* End of file routes.php */
/* Location: ./system/application/config/routes.php */