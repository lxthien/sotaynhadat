<div class="col2 fl">
    <div class="groupcol2">
        <div class="constructioncol2">
            <div class="titleconstructioncol2"><h1><?=lang('galleries')?></h1></div>
            <?php 
            foreach($galleries as $row):
            $banner = new banner();
            $banner->where('bannercat_id',$row->id);
            $banner->get();
            ?>
            <div class="listgalleries">
                <div class="imglistgalleries">
                    <a title="<?=$row->name?>" href="<?=$base_url.$this->lang->lang()?>/gallery/<?=$row->id?>">
                        <img src="<?=$base_url.$banner->image?>" alt="<?=$row->name?>" height="360" />
                    </a>
                </div>
                <div class="deslistgalleries">
                    <a title="<?=$row->name?>" href=""><?=$row->name?></a>
                    <p><?=$row->description?></p>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</div>