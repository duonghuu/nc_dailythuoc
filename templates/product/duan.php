<div class="duan-grid">
    <?php foreach($product as $k=>$v){
        echo '<a class="duan-item" href="'.get_url($v).'">
                <figure><img src="'._upload_sanpham_l.$v["photo"].'" alt="'.$v["ten"].'"></figure>
                <h2>'.$v["ten"].'</h2>
            </a>';
    } ?>
</div>