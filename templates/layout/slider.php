<div class="slider-box-bg">
  <div class="container">
    <div class="slider-box-flex">
      <?php 
      if($source != "index1"){
        $slider=get_result("select ten$lang as ten,mota$lang as mota,link,photo,thumb from #_slider where hienthi=1 and type='slider' order by stt");
        ?>
        <div id="slideshow">
         <div class="slideshow-slider-main clearfix">
           <?php foreach ($slider as $key => $v) {?>
             <div class="slideshow-slider-item">
               <a href="<?= $v["link"] ?>" title="<?= $v['ten'] ?>">
                <img src="<?= _upload_hinhanh_l.$v["photo"] ?>" alt="<?= $v['ten'] ?>" class="img-fill" />
                <?php /* <div class="slide-text"> <div class="slide-text-flex"> <div class="sl-ten1"> <?= $v["ten"]?> </div> <div class="desc"> <?= $v['mota'] ?> </div> <span>Xem thêm</span> </div> </div> */?>
              </a> 
            </div>
          <?php } ?>
        </div>
      </div>
      <div class="slider-form">
        <div class="lichhen-box">
            <div class="lich-head">
                <div class="title">Gửi đơn thuốc</div>
               <?php /*  <p>Vui lòng gửi thông tin liên hệ với chúng tôi tại đây.</p> */?>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-row">
                <div class="form-group">
                    <input type="text" name="fpu[ten]" required="" placeholder="<?= _hovaten ?>" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" name="fpu[diachi]" placeholder="<?= _diachi ?>" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" name="fpu[dienthoai]" required="" placeholder="<?= _dienthoai ?>" class="form-control">
                </div>
                </div>
                <div class="form-row">
                <div class="form-group">
                    <input type="text" name="fpu[email]" placeholder="<?= _email ?>" class="form-control">
                </div>
                <?php /* <div class="form-group">
                                    <input type="text" name="fpu[benhvien]" placeholder="Bệnh viện khám" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="fpu[bacsi]" placeholder="Bác sĩ khám" class="form-control">
                                </div> */?>
                </div>
                <input type="hidden" name="rp2val" value="1">
                <input type="hidden" name="rp2token" value="<?= time() ?>">
                <input type="hidden" name="recaptchaResponse2" id="recaptchaResponse2">
                <div class="form-group">
                    <a class="file_input btn btn-default text-white" data-jfiler-name="files" data-jfiler-extensions="jpg, jpeg, png, gif"><i class="fa fa-paperclip"></i>Ảnh đính kèm</a>
                </div>
                <button class="btn btn-default btn-block" type="submit">Gửi</button>
            </form>
            <div class="giomo" style="padding-bottom: 10px;"><strong> </strong> </div>
            <?php /* <div class="giomo"><strong>Giờ mở cửa: </strong><?= $thuoctinh["tt_giomo"] ?></div> */?>
        </div>

      </div>
    <?php }else{ 
  // $bntype = $type;
  // if($type=="about") $bntype = 'gioi-thieu';
  // if($type=="thong-tin") $bntype = 'tin-tuc';
  // $bntrong=get_fetch("select ten$lang as ten,tenkhongdau,photo,thumb from #_news where type='bntrong' and ten='".$bntype."'");
  // <div class="inner-banner" style="background-image: url(images/banner.jpg)">
  // </div>
    }
    ?>
  </div>
</div>
</div>