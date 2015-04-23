<?php

class Emailsignup extends DataMapper
{
    public $table = "email_sign_ups";

    function __construct($id = null)
    {
        parent::__construct($id);
    }
}
