<script type="text/javascript">
	$(document).ready(function(e) {
		$('.click_ajax').click(function(){
			if(isEmpty($('#ten_lienhe').val(), "<?=_nhaphoten?>"))
			{
				$('#ten_lienhe').focus();
				return false;
			}
			if(isEmpty($('#diachi_lienhe').val(), "<?=_nhapdiachi?>"))
			{
				$('#diachi_lienhe').focus();
				return false;
			}
			if(isEmpty($('#dienthoai_lienhe').val(), "<?=_nhapsodienthoai?>"))
			{
				$('#dienthoai_lienhe').focus();
				return false;
			}
			if(isEmpty($('#email_lienhe').val(), "<?=_emailkhonghople?>"))
			{
				$('#email_lienhe').focus();
				return false;
			}
			if(isEmail($('#email_lienhe').val(), "<?=_emailkhonghople?>"))
			{
				$('#email_lienhe').focus();
				return false;
			}
			if(isEmpty($('#noidung_lienhe').val(), "<?=_nhapnoidung?>"))
			{
				$('#noidung_lienhe').focus();
				return false;
			}
			// if(isEmpty($('#capcha').val(), "<?=_nhapmabaove?>"))
			// {
			// 	$('#capcha').focus();
			// 	return false;
			// }
            frm.submit();
			// $.ajax({
			// 	type:'post',
			// 	url:$(".frm").attr('action'),
			// 	data:$(".frm").serialize(),
			// 	dataType:'json',
			// 	beforeSend: function() {
			// 		$('.thongbao').html('<p><img src="images/loader_p.gif"></p>');
			// 	},
			// 	error: function(){
			// 		add_popup('<?=_hethongloi?>');
			// 		$(".frm")[0].reset();
			// 	},
			// 	success:function(kq){
			// 		add_popup(kq.thongbao);
			// 		// $('#capcha').val('');
			// 		if(kq.nhaplai=='nhaplai')
			// 		{
			// 			$(".frm")[0].reset();
			// 		}
			// 	}
			// });
		});
    });
</script>

<?php /* <script type="text/javascript">
    $(document).ready(function(){
        $("#reset_capcha").click(function() {
            $("#hinh_captcha").attr("src", "sources/captcha.php?"+Math.random());
            return false;
        });
    });
</script> */?>

<div class="tieude_giua"><div><?=$title_cat?></div></div>
<div class="box_container">
   <div class="content contact-flex">
   		<div class="tt_lh">
        <?=lay_text('lienhe');?>
		<div class="frm_lienhe">
        	<form method="post" name="frm" class="frm" action="" enctype="multipart/form-data">
            	<?php /* <div class="loicapcha thongbao"></div> */?>
            	<div class="item_lienhe"><p><?=_hovaten?>:<span>*</span></p><input name="ten_lienhe" type="text" id="ten_lienhe" /></div>

                <div class="item_lienhe"><p><?=_diachi?>:<span>*</span></p><input name="diachi_lienhe" type="text" id="diachi_lienhe" /></div>

                <div class="item_lienhe"><p><?=_dienthoai?>:<span>*</span></p><input name="dienthoai_lienhe" type="text" id="dienthoai_lienhe" /></div>

                <div class="item_lienhe"><p>Email:<span>*</span></p><input name="email_lienhe" type="text" id="email_lienhe" /></div>

                <div class="item_lienhe"><p><?=_noidung?>:<span>*</span></p><textarea name="noidung_lienhe" id="noidung_lienhe" rows="5"></textarea></div>

                <?php /* <div class="item_lienhe"><p><?=_mabaove?>:<span>*</span></p>
                                <img src="sources/captcha.php" id="hinh_captcha">
                                           <a href="#reset_capcha" id="reset_capcha" title="<?=_doimakhac?>"><img src="images/refresh.png" alt="reset_capcha" /></a></div>
                
                                <div class="item_lienhe"><p>&nbsp;</p><input name="capcha" type="text" id="capcha" /></div> */?>

                <div class="item_lienhe" >
                	<p>&nbsp;</p>
                	<input type="button" value="<?=_gui?>" class="click_ajax" />
                    <input type="button" value="<?=_nhaplai?>" onclick="document.frm.reset();" />
                </div>
                <input type="hidden" name="recaptchaResponse2" id="recaptchaResponse2">
            </form>
        </div><!--.frm_lienhe-->
        </div>

        <div class="bando">
					 <?=$company['bando']?>
           <?php /*<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyACyJA0Ifi-Y2FmzHOrZYNMY5q4-qATAUg"></script>

				   <script type="text/javascript">
				   var map;
				   var infowindow;
				   var marker= new Array();
				   var old_id= 0;
				   var infoWindowArray= new Array();
				   var infowindow_array= new Array();
				   function initialize(){
					   var defaultLatLng = new google.maps.LatLng(<?=$company['toado']?>);
					   var myOptions= {
						   zoom: 16,
						   center: defaultLatLng,
						   scrollwheel : false,
						   mapTypeId: google.maps.MapTypeId.ROADMAP
						};
						map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);map.setCenter(defaultLatLng);

					   var arrLatLng = new google.maps.LatLng(<?=$company['toado']?>);
					   infoWindowArray[7895] = '<div class="map_description"><div class="map_title"><?=$company['ten']?></div><div><?=_diachi?> : <?=$company['diachi']?><?='<br />'?><?=_dienthoai?>: <?=$company['dienthoai']?></div></div>';
					   loadMarker(arrLatLng, infoWindowArray[7895], 7895);

					   moveToMaker(7895);}function loadMarker(myLocation, myInfoWindow, id){marker[id] = new google.maps.Marker({position: myLocation, map: map, visible:true,icon: 'images/map-marker.gif' });
					   var popup = myInfoWindow;infowindow_array[id] = new google.maps.InfoWindow({ content: popup});google.maps.event.addListener(marker[id], 'mouseover', function() {if (id == old_id) return;if (old_id > 0) infowindow_array[old_id].close();infowindow_array[id].open(map, marker[id]);old_id = id;});google.maps.event.addListener(infowindow_array[id], 'closeclick', function() {old_id = 0;});}function moveToMaker(id){var location = marker[id].position;map.setCenter(location);if (old_id > 0) infowindow_array[old_id].close();infowindow_array[id].open(map, marker[id]);old_id = id;}</script>
		           <div id="map_canvas"></div> */?>
        </div><!--.bando-->
   </div><!--.content-->
</div><!--.box_container-->
