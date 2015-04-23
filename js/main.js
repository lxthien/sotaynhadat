$(document).ready(function(){
    /*with localhost*/
    var base_url = 'http://localhost/sotaynhadat';
    /*with host*/
    //var base_url = getBase_url();
    $("a#inlogging").fancybox({
        'transitionIn'	: 'none',
        'transitionOut'	: 'none'
    });

    $('.provinces').change(function(){
        var provincesId = $(this).val();
        $.ajax({
            type: "post",
            url: base_url+"/home/getDistrict",
            data: 'provincesId='+provincesId,
            success: function(data){
                $('.district').html('');
                $('.district').append(data);
            },
            error:function(){
                alert("Có lỗi trong quá trình thực hiện. Vui lòng kiểm tra lại");
            }
        });
    });


    /*Js to load district by estatecity_id*/
    if( $('#estatecity_id').val() > 0 ){
        var Id = $('#estatecity_id').val();
        var districtSelected = $(':input[name="estatedistrict_selected"]').val();
        $.ajax({
            type: "post",
            url: base_url+"/home/getDistrict",
            data: 'provincesId='+Id+'&districtSelected='+districtSelected,
            success: function(data){
                $('#estatedistrict_id').html('');
                $('#estatedistrict_id').append(data);
            },
            error:function(){
                alert("Có lỗi trong quá trình thực hiện. Vui lòng kiểm tra lại");
            }
        });
    }
    $('#estatecity_id').change(function(){
        var provincesId = $(this).val();
        $.ajax({
            type: "post",
            url: base_url+"/home/getDistrict",
            data: 'provincesId='+provincesId,
            success: function(data){
                $('#estatedistrict_id').html('');
                $('#estatedistrict_id').append(data);
            },
            error:function(){
                alert("Có lỗi trong quá trình thực hiện. Vui lòng kiểm tra lại");
            }
        });
        $.ajax({
            type: "post",
            url: base_url+"/home/getProject",
            data: 'provincesId='+provincesId,
            success: function(data){
                $('#article_id').html('');
                $('#article_id').append(data);
            },
            error:function(){
                alert("Có lỗi trong quá trình thực hiện. Vui lòng kiểm tra lại");
            }
        });
    });

    if( $('#estatecity_id').val() > 0 ){
        var Id = $(':input[name="estatedistrict_selected"]').val();
        var wardSelected = $(':input[name="estateward_selected"]').val();
        $.ajax({
            type: "post",
            url: base_url+"/home/getWard",
            data: 'districtId='+Id+'&wardSelected='+wardSelected,
            success: function(data){
                $('#estateward_id').html('');
                $('#estateward_id').append(data);
            },
            error:function(){
                alert("Có lỗi trong quá trình thực hiện. Vui lòng kiểm tra lại");
            }
        });
    }
    $('.district-select').change(function(){
        var districtId = $(this).val();
        var cityId = $('#estatecity_id').val();
        $.ajax({
            type: "post",
            url: base_url+"/home/getWard",
            data: 'districtId='+districtId,
            success: function(data){
                $('#estateward_id').html('');
                $('#estateward_id').append(data);
            },
            error:function(){
                alert("Có lỗi trong quá trình thực hiện. Vui lòng kiểm tra lại");
            }
        });
        /*jQuery to get project by district*/
        $.ajax({
            type: "post",
            url: base_url+"/home/getProject",
            data: 'provincesId='+cityId+'&districtId='+districtId,
            success: function(data){
                $('#article_id').html('');
                $('#article_id').append(data);
            },
            error:function(){
                alert("Có lỗi trong quá trình thực hiện. Vui lòng kiểm tra lại");
            }
        });
    });

    /*Js to load district by estatecity_id*/


    /*Js to load type by estatecatalogue_id*/
    if( $('#estatecatalogue_id').val() > 0 ){
        var Id = $('#estatecatalogue_id').val();
        var typeSelected = $(':input[name="estatetype_selected"]').val();
        $.ajax({
            type: "post",
            url: base_url+"/home/getType",
            data: 'id='+Id+'&typeSelected='+typeSelected,
            success: function(data){
                $('#estatetype_id').html('');
                $('#estatetype_id').append(data);
            },
            error:function(){
                alert("Có lỗi trong quá trình thực hiện. Vui lòng kiểm tra lại");
            }
        });
    }

    $('#estatecatalogue_id').change(function(){
        var Id = $(this).val();
        $.ajax({
            type: "post",
            url: base_url+"/home/getType",
            data: 'id='+Id,
            success: function(data){
                $('#estatetype_id').html('');
                $('#estatetype_id').append(data);
            },
            error:function(){
                alert("Có lỗi trong quá trình thực hiện. Vui lòng kiểm tra lại");
            }
        });
    });
    /*Js to load type by estatecatalogue_id*/


    /*Js to load estateprices by estatecatalogue_id*/
    if( $('#estatecatalogue_id').val() > 0 ){
        var Id = $('#estatecatalogue_id').val();
        var priceSelected = $(':input[name="price_selected"]').val();
        $.ajax({
            type: "post",
            url: base_url+"/home/getPrice",
            data: 'id='+Id+'&priceSelected='+priceSelected,
            success: function(data){
                $('#estateprice_id').html('');
                $('#estateprice_id').append(data);
            },
            error:function(){
                alert("Có lỗi trong quá trình thực hiện. Vui lòng kiểm tra lại");
            }
        });
    }

    $('#estatecatalogue_id').change(function(){
        var Id = $(this).val();
        $.ajax({
            type: "post",
            url: base_url+"/home/getPrice",
            data: 'id='+Id,
            success: function(data){
                $('#estateprice_id').html('');
                $('#estateprice_id').append(data);
            },
            error:function(){
                alert("Có lỗi trong quá trình thực hiện. Vui lòng kiểm tra lại");
            }
        });
    });
    /*Js to load estateprices by estatecatalogue_id*/


    /*Js to load price by type*/
    $('#estatetype_id').change(function(){
        var typeId = $(this).val();
        $.ajax({
            type: "post",
            url: base_url+"/home/getPriceByType",
            data: 'typeId='+typeId,
            success: function(data){
                $('#estateprice_id').html('');
                $('#estateprice_id').append(data);
            },
            error:function(){
                alert("Có lỗi trong quá trình thực hiện. Vui lòng kiểm tra lại");
            }
        });
    })
    /*Js to load price by type*/


    /*Js to show or hide Area*/
    if($(':radio[name="IsArea"]:checked').val() == 1){
        $('#area_text').attr('disabled', 'disabled');
    }
    else{
        $('#area_text').removeAttr('disabled');
    }
    $(':radio[name="IsArea"]').change(function(){
        if($(this).val() == 1){
            $('#area_text').attr('disabled', 'disabled');
        }
        else{
            $('#area_text').removeAttr('disabled');
        }
    })
    /*Js to show or hide Area*/


    /*Js to show or hide Area*/
    if($(':radio[name="IsPrice"]:checked').val() == 1){
        $('.show-price').hide();
    }
    $(':radio[name="IsPrice"]').change(function(){
        if($(this).val() == 1){
            $('.show-price').hide();
        }
        else{
            $('.show-price').show();
        }
    })
    /*Js to show or hide Area*/


    $('.boxseach input[name="estatecatalogue_id"]').click(function(){
        var id = $(this).val();

        $.ajax({
            type: "post",
            url: base_url+"/home/getTypeByCatagory",
            data: 'cateId='+id,
            success: function(data){
                $('.formtimkiem #estatetype_id').html('');
                $('.formtimkiem #estatetype_id').append(data);
            },
            error:function(){
                alert("Có lỗi trong quá trình thực hiện. Vui lòng kiểm tra lại");
            }
        });
    });


    /*Js to validate form when post*/
});

function getBase_url(){
    var pathArray = $(location).attr('href').split( '/' );
    var protocol = pathArray[0];
    var host = pathArray[2];
    var base_url = protocol + '//' + host;
    return base_url;
}
