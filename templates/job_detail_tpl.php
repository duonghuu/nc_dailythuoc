<div class="job-detail-head">
   
    
    <h1><?= $row_detail["ten"] ?></h1>
    <div class="job-detail-img"><figure><img src="<?= _upload_sanpham_l.$row_detail["photo"] ?>" alt="<?= $row_detail["ten"] ?>"></figure></div>
    
</div>
<div class="job-detail-body">
    <div class="job-detail-left">
        <div class="job-detail-title">Job overview</div>
        <div class="content">
            <?= $row_detail["noidung"] ?>
        </div>
        <div class="job-detail-form">
            <ul>
              <li class="active"><a data-toggle="pill" href="#cs-tab-already-registered-apply5765">Already Registered? Apply</a></li>
              <li ><a data-toggle="pill" href="#cs-tab-register9640">Register and Apply</a></li>
            </ul>

            <div class="tab-content">
              <div id="cs-tab-already-registered-apply5765" class="tab-pane active">
                <h4>Apply only</h4>
                <form action="" method="post" name="formdk2" enctype="multipart/form-data">
                <div class="form-flex">
                    <div class="form-group">
                        <label for="">Surname*</label><input type="text" class="form-control" name="fdk2[ho]">
                    </div>
                    <div class="form-group">
                        <label for="">First Name*</label><input type="text" class="form-control" name="fdk2[ten]">
                    </div>
                </div>
                <div class="form-flex">
                    <div class="form-group">
                        <label for="">Email Address*</label><input type="text" class="form-control" name="fdk2[email]">
                    </div>
                    <div class="form-group">
                        <div class="upfile-bg">
                            <h4>CV upload</h4>
                            <p>Please ensure your CV is in Word or PDF formats and has both telephone and email contact</p>
                            <input type="file" name="cv2">
                        </div>
                    </div>
                </div>
                <div class="form-flex">
                    <div class="form-group">
                        <label for="">
                            <div class="math_sercue clearfix">
                                <img id="math_captcha" src="math_captcha.php" alt="security code">

                                <?php /* <a id="reset_capcha" class="btn btn-primary">Đổi mã khác</a> */?>
                            </div>
                        </label><input class="form-control" name="capcha" id="capcha" type="text" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="fdk2_val" value="1">
                        <input type="hidden" name="fdk2_token" value="<?= time() ?>">
                        <button type="submit" class="btn btn-default">Apply</button>
                    </div>
                </div>
                </form>
              </div>
              <div id="cs-tab-register9640" class="tab-pane ">
                <h4>PERSONAL DETAILS</h4>
                <form action="" method="post" name="formdk1" enctype="multipart/form-data">
                <div class="form-flex">
                    <div class="form-group">
                        <label for="">Surname*</label><input type="text" class="form-control" name="fdk1[ho]">
                    </div>
                    <div class="form-group">
                        <label for="">First Name*</label><input type="text" class="form-control" name="fdk1[ten]">
                    </div>
                </div>
                <div class="form-flex">
                    <div class="form-group">
                        <label for="">Date of Birth*</label><input type="date" class="form-control" name="fdk1[ngaysinh]">
                    </div>
                    <div class="form-group">
                        <label for="">Nationality*</label><input type="text" class="form-control" name="fdk1[quoctich]">
                    </div>
                </div>
                <h4>CONTACT DETAILS</h4>
                <div class="form-flex">
                    <div class="form-group">
                        <label for="">Home Telephone*</label><input type="text" class="form-control" name="fdk1[dienthoai]">
                    </div>
                    <div class="form-group">
                        <label for="">Email Address*</label><input type="text" class="form-control" name="fdk1[email]">
                    </div>
                </div>
                <div class="form-flex">
                    <div class="form-group">
                        <label for="">Mobile Number*</label><input type="text" class="form-control" name="fdk1[didong]">
                    </div>
                    <div class="form-group">
                        <label for="">Current Position*</label>
                        <select class="form-control" name="fdk1[curjob]" >
                            <option value="">---</option>
                            <?php 
$id_hientrang = get_result("select id,ten,tenkhongdau from table_news where type='id_hientrang' order by stt,id desc");
                            foreach ($id_hientrang as $key => $value) { ?>
                                <option value="<?= $value["ten"] ?>"><?= $value["ten"] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                
                <div class="form-flex">
                    <div class="form-group">
                        <div class="upfile-bg">
                            <h4>CV upload</h4>
                            <p>Please ensure your CV is in Word or PDF formats and has both telephone and email contact</p>
                            <input type="file" name="cv1">
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <label for="">9+3</label><input type="text" class="form-control" name="">
                        <input type="hidden" name="fdk1_val" value="1">
                        <input type="hidden" name="fdk1_token" value="<?= time() ?>">
                        <button type="submit" class="btn btn-default" style="margin-top: 10px">Apply</button>
                    </div>
                </div>
                </form>
              </div>
            </div>
        </div>
    </div>
    <div class="job-detail-right">
        <div class="job-detail-title">Job of the week</div>
        <div class="other-job-main clearfix">
            
            <?php 
            $jobweek=get_result("select ten$lang as ten,tenkhongdau,id,thumb,photo,type,ngaytao from #_product where type='job' and noibat>0 and hienthi=1 order by rand(), stt asc limit 0,6");
            foreach ($jobweek as $key => $value) {
                
                echo '<div class="other-job-item"><a href="'.get_url($value,'job').'">
                        <div class="imgsp">
                            <figure><img src="'._upload_sanpham_l.$value["photo"].'" alt="'.$value["ten"].'"></figure>
                        </div><h3 class="line-clamp">'.$value["ten"].'</h3>
                    </a></div>';
            } ?>
        </div>
        <div class="job-detail-title">News</div>
        <div class="news-bg">
          
        <div class="news-main clearfix">
            <?php 
            $news=get_result("select mota$lang as mota,ten$lang as ten,tenkhongdau,id,thumb,photo,type,ngaytao from #_news where type='news' and hienthi=1 order by rand(), stt asc limit 0,6");
            foreach ($news as $key => $value) {
                echo '<div class="news-item"><a href="'.get_url($value,'news').'">
                        <figure><img src="'._upload_tintuc_l.$value["photo"].'" alt="'.$value["ten"].'"></figure>
                        <h5 class="line-clamp">'.$value["ten"].'</h5>
                    </a></div>';
            } ?>
        </div>
        </div>
    </div>
</div>