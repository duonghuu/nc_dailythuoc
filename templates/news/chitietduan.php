<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <?php 
  $thumbphoto = 'thumb/800x780/2/';
  $thumbhinhcon = 'thumb/280x280/2/';
   ?>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <a data-fancybox="gallery27" data-caption="<?= $row_detail['ten'] ?>" href="<?php if($row_detail['photo']!=NULL) echo _upload_tintuc_l.$row_detail['photo']; else echo 'images/noimage.gif';?>"><img src="<?php if($row_detail['photo']!=NULL) echo $thumbphoto._upload_tintuc_l.$row_detail['photo']; else echo 'images/noimage.gif';?>" alt="<?= $row_detail['ten'] ?>"></a>
    </div>
    <?php $count=count($hinhthem); if($count>0) {?>
    <?php for($j=0,$count_hinhthem=count($hinhthem);$j<$count_hinhthem;$j++){
      ?>
        <div class="item">
          <a data-fancybox="gallery27" data-caption="<?= $row_detail['ten'] ?>" href="<?php if($hinhthem[$j]['photo']!=NULL) echo _upload_hinhthem_l.$hinhthem[$j]['photo']; else echo 'images/noimage.gif';?>"><img src="<?php if($hinhthem[$j]['photo']!=NULL) echo $thumbphoto._upload_hinhthem_l.$hinhthem[$j]['photo']; else echo 'images/noimage.gif';?>" alt="<?= $row_detail['ten'] ?>"></a>
        </div>
    <?php }} ?>
  </div>
  <!-- Indicators -->
  <ol class="carousel-hinhthumb carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"><img src="<?php if($row_detail['photo']!=NULL) echo $thumbphoto._upload_tintuc_l.$row_detail['photo']; else echo 'images/noimage.gif';?>" alt="<?= $row_detail['ten'] ?>"></li>
    <?php $count=count($hinhthem); if($count>0) { ?>
    <?php for($j=0,$count_hinhthem=count($hinhthem);$j<$count_hinhthem;$j++){ ?>
        <li data-target="#myCarousel" data-slide-to="<?= $j+1 ?>" ><img src="<?php if($hinhthem[$j]['photo']!=NULL) echo $thumbphoto._upload_hinhthem_l.$hinhthem[$j]['photo']; else echo 'images/noimage.gif';?>" alt="<?= $row_detail['ten'] ?>"></li>
    <?php } } ?>
  </ol>
</div>
<div class="content">
  <?= $row_detail['noidung'] ?>
</div>