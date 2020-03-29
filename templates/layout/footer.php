<footer id="footer" >
 <div class="ft-top " >

  <div class="container">
    <div class="ft-flex">
    <div class="ft-info"> 
      
        <div class="content"> <?php echo lay_text('footer'); ?> </div>
        
    </div>
    <div class="ft-baiviet">
      <div class="ft-tit">HỖ TRỢ KHÁCH HÀNG</div>
      <?= for1("news","chinh-sach","chinhsach",".html") ?>
    </div>
     <div class="ft-lienhe">
       <div class="ft-tit">Kết nối</div>
       <div class="mxh"><?= lay_mxh('mxh') ?></div>
       <div class="ft-tit">Cách thức thanh toán</div>
       <div class="mxh"><?= lay_mxh('mxhft') ?></div>
       <div class="ft-tit">Dịch vụ giao hàng</div>
       <div class="mxh"><?= lay_mxh('mxhle') ?></div>
     </div>
      
      
    </div>
  </div>
</div>
<div class="copyright">
  <div class="container" style="z-index: 1">
    <div class="ft-wrap">
      <p class="text">Copyright © 2019 ĐẠI LÝ THUỐC. All rights reserved. Design By triluc</p>
      <?php /*<ul class="ft-thongke">
       <li>Online: <span><?php $count=count_online();echo $tong_xem=$count['dangxem'];?></span></li>
        <li><?=_thongketuan?>: <span><?=$trongtuan;?></span></li> 
       <li><?=_thongkethang?>: <span><?=$trongthang;?></span></li>  <li><?=_ngayhomqua?>: <span><?=$homqua;?></span></li>  
       <li><?=_tongtruycap?>: <span><?php $count=count_online();echo $tong_xem=$count['daxem'];?></span></li>
     </ul> */?>
   </div>
 </div>
</div>
</footer>
<?php /* <div class="codebando"><?= $company["bando"] ?></div>  include _template."layout/dangkynhantin.php";<img src="https://placehold.it/600x520" alt="" style="   -webkit-clip-path: polygon(25% 0, 75% 0, 100% 50%, 75% 100%, 25% 100%, 0 50%);clip-path: polygon(25% 0, 75% 0, 100% 50%, 75% 100%, 25% 100%, 0 50%);   "> https://bennettfeely.com/clippy/ */?>