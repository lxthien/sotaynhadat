<ul>
    <li><a class="select" href="#description_vn"><span><h2>Việt nam</h2></span></a></li>
    <li><a class="select" href="#description_en"><span><h2>English</h2></span></a></li>
</ul>
<div id="description_vn">
    <textarea  name="txtDescription_vietnamese"><?php echo $object->txtDescription_vietnamese;?></textarea>
    <script type="text/javascript">
        editorDescription = CKEDITOR.replace( 'txtDescription_vietnamese',
            {
                toolbar : 'Full',
                height:500,
                filebrowserBrowseUrl : '<?=$base_url;?>resource/kfm/'
            });
    </script>
</div>
<div id="description_en">
    <textarea  name="txtDescription_english"><?php echo $object->txtDescription_english;?></textarea>
    <script type="text/javascript">
        editorDescription = CKEDITOR.replace( 'txtDescription_english',
            {
                toolbar : 'Full',
                height:500,
                filebrowserBrowseUrl : '<?=$base_url;?>resource/kfm/'
            });
    </script>
</div>