<div class="tieude_giua"><div><?=$title_cat?></div></div>
<form action="" method="post">
    <div class="d-flex form-group justify-content-between">
        <input type="text" placeholder="<?= _hovaten ?>" name="fpu3[hoten]" class="form-control">
        <input type="text" placeholder="<?= _diachi ?>" name="fpu3[diachi]" class="form-control ml-2">
        
    </div>
    <div class="d-flex form-group justify-content-between">
        <input type="text" placeholder="<?= _dienthoai ?>" name="fpu3[dienthoai]" class="form-control">
        <input type="text" placeholder="<?= _email ?>" name="fpu3[email]" class="form-control ml-2">
        
    </div>
    <div class="d-flex form-group justify-content-between">
        <input type="text" placeholder="Câu hỏi" name="fpu3[ten]" class="form-control">
    </div>
    <div class="text-center m-2">
        <input type="hidden" name="recaptchaResponse3" id="recaptchaResponse3">
        <input type="hidden" name="rp3val" value="1" >
        <input type="hidden" name="rp3token" value="<?= time() ?>" >
        <button type="submit" class="btn btn-primary">Gửi câu hỏi</button>
    </div>
</form>
<?php 
$cauhoi =get_result("select ten$lang as ten,noidung$lang as noidung,id from table_news where type='tuvan' and hienthi>0 order by stt asc");
foreach ($cauhoi as $key => $value) { 
$iden = 'choi'.$value["id"];
    ?>
    <div class="cauhoi-item">
        <a class="btn btn-block btn-secondary text-left text-white mb-2" data-toggle="collapse" data-target="#<?= $iden ?>"><i class="fas fa-question-circle"></i> <?= $value["ten"] ?></a>

        <div id="<?= $iden ?>" class="collapse">
        <div class="content"><i class="fas fa-hand-point-right"></i> Trả lời: <?= $value["noidung"] ?></div>
        </div>
    </div>
<?php } ?>