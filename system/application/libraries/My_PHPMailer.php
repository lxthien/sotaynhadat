<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_PHPMailer {

    public function My_PHPMailer() {
    	error_reporting(0);
        require_once('PHPMailer/PHPMailerAutoload.php');
    }
    
}