<div class="video-grid">
    <?php foreach($tintuc as $k => $v) { 
        for($i=0;$i< 8 ;$i++) 
        ?>
        <a href="<?= get_url($v) ?>" class="vdg-item">
            <figure class="hover_sang3"><img class="lazy" data-src="<?= _upload_tintuc_l.$v["thumb"] ?>" alt="<?=$v['ten']?>"></figure>
            <h4><?=$v['ten']?></h4>
        </a>
    <?php }  ?>
</div>