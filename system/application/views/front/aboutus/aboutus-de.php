<div class="col-right main-article fl">
    <div class="titleconstructioncol2 title-nav-article">
        <h1>
            <a title="<?=lang('home')?>" href="<?=$base_url?>"><?=lang('home')?></a> &gt; <a title="<?=$new->{'title_'.$this->language};?>" href="<?=$this->lang->lang() == 'vi' ? $base_url.'vi/gioi-thieu/'.$news->title_none.'.html' : $base_url.'en/about-us/'.$news->title_none.'.html';?>"><?=$news->{'title_'.$this->language};?></a>
        </h1>
        <div class="share-article">
            <span class='st_plusone_hcount' displayText='Google +1'></span>
            <span class='st_fblike_hcount' displayText='Facebook Like'></span>
        </div>
    </div>
    <span class="line730"></span>
    <span class="line-article"></span>
    <span class="content-article mainarticle">
        <?=$news->{'full_'.$this->language};?>
    </span>
    <div class="share-to-social">
        <span class='st_facebook_large' displayText='Facebook'></span>
        <span class='st_googleplus_large' displayText='Google +'></span>
        <span class='st_twitter_large' displayText='Tweet'></span>
        <span class='st_linkedin_large' displayText='LinkedIn'></span>
        <span class='st_email_large' displayText='Email'></span>
    </div>
    <div class="groupcol2">
        <div class="constructioncol2">
            <div class="titleconstructioncol2 title-relate-news"><h1><?=lang('relatedNews')?></h1></div>
            <div class="line730black"></div>
            <div class="mainarticle newssame">
                <ul>
                    <?php foreach($related_news as $row):
                        $cat = new Newscatalogue($row->newscatalogue_id);
                        ?>
                        <li><a title="<?=$row->{'title_'.$this->language};?>" href="<?=$this->lang->lang() == 'vi' ? $base_url.'vi/gioi-thieu/'.$row->title_none.'.html' : $base_url.'en/about-us/'.$row->title_none.'.html';?>"><?=$row->{'title_'.$this->language}?></a></li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>
    </div>
</div>