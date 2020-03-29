<div class="tieude_giua"><div><?=$title_cat?></div></div>
<div class="box_container">
  <div class="content">
    <div class="mainimg">
      <img src="<?=_upload_tintuc_l.$row_detail['photo']?>" class="img-responsive center-block" alt="<?=$row_detail['ten']?>">
    </div>

    <div class="ngaydang">
      <p><i class="far fa-clock"></i> Ngày đăng: <?= date('d/m/Y',$row_detail["ngaytao"]) ?></p>
    </div>
    
    <div class="congtrinh-content">
       <div class="congtrinh-desc">
        <?php echo $row_detail["mota"]; ?>
      </div>
     <div class="content">
      <?php echo $row_detail["noidung"]; ?>
    </div>
  </div>
  <div class="thuvien-grid">
    <?php foreach($hinhthem as $k=>$v){
      echo '<div class="thuvien-item"><a href="'._upload_hinhthem_l.$v["photo"].'" data-fancybox="gallery27" ><img src="'._upload_hinhthem_l.$v["thumb"].'" alt="hinhthem"><section><i class="fas fa-search"></i></section></a></div>';
    } ?>
  </div>
        <?php /* 
 <?php if(count($hinhthem) > 0) { ?>
          <link href="css/fotorama.css" rel="stylesheet">
          <script src="js/fotorama.js" type="text/javascript"></script>
          <div class="fotorama" data-nav="thumbs" data-maxheight="500" data-arrows="true" data-thumbwidth="" data-thumbheight="" data-loop="true" data-autoplay="4000" data-fit="contain" data-allowfullscreen="true" data-stopautoplayontouch="false">
              <?php for($j=0,$count_hinhthem=count($hinhthem);$j<$count_hinhthem;$j++){?>
                  <img src="<?=_upload_hinhthem_l.$hinhthem[$j]['photo']; ?>" />
              <?php } ?>
          </div>
      <?php } ?>
        <?=$row_detail['noidung']?>
        <div class="addthis_native_toolbox"></div> */?>
        <?php if(count($tintuc) > 0) { ?>
          <div class="othernews">
           <div class="cactinkhac"><?=$title_other?></div>
           <ul class="khac">
            <?php foreach($tintuc as $k => $v) { ?>
              <li><a href="<?=$v['type']?>/<?=$v['tenkhongdau']?>-<?=$v['id']?>.html" title="<?=$v['ten']?>"><i class="far fa-hand-point-right"></i><?=$v['ten']?></a> (<?=make_date($v['ngaytao'])?>)</li>
            <?php }?>
          </ul>
          <div class="pagination"><?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?></div>
        </div><!--.othernews-->
      <?php }?>
    </div><!--.content-->
  </div><!--.box_container-->