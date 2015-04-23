<?php 
class Syn extends Controller{
    function syn(){
        parent::Controller();
    }
    
    function getData()
    {
        if($_SERVER['REQUEST_METHOD']=='POST'){
            //load visitedProduct
            
            //load userinfo bar
            $output['visitedProduct'] = $this->getVisitedProduct();
            $output['userInfo'] = $this->getUserInfo();
            
            //load product comment and add product to visited list
            $productId = $this->input->post('productId');
            
            if($productId != 0)
            {
                $output['productComment'] = $this->getProductComment($productId);
                $this->addProductCookie($productId);
            }
            //load compare product
            $compareCookie = $this->input->cookie('compareProduct');
            $compareArray = explode(",",$compareCookie);
            array_push($compareArray,0);
            
            $compareProduct = new product();
            $compareProduct->where_in('id',$compareArray);
            $compareProduct->get_iterated();
            $this->compareProduct = $compareProduct;
            $this->compareArray = $compareArray;
            $dis['base_url'] = base_url();
            $output['compareProduct'] =  $this->load->view('front/includes/compareProductSmall',$dis,true);
            $output['compareArray'] = $compareArray;
            
            
            //get number of cart item
            $output['numCart'] = $this->countCartItem();
            
            
            $this->output->set_header('Content-type: application/json');
            $this->output->set_output(json_encode($output));
        }else
        {
            show_404();    
        }
        
    }
    //main function 
    
    
    function countCartItem()
    {
        $cart = $this->input->cookie('userCart');
        
        $cartDetail = json_decode($cart,true);
            
        return  count($cartDetail);
    }
    
    function getProductComment($productId)
    {
        $comment = new Productcomment();
        $comment->where('product_id',$productId);
        $comment->order_by('creationDate',"asc");
        $comment->get_iterated();
        $dis3['comment'] = $comment;
        $dis3['base_url'] = base_url();
        return $this->load->view('front/product/product_comment',$dis3,TRUE);
    }
    
    function getVisitedProduct()
    {
        $dis1['visitedProduct'] = $this->getVisitedProductFromCookie();
        $dis1['base_url']= base_url();
        return $this->load->view('front/syn/visitedProduct',$dis1,TRUE);
    }
    
    function getUserInfo()
    {
        $dis2['base_url'] = base_url();
        $this->userLoginFlag = 0;
        $userLogin = $this->session->userdata('userLogin');
        $userToken = $this->session->userdata('userToken');
        $customer = new Customer();
        $customer->get_by_username($userLogin);
        
        if($customer->exists() && md5($customer->id) == trim($userToken) )
        {
            
            $loginUsername = $customer->username;
            $this->customer = $customer;
            if($this->session->userdata('userloginFlag') == "1")
            {
                $this->userLoginFlag = 1;
                $this->session->set_userdata('userloginFlag',"0");
            }
        } 
        else
        {
            $loginUsername = "";
        }
        
        
        
        $this->loginUsername = $loginUsername;
        $this->loginUser = $customer;
        
        return $this->load->view('front/syn/userInfo',$dis2,TRUE);
    }
    
    
    
    
    
    //util
    
    function getVisitedProductFromCookie()
    {
        $cartDetail = $this->getProductCookie();
        array_push($cartDetail,0);
        $product = new Product();
        $product->where_in('id',$cartDetail);
        $product->get_iterated();
        return $product;
    }
    
    function addProductCookie($productId)
    {
        $cartDetail = $this->getProductCookie();
        
       
        if(!in_array($productId,$cartDetail))
        {
            array_push($cartDetail,$productId);
        }
        if(count($cartDetail) > 10)
        {
            array_shift($cartDetail);
        }
        setcookie("userProduct",json_encode($cartDetail), mktime(). time()+60*60*24*2,"/" ); 
        
    }
    
    
    function getProductCookie(){
        $ck = $this->input->cookie('userProduct');
        
        $ckDetail = json_decode($ck,true);
        if(!$ckDetail)
        {
            $ckDetail = array();
        }
        $cartReturn = array();
    
        return $ckDetail;
    }
}