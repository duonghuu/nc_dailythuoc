
<div class="tourdetail-flex">
    <div class="tourdetail-left">
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

            <?php if($row_detail['masp'] != '') { ?><div class="li"><b><?=_masp?>:</b> <?=$row_detail['masp']?></span></div><?php } ?>

            <?php if($row_detail['dientich'] != '') { ?><div class="li"><b>Thời gian:</b> <?=$row_detail['dientich']?></span></div><?php } ?>

            <?php if($row_detail['phaply'] != '') { ?><div class="li"><b>Khởi hành:</b> <?=date('d/m/Y',$row_detail['phaply'])?></span></div><?php } ?>
            <div class="gia <?php if($row_detail['giakm'] > 0)echo 'giacu'; ?> li"><?=_gia?>: <?php if($row_detail['gia'] > 0)echo number_format($row_detail['gia'],0, ',', '.').'  vnđ';else echo _lienhe; ?></div>

            <?php if($row_detail['giakm'] > 0) { ?><div class="giakm li"><?=_giakm?>: <?=number_format($row_detail['giakm'],0, ',', '.').' vnđ';?> <span class="tinh_phantram">-<?=tinh_phantram($row_detail['gia'],$row_detail['giakm']);?>%</span></div><?php } ?>

        <?php if($row_detail['mota2'] != '') { ?><div class="content li"><?=$row_detail['mota2']?></div><?php } ?>

        <div class="li"><b><?=_luotxem?>:</b> <span><?=$row_detail['luotxem']?></span></div>
        <div class="li"><a href="book-tour/<?= $row_detail['tenkhongdau'] ?>-<?= $row_detail['id'] ?>.html" class="btn btn-primary"><?= _dattour ?></a></div>


        <div class="li"><?php include _template."layout/share.php";?></div>
        </div>
        </div><!--.wap_pro-->
        <div class="table-giatour">
          <div class="table-giatour-th">
            <div class="table-giatour-title">Giá tour</div>
            <div class="table-giatour-title">Việt Nam</div>
            <div class="table-giatour-title">Nước ngoài</div>
          </div>
          <div class="table-giatour-tr">
            <div class="giatour-dt">Giá người lớn (Từ 12 tuổi trở lên)</div>
            <div class="giatour-dt"><?=num_format($row_detail['nguoilon'])?></div>
            <div class="giatour-dt"><?=num_format($row_detail['nguoilon1'])?></div>
          </div>
          <div class="table-giatour-tr">
            <div class="giatour-dt">Giá trẻ em (Từ 10 - 12 tuổi)</div>
            <div class="giatour-dt"><?=num_format($row_detail['treem'])?></div>
                        <div class="giatour-dt"><?=num_format($row_detail['treem1'])?></div>
          </div>
          <div class="table-giatour-tr">
            <div class="giatour-dt">Giá em bé (Từ 5 - dưới 10 tuổi)</div>
            <div class="giatour-dt"><?=num_format($row_detail['embe'])?></div>
                        <div class="giatour-dt"><?=num_format($row_detail['embe1'])?></div>
          </div>
          <div class="table-giatour-tr">
            <div class="giatour-dt">Giá em nhỏ (Từ 2 - dưới 5 tuổi)</div>
            <div class="giatour-dt"><?=num_format($row_detail['emnho'])?></div>
                        <div class="giatour-dt"><?=num_format($row_detail['emnho1'])?></div>
          </div>
          <div class="table-giatour-tr">
                <div class="giatour-dt">Giá bé sơ sinh (Dưới 2 tuổi)</div>
                <div class="giatour-dt"><?=num_format($row_detail['sosinh'])?></div>
                            <div class="giatour-dt"><?=num_format($row_detail['sosinh1'])?></div>
              </div>
          <div class="table-giatour-tr">
                <div class="giatour-dt">Phụ thu phòng đơn</div>
                <div class="giatour-dt"><?=num_format($row_detail['phongdon'])?></div>
                            <div class="giatour-dt"><?=num_format($row_detail['phongdon1'])?></div>
              </div>
          <div class="table-giatour-tr">
                <div class="giatour-dt">Phụ thu Visa</div>
                <div class="giatour-dt"><?=num_format($row_detail['visa'])?></div>
                            <div class="giatour-dt"><?=num_format($row_detail['visa1'])?></div>
              </div>
        </div>
        <div id="tabs">
          <ul id="ultabs">
            <li data-vitri="0"><?=_thongtinchitiet?></li>
            <?php /* <li data-vitri="1"><?=_binhluan?></li> */?>
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
            <?php /* <div class="tab"> <?php //include _template."layout/comment.php";?> <div class="fb-comments" data-href="<?=getCurrentPageURL()?>" data-numposts="5" data-width="100%"></div> </div> */?>
          </div><!---END #content_tabs-->
        </div><!---END #tabs--> 
        <div class="clear"></div>
        </div><!--.box_containe-->
    </div>
    <div class="tourdetail-right">
        <?php 
        $tuvan=get_fetch("select noidung$lang as noidung from #_about where type='tu-van'");
        $vanphong=get_fetch("select noidung$lang as noidung from #_about where type='van-phong'");
         ?>
        <div class="panel panel-default">
          <div class="panel-heading"><i class="fas fa-phone-alt"></i> <?= _tuvanvadatcho ?></div>
          <div class="panel-body"><div class="content"><?= $tuvan["noidung"] ?></div></div>
        </div>

        <div class="panel panel-default">
          <div class="panel-heading"><i class="fas fa-map-marker-alt"></i> <?= _diachivanphong ?></div>
          <div class="panel-body"><div class="content"><?= $vanphong["noidung"] ?></div></div>
        </div>
    </div>
</div>