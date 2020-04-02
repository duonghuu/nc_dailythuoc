<div class="tieude_giua"><div><?=_chitiet?></div></div>
<div class="box_container ">
	<div class="wap_pro">
    <?php 
    $thumbphoto = '';
    $thumbhinhcon = '';
    ?>
    <div class="zoom_slick">
      <div class="zoom-container zoomflex">
        <div class="slick2">
          <a data-zoom-id="Zoom-detail" id="Zoom-detail" class="MagicZoom" href="<?php if($row_detail['photo']!=NULL) echo $thumbphoto._upload_sanpham_l.$row_detail['photo']; else echo 'images/noimage.gif';?>" title="<?=$row_detail['ten']?>"><img class='cloudzoom' src="<?php if($row_detail['photo']!=NULL) echo $thumbphoto._upload_sanpham_l.$row_detail['photo']; else echo 'images/noimage.gif';?>" /></a>

          <?php $count=count($hinhthem); if($count>0) {?>
            <?php for($j=0,$count_hinhthem=count($hinhthem);$j<$count_hinhthem;$j++){?>
             <a data-zoom-id="Zoom-detail" id="Zoom-detail" class="MagicZoom" href="<?php if($hinhthem[$j]['photo']!=NULL) echo $thumbphoto._upload_hinhthem_l.$hinhthem[$j]['photo']; else echo 'images/noimage.gif';?>" title="<?=$row_detail['ten']?>" ><img src="<?php if($hinhthem[$j]['photo']!=NULL) echo $thumbphoto._upload_hinhthem_l.$hinhthem[$j]['photo']; else echo 'images/noimage.gif';?>" /></a>
           <?php }} ?>
         </div><!--.slick-->


         <?php $count=count($hinhthem); if($count>0) {?>
          <div class="slick">
            <p><img src="<?= ($row_detail['thumb'] != NULL)? $thumbhinhcon._upload_sanpham_l.$row_detail['thumb']:'images/noimage.gif' ?>" /></p>
            <?php for($j=0,$count_hinhthem=count($hinhthem);$j<$count_hinhthem;$j++){?>
             <p><img src="<?php if($hinhthem[$j]['thumb']!=NULL) echo $thumbhinhcon._upload_hinhthem_l.$hinhthem[$j]['thumb']; else echo 'images/noimage.gif';?>" /></p>
           <?php } ?>
         </div><!--.slick-->
       <?php } ?>
     </div>
   </div><!--.zoom_slick-->
   <div class="product_info">
    <div class="ten li"><?=$row_detail['ten']?></div>

    <?php if($row_detail['masp'] != '') { ?><div class="li"><b><?=_masanpham?>:</b> <?=$row_detail['masp']?></span></div><?php } ?>

    <?php if($row_detail['diachi'] != '') { ?><div class="li"><b><?=_diachi?>:</b> <?=$row_detail['diachi']?></span></div><?php } ?>

    <?php if($row_detail['dientich'] != '') { ?><div class="li"><b>Diện tích:</b> <?=$row_detail['dientich']?></span></div><?php } ?>

    
    <div class="gia <?php if($row_detail['giakm'] > 0)echo 'giacu'; ?> li"><?=_gia?>: <?php if($row_detail['gia'] > 0)echo number_format($row_detail['gia'],0, ',', '.').'  vnđ';else echo _lienhe; ?></div>

    <?php if($row_detail['giakm'] > 0) { ?><div class="giakm li"><?=_giakm?>: <?=number_format($row_detail['giakm'],0, ',', '.').' vnđ';?> <span class="tinh_phantram">-<?=tinh_phantram($row_detail['gia'],$row_detail['giakm']);?>%</span></div><?php } ?>
    <?php /* <?php if($row_detail['size'] != '') { ?> <div class="li"><b><?=_chonsize?>:</b> <?php $arr_size = explode(',',$row_detail['size']); foreach($arr_size as $key=>$value) {echo '<span class="size">'.$value.'</span>'; } ?> </div> <?php } ?> <?php if($row_detail['mausac'] != '') { ?> <div class="li"><b style="float:left;"><?=_chonmau?>:</b> <?php $arr_mausac = explode(',',$row_detail['mausac']); foreach($arr_mausac as $key=>$value) {echo '<span class="mausac" style="background:'.$value.'">'.$value.'</span>'; } ?> <div class="clear"></div> </div> <?php } ?> */?>

    <?php if(!empty($size2)) { ?>
     <div class="li"><b style="float:left;margin: 3px 7px 0 0"><?=_chonsize?>:</b>
      <?php 
      foreach($size2 as $key=>$value)
      {
        echo '<span class="size">'.$value["ten"].'</span>';
      }
      ?>
    </div>
  <?php } ?>

  <?php if(!empty($mausac2)) { ?>
   <div class="li"><b style="float:left;margin: 3px 7px 0 0"><?=_chonmau?>:</b>
    <?php 
    foreach($mausac2 as $key=>$value)
    {
      if($value["noibat"]>0){
        echo '<span class="mausac" style="background:url('._upload_tintuc_l.$value["photo"].')"></span>';
      }
      else{
        echo '<span class="mausac" style="background:'.$value["color"].'"></span>';
      }

    }
    ?>
    <div class="clear"></div>
  </div>
<?php } ?>
<?php if($row_detail['mota2'] != '') { ?><div class="content li"><?=$row_detail['mota2']?></div><?php } ?>

