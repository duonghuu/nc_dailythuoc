<?php 
$item_thuoctinh = json_decode($row_detail["thuoctinh"],true);
$condition = implode(',', $item_thuoctinh);
if(!empty($condition)){
    $product = get_result("select ten,id,thumb,photo,type,id_danhmuc,id_list,id_cat,id_item,id_nhasanxuat,type from table_product where id in (".$condition.") order by id desc");
}
 ?>
<div class="tieude_giua"><div><?=$title_cat?></div></div>
<div class="product-grid">
    <?php foreach ($product as $k => $v) { 
            showProduct($v);
    } ?>
</div>
