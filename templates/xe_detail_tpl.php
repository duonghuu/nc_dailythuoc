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
                <a data-zoom-id="Zoom-detail" id="Zoom-detail" class="MagicZoom" href="<?php if($title_bar['photo']!=NULL) echo $thumbphoto._upload_sanpham_l.$title_bar['photo']; else echo 'images/noimage.gif';?>" title="<?=$title_bar['ten']?>"><img class='cloudzoom' src="<?php if($title_bar['photo']!=NULL) echo $thumbphoto._upload_sanpham_l.$title_bar['photo']; else echo 'images/noimage.gif';?>" /></a>

                <?php $count=count($hinhthem); if($count>0) {?>
                <?php for($j=0,$count_hinhthem=count($hinhthem);$j<$count_hinhthem;$j++){?>
                  <a data-zoom-id="Zoom-detail" id="Zoom-detail" class="MagicZoom" href="<?php if($hinhthem[$j]['photo']!=NULL) echo $thumbphoto._upload_hinhthem_l.$hinhthem[$j]['photo']; else echo 'images/noimage.gif';?>" title="<?=$title_bar['ten']?>" ><img src="<?php if($hinhthem[$j]['photo']!=NULL) echo $thumbphoto._upload_hinhthem_l.$hinhthem[$j]['photo']; else echo 'images/noimage.gif';?>" /></a>
                <?php }} ?>
            </div><!--.slick-->


          <?php $count=count($hinhthem); if($count>0) {?>
            <div class="slick">
                <p><img src="<?= ($title_bar['thumb'] != NULL)? $thumbhinhcon._upload_sanpham_l.$title_bar['thumb']:'images/noimage.gif' ?>" /></p>
                <?php for($j=0,$count_hinhthem=count($hinhthem);$j<$count_hinhthem;$j++){?>
                  <p><img src="<?php if($hinhthem[$j]['thumb']!=NULL) echo $thumbhinhcon._upload_hinhthem_l.$hinhthem[$j]['thumb']; else echo 'images/noimage.gif';?>" /></p>
                <?php } ?>
            </div><!--.slick-->
            <?php } ?>
            </div>
        </div><!--.zoom_slick-->
        <div class="product_info">
                <div class="ten li"><?=$title_bar['ten']?></div>
              
           
        </div>
  </div><!--.wap_pro-->

         <div id="tabs">
                    <ul id="ultabs">
                        <li data-vitri="0"><?=_thongtinchitiet?></li>
                        <?php /* <li data-vitri="1"><?=_binhluan?></li> */?>
                    </ul>
                    <div style="clear:both"></div>
        
                    <div id="content_tabs">
                        <div class="tab">
                            <?=$title_bar['noidung']?>
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
                    </div><!---END #content_tabs-->
                </div><!---END #tabs--> 
<div class="clear"></div>
</div><!--.box_containerlienhe-->
