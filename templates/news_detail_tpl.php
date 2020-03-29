<div class="tieude_giua"><div><?=$title_cat?></div></div>
<div class="box_container">
    <div class="content">
        <?=$row_detail['noidung']?>
    
</div><!--.content-->
<?php include _template."layout/share.php";?>
<?php if(count($tintuc) > 0) { ?>
            <div class="othernews">
             <div class="cactinkhac"><?=$title_other?></div>
             <ul class="khac">
              <?php 
              foreach($tintuc as $k => $v) { ?>
                  <li><a href="<?=get_url($v,$com)?>" title="<?=$v['ten']?>"><i class="far fa-hand-point-right"></i><?=$v['ten']?></a> (<?=make_date($v['ngaytao'])?>)</li>
              <?php }?>
          </ul> 
          <div class="pagination"><?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?></div>
      </div><!--.othernews-->
    <?php }?>
</div><!--.box_container-->