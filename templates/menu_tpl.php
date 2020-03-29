<?php /* <div class="tieude_giua"><div><?=$title_cat?></div></div> */?>
<h2 class="thucdon-title"><?=$title_cat?></h2>
<div class="product-grid">
    <?php foreach ($product as $k => $v) { 
            showProduct($v);
    } ?>
</div>
<div class="pagination"><?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?></div>