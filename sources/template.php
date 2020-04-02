<?php 
if($source=="index"){
    $about=get_fetch("select mota2$lang as mota2,ten$lang as ten,tenkhongdau,id,thumb,photo,type from #_about where type='gioithieu'");
    $canbiet=get_result("select ten$lang as ten,noidung$lang as noidung,tenkhongdau,id,type,link,thumb,photo,noibat from #_news where type='canbiet' and hienthi=1 order by stt asc");
    $txtdichvu=get_fetch("select mota$lang as mota,ten$lang as ten from #_about where type='txtdichvu'");
    $txtsp=get_fetch("select mota$lang as mota,ten$lang as ten from #_about where type='txtsp'");
    $txtthuvien=get_fetch("select mota$lang as mota,ten$lang as ten from #_about where type='txtthuvien'");
    $dichvu=get_result("select mota$lang as mota,ten$lang as ten,tenkhongdau,id,thumb,photo,type,ngaytao from #_news where type='dichvu' and noibat>0 and hienthi=1 order by stt asc");
    $spnoibat=get_result("select ten$lang as ten,tenkhongdau,id,type,thumb,photo,gia,giakm from #_product where noibat>0 and type='sanpham' and hienthi=1 order by rand(),stt asc limit 0,12");
    $tinnb=get_result("select mota$lang as mota,ten$lang as ten,tenkhongdau,id,thumb,photo,type,ngaytao from #_news where type='tintuc' and noibat>0 and hienthi=1 order by stt asc");
    $c_tinnb=count($tinnb);
    $camnang=get_result("select ten$lang as ten,tenkhongdau,id,type from #_news where type='camnang' and noibat>0 and hienthi=1 order by stt asc");
    $thuvien=get_result("select mota$lang as mota,ten$lang as ten,tenkhongdau,id,thumb,photo,type,ngaytao from #_news where type='thu-vien' and hienthi=1 order by rand() limit 0,16");

    $spbanchay=get_result("select ten$lang as ten,tenkhongdau,id,type,thumb,photo,gia,giakm from #_product where spbanchay>0 and type='sanpham' and hienthi=1 order by rand(),stt asc limit 0,15");
    $spnoibatkm=get_result("select ten$lang as ten,tenkhongdau,id,type,thumb,photo,gia,giakm from #_product where noibat>0 and tieubieu>0 and type='sanpham' and hienthi=1 order by rand(),stt asc limit 0,8");
    
    
   
    $taisao=get_fetch("select mota$lang as mota,ten$lang as ten from #_about where type='taisao'");
    $themanh=get_result("select mota$lang as mota,ten$lang as ten,tenkhongdau,id,thumb,photo,type,ngaytao from #_news where type='themanh' and hienthi=1 order by stt asc");
    $chinhsachbansi=get_result("select mota2$lang as mota2,mota$lang as mota,ten$lang as ten,tenkhongdau,id,thumb,photo,type,ngaytao from #_news where type='chinhsachbansi' and hienthi=1 order by stt asc");
    $product_danhmucnb=get_result("select ten$lang as ten,tenkhongdau,id,type,thumb,photo from #_product_danhmuc where type='sanpham' and noibat>0 and hienthi=1 order by stt asc");
    
    $quangcao=get_result("select ten$lang as ten,mota$lang as mota,link,photo,thumb from #_slider where hienthi=1 and type='quang-cao' order by stt");
    // 
    
    $video = get_result("select id,ten$lang as ten,link,photo,ngaytao from #_video where hienthi=1 and type='video' order by stt asc");
}
$logolang = get_fetch("select photo as photo from #_background where type='logo'");
$txtbanner=get_fetch("select mota$lang as mota,ten$lang as ten from #_about where type='txtbanner'");
$thongtin=get_result("select ten$lang as ten,tenkhongdau,id,thumb,photo,type from #_news where type='thongtin' and hienthi=1 order by stt asc");
$product_danhmuc=get_result("select ten$lang as ten,tenkhongdau,id,type,thumb,photo from #_product_danhmuc where 
    type='sanpham' and hienthi=1 order by stt asc");
//$bannerlang = get_fetch("select photo as photo from #_background where type='banner'");
//$bgbnlang = get_fetch("select photo as photo from #_background where type='bgbn'");
// $banner_mobilang = get_fetch("select photo as photo from #_background where type='banner_mobi'");
//$tutags = get_result("select id,ten$lang as ten,link from #_news where type='tags' and hienthi=1 order by stt asc");
//$hotline = get_result("select id,ten$lang as ten,chucvu,link from #_news where type='hotline' and hienthi=1 order by stt asc");
$diachi = get_result("select id,ten$lang as ten,mota$lang as mota from #_news where type='diachi' and hienthi=1 order by stt asc");
// $yahoo = get_result("select * from #_yahoo where type='yahoo' and hienthi=1 order by stt asc");
// $lkweb = get_result("select link,ten from #_lkweb where type='lkweb' and hienthi=1 order by stt asc");


