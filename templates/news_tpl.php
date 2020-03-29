<div class="tieude_giua"><div><?=$title_cat?></div></div>
<div class="box_container">
    <div class="wap_box_new wap_box_new2">
         <?php foreach($tintuc as $k => $v) { 
            ?>
            <div class="box_news">
                <a class="imgsp hover_sang4" href="<?=get_url($v,$com)?>" title="<?=$v['ten']?>"><img src="<?php if($v['thumb']!=NULL)echo _upload_tintuc_l.$v['thumb'];else echo 'images/noimage.png';?>" alt="<?=$v['ten']?>" /></a>
                <section>
                    <h3><a href="<?=get_url($v,$com)?>" title="<?=$v['ten']?>"><?=$v['ten']?></a></h3>
                    <p class="ngaytao"><i class="fa fa-calendar" aria-hidden="true"></i><?=make_date($v['ngaytao'])?><span><i class="fa fa-eye" aria-hidden="true"></i><?=_luotxem?>: <?=$v['luotxem']?></span></p>
                    <div class="mota line-clamp"><?=($type != "bang-gia")?$v['mota']:$v['link']?></div>      
                </section>      
            </div><!---box_new--> 
        <?php  } ?>
    </div><!---wap_box_new-->
<div class="clear"></div>
<div class="pagination"><?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?></div>
</div><!---END .box_container-->