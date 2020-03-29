<div class="index-flex-box">
<div class="container">
   
<div class="index-flex">
    <div class="index-flex-left">
        <div class="index-flex-title">Khách hàng cần biết</div>
        <div class="canbiet-box">
            <?php foreach ($canbiet as $key => $value) {
                if($value["noibat"]==0){
                echo '<div class="canbiet-item"><a href="'.$value["link"].'">
                        <figure><img src="'._upload_tintuc_l.$value["photo"].'" alt="'.$value["ten"].'"></figure>
                    </a></div>';
                }else{
                    echo '<div class="canbiet-item"><a href="#" data-toggle="modal" data-target="#'.$value["tenkhongdau"].$value["id"].'">
                            <figure><img src="'._upload_tintuc_l.$value["photo"].'" alt="'.$value["ten"].'"></figure>
                        </a></div>';
                }
            } ?>
        </div>
      
        <div class="quangcao-box">
            <?php foreach ($quangcao as $key => $value) {
                echo '<div class="quangcao-box-item"><a href="'.$value["link"].'">
                        <figure><img src="'._upload_hinhanh_l.$value["photo"].'" alt="'.$value["ten"].'"></figure>
                    </a></div>';
            } ?>
        </div>
    </div>
    <div class="index-flex-right">
    
        <?php foreach ($product_danhmucnb as $kdm => $vdm) { 
            $product=get_result("select ten$lang as ten,tenkhongdau,id,type,thumb,photo,gia,giakm from 
            #_product where type='sanpham' and id_danhmuc = '".$vdm["id"]."' and hienthi=1 order by stt asc limit 0,3");
            ?>
            <div class="index-dm-title"><h2><a href="<?= $link1 ?>"><?=  $vdm["ten"] ?></a></h2>
                <a href="<?= $link1 ?>">Xem thêm</a>
            </div>
            <div class="product-grid">
                <?php foreach ($product as $key => $value) {
                    showProduct($value);
                } ?>
            </div>
        <?php } ?>
    </div>
</div>
</div>
</div>
<?php /* <?php if($about){ ?>
<div class="about-bg">
  
    <div class="container">
        <div class="about-flex">
            <a href="gioi-thieu.html" class="imgsp"><img src="<?= _upload_hinhanh_l.$about["photo"] ?>" alt="<?= _gioithieu ?>"></a>
            <div class="info">
                <p class="welcome">Welcome to</p>
                <h2 class="title">Đậu beauty spa</h2>
                <div class="content"><?= $about["mota2"] ?></div>
                <a hrer="gioi-thieu.html" class="xemct"><img src="images/xemct.jpg" alt="xem"></a>
            </div>
        </div>
    </div>
</div>
<?php } ?> */?>
<?php if($dichvu){ ?>
<div class="dichvu-bg">
   
    <div class="container">
        <div class="idx-tit">
            <h2><a href="dich-vu.html">Vì sao tin tưởng chúng tôi</a></h2>
            <div class="idx-desc"><?= $txtdichvu["mota"] ?></div>
        </div>
        <div class="dichvu-main clearfix">
            <?php foreach ($dichvu as $key => $value) {
                $s = sprintf('%02d', $key+1);
                $link = get_url($value,"dich-vu");
                $img = _upload_tintuc_l.$value["photo"];
                echo '<div class="dichvu-item"><a href="'.$link.'"><div class="tinimg">
                    <figure><img src="1x1.png" data-lazy="'.$img.'" alt="'.$value["ten"].'"></figure>
                </div><div class="info"><h5 class="line-clamp">'.$value["ten"].'</h5><div class="line-clamp desc">'.$value["mota"].'</div></div><span class="stttin">'.$s.'</span></a></div>';
            } ?>
        </div>
    </div>
</div>
<?php } ?>
<?php if($spnoibat){ ?>
<div class="spnoibat-bg">
   
    <div class="container">
        <div class="idx-tit">
            <h2><a href="san-pham.html">Sản phẩm chăm sóc</a></h2>
            <div class="idx-desc"><?= $txtsp["mota"] ?></div>
        </div>
        <div class="spnoibat-main clearfix">
            <?php foreach ($spnoibat as $key => $value) {
                showProduct($value);
            } ?>
        </div>
    </div>
</div>
<?php } ?>
<?php /* <?php if($thuvien){ ?>
<div class="thuvien-bg">
    <div class="container">
        <div class="idx-tit">
            <h2><a href="thu-vien.html">album hình ảnh</a></h2>
            <div class="idx-desc"><?= $txtthuvien["mota"] ?></div>
        </div>
      
        <div class="thuvien-grid">
            <?php foreach ($thuvien as $key => $value) {
                $link = get_url($value,"thu-vien");
                $img = _upload_tintuc_l.$value["photo"];
                echo '<div class="thuvien-item"><a href="'.$link.'">
                        <figure><img src="'.$img.'" alt="'.$value["ten"].'"></figure>
                        <div class="info">
                            <h6>'.$value["ten"].'</h6>
                        </div>
                    </a></div>';
            } ?>
        </div>
    </div>
</div>
<?php } ?> */?>
<div class="tin-camnang-bg">
  
    <div class="container">
        <div class="tin-camnang-flex">
            <div class="tin-bg">
                <div class="title">Tin tức &amp; sự kiện</div>
                <?= for1("news","tin-tuc","tintuc",".html") ?>
            </div>
            <div class="camnang-bg">
                
                <div class="title">BLOG SỨC KHỎE</div>
                <?= for1("news","cam-nang","camnang",".html") ?>
            </div>
        </div>
    </div>
</div>
<?php /* <div class="lichhen-bg">
   
    <div class="container">
        <div class="lichhen-box">
            <div class="lich-head">
                <div class="title">Đặt lịch hẹn</div>
                <p>vui lòng đặt lịch hẹn sử dụng dịch vụ trước khi đến để được ưu tiên.</p>
            </div>
            <form action="" method="post">
                <div class="form-row">
                <div class="form-group">
                    <input type="text" name="" placeholder="" class="form-control">
                </div>
                <div class="form-group">
                    <select name="" class="form-control">
                        <option value="">Chọn thời gian</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="date" name="" placeholder="" class="form-control">
                </div>
                </div>
                <div class="form-row">
                <div class="form-group">
                    <input type="text" name="" placeholder="" class="form-control">
                </div>
                <div class="form-group">
                    <select name="" class="form-control">
                        <option value="">Chọn dịch vụ</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="date" name="" placeholder="" class="form-control">
                </div>
                </div>
                <button class="btn btn-default btn-block" type="submit">Đặt lịch</button>
            </form>
            <div class="giomo"><strong>Giờ mở cửa: </strong><?= $thuoctinh["tt_giomo"] ?></div>
        </div>
    </div>
</div> 
<div class="lichhen-bg">
   
    <div class="container">
        <div class="lichhen-box">
            <div class="lich-head">
                <div class="title">Gửi đơn thuốc</div>
                <p>Vui lòng gửi thông tin liên hệ với chúng tôi tại đây.</p>
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
                <div class="form-group">
                    <input type="text" name="fpu[benhvien]" placeholder="Bệnh viện khám" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" name="fpu[bacsi]" placeholder="Bác sĩ khám" class="form-control">
                </div>
                </div>
                <input type="hidden" name="rp2val" value="1">
                <input type="hidden" name="rp2token" value="<?= time() ?>">
                <input type="hidden" name="recaptchaResponse2" id="recaptchaResponse2">
                <div class="form-group">
                    <a class="file_input btn btn-default text-white" data-jfiler-name="files" data-jfiler-extensions="jpg, jpeg, png, gif"><i class="fa fa-paperclip"></i>Ảnh đính kèm</a>
                </div>
                <button class="btn btn-default btn-block" type="submit">Gửi</button>
            </form>
            <div class="giomo"><strong>Giờ mở cửa: </strong><?= $thuoctinh["tt_giomo"] ?></div>
        </div>
    </div>
</div>*/?>