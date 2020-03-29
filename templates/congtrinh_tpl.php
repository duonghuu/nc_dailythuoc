
<div class="tieude_giua"><div><?=$title_cat?></div></div>
   <?php /*  <?php
       $hinhthem = get_result("select id,ten$lang as ten,thumb,photo FROM #_hinhanh where type='".$type."' and hienthi=1 order by stt,id desc");
        if(!empty($hinhthem)){
        ?>
        
   
               <div class="tva-detail w-clear" id="tva" style="display:none;">
                   <?php foreach ($hinhthem as $key => $value) {
                       $img = _upload_hinhthem_l.$value["photo"];
                       $thumbimg = _upload_hinhthem_l.$value["photo"];
                       echo '<a rel="prettyPhoto[tva]" href="'.$img.'" title="Hoạt Động Công Ty"><img data-description="'.$title_cat.'" src="'.$thumbimg.'" alt="'.$title_cat.'"  data-image="'.$img.'" data-description="'.$title_cat.'"></a>';
                   } ?>
                           
   </div>
   <!-- Unitegallery -->
   <script type='text/javascript' src='js/unitegallery/js/unitegallery.min.js'></script> 
   <link rel='stylesheet' href='js/unitegallery/css/unite-gallery.css' type='text/css' /> 
   <script type="text/javascript" src="js/unitegallery/themes/tiles/ug-theme-tiles.js"></script> 
   <script type="text/javascript">
       $(document).ready(function(){
           $("#tva").unitegallery({
   
               tile_as_link: false,
               tile_link_newpage: false,
               tiles_type: "justified",
               tiles_space_between_cols: 1
   
           }); 
       });
   </script>
   <!-- Photobox -->
   <script type="text/javascript" src="js/photobox/jquery.photobox.js"></script>
   <script type="text/javascript">
       $(document).ready(function($) {
           $('.tva-detail').photobox('a',{thumbs:true,loop:false});
       });
   </script>
       <?php } ?> */?>
       <div class="video-grid">
               <?php 
               foreach($tintuc as $v){
                   echo '<a class="vdg-item" data-fancybox="gallery'.$v["id"].'" href="'._upload_tintuc_l.$v["photo"].'" ><figure class="hover_sang3"><img src="'._upload_tintuc_l.$v["photo"].'" alt="'.$v["ten"].'"></figure><h4>'.$v['ten'].'</h4></a>';
               }
                ?>
           </div>
          <?php 
          foreach($tintuc as $k=>$v){
           $hinhthem = get_result("select id,ten$lang as ten,thumb,photo FROM #_hinhanh where id_hinhanh='".$v['id']."' and type='".$v['type']."' and hienthi=1 order by stt,id desc");
           foreach($hinhthem as $key=>$value)
              echo '<a data-fancybox="gallery'.$v["id"].'" data-caption="'.$v["ten"].'" href="'._upload_hinhthem_l.$value["photo"].'"></a>';
          } 
          ?>
