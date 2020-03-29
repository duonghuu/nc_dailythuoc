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
        <h1 class="section-title mb-0">Giỏ hàng</h1>
        <?php /* <span class="text-secondary ml-3">( <span class="cart-total-number-product">2</span>
         sản phẩm )</span> */?>
    </div>
    <div class="table-responsive">
        <table class="table align-middle mb-4">
            <thead class="text-uppercase text-nowrap bg-lightpink">
                <tr>
                    <th>Sản phẩm</th>
                    <th class="text-right">ĐƠN GIÁ</th>
                    <th class="text-center" style="width: 200px">SỐ LƯỢNG</th>
                    <th class="text-right">THÀNH TIỀN</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                      //unset($_SESSION['cart']);
                      //print_r($_SESSION['cart']);
                   if(is_array($_SESSION['cart'])){
                     // echo '<tr style="background:#F0F0F0; height:55px; font-weight:bold;"><td align="center">
                     // '._xoa.'</td><td style="text-align:center;">'._hinhanh.'</td><td style="text-align:center;">
                     // '._ten.'</td><td align="center">'._dongia.'</td><td align="center">'._soluong.'</td>
                     // <td align="center" class="gh_an">'._thanhtien.'</td></tr>';

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
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="<?=_upload_sanpham_l.$pphoto?>" height="60" class="mr-3">
                            <a href="" class="news-link" title="<?=$pname?>">
                              <b class="text-dark"><?=$pname?></b>
                          </a>
                      </div>
                  </td>
                  <td class="text-right"><b class="text-pink"><?=number_format(get_price($pid),0, ',', '.')?> đ</b></td>
                  <td class="text-center">
                    <div class="d-flex align-items-stretch justify-content-center">
                      <input type="number" id="product-number-cart-28" value="<?=$q?>" class="form-control 
                      cart-number sl_gh" style="width:80px;">

                  </div>
              </td>
              <td class="text-right"><b class="text-pink gia_gh"><?=number_format(get_price($pid)*$q,0, ',', '.') ?> đ</b></td>
              <td class="text-center"><a href="#" class="xoa_gh">×</a></td>
          </tr>
      <?php } ?>
      <?php } else{
          echo "<tr><td>"._khongcosanphamtronggiohang."</td>";
      }?>
</tbody>
</table>
</div>
<div class="row align-items-start flex-column-reverse flex-md-row">
            <div class="col-md-6 mb-5 text-center text-md-left">
                <a href="san-pham.html" class="link-1 mr-auto"><i class="fa fa-chevron-left"></i> Tiếp tục mua sắm</a>
            </div>
            <input id="price_ship" name="price_ship" type="hidden" value="0">
            <input id="tong_gia" name="tong_gia" type="hidden" value="<?= get_order_total() ?>">
                            <div class="col-md-6 mb-5">
                    <div class="border rounded bg-gray p-4">
                        <div class="d-flex justify-content-between mb-3 tongtien_gh">
                            <div class="text-secondary">Tổng tiền hàng:</div>
                            <div class="font-weight-medium"><span><?=number_format(get_order_total(),0, ',', '.')?> đ
                            </span></div>
                        </div>
                        <?php /* <div class="d-flex justify-content-between mb-3">
                                                    <div class="text-secondary">Phí vận chuyển:</div>
                                                    <div class="font-weight-medium">0 đ</div>
                                                </div> 
                        <div class="d-flex justify-content-between mb-3">
                            <div class="text-secondary">Tổng tạm tính:</div>
                            <div class="font-weight-medium text-pink"><span class="cart-all-price">750.000</span>đ</div>
                        </div>*/?>
                        <a href="thanh-toan.html" class="btn btn-block btn-pink text-uppercase py-2">Thanh toán đơn hàng</a>
                    </div>
                </div>
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
