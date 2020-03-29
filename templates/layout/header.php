<header class="hd-bg " >

  <div class="container">
    <div class="hd-flex">
      <a href="" class="logo" ><img src="<?= _upload_hinhanh_l.$logolang["photo"] ?>" alt="logo"></a> 
      <div class="hd-right">
        <div class="hd-right-top">
          <?php foreach ($thongtin as $key => $value) {
            $img=_upload_tintuc_l.$value["photo"];
            $link=get_url($value,'thong-tin');
            echo '<article><figure><img class="img-fill" src="'.$img.'" alt="'.$value["ten"].'" /></figure> <a href="'.$link.'">'.$value["ten"].'</a></article>';
          } ?>
        </div>
        <div class="hd-right-bot">
          <?php if($deviceType=="computer"){ ?>
          <div id="search">
            <div class="my-search">
              <input type="text" class="form-control keyword" required="true" onkeypress="doEnter(event)" value="<?=_nhaptukhoatimkiem?>..." onclick="if(this.value=='<?=_nhaptukhoatimkiem?>...'){this.value=''}" onblur="if(this.value==''){this.value='<?=_nhaptukhoatimkiem?>...'}"> <span onclick="onSearch($(this));return false;" class="btn_search">Tìm</span> </div>
            </div>
          <?php } ?>
            <div class="hd-hotline"><img src="images/hd-hotline.jpg" alt=""><a href="tel:<?=preg_replace('/[^0-9]/','',$company['dienthoai']);?>" ><?= $company['dienthoai'] ?></a></div>
            <a href="gio-hang.html" class="giohang_fix" ><img src="images/cart.jpg" alt="cart"><span><?= count($_SESSION["cart"]) ?></span></a> 
          </div>
        </div>
      </div>
    </div>
  </header>
