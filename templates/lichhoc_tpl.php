<div class="tieude_giua"><div><?=$title_cat?></div></div>
<div class="box_container">
    <?php 
$lichhoc_danhmuc = get_result("select ten$lang as ten,id,tenkhongdau from table_news_danhmuc where type='lich-hoc' and hienthi>0 order by stt");
foreach ($lichhoc_danhmuc as $kdm => $vdm) {
    $lich = get_result("select ten$lang as ten,id,tenkhongdau,thumb,photo,type from table_news where id_danhmuc='".$vdm["id"]."' and type='lich-hoc' and hienthi>0 order by stt");
    echo '<h3 class="text-uppercase text-center">'.$vdm["ten"].'</h3>';
    echo '<div class="lichhoc-grid">';
    foreach ($lich as $key => $value) {
        echo '<a href="'.get_url($value).'" class="lich-item"><img src="'._upload_tintuc_l.$value["thumb"].'" alt="'.$value["ten"].'"></a>';
    }
    echo '</div>';
}
     ?>
</div><!---END .box_container-->