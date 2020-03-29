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
    <?php /* <div class="tieude_giua"><div><?=_giohang?></div></div> */?>
    <div class="d-flex align-items-center mb-4">
        <h1 class="section-title mb-0"><?= _thanhtoan ?></h1>
        <?php /* <span class="text-secondary ml-3">( <span class="cart-total-number-product">2</span>
         sản phẩm )</span> */?>
    </div>
        <form class="row align-items-start" method="post" name="frm_order" id="frm_order" action="" 
        enctype="multipart/form-data" onsubmit="return check();">
                <div class="col-md-6 mb-5">
                    
                    <div class="row">
                        <div class="col-6 form-group">
                            <label>Họ tên(*)</label>
                            <input type="text" id="hoten" name="hoten" class="form-control" placeholder="Họ tên" 
                             value="<?php if($_POST['hoten']!='')echo $_POST['hoten'];
                            else echo $info_user['ten']?>">
                        </div>
                        <div class="col-6 form-group">
                            <label>Điện thoại(*)</label>
                            <input class="form-control" type="text" onkeyup="if (/\D/g.test(this.value)) this.value = 
                            this.value.replace(/\D/g,'')" name="dienthoai" 
                            id="dienthoai" value="<?php if($_POST['dienthoai']!='')echo $_POST['dienthoai'];
                            else echo $info_user['dienthoai']?>" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 form-group">
                            <label>Email</label>
                            <input type="email" id="contact-email" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="col-6 form-group">
                            <label>Địa chỉ(*)</label>
                            <input name="diachi" class="form-control" type="text" id="diachi" value="<?php if($_POST['diachi']!='')
                            echo $_POST['diachi'];else echo $info_user['diachi']?>" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 form-group">
                            <label>Tỉnh / thành</label>
                            <select name="thanhpho" id="thanhpho" class="custom-select">
                                <option value=""><?=_chontinhthanhpho?></option>
                                <?php foreach($place_city as $k => $v) { ?>
                                    <option value="<?=$v['id']?>"><?=$v['ten']?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-6 form-group">
                            <label>Quận / Huyện</label>
                            <select name="quan" id="quan" class="custom-select">
                                <option><?=_chonquanhuyen?></option>
                            </select>
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <label>Ghi chú</label>
                        <textarea name="noidung" class="form-control" cols="50" rows="4" placeholder="Nội dung ...">
                            <?=$_POST['noidung']?></textarea>
                    </div>
                    <div class="payMethod pt-3 mb-3">
                        <h6>Phương thức thanh toán</h6>
                            <div class="cus-radio-items">
                                <?php foreach($get_httt as $k=>$v){ ?>
                                    <div class="rounded border mb-3">
                                        <div class="p-3">
                                    <label class="cus-radio <?= ($k==0)?'active':'' ?>"><?=$v['ten']?>
                                    <input type="radio" <?= ($k==0)?'checked="checked"':'' ?> name="httt" value="<?=$v['id']?>">
                                    <span class="checkmark"></span>
                                </label>
                                <div class="content ">
                                    <?=$v['noidung']?>
                                </div>
                                </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-5 bg-gray rounded p-4">
                    <h5 class="mb-4">Đơn hàng</h5>
                    <div class="table-responsive mb-4" style="max-height: 350px;">
                        <table class="table table-sm align-middle mb-0">
                            <tbody>
                                <?php foreach($_SESSION['cart'] as $k => $v){
                                    $pid = $v['productid'];
                                    $size = $v['size'];
                                    $mausac = $v['mausac'];
                                    $q = $v['qty'];
                                    $pmasp = get_code($pid);
                                    $pname = get_product_name($pid);
                                    $pphoto = get_product_photo($pid);
                                    if($q == 0) continue;
                         ?>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="<?=_upload_sanpham_l.$pphoto?>" height="60" class="mr-3">
                                            <b><?= $pname ?></b>
                                        </div>
                                    </td>
                                    <td class="text-right"><?= $q ?> x <?=number_format(get_price($pid),0, ',', '.')?> đ</td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>

                    
                    <div class="border-top pt-4 mb-4">
                        <div class="d-flex justify-content-between font-16 mb-3">
                            <span class="text-secondary">Giá sản phẩm:</span>
                            <span><?=number_format(get_price($pid)*$q,0, ',', '.') ?> đ</span>
                        </div>
                    </div>
                                    <div class="border-top pt-4 mb-4">
                        <div class="d-flex justify-content-between">
                            <h5>Tổng cộng:</h5>
                            <h5 class="text-pink" id="checkout-total" data-total="<?= get_order_total() ?>">
                                <?=number_format(get_price($pid)*$q,0, ',', '.') ?> đ</h5>
                        </div>
                    </div>
                    <div class="d-flex flex-column-reverse flex-md-row justify-content-between align-items-center">
                        <input id="price_ship" name="price_ship" type="hidden" value="0">
                        <input id="tong_gia" name="tong_gia" type="hidden" value="<?= get_order_total() ?>">
                        <a href="gio-hang.html" class="text-pink mb-3"><i class="fa fa-chevron-left"></i> Quay về giỏ hàng </a>
                        <button type="button" class="btn btn-pink text-uppercase py-2 px-4 mb-3 click_ajax2">Hoàn tất đơn hàng</button>
                    </div>
                </div>
            </form>
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
