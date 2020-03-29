<div class="tieude_giua"><div><?=$title_cat?></div></div>
<div class="box_container">
    <div class="content">
    <?=$row_detail['noidung']?>
        <div class="addthis_native_toolbox"><b><?=_chiase?>: </b></div>

        <?php 
        $where = " type='".$row_detail['type']."' and id <> ".$row_detail['id']." and hienthi=1 order by stt,id desc";
        $tinkhac = get_result("select *,mota$lang as mota,id,ten$lang as ten,tenkhongdau FROM #_product where $where ");
        if(count($tinkhac) > 0) { ?>
        <div class="othernews">
             <div class="cactinkhac"><?=$title_other?></div>
             <ul class="khac">
                <?php foreach($tinkhac as $k => $v) { ?>
                    <li><a href="<?=$v['type']?>/<?=$v['tenkhongdau']?>-<?=$v['id']?>.html" title="<?=$v['ten']?>"><i class="far fa-hand-point-right"></i><?=$v['ten']?></a> (<?=make_date($v['ngaytao'])?>)</li>
                <?php }?>
             </ul>
             <div class="pagination"><?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?></div>
        </div><!--.othernews-->
        <?php }?>
    </div><!--.content-->
</div><!--.box_container-->
