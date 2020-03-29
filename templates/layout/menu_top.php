<div class="nav-bg">
  <div class="container">
         <div class="dmspbox">
           <p class="tit text-uppercase text-center"><i class="fa fa-bars" aria-hidden="true"></i> <?php echo _danhmucsanpham ?></p>
           <div class="dmsp-container " >
              <ul class="scrollstyle-4" style="  overflow-y: scroll">
             <?php foreach($product_danhmuc as $klis => $vlis){
               $d->query("select * from #_product_list where type='sanpham' and id_danhmuc='".$vlis["id"]."' and hienthi>0 order by stt asc");
               $dmsp1 = $d->result_array();
               $clshas = (!empty($dmsp1))?"has-sub":"";  
             ?>
             <li class="<?= $clshas ?> hoverhori"><a href="san-pham/<?= $vlis["tenkhongdau"] ?>-<?= $vlis["id"] ?>"><figure><img class="img-fill" src="<?= _upload_sanpham_l.$vlis["photo"] ?>" alt="<?= $vlis["ten"] ?>"></figure><?= $vlis["ten"] ?></a>
               <?php 
               if($clshas == 'has-sub'){ echo '<ul>';
               foreach($dmsp1 as $k => $v){ ?>
               <li><a href="san-pham/<?= $v["tenkhongdau"] ?>-<?= $v["id"] ?>/"><i class="fas fa-angle-right"></i> <?= $v["ten"] ?></a></li>
             <?php } echo '</ul>'; }?>
             </li>
             <?php } ?>
             </ul>
           </div>
         </div>
      <div class="main-nav">
        
        <ul>
          <?php include _template."layout/menu_content.php";?>
        </ul>
        
        </div>

  <?php /* <button class="openBtn timkiem_icon" ><i class="fas fa-search"></i></button> <div id="search" > <div class="my-search"> <input type="text" class="form-control keyword" required="true" onkeypress="doEnter(event)" value="<?=_nhaptukhoatimkiem?>..." onclick="if(this.value=='<?=_nhaptukhoatimkiem?>...'){this.value=''}" onblur="if(this.value==''){this.value='<?=_nhaptukhoatimkiem?>...'}"> <span onclick="onSearch($(this));return false;" class="btn_search"><i class="fas fa-search"></i></span> </div> </div> <div id="myOverlay" class="overlay" style="display: none;"> <span class="closebtn" onclick="closeSearch()" title="Close Overlay">×</span> <div class="overlay-content"> <input type="text" autocomplete="off" placeholder="Nhập từ khóa cần tìm" class="keyword" required="true" placeholder="<?=_nhaptukhoatimkiem?>..." onclick="if(this.value=='<?=_nhaptukhoatimkiem?>...'){this.value=''}" onblur="if(this.value==''){this.value='<?=_nhaptukhoatimkiem?>...'}"> <button type="button" onclick="onSearch($(this));return false;"><i class="fas fa-search"></i></button> </div> </div> */?>
</div>
</div>
<?php /* <script> function openSearch() {document.getElementById("myOverlay").style.display = "block"; } function closeSearch() {document.getElementById("myOverlay").style.display = "none"; } </script> 
<script type="text/javascript">
  $(document).ready(function() {
    $('.timkiem_icon').click(function(event) {
      if($('#search').hasClass('hien')){
        $('#search').removeClass('hien');
      }else{
        $('#search').addClass('hien');
      }
    });
  });
</script>*/?>