<?php 
$hethongs = get_result("select type,ten$lang as ten,mota2$lang as mota2,mota$lang as mota,id,tenkhongdau,photo,thumb from #_news where type='cua-hang' and hienthi>0 order by stt asc");
 ?>
<div class="tieude_giua"><div><?=$title_cat?></div></div>
<div class="hethongcuahang">
    
    <ul class="hethong-nav">
      <?php foreach ($hethongs as $key => $value) {
        $dmiden = $value["tenkhongdau"].$value["id"];
        $clsa = ($key==0)?'class="active"':'';
          echo '<li '.$clsa.'><a data-toggle="pill" href="#'.$dmiden.'">'.$value["ten"].'</a></li>';
      } ?>
    </ul>

    <div class="tab-content">
        <?php foreach ($hethongs as $key => $value) {
          $dmiden = $value["tenkhongdau"].$value["id"];
          $clsa = ($key==0)?'active':'';
          $hinhthem = get_result("select id,ten$lang as ten,thumb,photo FROM #_hinhanh where id_hinhanh='".$value['id']."' and type='".$value['type']."' order by stt,id desc");
          ?>
      <div id="<?= $dmiden ?>" class="tab-pane <?= $clsa ?>">
        <div class="hethong-flex">
            
            <div class="hethong-imgs">
                <div id="myCarousel<?= $dmiden ?>" class="carousel slide" data-ride="carousel">
                  <?php 
                  $thumbphoto = 'thumb/700x410/2/';
                  $thumbhinhcon = 'thumb/200x130/2/';
                   ?>

                  <!-- Wrapper for slides -->
                  <div class="carousel-inner">
                    <div class="item active">
                      <a data-fancybox="gallery<?= $dmiden ?>" data-caption="<?= $value['ten'] ?>" href="<?php if($value['photo']!=NULL) echo _upload_tintuc_l.$value['photo']; else echo 'images/noimage.gif';?>"><img src="<?php if($value['photo']!=NULL) echo $thumbphoto._upload_tintuc_l.$value['photo']; else echo 'images/noimage.gif';?>" alt="<?= $value['ten'] ?>"></a>
                    </div>
                    <?php $count=count($hinhthem); if($count>0) {?>
                    <?php for($j=0,$count_hinhthem=count($hinhthem);$j<$count_hinhthem;$j++){
                      ?>
                        <div class="item">
                          <a data-fancybox="gallery<?= $dmiden ?>" data-caption="<?= $value['ten'] ?>" href="<?php if($hinhthem[$j]['photo']!=NULL) echo _upload_hinhthem_l.$hinhthem[$j]['photo']; else echo 'images/noimage.gif';?>"><img src="<?php if($hinhthem[$j]['photo']!=NULL) echo $thumbphoto._upload_hinhthem_l.$hinhthem[$j]['photo']; else echo 'images/noimage.gif';?>" alt="<?= $value['ten'] ?>"></a>
                        </div>
                    <?php }} ?>
                  </div>
                  <!-- Indicators -->
                  <ol class="carousel-hinhthumb carousel-indicators">
                    <li data-target="#myCarousel<?= $dmiden ?>" data-slide-to="0" class="active"><img src="<?php if($value['photo']!=NULL) echo $thumbphoto._upload_tintuc_l.$value['photo']; else echo 'images/noimage.gif';?>" alt="<?= $value['ten'] ?>"></li>
                    <?php $count=count($hinhthem); if($count>0) { ?>
                    <?php for($j=0,$count_hinhthem=count($hinhthem);$j<$count_hinhthem;$j++){ ?>
                        <li data-target="#myCarousel<?= $dmiden ?>" data-slide-to="<?= $j+1 ?>" ><img src="<?php if($hinhthem[$j]['photo']!=NULL) echo $thumbphoto._upload_hinhthem_l.$hinhthem[$j]['photo']; else echo 'images/noimage.gif';?>" alt="<?= $value['ten'] ?>"></li>
                    <?php } } ?>
                  </ol>
                </div>
            </div>
            <div class="hethong-info">

                <div class="hethong-info-img"><img src="<?= _upload_tintuc_l.$value["thumb"] ?>" alt="<?= $value["ten"] ?>"></div>
                <div class="hethong-info-content">
                    <h5><?= $value["ten"] ?></h5>
                    <div class="content"><?= $value["mota2"] ?></div>
                </div>
                <div class="hethong-bando">
                    <?= $value["mota"] ?>
                </div>
            </div>
        </div>
      </div>
    <?php } ?>
    </div>
</div>