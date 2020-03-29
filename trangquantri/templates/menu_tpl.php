<?php 
$logo = get_fetch("select photo as photo from #_background where type='logo'");
 ?>
<div class="logo"><a href="index.php" style="display:block;"><img style="max-width: 100%" src="<?= _upload_hinhanh.$logo["photo"] ?>" /></a></div>
<div class="sidebarSep mt0"></div>
<!-- Left navigation -->
<ul id="menu" class="nav">
    <li class="dash" id="menu1"><a class=" active" title="" href="index.php"><span>Trang chủ</span></a></li>
    <li class="categories_li <?php if($_GET['com']=='httt' || $_GET['com']=='order' || $_GET['type']=='nhasanxuat' || $_GET['type']=='mausac' || $_GET['type']=='size' || $_GET['type']=='txtsp' || $_GET['type']=='sanpham' || $_GET['type']=='id_hientrang' || $_GET['type']=='id_huong' || $_GET['com']=='excel' ) echo ' activemenu' ?>" id="menu_"><a href="" title="" class="exp"><span>Sản phẩm</span><strong></strong></a>
        <ul class="sub">
            
            <?php phanquyen_menu('Danh mục cấp 1','product','man_danhmuc','sanpham'); ?>
            <?php phanquyen_menu('Danh mục cấp 2','product','man_list','sanpham'); ?>
            <?php //phanquyen_menu('Danh mục cấp 3','product','man_cat','menu'); ?>
            
            <?php phanquyen_menu('Sản phẩm','product','man','sanpham'); ?>
            <?php phanquyen_menu('Hình thức thanh toán','httt','man',''); ?>
            <?php phanquyen_menu('Text trang chủ','about','capnhat','txtsp'); ?>
            <?php //phanquyen_menu('Quản lý màu sắc','news','man','mausac'); ?>
            <?php //phanquyen_menu('Quản lý size','news','man','size'); ?>
        </ul>
    </li>
    <li class="categories_li <?php if(in_array($_GET['type'], array('dichvu','txtdichvu')) ) echo ' activemenu' ?>" id="menu_ttdv"><a href="" title="" class="exp"><span>Dịch vụ</span><strong></strong></a>
        <ul class="sub">
            
            <?php phanquyen_menu('Text mô tả','about','capnhat','txtdichvu'); ?>
            <?php phanquyen_menu('Dịch vụ','news','man','dichvu'); ?>
        </ul>
    </li>
    <li class="categories_li <?php if(in_array($_GET['type'], array('thu-vien','txtthuvien')) ) echo ' activemenu' ?>" id="menu_ttab"><a href="" title="" class="exp"><span>Thư viện hình</span><strong></strong></a>
        <ul class="sub">
            
            <?php //phanquyen_menu('Text mô tả','about','capnhat','txtthuvien'); ?>
            <?php phanquyen_menu('Thư viện hình','news','man','thu-vien'); ?>
        </ul>
    </li>
    <li class="categories_li <?php if(in_array($_GET['type'], array('canbiet','thongtin','thietbi','tuvan','chinhsach','tintuc','banggia','camnang')) or $_GET['com']=='vnexpress') echo ' activemenu' ?>" id="menu_tt"><a href="" title="" class="exp"><span>Bài viết</span><strong></strong></a>
        <ul class="sub">
            
            <?php phanquyen_menu('Khách hàng cần biết','news','man','canbiet'); ?>
            <?php phanquyen_menu('Thông tin','news','man','thongtin'); ?>
            <?php phanquyen_menu('Tin tức','news','man','tintuc'); ?>
            <?php phanquyen_menu('Cẩm nang','news','man','camnang'); ?>
            <?php phanquyen_menu('Bảng giá','news','man','banggia'); ?>
            <?php phanquyen_menu('Thiết bị','news','man','thietbi'); ?>
            <?php phanquyen_menu('Tư vấn','news','man','tuvan'); ?>
            <?php phanquyen_menu('Hỗ trợ khách hàng','news','man','chinhsach'); ?>
            <?php //phanquyen_menu('Lấy tin từ Vnexpress','vnexpress','man',''); ?>
        </ul>
    </li>
    <li class="categories_li <?php if(in_array($type, array('tuyendung','gioithieu','lienhe','footer'))) echo ' activemenu' ?>" id="menu_t"><a href="" title="" class="exp"><span>Trang tĩnh</span><strong></strong></a>
        <ul class="sub">
            <?php phanquyen_menu('Giới thiệu','about','capnhat','gioithieu'); ?>
            <?php phanquyen_menu('Cập nhật liên hệ','about','capnhat','lienhe'); ?>
            <?php phanquyen_menu('Cập nhật footer','about','capnhat','footer'); ?>
        </ul>
    </li>
    <li class="categories_li <?php if($_GET['com']=='newsletter' || $_GET['com']=='lkweb' || $_GET['com']=='yahoo') echo ' activemenu' ?>" id="menu_nt"><a href="" title="" class="exp"><span>Marketing Online</span><strong></strong></a>
       <ul class="sub">
          <?php phanquyen_menu('Mạng xã hội','lkweb','man','mxh'); ?>
          <?php phanquyen_menu('Cách thức thanh toán','lkweb','man','mxhft'); ?>
          <?php phanquyen_menu('Dịch vụ giao hàng','lkweb','man','mxhle'); ?>
          <?php //phanquyen_menu('Mạng xã hội footer','lkweb','man','mxhft'); ?>
          <?php //phanquyen_menu('Quản lý liên kết web','lkweb','man','lkweb'); ?>
          <?php //phanquyen_menu('Quản lý hỗ trợ','yahoo','man','yahoo'); ?>
          <?php //phanquyen_menu('Quản lý Đăng ký nhận tin','newsletter','man',''); ?>
      </ul>
  </li>
  <li class="categories_li gallery_li <?php if($_GET['type']=='txtdoitac' || $_GET['type']=='bntrong' || $_GET['com']=='anhnen' || $_GET['type']=='logo' || $_GET['type']=='banner' || $_GET['type']=='bgbn' || $_GET['type']=='slider' || $_GET['com']=='letruot') echo ' activemenu' ?>" id="menu_qc"><a href="" title="" class="exp"><span>Banner - Quảng cáo</span><strong></strong></a>
   <ul class="sub">
    <?php //phanquyen_menu('Cập nhật background','anhnen','capnhat','background'); ?>
    <?php phanquyen_menu('Cập nhật logo','background','capnhat','logo'); ?>
    <?php //phanquyen_menu('Banner','background','capnhat','banner'); ?>
    <?php //phanquyen_menu('Background banner','background','capnhat','bgbn'); ?>
    <?php //phanquyen_menu('Cập nhật logo đóng dấu','background','capnhat','dong'); ?>
    <?php //phanquyen_menu('Cập nhật background footer','background','capnhat','bgft'); ?>
    <?php //phanquyen_menu('Cập nhật banner mobile','background','capnhat','banner_mobi'); ?>
    <?php phanquyen_menu('Quản lý slider','slider','man_photo','slider'); ?>
    <?php //phanquyen_menu('Banner trang trong','news','man','bntrong'); ?>
    <?php //phanquyen_menu('Text Đối tác','about','capnhat','txtdoitac'); ?>
    <?php phanquyen_menu('Đối tác','slider','man_photo','doi-tac'); ?>
    <?php phanquyen_menu('Quảng cáo','slider','man_photo','quang-cao'); ?>
    <?php //phanquyen_menu('Quảng cáo nhỏ','slider','man_photo','quang-cao2'); ?>
    <?php //phanquyen_menu('Quản lý quảng cáo 2 bên','slider','man_photo','letruot'); ?>
    <?php //phanquyen_menu('Cập nhật pupop quảng cáo','background','capnhat','pupop'); ?>
