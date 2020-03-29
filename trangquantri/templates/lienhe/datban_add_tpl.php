    <script type="text/javascript"> 
        function TreeFilterChanged2(){
            $('#validate').submit();
        }
    </script>
    <div class="wrapper">
        <div class="control_frm" style="margin-top:25px;">
            <div class="bc">
                <ul id="breadcrumbs" class="breadcrumbs">
                    <li><a href="index.php?com=lienhe&act=man&type=<?=$_REQUEST['type']?>"><span>Thư liên hệ</span></a></li>
                    <li class="current"><a href="#" onclick="return false;">Thêm</a></li>
                </ul>
                <div class="clear"></div>
            </div>
        </div>
        <form name="supplier" id="validate" class="form" action="index.php?com=lienhe&act=save&type=<?=$_REQUEST['type']?>" method="post" enctype="multipart/form-data">
            <div class="widget">
                <div class="title"><img src="./images/icons/dark/list.png" alt="" class="titleIcon" />
                    <h6>Nhập dữ liệu</h6>
                </div>      
                <ul class="tabs">
                 <li>
                     <a href="#info">Thông tin chung</a>
                 </li>
                 <?php foreach ($config['lang'] as $key => $value) { ?>
                     <li>
                         <a href="#content_lang_<?=$key?>"><?=$value?></a>
                     </li>
                 <?php } ?>
             </ul>
             <!-- begin: info -->
             <div id="info" class="tab_content">
                <div class="formRow">
                    <label>Điện thoại</label>
                    <div class="formRight">
                        <input type="text" name="dienthoai" title="Nhập link website" id="link" class="tipS" value="<?=@$item['dienthoai']?>" />
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label>Email</label>
                    <div class="formRight">
                        <input type="text" name="email" title="Nhập link website" id="email" class="tipS" value="<?=@$item['email']?>" />
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <?php 
                    $d->reset();
                    $sql_images="select * from #_hinhanh where id_hinhanh='".$item['id']."' and type='datban' order by stt, id desc ";
                    $d->query($sql_images);
                    $ds_photo=$d->result_array();
                     ?>
                    <label>Hình ảnh</label>
                  <div class="formRight">
                   <?php if(count($ds_photo)!=0){?>
                     <?php for($i=0;$i<count($ds_photo);$i++){?>
                       <div class="item_trich trich<?=$ds_photo[$i]['id']?>" id="<?=md5($ds_photo[$i]['id'])?>">
                        <img class="img_trich" width="100px" height="80px" src="<?=_upload_hinhthem.$ds_photo[$i]['photo']?>" />
                        
                        <?php /* <input data-val0="<?=$ds_photo[$i]['id']?>" data-val2="table_hinhanh" type="text" value="<?=$ds_photo[$i]['stt']?>" name="stt<?=$i?>" data-val3="stt" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" class="tipS smallText update_stt" onblur="stt(this)" original-title="Nhập số thứ tự hình nahr" rel="<?=$ds_photo[$i]['id']?>" /><a style="cursor:pointer" class="remove_images" data-id="<?=$ds_photo[$i]['id']?>"><i class="fa fa-trash-o"></i></a> */?><a style="cursor:pointer" class="" href="<?=_upload_hinhthem.$ds_photo[$i]['photo']?>" download >Tải</a>
                      </div>
                    <?php }?>
                  <?php }?>
                </div>
                </div>
                <div class="formRow">
                  <label>Tùy chọn: <img src="./images/question-button.png" alt="Chọn loại" class="icon_que tipS" original-title="Check vào những tùy chọn "> </label>
                  <div class="formRight">
                    <input type="checkbox" name="hienthi" id="check1" value="1" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?> />
                    <label for="check1">Đã đọc</label>            
                </div>
                <div class="clear"></div>
            </div>
            <div class="formRow">
                <label>Số thứ tự: </label>
                <div class="formRight">
                    <input type="text" class="tipS" value="<?=isset($item['stt'])?$item['stt']:1?>" name="stt" style="width:20px; text-align:center;" onkeypress="return OnlyNumber(event)" original-title="Số thứ tự của danh mục, chỉ nhập số">
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <!-- end: info -->
        <?php foreach ($config['lang'] as $key => $value) {
            ?>
            <!-- begin: Content -->
            <div id="content_lang_<?=$key?>" class="tab_content">  
                <div class="formRow">
                    <label>Tên</label>
                    <div class="formRight">
                        <input type="text" name="ten<?=$key?>" title="Nhập tên Liên kết website" id="ten<?=$key?>" class="tipS" value="<?=@$item['ten'.$key]?>" />
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow none">
                    <label>Địa chỉ</label>
                    <div class="formRight">
                        <input type="text" name="diachi<?=$key?>" title="Nhập tên Liên kết website" id="diachi<?=$key?>" class="tipS" value="<?=@$item['diachi'.$key]?>" />
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label>Chủ đề</label>
                    <div class="formRight">
                        <input type="text" name="chude<?=$key?>" title="Nhập tên Liên kết website" id="chude<?=$key?>" class="tipS" value="<?=@$item['chude'.$key]?>" />
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label>Nội dung chính: <img src="./images/question-button.png" alt="Chọn loại"  class="icon_que tipS" original-title="Viết nội dung chính"> </label>
                    <div class="formRight"><textarea class="ck_editor" name="noidung<?=$key?>" id="noidung<?=$key?>" rows="8" cols="60"><?=@$item['noidung'.$key]?></textarea>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <!-- end: Content -->
        <?php } ?>
        <div class="formRow">
            <div class="formRight">
               <input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
           <input type="hidden" name="type" id="id_this_type" value="<?=$_REQUEST['type']?>" />
                <input type="button" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Hoàn tất" />
            </div>
            <div class="clear"></div>
        </div>
    </div>  
</form>        </div>
