<div class="tieude_giua"><div><?=$title_cat?></div></div>
<div class="box_container">
    <div class="video-grid">
        <?php 
        foreach($tintuc as $k => $v) { 
            ?>
            <a href="<?= get_url($v,$com) ?>" class="vdg-item">
                <figure class="hover_sang3"><img class="lazy" data-src="<?= _upload_tintuc_l.$v["thumb"] ?>" alt="<?=$v['ten']?>"></figure>
                <h4><?=$v['ten']?></h4>
            </a>
        <?php  } ?>
    </div>
<div class="clear"></div>
<div class="pagination"><?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?></div>
</div><!---END .box_container-->