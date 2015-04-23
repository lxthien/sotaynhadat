<div class="col-right fl">
    <div class="productSellers">
        <div class="titleconstructioncol2"><h1><?=lang('login')?></h1></div>
        <span class="line730"></span>
        <div class="news">
            <form id="frmContact" name="frmContact" method="post" action="<?=$base_url.$this->lang->lang()?>/fuser/checkLogin">
                <span class="rowLabel"></span>
                <span class="rowLabel">Email của bạn <span style="display: inline-block; color: red;">(*)</span></span>
                <span class="rowInput"><input type="text" name="email" id="email" value="" /></span>
                <span class="rowLabel">Mật khẩu <span style="display: inline-block; color: red;">(*)</span></span>
                <span class="rowInput"><input type="password" name="password" id="password" value="" /></span>
                <span class="rowInput" >
                    <input type="submit" class="button" value="gửi" />
                    <input type="reset" class="button" value="xóa" />
                </span>
            </form>
        </div>
    </div>
</div>