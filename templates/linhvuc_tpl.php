<div class="tieude_giua"><div><?=$title_cat?></div></div>
<div class="box_container">
    <div class="linhvuc-grid">
      <?php foreach($tintuc as $k=>$v){
        echo '<a href="'.get_url($v).'" class="linhvuc-item">
          <figure><img src="'._upload_tintuc_l.$v["photo"].'" alt="'.$v["ten"].'"></figure>
          <div class="info">
            <h3>'.$v["ten"].'</h3>
            <p>'.$v["mota"].'</p>
          </div>
        </a>';
      } ?>
    </div>
<div class="clear"></div>
<div class="pagination"><?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?></div>
</div><!---END .box_container-->