<div class="li"><b><?=_luotxem?>:</b> <span><?=$row_detail['luotxem']?></span></div>

<div class="li" style="display: flex;flex-wrap: wrap;justify-content: space-between;"><a class="dathang nutdathang" data-id="<?=$row_detail['id']?>">Thêm vào giỏ hàng</a> <a class="muangay" data-id="<?=$row_detail['id']?>">Mua ngay</a></div>

<?php /* <div class="li"><div class="danhgiasao" data-url="<?=getCurrentPageURL();?>"><?php for($i=1;$i<=10;$i++) { ?><span data-value="<?=$i?>"></span><?php } ?>&nbsp;&nbsp;<b class="num_danhgia"><?=$num_danhgiasao?>/10</b></div> </div> */?>

<div class="li"><?php include _template."layout/share.php";?></div>
</div>
</div><!--.wap_pro-->

<div id="tabs">
  <ul id="ultabs">
    <li data-vitri="0"><?=_thongtinchitiet?></li>
    <li data-vitri="1">Thông tin liên quan</li>
    <li data-vitri="2"><?=_binhluan?></li>
  </ul>
  <div style="clear:both"></div>

  <div id="content_tabs">
    <div class="tab">
      <?=$row_detail['noidung']?>
      <?php if(!empty($tags_sp)) { ?>
        <div class="tukhoa">
          <div id="tags">
            <span>Tags:</span>
            <?php
            foreach($tags_sp as $k=>$tags_sp_item) { 
              ?>
              <a href="tags/<?=changeTitle($tags_sp_item['ten'])?>-<?=$tags_sp_item['id']?>" title="<?=$tags_sp_item['ten']?>"><?=$tags_sp_item['ten']?></a>
            <?php } ?>
            <div class="clear"></div>
          </div>
        </div>
      <?php } ?>
    </div>
    <div class="tab">
      <?=$row_detail['diachi']?>
    </div>
    <div class="tab"> <?php //include _template."layout/comment.php";?> 
      <div class="fb-comments" data-href="<?=getCurrentPageURL()?>" data-numposts="5" data-width="100%"></div> 
    </div>
  </div><!---END #content_tabs-->
</div><!---END #tabs--> 
<div class="clear"></div>
</div><!--.box_containe-->
<?php if(count($product)>0) { ?>
  <div class="tieude_giua"><div><?=$title_other?></div></div>
  <div class="product-grid">
    <?php foreach ($product as $k => $v) { 
      showProduct($v);
    } ?>

  </div><!---END .wap_item-->
  <div class="pagination"><?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?></div>
<?php } ?>
