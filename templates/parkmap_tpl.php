<?php 
$txtpm=get_fetch("select noidung$lang as noidung,ten$lang as ten,tenkhongdau,id,thumb,photo from #_about where type='txtpm'");
 ?>
 <div class="container">
<div class="content parkmap-desc">
    <?= $txtpm["noidung"] ?>
</div>
</div>
<figure class="parkmap-img"><img src="<?= _upload_hinhanh_l.$txtpm["photo"] ?>" alt="parkmap"></figure>
<div class="parkmap-list">
    <div class="container">
        <div class="parkmap-flex">
            <?php foreach ($tintuc as $key => $value) {
                $img1 = _upload_tintuc_l.$value["thumb"];
                $img2 = _upload_tintuc_l.$value["photo2"];
                echo '<div class="parkmap-item"><a href="'.get_url($value).'"><div class="image">
                            <figure><img src="'.$img1.'" alt="'.$value["ten"].'"></figure>
                        </div><div class="info"><div class="title"><figure><img src="'.$img2.'" alt="'.$value["ten"].'"></figure><h5>'.$value["ten"].'</h5></div><div class="desc line-clamp">'.$value["mota"].'</div></div>
                        </a></div>';
            } ?>
        </div>
    </div>
</div>