<script type="text/javascript" language="javascript">
    $().ready(function(){
        var link = "<?=$base_url.$this->lang->lang()?>";
        $(".buttonpayment").click(function(){
            $(location).attr('href', ''+link+'/fuser/payment');
        });
    });
</script>
<div class="col-right fl">
    <div class="productSellers">
        <div class="titleconstructioncol2"><h1><?=lang('yourcart')?></h1></div>
        <span class="line730"></span>
        <div class="news">
            <form method="post" action="<?=$base_url.$this->lang->lang()?>/home/updateCart">
                <table style="background-color: #efc237; width: 100%; color: #000;" cellspacing="0" cellpadding="0">
                    <tr style="height: 35px;">
                        <th>STT</th>
                        <th>SẢN PHẨM</th>
                        <th>SỐ LƯỢNG</th>
                        <th>MỆNH GIÁ</th>
                        <th>THÀNH TIỀN</th>
                    </tr>
                    <?php $i=0; foreach($carts as $row): $i++;?>
                        <tr style="background-color: <?php if($i%2==0) echo "#ffd657"; else echo "#ffedb3"; ?>; height: 35px;">
                            <td style="border-right: 1px solid #efc237;"><div align="center"><?=$i?></div></td>
                            <td style="border-right: 1px solid #efc237;"><div align="center"><?=$row['name']?></div></td>
                            <td style="border-right: 1px solid #efc237;"><div align="center"><input type="hidden" value="<?=$row['rowid']?>" name="rowid[]" /><input style="text-align: center;" size="5" type="text" value="<?=$row['qty']?>" name="quality[]" /></div></td>
                            <td style="border-right: 1px solid #efc237;"><div align="center"><?=$row['price'].' VND'?></div></td>
                            <td style="border-right: 1px solid #efc237;"><div align="center"><?=$row['subtotal'].' VND'?></div></td>
                        </tr>
                    <?php endforeach ?>
                    <tr style="height: 35px;">
                        <td colspan="4"><div style="text-align: right;">TỔNG CỘNG(đã bao gồm VAT):</div></td>
                        <td><div style="text-align: center;"><?=$this->cart->total().' VND'?></div></td>
                    </tr>
                </table>
                <!--<div style="float:right; margin-top: 5px;">
                    <a href="https://www.baokim.vn/payment/customize_payment/product?business=phuocnguyen_1412@yahoo.com.vn&product_name=<?/*=$row['name']*/?>&product_price=<?/*=($this->cart->total())*/?>&product_quantity=1&total_amount=<?/*=($this->cart->total())*/?>">
                        <img src="https://www.baokim.vn/application/uploads/buttons/btn_safety_payment_2.png" alt="Thanh toán an toàn với Bảo Kim !" border="0" title="Thanh toán trực tuyến an toàn dùng tài khoản Ngân hàng (VietcomBank, TechcomBank, Đông Á, VietinBank, Quân Đội, VIB, SHB,... và thẻ Quốc tế (Visa, Master Card...) qua Cổng thanh toán trực tuyến BảoKim.vn" >
                    </a>
                </div>-->
                <div style="margin-top: 50px; position: relative; width: 100%; height: 100px;">
                    <div style="border: 1px solid #f19a04; width: 100%; height: 0px;"></div>
                    <div style="position: absolute; width: 240px; height: 35px; background-color: #f99e00; top: -16px; left: 235px; border-radius: 8px;">
                        <input class="updatecart" type="submit" value="UPDATE" />
                        <input class="buttonpayment" type="button" value="PAYMENT" />
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>