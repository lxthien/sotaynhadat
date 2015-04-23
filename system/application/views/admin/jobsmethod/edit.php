<script language="javascript" type="text/javascript" src="<?php echo $base_url;?>ckeditor/ckeditor.js"></script>
<script type="text/javascript" language="javascript">
//number of category at the first time loca this product
    var initNumCategory;
    var productStatus = '<?=$object->status;?>';
    $().ready(function(){
        $("#container_tab").tabs({});
        $(".loadSpecByCategory").live('click',
            function(){
                    var sib = $(this).siblings(":hidden");
                    if(sib.val() == "")
                        showMessage("Vui lòng chọn danh mục");
                    else
                        loadProductSpec(sib.val());
            }
        );
        $(".delelteCategory").live("click",function(e){
             e.preventDefault();
             if(e.handled === true) return false;
             e.handled = true;
             $(this).parents(".categoryItem").remove();
             
             return false;
        });
        $(".addCategory").click(function(){
            
           
            timestamp = new Date().getTime();
             $("#categoryArea").append('<div class="categoryItem" style="clear:both;padding-top:5px;">'
                            +'<input type="text" readonly="readonly" class="smallInput medium" name="productCategory_'+timestamp+'" value="" style="float:left;" />'
                            +'<input type="hidden" name="productCategoryId_'+timestamp+'" value=""  />'
                            +'<a style="margin-left:10px;" href="javascript:void(0)" onclick="showProductCategoryDialog(\'productCategory_'+timestamp+'\',\'productCategoryId_'+timestamp+'\')"  >Chọn</a> |'
                            +'<a href="javascript:void(0)" class="loadSpecByCategory" > Load thông số |</a>'
                            +'<a href="javascript:void(0)" class="delelteCategory" >Xóa</a>'
                            + '</div>'); 
        });
        $(":input[name='name_vietnamese']").keyup(function(){
            if($(":input[name='isGeneratorUrl']").prop('checked'))
                $(":input[name='url']").val(remove_vietnamese_accents($(this).val())); 
        });
        
        $(".spanPrice").text(addCommas($(":input[name='price']").val()));
        $(":input[name='price']").keyup(function(){
             $(".spanPrice").text(addCommas($(this).val())); 
        });
         $(".spanSaleOffPrice").text(addCommas($(":input[name='saleOffPrice']").val())); 
        $(":input[name='saleOffPrice']").keyup(function(){
            
             $(".spanSaleOffPrice").text(addCommas($(this).val())); 
        });
        
        if(productStatus == '<?=enum::PRODUCT_UNAVAILABLE;?>' || productStatus == '<?=enum::PRODUCT_WILL_AVAILABLE;?>')
        {
            $("#avaiAt").hide();
        }else{
            $("#avaiAt").show();
        }
        $(":input[name='productstatus']").change(function(){
            if($(this).val() == '<?=enum::PRODUCT_AVAILABLE;?>')
            {
                $("#avaiAt").show();
            }else{
                $("#avaiAt").hide();
            }
        });
        $("#frmProduct").validate({
            rules:{
                productName:{
                    required:true,
                    remote:{
                        url:'<?=$base_url;?>admin/products/checkNameUnique/<?=$object->id;?>',
                        type:'post',
                        data:{
                            name:function(){ return $(":input[name='productName']").val();}
                        }  
                     }                  
                },
                url:{
                    required:true,
                    remote:{
                        url:'<?=$base_url;?>admin/products/checkUrlUnique/<?=$object->id;?>',
                        type:'post',
                        data:{
                            url:function(){ return $(":input[name='url']").val();}
                        }
                    }
                },
                price:{
                    required:true,
                    digits:true
                },
                saleOffPrice:{
                    digits:true
                }
            },
            messages:{
                productName:{
                   remote: "Tên sản phẩm này đã tồn tại"  
                              
                },                
                url:{
                    remote:"url này đã tồn tại trong hệ thống."
                },
                price:{
                    digits:"Vui lòng nhập số"
                },
                saleOffPrice:{
                    digits:"Vui lòng nhập số"
                }
            }
        });
    
        //create copy spec dialog
        
        
        
        copySpecDialog_init();
        newProductSpec_init();
        addComment_init();
    });
    
    function addCommas(nStr)
    {
        if($.trim(nStr) == "")
            return "";
    	nStr += '';
    	x = nStr.split('.');
    	x1 = x[0];
    	x2 = x.length > 1 ? '.' + x[1] : '';
    	var rgx = /(\d+)(\d{3})/;
    	while (rgx.test(x1)) {
    		x1 = x1.replace(rgx, '$1' + ',' + '$2');
    	}
    	return x1 + x2;
    }

    function loadProductSpec(catId)
    {
        //var catId = $("input[name='productCategoryId']").val();
        if(catId!="")
        {
            $.ajax({
                   url: "<?=$base_url;?>admin/productcats/loadSpecForProduct/"+catId ,
                   type: "GET",
                   dataType:"text",
                   success:function(data){
                         showMessage("Thêm thông tin thành công. Vui lòng mở tab thông số để xem chi tiết.","success",function(){
                            activeTab("specific");
                         });
                        $("#productSpecLoad").html(data);
                   } 
                });
        }
    }
    
    
    function loadProductSpecByProduct()
    {
        $.ajax({
           url: "<?=$base_url;?>admin/products/loadNewProductSpec/<?=$object->id;?>" ,
           type: "GET",
           dataType:"text",
           success:function(data){
                $("#productSpecLoad").html(data);
           } 
        });
    }
    
    
    function loadAccessories()
    {
        $.ajax({
           url: "<?=$base_url;?>admin/products/loadAccessories/<?=$object->id;?>" ,
           type: "GET",
           dataType:"html",
           success:function(data){
                $("#productAccessories").html(data);
                activeTab("accessories");
                    showMessage("Cập nhật danh sách phụ kiện thành công.","success",function(){});
                
           } 
        });
    }
    
    
    function loadComments()
    {
        $.ajax({
           url: "<?=$base_url;?>admin/products/loadProductComment/<?=$object->id;?>" ,
           type: "GET",
           dataType:"html",
           success:function(data){
                $("#productComment").html(data);                
           } 
        });
    }
    function chooseMultiProduct(productId)
    {
        if($(":input[name='productCheck[]']:checked").length > 20)
        {
            alert("Chỉ được chọn tối đa 20sp");
        }
        else
        {
            $.ajax({
               url: "<?=$base_url;?>admin/products/addAccessories/"+productId ,
               type: "POST",
               data: $("#productMultiSelect").serialize(),
               dataType:"text",
               success:function(data){
                    loadAccessories();
                    hideProductMultiDialog();
               } 
            });
        }
    }
    
    function activeTab(tabName)
    {
        $(".ui-tabs-nav li").each(function(){
          
           if($(this).children("a").attr("href") == "#"+tabName)
           {
                var tabIndex = $(".ui-tabs-nav li").index($(this)); 
                $( "#container_tab" ).tabs( "option", "selected",tabIndex );
           } 
        });
        
    }
    
   
