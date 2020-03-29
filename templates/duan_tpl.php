<div class="tieude_giua"><div><?=$title_cat?></div></div>
<div class="box_container">
    <?php 
    if($type == "du-an" ){
        include _template."news/duan.php";
    }else if($type == "dich-vu" ){
        include _template."news/dichvu.php";
    }else{
    ?>
<div class="wap_box_new">
    <?php foreach($tintuc as $k => $v) { 
        ?>
        <div class="box_news">
            <a href="<?=$v['type']?>/<?=$v['tenkhongdau']?>-<?=$v['id']?>.html" title="<?=$v['ten']?>"><img src="<?php if($v['thumb']!=NULL)echo _upload_tintuc_l.$v['thumb'];else echo 'images/noimage.png';?>" alt="<?=$v['ten']?>" /></a>      
            <h3><a href="<?=$v['type']?>/<?=$v['tenkhongdau']?>-<?=$v['id']?>.html" title="<?=$v['ten']?>"><?=$v['ten']?></a></h3>
            <p class="ngaytao"><i class="fa fa-calendar" aria-hidden="true"></i><?=make_date($v['ngaytao'])?><span><i class="fa fa-eye" aria-hidden="true"></i><?=_luotxem?>: <?=$v['luotxem']?></span></p>
            <div class="mota"><?=($type != "bang-gia")?$v['mota']:$v['link']?></div>  
            <div class="clear"></div>         
        </div><!---END .box_new--> 
    <?php }  ?>
</div><!---END .wap_box_new-->
<?php } ?>
<div class="clear"></div>
<div class="pagination"><?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?></div>
</div><!---END .box_container-->