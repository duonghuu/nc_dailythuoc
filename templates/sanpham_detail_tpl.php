<div class="">
        <div class="idx-tit">
            <h4><a href="san-pham.html">Thực đơn</a></h4>
            <p class="com-name"><?= $company["ten"] ?></p>
        </div>
        <ul class="danhmuc-list">
            <?php foreach($product_danhmuc as $klis=>$vlis){
                $cls = ($klis==0) ? 'class="active"':"";
                echo '<li '.$cls.'><a data-toggle="pill" href="#'.$vlis["tenkhongdau"].$vlis["id"].'">'.$vlis["ten"].'</a></li>';
            } ?>

        </ul>
        <div class="tab-content">
            <?php foreach($product_danhmuc as $klis=>$vlis){
                $cls = ($klis==0) ? 'active':"";
                $sanpham=get_result("select  mota$lang as mota,ten$lang as ten,tenkhongdau,id,thumb,photo,type from #_product where type='san-pham' and id_danhmuc='".$vlis["id"]."' and hienthi=1 order by stt asc");
                ?>
                <div id="<?= $vlis["tenkhongdau"].$vlis["id"] ?>" class="tab-pane <?= $cls ?>">
                    <div class="sanpham-flex">

                      <div class="sanpham-info">
                        <h3><?= $vlis["ten"] ?></h3>
                        <ul>
                          <?php foreach($sanpham as $k=>$v){ ?>
                          <li><a data-toggle="pill" href="#<?= $v["tenkhongdau"].$v["id"].$vlis["id"] ?>"><?= $v["ten"] ?></a></li>
                          <?php } ?>
                        </ul>
                      </div>
                      <div class="sanpham-img">
                        <div class="tab-content">
                        <?php foreach($sanpham as $k=>$v){ 
                          $cls2 = ($k==0) ? 'active':"";
                          ?>
                          
                            <div id="<?= $v["tenkhongdau"].$v["id"].$vlis["id"] ?>" class="tab-pane <?= $cls2 ?>">
                              <img src="<?= _upload_sanpham_l.$v["photo"] ?>" alt="<?= $v["ten"] ?>"><div class="desc"><?= $v["mota"] ?></div>
                            </div>
                          
                        <?php } ?>
                        </div>
                        <?php /* <?php if(!empty($sanpham)){ ?>
                                                <img src="<?= _upload_sanpham_l.$sanpham[0]["photo"] ?>" alt="<?= $sanpham[0]["ten"] ?>"><div class="desc"><?= $sanpham[0]["mota"] ?></div>
                                                <?php } ?> */?>
                      </div>
                    </div>
                </div>
          <?php } ?>
      </div>
</div>