</script>

<form id="frmProduct" class="table_input" action="<?=$base_url;?>admin/jobsmethods/edit/<?=$object->id;?>" method="post" enctype="multipart/form-data">
<input class="tabs_select" type="hidden" name="tabs_select" />
<!--begin content tabs-->
<div style="position: relative;">
        <div style="position: absolute;top:0px;right:0px;text-align: center;">
            <?php if($object->image != "") { ?>
                <img style="border:5px #ccc solid;" src="<?=image($object->image);?>" width="100" height="100" /><br />
                Hình đại diện
            <?php } ?>
        </div>
</div>
<table class="table_input">
    <?php foreach($sitelanguage as $row): ?>
    <tr>
     	<td>
			<label for="name">Tên phương thức làm việc (<?=$row->name?>):<span style="color: red;">*</span></label></td>
        <td><input type="text"  name="name_<?=$row->short?>" class="smallInput big" value="<?=$object->{'name_'.$row->short};?>" /></td>
    </tr>
    <?php endforeach ?>
</table>
<!--end content tabs-->
<div class="button_bar buttoneditproduct">
    <br /><br />
    <?php create_form_button('submit_button button_ok','Save');?>
</div>
</form><!--end form edit products-->
<!--DIALOG-->
<?php $this->load->view('admin/products/dialog/copyProductSpecDialog');?>
<?php $this->load->view('admin/products/dialog/newProductSpecDialog');?>
<?php $this->load->view('admin/products/dialog/addCommentDialog');?>


