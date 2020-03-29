<script type="text/javascript">
	$(document).ready(function(e) {
         $('.xoa_gh').click(function(){
                var root = $(this).parents('.dong_gh');
                var id = root.data('id');
                $.ajax({
                    url:"ajax/cart.php",
                    dataType:'json',
                    type:"POST",
                    data:{id:id,act:"delete"},
                    success: function(kq){
                        root.remove();
                        $(".giohang_fix span").html(kq.sl);
                        $(".tongtien_gh span").html(kq.tongtien);
                    }
                })
            });


		$('.sl_gh').change(function(){
			var root = $(this).parents('.dong_gh');
			var soluong = root.find('.sl_gh').val();
			var vitri = root.data('vitri');
			var id = root.data('id');
			$.ajax({
				url:"ajax/cart.php",
				type:"POST",
				dataType:'json',
				data:{soluong: soluong,vitri:vitri,id:id,act:"update"},
				success: function(kq){
					root.find('.gia_gh').html(kq.tonggia);
					$(".tongtien_gh span").html(kq.tongtien);
				}
			})
		});
    $('.cus-radio-items .cus-radio').click(function(){
        $('.cus-radio-items .cus-radio').removeClass('active');
        $(this).addClass('active');
    });
    });
</script>

<div class="box_container">
	<div class="tieude_giua"><div><?=_giohang?></div></div>
	<div class="content gh_flex">
    	    <div class="left_gh">
                 <div class="td_gh"><?=_thongtingiohang?></div>
               <table class="tbl_giohang">
               <?php
                     //unset($_SESSION['cart']);
                     //print_r($_SESSION['cart']);
                  if(is_array($_SESSION['cart'])){
                    echo '<tr style="background:#F0F0F0; height:55px; font-weight:bold;"><td align="center">'._xoa.'</td><td style="text-align:center;">'._hinhanh.'</td><td style="text-align:center;">'._ten.'</td><td align="center">'._dongia.'</td><td align="center">'._soluong.'</td><td align="center" class="gh_an">'._thanhtien.'</td></tr>';

                    foreach($_SESSION['cart'] as $k => $v){
                        $pid = $v['productid'];
                        $size = $v['size'];
                        $mausac = $v['mausac'];
                        $q = $v['qty'];
                        $pmasp = get_code($pid);
                        $pname = get_product_name($pid);
                        $pphoto = get_product_photo($pid);
                        if($q == 0) continue;
                ?>
                        <tr class="dong_gh" data-vitri="<?=$k?>" data-size="<?=$size?>" data-mau="<?=$mausac?>" data-id="<?=$pid?>">
                          <td width="10%"><a class="xoa_gh"><i class="fas fa-trash-alt"></i></a></td>

                        <td width="15%"><img class="img_gh" src="<?=_upload_sanpham_l.$pphoto?>" alt="<?=$pname?>"/></td>
                          <td width="25%"><?=$pname?>
                              <p> 
                                <?php if(!empty($size)){ ?>Size: <strong><?= $size ?></strong><?php } ?> 
                                <?php if(!empty($mausac)){ ?>- Màu <span class="mau" style="background: <?= $mausac ?>"></span><?php } ?></p>

                          </td>
                          <td width="15%"><?=number_format(get_price($pid),0, ',', '.')?> đ</td>
                          <td width="10%"><input class="sl_gh" type="number" value="<?=$q?>" maxlength="5" size="2" 
                            min="1" max="999" /></td>
                          <td width="15%" class="gia_gh"><?=number_format(get_price($pid)*$q,0, ',', '.') ?> đ</td>
                        </tr>
                  <?php } ?>
                    <tr>
                          <input id="price_ship" name="price_ship" type="hidden" value="0">
                          <input id="tong_gia" name="tong_gia" type="hidden" value="<?= get_order_total() ?>">
                        <td colspan="6" class="tongtien_gh"><div class="show-price-ship"></div><?=_tongtien?>: <span>
                            <?=number_format(get_order_total(),0, ',', '.')?> đ</span></td>
                      </tr>
                <?php } else{
                    echo "<tr><td>"._khongcosanphamtronggiohang."</td>";}?>
              </table>
        </div><!--.left_gh-->


  <div class="right_gh">
  		<div class="td_gh"><?=_thongtinkhachhang?></div>

     <div class="frm_lienhe">
    <form method="post" name="frm_order" id="frm_order" action="" enctype="multipart/form-data" onsubmit="return check();">

    	<div class="item_lienhe"><p class="no"><?=_htthanhtoan?>:<span>*</span></p>
        <?php /* <select name="httt" id="httt">
                    <option value=""><?=_chonhinhthucthanhtoan?></option>
                    <?php foreach($get_httt as $k => $v) { ?>
                    <option value="<?=$v['id']?>"><?=$v['ten']?></option>
                    <?php } ?>
                </select> */?>
                
        </div>
            <div class="cus-radio-items">
                <?php foreach($get_httt as $k=>$v){ ?>
                    <label class="cus-radio <?= ($k==0)?'active':'' ?>"><?=$v['ten']?>
                    <input type="radio" <?= ($k==0)?'checked="checked"':'' ?> name="httt" value="<?=$v['id']?>">
                    <span class="checkmark"></span>
                </label>
                <div class="content ">
                    <?=$v['noidung']?>
                </div>
            <?php } ?>
        </div>
    	<div class="item_lienhe"><p class="no"><?=_hovaten?>:<span>*</span></p>
            <input name="hoten" type="text" id="hoten" value="<?php if($_POST['hoten']!='')echo $_POST['hoten'];
            else echo $info_user['ten']?>" /></div>

        <div class="item_lienhe"><p class="no"><?=_dienthoai?>:<span>*</span></p>
            <input onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" name="dienthoai" 
            id="dienthoai" value="<?php if($_POST['dienthoai']!='')echo $_POST['dienthoai'];
            else echo $info_user['dienthoai']?>" type="text"  /></div>

        <div class="item_lienhe"><p class="no"><?=_tinhthanhpho?>:<span>*</span></p>
            <select name="thanhpho" id="thanhpho">
                <option value=""><?=_chontinhthanhpho?></option>
                <?php foreach($place_city as $k => $v) { ?>
                    <option value="<?=$v['id']?>"><?=$v['ten']?></option>
                <?php } ?>
            </select>
        </div>

        <div class="item_lienhe"><p class="no"><?=_quanhuyen?>:<span>*</span></p>
            <select name="quan" id="quan">
            	<option><?=_chonquanhuyen?></option>
            </select>
        </div>

         <div class="item_lienhe"><p class="no"><?=_diachi?>:<span>*</span></p>
            <input name="diachi" type="text" id="diachi" value="<?php if($_POST['diachi']!='')echo $_POST['diachi'];else echo $info_user['diachi']?>" /></div>

        <div class="item_lienhe"><p class="no">E-mail:</p><input name="email" type="text" id="email" value="<?php if($_POST['email']!='')echo $_POST['email'];else echo $info_user['email']?>" /></div>

        <div class="item_lienhe"><p class="no"><?=_ghichu2?>:</p><textarea name="noidung"  cols="50" rows="4" ><?=$_POST['noidung']?></textarea></div>
      </form>
      </div>

      <div style="text-align:center;">
        <input class="tieptuc click_ajax" type="button" value="<?=_tieptucmuahang?>" onclick="window.location.href='index.html'" />
         <input title='<?=_dathang?>' type="button" class="click_ajax click_ajax2" value="<?=_dathang?>" />
        </div>
  </div>      <!-- # right_gh  -->
        
