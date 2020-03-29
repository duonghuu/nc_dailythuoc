<div class="panel panel-default">
  <div class="panel-heading "><h4 class="text-uppercase"><?= _dattour ?></h4></div>
  <div class="panel-body">
    <h4 class="text-capitalize"><?=$row_detail['ten']?></h4>
    <p><?= _masp ?>: <strong><?=$row_detail['masp']?></strong></p>
    <p><?= _thoigian ?>: <strong><?=$row_detail['dientich']?></strong></p>
    <p><?= _khoihanh ?>: <strong><?=date('d/m/Y',$row_detail['phaply'])?></strong></p>
    <p><?= _socho ?>: <strong><?=$row_detail['soluong']?></strong></p>
  </div>
</div>
<div class="table-giatour">
  <div class="table-giatour-th">
    <div class="table-giatour-title">Giá tour</div>
    <div class="table-giatour-title">Việt Nam</div>
    <div class="table-giatour-title">Nước ngoài</div>
  </div>
  <div class="table-giatour-tr">
    <div class="giatour-dt">Giá người lớn (Từ 12 tuổi trở lên)</div>
    <div class="giatour-dt"><?=num_format($row_detail['nguoilon'])?></div>
    <div class="giatour-dt"><?=num_format($row_detail['nguoilon1'])?></div>
  </div>
  <div class="table-giatour-tr">
    <div class="giatour-dt">Giá trẻ em (Từ 10 - 12 tuổi)</div>
    <div class="giatour-dt"><?=num_format($row_detail['treem'])?></div>
    <div class="giatour-dt"><?=num_format($row_detail['treem1'])?></div>
  </div>
  <div class="table-giatour-tr">
    <div class="giatour-dt">Giá em bé (Từ 5 - dưới 10 tuổi)</div>
    <div class="giatour-dt"><?=num_format($row_detail['embe'])?></div>
    <div class="giatour-dt"><?=num_format($row_detail['embe1'])?></div>
  </div>
  <div class="table-giatour-tr">
    <div class="giatour-dt">Giá em nhỏ (Từ 2 - dưới 5 tuổi)</div>
    <div class="giatour-dt"><?=num_format($row_detail['emnho'])?></div>
    <div class="giatour-dt"><?=num_format($row_detail['emnho1'])?></div>
  </div>
  <div class="table-giatour-tr">
    <div class="giatour-dt">Giá bé sơ sinh (Dưới 2 tuổi)</div>
    <div class="giatour-dt"><?=num_format($row_detail['sosinh'])?></div>
    <div class="giatour-dt"><?=num_format($row_detail['sosinh1'])?></div>
  </div>
  <div class="table-giatour-tr">
    <div class="giatour-dt">Phụ thu phòng đơn</div>
    <div class="giatour-dt"><?=num_format($row_detail['phongdon'])?></div>
    <div class="giatour-dt"><?=num_format($row_detail['phongdon1'])?></div>
  </div>
  <div class="table-giatour-tr">
    <div class="giatour-dt">Phụ thu Visa</div>
    <div class="giatour-dt"><?=num_format($row_detail['visa'])?></div>
    <div class="giatour-dt"><?=num_format($row_detail['visa1'])?></div>
  </div>
</div>
<form action="" method="post">
<div class="panel panel-default">
  <div class="panel-heading "><h4 class="text-uppercase"><?= _thongtinlienhe ?></h4></div>
  <div class="panel-body">
    <div class="form-group-row">
      <div class="form-group">
        <input type="text" class="form-control" name="bt_hoten" required="" placeholder="<?= _hovaten ?>" >
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="bt_diachi" placeholder="<?= _diachi ?>">
      </div>

    </div>
    <div class="form-group-row">
      <div class="form-group">
        <input type="text" class="form-control" name="bt_dienthoai" required="" placeholder="<?= _dienthoai ?>">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="bt_email" placeholder="<?= _email ?>">
      </div>
    </div>
    <div class="form-group-full">
      <div class="form-group">
        <textarea class="form-control" name="bt_noidung" placeholder="<?= _noidung ?>"></textarea>
      </div>

    </div>
    
  </div>
