<div class="dichvu-grid">
    <?php foreach($tintuc as $v){
        echo '<div class="dichvu-item hover_sang1"><a href="'.get_url($v).'"><img src="'._upload_tintuc_l.$v["photo"].'" alt="'.$v["ten"].'">
                    <h5><strong>'.$v["ten"].'</strong></h5>
                </img></a></div>';
    } ?>
</div>