</div>
</div>

<script type="text/javascript">
    function formatNumber(nStr)//format gia
    {
        nStr += '';
        x = nStr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + '.' + '$2');
        }
        return x1 + x2;
    }
	$(document).ready(function(e) {
		$('#thanhpho').change(function(){
			var id_city = $(this).val();
			$.ajax({
				type:'post',
				url:'ajax/place.php',
				data:{act:'dist',id_city:id_city},
				success:function(rs){
					$('#quan').html(rs);
				}
			});
		});
        // $("#quan").change(function(){
        //     $val = $(this).val();
        //     if($val!=''){
        //         $.ajax({
        //             type: "POST",
        //             url: "ajax/cart.php",
        //             dataType: "json",
        //             data: {id:$val, act:"tinhship"},
        //             success: function(data){
        //                 if(data!=''){
        //                     $("input#price_ship").val(data["price_ship"]);
        //                     var price_ship=data;
        //                     $(".show-price-ship").html("Phí vận chuyển: "+formatNumber(data["price_ship"])+' đ');
        //                     $(".tongtien_gh span").html(formatNumber(data["tonggia"])  + ' đ');
        //                     $("#tong_gia").val(data["tonggia"]);
        //                 }else{
        //                     $(".show-price-ship").html("Phí vận chuyển: Miễn phí");
        //                 }
        //                 $(".show-price-ship").show();
        //             }
        //         })
        //     }
        // });
		$('.click_ajax2').click(function(){
			if(isEmpty($('#httt').val(), "<?=_chonhinhthucthanhtoan?>"))
			{
				$('#httt').focus();
				return false;
			}
			if(isEmpty($('#hoten').val(), "<?=_nhaphoten?>"))
			{
				$('#hoten').focus();
				return false;
			}
			if(isEmpty($('#dienthoai').val(), "<?=_nhapsodienthoai?>"))
			{
				$('#dienthoai').focus();
				return false;
			}
			if(isEmpty($('#thanhpho').val(), "<?=_chontinhthanhpho?>"))
			{
				$('#thanhpho').focus();
				return false;
			}
			if(isEmpty($('#quan').val(), "<?=_chonquanhuyen?>"))
			{
				$('#quan').focus();
				return false;
			}

			if(isEmpty($('#diachi').val(), "<?=_nhapdiachi?>"))
			{
				$('#diachi').focus();
				return false;
			}

			if(isEmpty($('#email_lienhe').val(), "<?=_emailkhonghople?>"))
			{
				$('#email_lienhe').focus();
				return false;
			}
			if(isEmpty($('#noidung').val(), "<?=_nhapnoidung?>"))
			{
				$('#noidung').focus();
				return false;
			}
			frm_order.submit();
		});
    });
</script>
