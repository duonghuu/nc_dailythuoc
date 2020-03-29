<div class="tieude_giua"><div><?=$title_cat?></div></div>
<div class="box_container">
<div class="product-grid">
    <?php foreach ($product as $k => $v) { 
            showProduct($v);
    } ?>
</div>
<div class="pagination"><?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?></div>
</div>
