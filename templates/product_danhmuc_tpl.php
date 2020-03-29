<?php 
$pro_danhmuc = get_result("select tenkhongdau,id,ten$lang as ten,thumb,photo,type from table_product_danhmuc where type='san-pham' and hienthi>0 order by stt asc");
 ?>
 <div class="product-grid">
 <?php 
foreach ($pro_danhmuc as $key => $value) {
    $link = 'shopping/'.$value["tenkhongdau"].'-'.$value["id"];
    $img = _upload_sanpham_l.$value["thumb"];
    echo '<div class="pr-box name "><article>'.$giaspgiam.'<a href="'.$link.'" class="imgsp hover_sang1"><img class="lazy" data-src="'.$img.'" src="1x1.png" alt="'.$value["ten"].'"></a> <div class="info"><h3><a class="line-clamp" href="'.$link.'">'.$value["ten"].'</a></h3>
                </div></article></div>';
}
  ?>
  </div>