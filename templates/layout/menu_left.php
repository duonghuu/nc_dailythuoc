<div class="box-menu-slider">
<ul class="menu-left">
  <?php foreach($product_danhmuc as $kdm => $vdm){
    $dmsp1 = get_result("select ten$lang as ten,tenkhongdau,id,type from #_product_list where type='sanpham' and
     id_danhmuc='".$vdm["id"]."' and hienthi>0 order by stt asc");
  ?>
  <li><a href="san-pham/<?= $vdm["tenkhongdau"] ?>-<?= $vdm["id"] ?>">
    <figure><img class="img-fill" src="<?= _upload_sanpham_l.$vdm["photo"] ?>" alt="<?= $vdm["ten"] ?>">
    </figure><?= $vdm["ten"] ?></a>
    <?php 
    if(!empty($dmsp1)){ echo '<ul>';
    foreach($dmsp1 as $k => $v){ ?>
      <li><a href="san-pham/<?= $v["tenkhongdau"] ?>-<?= $v["id"] ?>/"><?= $v["ten"] ?></a></li>
    <?php } echo '</ul>'; } ?>
  </li>
  <?php } ?>
</ul>
</div>