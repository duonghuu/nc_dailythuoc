<div class="tieude_giua"><div><?=$title_cat?></div></div>
<div class="box_container">
<div class="content">
    <div class="txtbanggia">
        <?= lay_text('txtbanggia') ?>
    </div>
<table class="tbl_banggia">
    <tr>
        <th class="an_mobi">STT</th>
        <th>Tên</th>
        <th>Mô tả</th>
        <th>Download</th>
        <th class="an_mobi">Ngày cập nhật</th>
    </tr>
	<?php foreach($tintuc as $k => $v) { ?>
        <tr>
        <td class="an_mobi"><?=$k+1?></td>
        <td><?=$v['ten']?></td>
        <td><?=$v['mota']?></td>
        <td>
            <?php if($_SESSION["NINAW"] || $v["noibat"]==0){ ?>
              <a href="<?=_upload_khac_l.$v['taptin']?>" target="_blank">Download</a>
            <?php }else{ ?>
              <a href="dang-nhap.html" style="color: #f00"><?= _dangnhap ?></a>
            <?php } ?>
            
        </td>
        <td class="an_mobi"><?=make_date($v['ngaytao']);?></td>
    </tr>
    <?php } ?>
</table>
<div class="clear"></div>
<div class="pagination"><?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?></div>
</div>
</div><!---END .box_container-->