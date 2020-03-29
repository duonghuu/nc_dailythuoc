<?php 
$menu=get_result("select ten$lang as ten,mota$lang as mota,link,photo,thumb from #_slider where hienthi=1 and type='menu' order by stt");
 ?>
 <div class="coffeeandfood-bg">
<h4 class="idx-tit"><span><?= _coffeeandfood ?></span></h4>
<div class="menus-bg">

    <div class="container">
        <div class="menus-flex">
            <?php foreach ($menu as $key => $value) {
                echo '<div class="menus-item">
                    <figure><img src="'._upload_hinhanh_l.$value["thumb"].'" alt="'.$value["ten"].'"></figure>
                </div>';
            } ?>
        </div>
    </div>
</div>
<div class="web-slider-main clearfix">
    <?= lay_slider('slidercf') ?>
</div>
</div>