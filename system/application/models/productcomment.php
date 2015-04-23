<?php
class Productcomment extends DataMapper{
    public $table = "productComments";
    // --------------------------------------------------------------------
	// Relationships
	// --------------------------------------------------------------------
    public $has_one=array(
        'product'
    );
    
    function __construct($id=NULL)
    {
        parent::__construct($id);
    }
}
?>