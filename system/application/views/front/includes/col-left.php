<script type="text/javascript" language="javascript">
    $(function() {
        $("#scroller").simplyScroll({orientation:'vertical',customClass:'vert'});
    });
</script>
<div class="col-left fl">
    <div class="col-left-item list-category">
        <div class="main-col1-item-category">
            <span class="title-col1-item-category"><?=lang('products')?></span>
            <span class="line-col1-item-category"></span>
            <span class="list-cate-col1-item-category category-left">
                <ul>
                    <?php foreach($this->productCatalogue as $row): ?>
                        <li>
                            <a href="<?=$this->lang->lang() == 'vi' ? $base_url.'vi/'.$row->url_vietnamese : $base_url.'en/'.$row->url_english; ?>">
                                &raquo; <?=$row->{'name_'.$this->language}?>
                            </a>
                            <?php if($row->childCount() > 0): ?>
                            <ul>
                                <?php foreach($this->productCatAll as $rowSub): 
                                    if($rowSub->parentcat_id == $row->id):
                                ?>
                                <li>
                                    <a href="<?=$this->lang->lang() == 'vi' ? $base_url.'vi/'.$row->url_vietnamese.'/'.$rowSub->url_vietnamese : $base_url.'en/'.$row->url_english.'/'.$rowSub->url_english; ?>">
                                        &gt; <?=$rowSub->{'name_'.$this->language};?>
                                    </a>
                                </li>
                                <?php endif; endforeach; ?>
                            </ul>
                            <?php endif; ?>
                        </li>
                    <?php endforeach ?>
                </ul>
            </span>
        </div>
    </div>
    <div class="col-left-item">
        <div class="col2-item support-online">
            <h3><?=lang('project')?></h3>
            <span class="line-support-online"></span>
            <ul id="scroller">
                <?php foreach($this->project as $row): ?>
                    <li>
                        <div class="project-home-item">
                            <div class="img-project-home-item">
                                <a href="<?=$base_url.$this->lang->lang().'/project/'.$row->title_none.'.html'?>" title="<?=$row->{'title_'.$this->language}?>">
                                    <img src="<?= $base_url ?>img/news/<?=$row->image?>" width="169" height="124" alt="<?=$row->{'title_'.$this->language}?>"/>
                                </a>
                            </div>
                            <div class="name-project-home-item">
                                <a href="<?=$base_url.$this->lang->lang().'/project/'.$row->title_none.'.html'?>" title="<?=$row->{'title_'.$this->language}?>">
                                    <?=strlen($row->{'title_'.$this->language}) < 35 ? $row->{'title_'.$this->language} : cut_string($row->{'title_'.$this->language}, 35).' ...';?>
                                </a>
                            </div>
                        </div>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
    <div class="col-left-item">
        <div class="col2-item support-online">
            <h3><?=lang('supportOnline')?></h3>
            <span class="line-support-online"></span>
            <span class="row-account"><span class="name-support-online"><?=getconfigkey('nameAccount1')?></span><span class="hotline-support-online"><?=getconfigkey('phoneAccount1')?></span></span>
            <span class="icon-support-online">
                <img src="<?= $base_url ?>images/icon-yahoo.png" alt=""/>
                <a href="ymsgr:sendim?<?=getconfigkey('accountYahoo')?>">online yahoo</a>
            </span>
            <span class="row-account"><span class="name-support-online"><?=getconfigkey('nameAccount2')?></span><span class="hotline-support-online"><?=getconfigkey('phoneAccount2')?></span></span>
            <span class="icon-support-online">
                <img src="<?= $base_url ?>images/icon-skype.png" alt=""/>
                <a href="skype:<?=getconfigkey('accountSkype')?>">online skype</a>
            </span>
        </div>
    </div>
    <div class="col-left-item">
        <div class="col2-item support-online share-social">
            <span><a target="_blank" href="<?=getconfigkey('linkFacebook')?>"><img src="<?= $base_url ?>images/icon-facebook.png" alt=""/></a></span>
            <span><a target="_blank" href="<?=getconfigkey('linkGoogle')?>"><img src="<?= $base_url ?>images/icon-google-plus.png" alt=""/></a></span>
        </div>
    </div>
    <div class="col-left-item">
        <div class="col2-item support-online link-website">
            <h3><?=lang('webLink')?></h3>
            <span class="line-support-online"></span>
            <span class="row-video row-link-websites">
                <ul>
                    <li><a href="http://xaynhathienan.com/" target="_blank">Thiên Ân</a></li>
                    <li><a href="http://thinhviet.com/" target="_blank">Thịnh việt</a></li>
                    <li><a href="http://www.noithattop.net/" target="_blank">Tập đoàn Thiên Phúc</a></li>
                    <li><a href="http://www.nhadep.com.vn/" target="_blank">Nhà đẹp</a></li>
                </ul>
            </span>
        </div>
    </div>
    <div class="col-left-item">
        <div class="col2-item support-online link-website">
            <h3><?=lang('statistics')?></h3>
            <span class="line-support-online"></span>
            <span class="row-video row-counter-online">
                <span class="icon-support-online icon-counter-online">
                    <img src="<?= $base_url ?>images/online.png" alt=""/>
                    <span><?=$this->hit_counter->getUsersOnlineCount();?> <?=lang('online')?></span>
                </span>
                <span class="icon-support-online icon-counter-online">
                    <img src="<?= $base_url ?>images/total-online.png" alt=""/>
                    <span><?=$this->hit_counter->getTotalVisitCount();?> <?=lang('counterToal')?></span>
                </span>
            </span>
        </div>
    </div>
</div>