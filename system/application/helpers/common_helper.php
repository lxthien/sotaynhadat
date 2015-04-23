<?php
function count_static_by_area($url_type, $url_district, $url_areas){
    $CI =& get_instance();

    $estates = new Estate();
    $estates->order_by('isVip', 'desc');
    $estates->order_by('created', 'desc');
    $estates->where_related_estatetype('name_none', $url_type);
    $estates->where_related_estatedistrict('name_none', $url_district);
    $estates->where_related_estatearea('url', $url_areas);
    $estates->get();

    return $estates->result_count();
}

function count_static_by_price($url_type, $url_district, $url_price){
    $CI =& get_instance();

    $estates = new Estate();
    $estates->where_related_estatetype('name_none', $url_type);
    $estates->where_related_estatedistrict('name_none', $url_district);
    $estates->where_related_estateprice('url', $url_price);
    $estates->get();

    return $estates->result_count();
}


function display_static_by_area($estateareas, $o){
    $CI =& get_instance();

    $count = 0;
    foreach( $estateareas as $row ){

        if( count_static_by_area($o->estatetype->name_none, $o->estatedistrict->name_none, $row->url) >= 10 )
            $count ++;

    }

    return $count;
}

function display_static_by_price($estateprices, $o){
    $CI =& get_instance();

    $count = 0;
    foreach( $estateprices as $row ){

        if( count_static_by_price($o->estatetype->name_none, $o->estatedistrict->name_none, $row->url) >= 10 )
            $count ++;

    }

    return $count;
}

function count_estate_by_city($city_id){
    $CI =& get_instance();

    $estates = new Estate();
    $estates->where('estatecity_id', $city_id);
    $estates->where('active', 0);
    $estates->get();

    return $estates->result_count();
}

function count_estate_by_type_and_city($city_id, $estatetype_id){
    $CI =& get_instance();

    $estates = new Estate();
    $estates->where('estatecity_id', $city_id);
    $estates->where('estatetype_id', $estatetype_id);
    $estates->where(array('active' => 0, 'isFree' => 0));
    $estates->get();

    return $estates->result_count();
}


function redirect_admin()
{
    $CI =& get_instance();
    $redirect_link=$CI->session->flashdata('redirect_link');
    if($redirect_link==FALSE)
        redirect('admin');
    $l=strlen($redirect_link);
    $redirect_link=substr($redirect_link,1,$l-1);
    redirect($redirect_link);
}
function getpricetype($price_type){
    switch($price_type){
        case 1:
            return 'Triệu';
        case 2:
            return 'Tỷ';
        case 3:
            return 'Cây vàng';
        case 4:
            return 'USD';
        case 5:
            return 'USD/m2';
        case 6:
            return 'Nghìn/m2';
        case 7:
            return 'Triệu/m2';
        case 8:
            return 'Chỉ vàng/m2';
        case 9:
            return 'Cây vàng/m2';
        case 10:
            return 'Nghìn/tháng';
        case 11:
            return 'Triệu/tháng';
        case 12:
            return 'USD/tháng';
        case 13:
            return 'Triệu/năm';
        case 14:
            return 'Nghìn/m2/tháng';
        case 15:
            return 'Triệu/m2/tháng';
        case 16:
            return 'USD/m2/tháng';
        default:
            return '';
    }
}
function getrealuri($st)
{
    $l=strlen($st);
    $st=substr($st,1,$l-1);
    return $st;
}

function geturlfromuri($url){
    $arrUrl = explode('.', $url);
    if($arrUrl[1] == '' || $arrUrl[1] != 'html'){
        show_404();
    }
    return $arrUrl[0];
}

function encode_myuri($myuri)
{
    $l=strlen($myuri);
    $myuri=substr($myuri,1,$l-1);
    return str_replace('/',"&",$myuri);
}
function fencode_myuri($myuri)
{
    $l=strlen($myuri);
    $myuri=substr($myuri,1,$l-1);
    $myuri = str_replace('vietnamese/',"",$myuri);
    $myuri = str_replace('english/',"",$myuri);
    return str_replace('/',"&",$myuri);
}
function decode_myuri($myuri)
{
    return str_replace('&',"/",$myuri);
}
function back_admin()
{
    $CI =& get_instance();
    $redirect_link=$CI->session->flashdata('back_redirect_link');
    if($redirect_link==FALSE)
        redirect('admin');
    $l=strlen($redirect_link);
    $redirect_link=substr($redirect_link,1,$l-1);
    redirect($redirect_link);
}
function getconfigkey($key)
{
    $cauhinh = new Cauhinh();
    return $cauhinh->getconfig($key);
}

function setconfigkey($key,$value)
{
    $cauhinh = new Cauhinh();
    $cauhinh->setconfig($key,$value);
}
function filenameplus($st = NULL,$str)
{
    if($st == NULL) return "";
    $s=explode(".",$st);
    //echo $s;
    return $s[0]."_".$str.'.'.$s[1];
}
function getlanguage()
{
    $CI =& get_instance();
 	$l['en'] = "english";
	$l['vi'] = 'vietnamese';
	return $l[$CI->lang->lang()];
}

function gen_seo_url($val = NULL) {	
    $val = strtolower(convert_accented_characters($val));	
    $val = url_title($val);	
    return $val ;
}

function preview_text($text =NULL, $limit = NULL) {
	// TRIM TEXT
	$text = trim($text);

	// STRIP TAGS IF PREVIEW IS WITHOUT HTML
	//if ($TAGS == 0) $text = preg_replace('/\s\s+/', ' ', strip_tags($TEXT));

	// IF STRLEN IS SMALLER THAN LIMIT RETURN
	if (strlen(utf8_decode($text)) < $limit) return $text;
	else return substr($text, 0, $limit) . " ...";
	
}


function selectIt($in1,$in2)
{
    if($in1 == $in2)
        echo "selected='selected'";
}


function checkIt($in1,$in2)
{
    if($in1 == $in2)
        echo "checked='checked'";
}



function showIt($in1,$in2)
{
    if($in1 == $in2)
        echo "style='display:block'";
    else
        echo "style='display:none'";
}

function br2nl($html)
{
    return preg_replace('#<br\s*/?>#i', "\n", $html);
}