</ul>
</li>
<?php /*<li class="categories_li <?php if($_GET['com']=='database' || $_GET['com']=='backup') echo ' activemenu' ?>" id="menu_ntt"><a href="" title="" class="exp"><span>Database</span><strong></strong></a>
        <ul class="sub">
            <?php phanquyen_menu('Quản lý database','database','man',''); ?>
            <?php phanquyen_menu('Backup database','backup','backup_database',''); ?>
            <?php phanquyen_menu('Backup file','backup','backup_file',''); ?>
        </ul>
</li>  */?>
<li class="categories_li <?php if($_GET['com']=='phanquyen' || $_GET['com']=='com') echo ' activemenu' ?>" id="menu_pq"><a href="" title="" class="exp"><span>Thành viên</span><strong></strong></a>
  <ul class="sub">
        <?php //phanquyen_menu('Quản lý nhóm thành viên','phanquyen','man',''); ?>
        <?php //phanquyen_menu('Quản lý thành viên','user','man',''); ?>
        <?php //phanquyen_menu('Quản lý com','com','man',''); ?>
    </ul>
</li>
<?php /*<li class="categories_li <?php if($_GET['com']=='place') echo ' activemenu' ?>" id="menu_pl"><a href="" title="" class="exp"><span>Địa điểm</span><strong></strong></a>
    <ul class="sub">
        <?php phanquyen_menu('Quản lý Tỉnh thành','place','man_city',''); ?>
        <?php phanquyen_menu('Quản lý Quận huyện','place','man_dist',''); ?>
        <?php phanquyen_menu('Quản lý Phường xã','place','man_ward',''); ?>
        <?php phanquyen_menu('Quản lý Đường','place','man_street',''); ?>
    </ul>
</li>
*/?>
<li class="categories_li setting_li <?php if(in_array($type, array('txtvideo','video','hotline','tags','diachi')) || $_GET['com']=='company' || $_GET['com']=='meta' || $_GET['com']=='user') echo ' activemenu' ?>" id="menu_cp"><a href="" title="" class="exp"><span>Nội dung khác</span><strong></strong></a>
    <ul class="sub">
        <?php phanquyen_menu('Cấu hình thông tin Website','company','capnhat',''); ?>
        <?php //phanquyen_menu('Quản lý hotline','news','man','hotline'); ?>
        <?php //phanquyen_menu('Quản lý chi nhánh','news','man','diachi'); ?>
        <?php //phanquyen_menu('Quản lý video','video','man','video'); ?>
        <?php phanquyen_menu('Tags','news','man','tags'); ?>
        <li<?php if($_GET['act']=='admin_edit') echo ' class="this"' ?>><a href="index.php?com=user&act=admin_edit">Quản lý Tài Khoản</a></li>
    </ul>
</li>
<li class="marketing_li<?php if(in_array($_GET['com'], array('title') ) ) echo ' activemenu' ?>" id="menuseo"><a href="#" title="" class="exp"><span>Hổ Trợ SEO</span><strong></strong></a>
  <ul class="sub">
    <?php phanquyen_menu('Sản phẩm','title','capnhat','sanpham'); ?>
  </ul>
</li>
</ul>
