<div class="hotro danhmuc">
  <div class="tieude"><?=_hotrotructuyen?></div>
  <div class="danhmuc-box">

    <div class="hotro-img"><img src="images/hotro.png" alt="<?=_hotrotructuyen?>"></div>
    <div class="hotro-hotline"><a href="tel:<?=preg_replace('/[^0-9]/','',$company['dienthoai']);?>"><?=$company['dienthoai']?></a></div>
    <div class="hotro-title">Hỗ trợ tư vấn</div>
    <?php foreach($yahoo as $key => $value) { ?>
      <div class="hotro-item">
        
        <p><?= $value["ten"] ?>: <span><?= $value["dienthoai"] ?></span></p>
        <p>Email: <?= $value["email"] ?></p>
      </div>
    <?php } ?>
    <div class="mxh"><?= lay_mxh('mxh') ?></div>
  </div>
</div><!-- hotro -->
 <?php /* <div class="danhmuc dm-sp">
   
   <div class="tieude">Danh mục sản phẩm</div>
   <div class="danhmuc-box">
     <?= for2cap('product_danhmuc','product_list','san-pham','san-pham','','') ?>
   </div>
 </div> */?>
 <div class="chaysp danhmuc">

  <div class="tieude">tin mới nhất</div>
  <div class="danhmuc-box">
   <div class="tinmoi-container">
     <ul class="tinchay-box">
        <?php foreach ($tinnb as $key => $value) {
          echo '<li class="tinchay-item"><a href="'.get_url($value).'">
            <figure><img src="'._upload_tintuc_l.$value["thumb"].'" alt="'.$value["ten"].'"></figure><h5 class="line-clamp">'.$value["ten"].'</h5>
          </a></li>';
        } ?>
     </ul>

   </div>
 </div>
 </div>

<?php /* <div class="chaysp danhmuc">

 <div class="tieude"><?=_sanphamnoibat?></div>
 <div class="danhmuc-box">
  <div class="tinmoi-container">
    <ul>
      <?php foreach ($spnoibat as $key => $value) {
        $giasp = ($value["giakm"]>0)?$value["giakm"]:$value["gia"];
        $gia = ($giasp>0)?num_format($giasp).' đ':_lienhe;
        $s_gia = "";
        if($value["giakm"]>0) {
          
          $s_gia .= '<span>'.num_format($value["giakm"]).' đ</span>';
          $s_gia .= '<del>'.num_format($value["gia"]).' đ</del>';
        }else{
          $s_gia .= '<span>'.$gia.'</span>';
        }
        echo '<li><a href="'.get_url($value).'">
          <figure><img src="'._upload_sanpham_l.$value["thumb"].'" alt="'.$value["ten"].'"></figure>
          <h3>'.$value["ten"].'</h3><p>Giá: '.$s_gia.'</p>
        </a></li>';
      } ?>
    </ul>
  </div>
</div>
</div><!-- hotro --> */?>