</div>
<div class="panel panel-default">
  <div class="panel-heading "><h4 class="text-uppercase"><?= _danhsachkhachhang ?></h4></div>
  <div class="panel-body">
    <div class="table-customer">

      <div class="tbl-cus-head fieldGroup">
        <div class="tbl-cus-title"><?= _hovaten ?></div>
        <div class="tbl-cus-title"><?= _ngaysinh ?></div>
        <div class="tbl-cus-title"><?= _gioitinh ?></div>
        <div class="tbl-cus-title"><?= _loaikhach ?></div>
        <div class="tbl-cus-title"><?= _dotuoi ?></div>
        <div class="tbl-cus-title"><?= _phongdon ?></div>
        <div class="tbl-cus-title"><?= _visa ?></div>
      </div>
      <div class="tbl-cus-row fieldGroup">
        <div><input class="form-control" required="" name="tengoi[]" type="text"></div>
        <div><input class="form-control" required="" name="ngaygoi[]" type="date"></div>
        <div><select class="form-control" name="gioigoi[]" ><option selected="" value="1"><?= _gtnu ?></option><option  value="0"><?= _gtnam ?></option></select></div>
        <div><select class="form-control" name="loaigoi[]" ><option selected="" value="0"><?= _vietnam ?></option><option  value="1"><?= _nuocngoai ?></option></select></div>
        <div><select class="form-control" name="tuoigoi[]" ><option value="nguoilon"><?= _nguoilon ?></option>
          <option value="treem"><?= _treem ?></option>
          <option value="embe"><?= _embe ?></option>
          <option value="emnho"><?= _emnho ?></option>
          <option value="sosinh"><?= _sosinh ?></option></select></div>
          <div><select class="form-control" name="phonggoi[]" ><option selected="" value="0"><?= _khong ?></option><option  value="1"><?= _co ?></option></select></div>
          <div><select class="form-control" name="visagoi[]" ><option selected="" value="0"><?= _khong ?></option><option  value="1"><?= _co ?></option></select></div>
        </div>
      </div>
      <div class="text-right"><button type="button" class="btn btn-primary addMore">Thêm</button></div>
    </div>
  </div>
  
    <script>
      $(document).ready(function() {
        $(".addMore").click(function(){
          var fieldHTML = '<div class="fieldGroup tbl-cus-row">'+$(".fieldGroupCopy").html()+'</div>';
          $('body').find('.fieldGroup:last').after(fieldHTML);
        });
        $("body").on("click",".remove",function(){ 
          $(this).parents(".fieldGroup").remove();
        });
      });
    </script>
    <div class="text-center"><button type="submit" class="btn btn-primary">Gửi</button></div>
    <input type="hidden" value="<?= $row_detail["id"] ?>" name="id">
    <input type="hidden" value="1" name="nltval">
    <input type="hidden" value="<?= time() ?>" name="nlttoken">
    <input type="hidden" name="recaptchaResponse_dknt" id="recaptchaResponse_dknt">
    </form>
    <div class="fieldGroupCopy" style="display: none;">
      <div><input class="form-control" name="tengoi[]" type="text"></div>
      <div><input class="form-control" name="ngaygoi[]" type="date"></div>
      <div><select class="form-control" name="gioigoi[]" ><option selected="" value="1"><?= _gtnu ?></option><option  value="0"><?= _gtnam ?></option></select></div>
      <div><select class="form-control" name="loaigoi[]" ><option selected="" value="0"><?= _vietnam ?></option><option  value="1"><?= _nuocngoai ?></option></select></div>
      <div><select class="form-control" name="tuoigoi[]" ><option value="nguoilon"><?= _nguoilon ?></option>
        <option value="treem"><?= _treem ?></option>
        <option value="embe"><?= _embe ?></option>
        <option value="emnho"><?= _emnho ?></option>
        <option value="sosinh"><?= _sosinh ?></option></select></div>
        <div><select class="form-control" name="phonggoi[]" ><option selected="" value="0"><?= _khong ?></option><option  value="1"><?= _co ?></option></select></div>
        <div style="display: flex;justify-content: space-between;"><select class="form-control" name="visagoi[]" ><option selected="" value="0"><?= _khong ?></option><option  value="1"><?= _co ?></option></select><a style="margin-left: 4px" href="javascript:void(0)" class="btn btn-danger remove">Xóa</a></div>
      </div>