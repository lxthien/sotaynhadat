<div class="col-right main-article fl">
    <div class="groupcol2">
        <div class="constructioncol2">
            <div class="titleconstructioncol2 title-nav-article">
                <h1>
                    <a title="<?=lang('home')?>" href="<?=$base_url?>"><?=lang('home')?></a> &raquo; <a title="<?=$category->{'name_'.$this->language}?>" href="<?=$this->lang->lang() == 'vi' ? $base_url.'vi/tu-van' : $base_url.'en/advices';?>"><?=$category->{'name_'.$this->language}?></a> &raquo; <a title="<?=$news->{'title_'.$this->language}?>" href="<?=$base_url.$this->lang->lang()?>/tu-van/<?=$news->title_none.'.html'?>"><?=$news->{'title_'.$this->language}?></a>
                </h1>
                <div class="share-article">
                    <span class='st_plusone_hcount' displayText='Google +1'></span>
                    <span class='st_fblike_hcount' displayText='Facebook Like'></span>
                </div>
            </div>
            <span class="line730"></span>
            <div class="titleconstructioncol2 title-news-de">
                <h1 style="font-size: 15px"><?=$news->{'title_'.$this->language}?></h1>
                <p><?=lang('createdDate')?>: (<?=$news->created?>)</p>
            </div>
            <div class="mainarticle">
                <?=$news->{'full_'.$this->language};?>
            </div>
            <div class="share-to-social">
                <span class='st_facebook_large' displayText='Facebook'></span>
                <span class='st_googleplus_large' displayText='Google +'></span>
                <span class='st_twitter_large' displayText='Tweet'></span>
                <span class='st_linkedin_large' displayText='LinkedIn'></span>
                <span class='st_email_large' displayText='Email'></span>
            </div>
            <div class="comment-facebook">
                <div class="fb-comments" data-href="<?=$link?>" data-width="710" data-num-posts="20"></div>
            </div>
        </div>
    </div>
    <div class="groupcol2">
        <div class="constructioncol2">
            <div class="line640black"></div>
            <div class="titleconstructioncol2"><h1><?=lang('relatedNews')?></h1></div>
            <div class="mainarticle newssame">
                <ul>
                    <?php foreach($related_news as $row): ?>
                        <li><a title="<?=$row->{'title_'.$this->language};?>" href="<?=$base_url.$this->lang->lang()?>/tu-van/<?=$row->title_none.'.html'?>"><?=$row->{'title_'.$this->language}?></a></li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>
    </div>
</div>