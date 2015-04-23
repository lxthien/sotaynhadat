<!--tin xem nhiu-->
<div class="tinxemnhiu">
    <span class="title-top-box">Tin được xem nhiều</span>
    <?php foreach($newViewMost as $row): ?>
        <div class="sreentieudedn" style=" width:161px; height:30px; margin-top:5px; float:left;">
            <div class="icon3 icon3-add"></div>
            <div class="noidungtieudetinduocxemnhieu">
                <a  href="">
                    <p style="text-align:justify; margin-top:-3px;">
                        <?=strlen($row->title_vietnamese) < 50 ? $row->title_vietnamese: cut_string($row->title_vietnamese, 50).'...';?>
                    </p>
                </a>
            </div>
        </div>
    <?php endforeach; unset($row); ?>
</div>
<!--end tin xem nhiu-->