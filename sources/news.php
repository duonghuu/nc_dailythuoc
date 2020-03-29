<?php  if(!defined('_source')) die("Error");
$a_danhmuc = array();
	@$id_danhmuc =  (int)trim(strip_tags(addslashes($_GET['id_danhmuc'])));
	@$id_list =   (int)trim(strip_tags(addslashes($_GET['id_list'])));
	@$id_cat =   (int)trim(strip_tags(addslashes($_GET['id_cat'])));
	@$id_item =   (int)trim(strip_tags(addslashes($_GET['id_item'])));
	@$id =   (int)trim(strip_tags(addslashes($_GET['id'])));
	$bread->add($title_cat,$type.".html");
	if(!empty($_POST["rp3val"])){
	    if($_SESSION['rp3token'] == $_POST['rp3token']){ // refresh page
	      unset($_SESSION['rp3token']);
	      header('location: '.getCurrentPageURL());
	      exit();
	    }else{
	      $_SESSION['rp3token'] = $_POST['rp3token'];
	      if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recaptchaResponse3'])) {

	          // Build POST request:
	          $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
	          $recaptcha_secret = $config['recaptcha_secretkey'];
	          $recaptcha_response = $_POST['recaptchaResponse3'];

	          // Make and decode POST request:
	          $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
	          $recaptcha = json_decode($recaptcha);

	          // Take action based on the score returned:
	          if ($recaptcha->score >= 0.5 and $recaptcha->success == true) { 
	            $datapost = $_POST["fpu3"];
	            $datahoten = (string)trim(strip_tags($datapost['hoten']));       
	            $dataemail = (string)trim(strip_tags($datapost['email']));       
	            $datadiachi = (string)trim(strip_tags($datapost['diachi']));       
	            $datadienthoai = (string)trim(strip_tags($datapost['dienthoai']));       
	            $data["ten"] = (string)trim(strip_tags($datapost['ten']));  
	            $data["tenkhongdau"] = changeTitle($datapost['ten']);  
	            $data['hienthi'] = 0;
	            $data['stt'] = 1;
	            $data['ngaytao'] = time();
	            $data['type'] = 'tuvan';
	            $data['mota2'] = '<div><h2>Thông tin người gửi</h2>
	            <div style="border-style:solid;border-width:1px 0;border-color:#c3bfbf;">
	             <p><strong style="width:100px;display:inline-block">Họ tên:</strong>'.$datahoten.'</p><p><strong style="width:100px;display:inline-block">Email:</strong>'.$dataemail.'</p><p><strong style="width:100px;display:inline-block">Điện thoại:</strong>'.$datadienthoai.'</p><p><strong style="width:100px;display:inline-block">Địa chỉ:</strong>'.$datadiachi.'</p></div></div>';
	            $d->reset();
	            $d->setTable('news');
	            if($d->insert($data)){
	              transfer(_guilienhethanhcong,getCurrentPageURL());  
	            }else{
	              transfer(_guilienhethatbai,getCurrentPageURL());  
	            }
	          } else {
	            transfer(_xindungspamwebsitechungtoi, getCurrentPageURL());
	          }
	      }
	    }
	  }
  if($id>0)
	{
		//Cập nhật lượt xem
		$d->reset();
		$sql_lanxem = "UPDATE #_news SET luotxem=luotxem+1 WHERE id ='$id'";
		$d->query($sql_lanxem);

		$row_detail = get_fetch("select *,ten$lang as ten,mota$lang as mota,noidung$lang as noidung FROM #_news where hienthi=1 and id='$id' limit 0,1");
		if(empty($row_detail)){redirect($config_url_ssl.'/404.php');}

		$a_danhmuc["id_danhmuc"] = $row_detail["id_danhmuc"];
		$a_danhmuc["id_list"] = $row_detail["id_list"];

		$title_cat = $row_detail['ten'];
		$title = $row_detail['title'];$keywords = $row_detail['keywords'];$description = $row_detail['description'];
		$h1 = $row_detail['h1'];$h2 = $row_detail['h2'];$h3 = $row_detail['h3'];

		#Thông tin share facebook
		$images_facebook = $config_url_ssl.'/thumb/200x200/2/'._upload_tintuc_l.$row_detail['photo'];
		$title_facebook = $row_detail['ten'];
		$description_facebook = trim(strip_tags($row_detail['mota']));
		$url_facebook = getCurrentPageURL();

		//Hình ảnh khác của tin tức
		$hinhthem = get_result("select id,ten$lang as ten,thumb,photo FROM #_hinhanh where id_hinhanh='".$row_detail['id']."' and type='".$row_detail['type']."' and hienthi=1 order by stt,id desc");
		//tin tức cùng loại
		$where = " type='".$row_detail['type']."' ";
		if($row_detail['id_danhmuc']>0) $where .= " and id_danhmuc='".$row_detail['id_danhmuc']."'";
		if($row_detail['id_list']>0) $where .= " and id_list='".$row_detail['id_list']."'";
		$where .= " and id <> ".$id." and hienthi=1 order by stt,id desc";
	}
	//Danh mục tin tức cấp 4
	elseif($id_item>0)
	{
		$title_bar = get_fetch("select id,ten$lang as ten,tenkhongdau,type,title,keywords,description,h1,h2,h3,mota,noidung FROM #_news_item where id=".$id_item." limit 0,1");
		if(empty($title_bar)){redirect($config_url_ssl.'/404.php');}

		$title_cat = $title_bar['ten'];	$mota = $title_bar['mota'];	$noidung = $title_bar['noidung'];
		$title = $title_bar['title'];$keywords = $title_bar['keywords'];$description = $title_bar['description'];
		$h1 = $title_bar['h1'];$h2 = $title_bar['h2'];$h3 = $title_bar['h3'];

		$where = " type='".$title_bar['type']."' and id_item=".$title_bar['id']." and hienthi=1 order by stt,id desc";
	}
	//Danh mục tin tức cấp 3
	elseif($id_cat > 0)
	{
		$title_bar = get_fetch("select id,ten$lang as ten,tenkhongdau,type,title,keywords,description,h1,h2,h3,mota,noidung FROM #_news_cat where id=".$id_cat." limit 0,1");
		if(empty($title_bar)){redirect($config_url_ssl.'/404.php');}

		$title_cat = $title_bar['ten'];	$mota = $title_bar['mota'];	$noidung = $title_bar['noidung'];
		$title = $title_bar['title'];$keywords = $title_bar['keywords'];$description = $title_bar['description'];
		$h1 = $title_bar['h1'];$h2 = $title_bar['h2'];$h3 = $title_bar['h3'];

		$where = " type='".$title_bar['type']."' and id_cat=".$title_bar['id']." and hienthi=1 order by stt,id desc";
	}
	//Danh mục tin tức cấp 2
	elseif($id_list>0)
	{
		$title_bar = get_fetch("select id,ten$lang as ten,tenkhongdau,type,title,keywords,description,h1,h2,h3,mota,noidung FROM #_news_list where id=".$id_list." limit 0,1");
		if(empty($title_bar)){redirect($config_url_ssl.'/404.php');}

		$title_cat = $title_bar['ten'];	$mota = $title_bar['mota'];	$noidung = $title_bar['noidung'];
		$title = $title_bar['title'];$keywords = $title_bar['keywords'];$description = $title_bar['description'];
		$h1 = $title_bar['h1'];$h2 = $title_bar['h2'];$h3 = $title_bar['h3'];

		$where = " type='".$title_bar['type']."' and id_list=".$title_bar['id']." and hienthi=1 order by stt,id desc";
	}

	//Danh mục tin tức cấp 1
	else if($id_danhmuc!='')
	{
		$title_bar = get_fetch("select id,ten$lang as ten,tenkhongdau,type,title,keywords,description,h1,h2,h3,mota,noidung FROM #_news_danhmuc where id=".$id_danhmuc." limit 0,1");
		if(empty($title_bar)){redirect($config_url_ssl.'/404.php');}

		$title_cat = $title_bar['ten'];	$mota = $title_bar['mota'];	$noidung = $title_bar['noidung'];
		$title = $title_bar['title'];$keywords = $title_bar['keywords'];$description = $title_bar['description'];
		$h1 = $title_bar['h1'];$h2 = $title_bar['h2'];$h3 = $title_bar['h3'];

		$where = " type='".$title_bar['type']."' and id_danhmuc=".$title_bar['id']." and hienthi=1 order by stt,id desc";
	}
	//Tất cả tin tức
	else{
		$where = " type='".$type."' and hienthi=1 order by stt,id desc";
		$title_bar = get_fetch("select * FROM #_title where type='".$type."'");
		$title = $title_bar['title'];$keywords = $title_bar['keywords'];$description = $title_bar['description'];

		#Thông tin share facebook
		if(!empty($title_bar['photo'])) $images_facebook = $config_url_ssl.'/thumb/200x200/2/'._upload_hinhanh_l.$title_bar['photo'];
		$title_facebook = $title_bar['title'];
		$description_facebook = trim(strip_tags($title_bar['description']));
		$url_facebook = getCurrentPageURL();
	}

	#Lấy tin tức và phân trang
	$dem = get_fetch("SELECT count(id) AS numrows FROM #_news where $where");

	$totalRows = $dem['numrows'];
	$page = $_GET['p'];
	if($id > 0){
		if($type=='du-an' or $type=='cong-trinh' or $type=='thu-vien' or $type=='album' or $type=='hinh-anh')
			$pageSize = $company['soluong_spk'];//Số item cho 1 trang
		else
			$pageSize = $company['soluong_tink'];//Số item cho 1 trang
	}
	else{
			if($type=='du-an' or $type=='cong-trinh' or $type=='thu-vien' or $type=='album' or $type=='hinh-anh')
				$pageSize = $company['soluong_sp'];//Số item cho 1 trang
			else
				$pageSize = $company['soluong_tin'];//Số item cho 1 trang
	}
	$offset = 5;//Số trang hiển thị
	if ($page == "")$page = 1;
	else $page = $_GET['p'];
	$page--;
	$bg = $pageSize*$page;

	$tintuc = get_result("select id,ten$lang as ten,tenkhongdau,type,thumb,photo,thumb2,photo2,mota$lang as mota,ngaytao,luotxem,taptin,link,noibat FROM #_news where $where limit $bg,$pageSize");
	$url_link = getCurrentPageURL();

?>
