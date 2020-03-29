<?php  if(!defined('_source')) die("Error");
$a_danhmuc = array();
@$id_danhmuc = (int)trim(strip_tags(addslashes($_GET['id_danhmuc'])));
@$id_list =   (int)trim(strip_tags(addslashes($_GET['id_list'])));
@$id_cat =   (int)trim(strip_tags(addslashes($_GET['id_cat'])));
@$id_item =   (int)trim(strip_tags(addslashes($_GET['id_item'])));
@$id =   (int)trim(strip_tags(addslashes($_GET['id'])));
$bread->add($title_cat,$type.".html");	
if($id>0)
{
		//Cập nhật lượt xem
	$d->reset();
	$sql = "update #_product set luotxem=luotxem+1 where id ='$id'";
	$d->query($sql);

		//Chi tiết sản phẩm
	$row_detail = get_fetch("select *,id,ten$lang as ten,tenkhongdau,type,mota$lang as mota,noidung$lang as noidung FROM #_product where hienthi=1 and id='$id' limit 0,1");
	if(empty($row_detail)){redirect($config_url_ssl.'/404.php');}

	$a_danhmuc["id_danhmuc"] = $row_detail["id_danhmuc"];
	$a_danhmuc["id_list"] = $row_detail["id_list"];
	if($a_danhmuc["id_danhmuc"]>0){
		$a_danhmuc_detail = get_fetch("select id,ten$lang as ten,tenkhongdau,type from #_product_danhmuc where id='".$a_danhmuc["id_danhmuc"]."'");
		$bread->add($a_danhmuc_detail["ten"],$a_danhmuc_detail["type"]."/".$a_danhmuc_detail["tenkhongdau"]."-".$a_danhmuc_detail["id"]);	
	}
	if($a_danhmuc["id_list"]>0){
		$a_danhmuc_detail = get_fetch("select id,ten$lang as ten,tenkhongdau,type from #_product_list where id='".$a_danhmuc["id_list"]."'");
		$bread->add($a_danhmuc_detail["ten"],$a_danhmuc_detail["type"]."/".$a_danhmuc_detail["tenkhongdau"]."-".$a_danhmuc_detail["id"]."/");	
	}
	$title_cat = $row_detail['ten'];
	$title = $row_detail['title'];$keywords = $row_detail['keywords'];$description = $row_detail['description'];
	$h1 = $row_detail['h1'];$h2 = $row_detail['h2'];$h3 = $row_detail['h3'];

		#Thông tin share facebook
	$images_facebook = $config_url_ssl.'/thumb/200x200/2/'._upload_sanpham_l.$row_detail['photo'];
	$title_facebook = $row_detail['ten'];
	$description_facebook = trim(strip_tags($row_detail['mota']));
	$url_facebook = getCurrentPageURL();

		//Hình ảnh khác của sản phẩm
	$hinhthem = get_result("select id,ten$lang as ten,thumb,photo FROM #_hinhanh where id_hinhanh='".$row_detail['id']."' and type='".$row_detail['type']."' and hienthi=1 order by stt,id desc");

		//color size
		// $a_mausac2 = explode(',', $row_detail["mausac2"]);
		// $a_size2 = explode(',', $row_detail["size2"]);
		// if($a_mausac2){
		// 	$mausac2 = get_result("select ten,id,color,thumb,photo,noibat from table_news where type='mausac' and id in (".$row_detail["mausac2"].") order by stt asc");
		// }
		// if($a_size2){
		// 	$size2 = get_result("select ten,id from table_news where type='size' and id in (".$row_detail["size2"].") order by stt asc");
		// }
		//Đánh giá sao
	$danhgiasao = get_result("select ROUND(AVG(giatri)) as giatri FROM #_danhgiasao where link='".getCurrentPageURL()."' order by time desc");

		// if($danhgiasao['giatri']<6){$num_danhgiasao=6;}else{$num_danhgiasao=$danhgiasao['giatri'];};
	if($danhgiasao[0]['giatri']==0){$num_danhgiasao=0;}else{$num_danhgiasao=$danhgiasao[0]['giatri'];};
		//Sản phẩm cùng loại
	$where = " type='".$row_detail['type']."' and id_danhmuc='".$row_detail['id_danhmuc']."' and id <> ".$row_detail['id']." and hienthi=1 ";

		// $tags_sp = get_result("select id_tag as id,tags.ten from table_protag,table_tags as tags where id_pro='".$row_detail["id"]."' and id_tag=tags.id");
		/*Sản phẩm đã xem
		if(isset($_SESSION['recently_viewed'])){
			if(in_array((int)$row_detail['id'], $_SESSION['recently_viewed'])==false)
			{
				$_SESSION['recently_viewed'][]= (int)$row_detail['id'];
			}
		}
		else{
			$_SESSION['recently_viewed'] = array();
			$_SESSION['recently_viewed'][]= (int)$row_detail['id'];
		}

		if(isset($_SESSION['recently_viewed'])) {
		$arr_daxem = implode(',',$_SESSION['recently_viewed']);
		$daxem = get_result("select id,ten$lang as ten,tenkhongdau,type,thumb from #_product where type='".$row_detail['id']."' and hienthi=1 and FIND_IN_SET(id,'".$arr_daxem."')>0");
		//Sản phẩm đã xem*/
		
		if(isAjaxRequest() | $_GET['iframe']==1){
			include _template."product_detail2_tpl.php";
			die;
		}
	}
	//Danh mục sản phẩm cấp 4
	elseif($id_item>0)
	{
		$title_bar = get_fetch("select id,ten$lang as ten,tenkhongdau,type,title,keywords,description,h1,h2,h3,mota,noidung FROM #_product_item where id=".$id_item." limit 0,1");
		if(empty($title_bar)){redirect($config_url_ssl.'/404.php');}

		$title_cat = $title_bar['ten'];	$mota = $title_bar['mota'];	$noidung = $title_bar['noidung'];
		$title = $title_bar['title'];$keywords = $title_bar['keywords'];$description = $title_bar['description'];
		$h1 = $title_bar['h1'];$h2 = $title_bar['h2'];$h3 = $title_bar['h3'];

		$where = " type='".$title_bar['type']."' and id_item=".$title_bar['id']." and hienthi=1 order by stt,id desc";
	}
	//Danh mục sản phẩm cấp 3
	elseif($id_cat>0)
	{
		$title_bar = get_fetch("select id,ten$lang as ten,tenkhongdau,type,title,keywords,description,h1,h2,h3,mota,noidung FROM #_product_cat where id=".$id_cat." limit 0,1");
		if(empty($title_bar)){redirect($config_url_ssl.'/404.php');}

		$title_cat = $title_bar['ten'];	$mota = $title_bar['mota'];	$noidung = $title_bar['noidung'];
		$title = $title_bar['title'];$keywords = $title_bar['keywords'];$description = $title_bar['description'];
		$h1 = $title_bar['h1'];$h2 = $title_bar['h2'];$h3 = $title_bar['h3'];

		$where = " type='".$title_bar['type']."' and id_cat=".$title_bar['id']." and hienthi=1 ";
	}
	//Danh mục sản phẩm cấp 2
	elseif($id_list > 0)
	{
		$title_bar = get_fetch("select id,ten$lang as ten,tenkhongdau,type,title,keywords,description,h1,h2,h3,mota,noidung,id_danhmuc FROM #_product_list where id=".$id_list." limit 0,1");
		if(empty($title_bar)){redirect($config_url_ssl.'/404.php');}
		$loc_danhmuc = $title_bar['id_danhmuc'];
		$a_danhmuc["id_danhmuc"] = $title_bar["id_danhmuc"];
		$a_danhmuc["id_list"] = $title_bar["id"];
		$title_cat = $title_bar['ten'];	$mota = $title_bar['mota'];	$noidung = $title_bar['noidung'];
		$title = $title_bar['title'];$keywords = $title_bar['keywords'];$description = $title_bar['description'];
		$h1 = $title_bar['h1'];$h2 = $title_bar['h2'];$h3 = $title_bar['h3'];

		$where = " type='".$title_bar['type']."' and id_list=".$title_bar['id']." and hienthi=1 ";
		$s_search = (string)$_GET["search"];
		$s_color = (string)$_GET["color"];
		$s_size = (string)$_GET["size"];
		if($s_search == "newest"){
			$where .= " and spmoi>0 ";
		}
		if(!empty($s_color)){
			$where .= " and CONCAT(',',mausac2, ',') REGEXP ',(".str_replace(',', '|', $s_color)."),' ";
		}
		if(!empty($s_size)){
			$where .= " and CONCAT(',',size2, ',') REGEXP ',(".str_replace(',', '|', $s_size)."),' ";
		}

		$linkcoban =$com."/".$title_bar['tenkhongdau']."-".$title_bar['id']."/&search=".$s_search;
	}

	//Danh mục sản phẩm cấp 1
	else if($id_danhmuc > 0)
	{
		$loc_danhmuc = $id_danhmuc;
		$title_bar = get_fetch("select id,ten$lang as ten,type,tenkhongdau,title,keywords,description,h1,h2,h3,mota,noidung$lang as noidung,thumb,photo FROM #_product_danhmuc where id=".$id_danhmuc." limit 0,1");
		if(empty($title_bar)){redirect($config_url_ssl.'/404.php');}
		$a_danhmuc["id_danhmuc"] = $title_bar["id"];
		$a_danhmuc["id_list"] = "";
		$title_cat = $title_bar['ten'];	$mota = $title_bar['mota'];	$noidung = $title_bar['noidung'];
		$title = $title_bar['title'];$keywords = $title_bar['keywords'];$description = $title_bar['description'];
		$h1 = $title_bar['h1'];$h2 = $title_bar['h2'];$h3 = $title_bar['h3'];

		$bread->add(_sanpham,$title_bar['type'].".html");//linh com
		$bread->add($title_cat,$title_bar['type']."/".$title_bar['tenkhongdau']."-".$title_bar['id']);//link danhmuc

		$where = " type='".$title_bar['type']."' and id_danhmuc=".$title_bar['id']." and hienthi=1 ";
		$s_search = (string)$_GET["search"];
		$s_color = (string)$_GET["color"];
		$s_size = (string)$_GET["size"];
		if($s_search == "newest"){
			$where .= " and spmoi>0 ";
		}
		if(!empty($s_color)){
			$where .= " and CONCAT(',',mausac2, ',') REGEXP ',(".str_replace(',', '|', $s_color)."),' ";
		}
		if(!empty($s_size)){
			$where .= " and CONCAT(',',size2, ',') REGEXP ',(".str_replace(',', '|', $s_size)."),' ";
		}

		$linkcoban =$com."/".$title_bar['tenkhongdau']."-".$loc_danhmuc."&search=".$s_search;


	}
	//Tất cả sản phẩm
	else
	{
		$where = " type='".$type."' and hienthi=1 ";
		$title_bar = get_fetch("select * FROM #_title where type='".$type."'");
		$title = $title_bar['title'];$keywords = $title_bar['keywords'];$description = $title_bar['description'];

				#Thông tin share facebook
		if(!empty($title_bar['photo'])) $images_facebook = $config_url_ssl.'/thumb/200x200/2/'._upload_hinhanh_l.$title_bar['photo'];
		$title_facebook = $title_bar['title'];
		$description_facebook = trim(strip_tags($title_bar['description']));
		$url_facebook = getCurrentPageURL();
	}
	$where .= " order by stt,id desc";
	#Lấy sản phẩm và phân trang
	$dem = get_fetch("SELECT count(id) AS numrows FROM #_product where $where");

	$totalRows = $dem['numrows'];
	$page = $_GET['p'];
	if($id > 0){
		$pageSize = $company['soluong_spk'];//Số item cho 1 trang
	}
	else{
		$pageSize = $company['soluong_sp'];//Số item cho 1 trang
	}
	$offset = 5;//Số trang hiển thị
	if ($page == "")$page = 1;
	else $page = $_GET['p'];
	$page--;
	$bg = $pageSize*$page;

	$product = get_result("select *,mota$lang as mota,id,ten$lang as ten,tenkhongdau FROM #_product where $where limit $bg,$pageSize");
	$url_link = getCurrentPageURL();
	function fns_Rand_digit($min,$max,$num)
		{
			$result='';
			for($i=0;$i<$num;$i++){
				$result.=rand($min,$max);
			}
			return $result;
		}
	if(!empty($_POST["fdk1_val"])){
		if($_SESSION['fdk1_token'] == $_POST['fdk1_token']){ // refresh page
		  unset($_SESSION['fdk1_token']);
		  header('location: '.getCurrentPageURL());
		  exit();
		}else{
		  $_SESSION['fdk1_token'] = $_POST['fdk1_token'];
			$datafdk1 = $_POST["fdk1"];
			$datafdk1['email'] = (string)magic_quote(trim(strip_tags($datafdk1['email'])));
			$get_userbyemail = get_fetch("select id,email,ho,ten,quoctich,curjob,didong,dienthoai,ngaysinh from #_user where email='".$datafdk1['email']."'");
			if(count($get_userbyemail)>0){
				$id_user = $get_userbyemail["id"];
				$donhangmau = date('dmY').'NN';
				$d->reset();
				$sql = "select id,madonhang from #_donhang where madonhang like '$donhangmau%' order by id desc limit 0,1";
				$d->query($sql);
				$max_order = $d->fetch_array();
				if(empty($max_order['id']))
				{
					$songaunhien = 101;
				}
				else
				{
					(int)$songaunhien =  substr($max_order['madonhang'],10)+1;
				}
				$madonhang = date('dmY').'NN'.$songaunhien;
				if($id>0){
					$get_jobname = get_fetch("select ten from table_product where id='".$id."'");
				}
				$d->reset();
				$d->setTable("donhang");
				$isrt_data = array();
				$isrt_data["madonhang"] = $madonhang;
				$isrt_data["hoten"] = $get_userbyemail["ho"];
				$isrt_data["ten"] = $get_userbyemail["ten"];
				$isrt_data["dienthoai"] = $get_userbyemail["dienthoai"];
				$isrt_data["email"] = $get_userbyemail["email"];
				$isrt_data["didong"] = $get_userbyemail["didong"];
				$isrt_data["quoctich"] = $get_userbyemail["quoctich"];
				$isrt_data["ngaytao"] = time();
				$isrt_data["noidung"] = "Apply job : ".$get_jobname["ten"];
				$isrt_data["tinhtrang"] = 1;
				$isrt_data["ngaysinh"] = $get_userbyemail['ngaysinh'];
				$isrt_data["ngaycapnhat"] = time();
				$isrt_data["id_sanpham"] = $id;
				$isrt_data["id_user"] = $id_user;
				$file_name = images_name($_FILES['cv1']['name']);
				if($file_att = upload_image("cv1", 'doc|docx|pdf|DOC|DOCX|PDF', _upload_khac_l,$file_name)){
					$isrt_data['nguongoc'] = $file_att;
				}
				$d->insert($isrt_data);
				transfer("Thank you for your apply, we will contact with you as soon as posible!", getCurrentPageURL());
			}
			else{
				$d->reset();
				$datafdk1['ho'] = (string)magic_quote(trim(strip_tags($datafdk1['ho'])));
				$datafdk1['ten'] = (string)magic_quote(trim(strip_tags($datafdk1['ten'])));
				$datafdk1['quoctich'] = (string)magic_quote(trim(strip_tags($datafdk1['quoctich'])));
				$datafdk1['curjob'] = (string)magic_quote(trim(strip_tags($datafdk1['curjob'])));
				$datafdk1['didong'] =(string) magic_quote(trim(strip_tags($datafdk1['didong'])));
				$datafdk1['dienthoai'] = (string)magic_quote(trim(strip_tags($datafdk1['dienthoai'])));
				$datafdk1['ngaysinh'] = strtotime($datafdk1['ngaysinh']);
				$datafdk1['role'] = 1;
				$datafdk1['com'] = "user";
				$d->setTable('user');
				if($d->insert($datafdk1)){
					$id_user = $d->insert_id;
						$donhangmau = date('dmY').'NN';
						$d->reset();
						$sql = "select id,madonhang from #_donhang where madonhang like '$donhangmau%' order by id desc limit 0,1";
						$d->query($sql);
						$max_order = $d->fetch_array();
						if(empty($max_order['id']))
						{
							$songaunhien = 101;
						}
						else
						{
							(int)$songaunhien =  substr($max_order['madonhang'],10)+1;
						}
						$madonhang = date('dmY').'NN'.$songaunhien;
						if($id>0){
							$get_jobname = get_fetch("select ten from table_product where id='".$id."'");
						}
						$d->reset();
						$d->setTable("donhang");
						$isrt_data = array();
						$isrt_data["madonhang"] = $madonhang;
						$isrt_data["hoten"] = $datafdk1["ho"];
						$isrt_data["ten"] = $datafdk1["ten"];
						$isrt_data["dienthoai"] = $datafdk1["dienthoai"];
						$isrt_data["email"] = $datafdk1["email"];
						$isrt_data["didong"] = $datafdk1["didong"];
						$isrt_data["quoctich"] = $datafdk1["quoctich"];
						$isrt_data["ngaytao"] = time();
						$isrt_data["noidung"] = "Apply job : ".$get_jobname["ten"];
						$isrt_data["tinhtrang"] = 1;
						$isrt_data["ngaysinh"] = $datafdk1['ngaysinh'];
						$isrt_data["ngaycapnhat"] = time();
						$isrt_data["id_sanpham"] = $id;
						$isrt_data["id_user"] = $id_user;
						$file_name = images_name($_FILES['cv1']['name']);
						if($file_att = upload_image("cv1", 'doc|docx|pdf|DOC|DOCX|PDF', _upload_khac_l,$file_name)){
							$isrt_data['nguongoc'] = $file_att;
						}
						$d->insert($isrt_data);
						transfer("Thank you for your apply, we will contact with you as soon as posible!", getCurrentPageURL());
				}
			}
		// [fdk1] => Array
		//         (
		//             [ho] => sur
		//             [ten] => first
		//             [ngaysinh] => 1991-04-28
		//             [quoctich] => viet nam
		//             [dienthoai] => 09869785867
		//             [email] => mail@gmail.com
		//             [didong] => 09869785867
		//             [curjob] => Driver
		//         )

		//     [cv1] => 
		//     [fdk1_val] => 1

		}
	}
	if(!empty($_POST["fdk2_val"])){
		if($_SESSION['fdk2_token'] == $_POST['fdk2_token']){ // refresh page
		  unset($_SESSION['fdk2_token']);
		  header('location: '.getCurrentPageURL());
		  exit();
		}else{
		  $_SESSION['fdk2_token'] = $_POST['fdk2_token'];
			$datafdk1 = $_POST["fdk2"];
			$datafdk1['email'] = (string)magic_quote(trim(strip_tags($datafdk1['email'])));
			$get_userbyemail = get_fetch("select id,email,ho,ten,quoctich,curjob,didong,dienthoai,ngaysinh from #_user where email='".$datafdk1['email']."'");
			if(count($get_userbyemail)>0){
				$id_user = $get_userbyemail["id"];
				$donhangmau = date('dmY').'NN';
				$d->reset();
				$sql = "select id,madonhang from #_donhang where madonhang like '$donhangmau%' order by id desc limit 0,1";
				$d->query($sql);
				$max_order = $d->fetch_array();
				if(empty($max_order['id']))
				{
					$songaunhien = 101;
				}
				else
				{
					(int)$songaunhien =  substr($max_order['madonhang'],10)+1;
				}
				$madonhang = date('dmY').'NN'.$songaunhien;
				if($id>0){
					$get_jobname = get_fetch("select ten from table_product where id='".$id."'");
				}
				$d->reset();
				$d->setTable("donhang");
				$isrt_data = array();
				$isrt_data["madonhang"] = $madonhang;
				$isrt_data["hoten"] = $get_userbyemail["ho"];
				$isrt_data["ten"] = $get_userbyemail["ten"];
				$isrt_data["dienthoai"] = $get_userbyemail["dienthoai"];
				$isrt_data["email"] = $get_userbyemail["email"];
				$isrt_data["didong"] = $get_userbyemail["didong"];
				$isrt_data["quoctich"] = $get_userbyemail["quoctich"];
				$isrt_data["ngaytao"] = time();
				$isrt_data["noidung"] = "Apply job : ".$get_jobname["ten"];
				$isrt_data["tinhtrang"] = 1;
				$isrt_data["ngaysinh"] = $get_userbyemail['ngaysinh'];
				$isrt_data["ngaycapnhat"] = time();
				$isrt_data["id_sanpham"] = $id;
				$isrt_data["id_user"] = $id_user;
				$file_name = images_name($_FILES['cv2']['name']);
				if($file_att = upload_image("cv2", 'doc|docx|pdf|DOC|DOCX|PDF', _upload_khac_l,$file_name)){
					$isrt_data['nguongoc'] = $file_att;
				}
				$d->insert($isrt_data);
				transfer("Thank you for your apply, we will contact with you as soon as posible!", getCurrentPageURL());
			}
			else{
				$d->reset();
				$datafdk1['ho'] = (string)magic_quote(trim(strip_tags($datafdk1['ho'])));
				$datafdk1['ten'] = (string)magic_quote(trim(strip_tags($datafdk1['ten'])));
				$datafdk1['quoctich'] = (string)magic_quote(trim(strip_tags($datafdk1['quoctich'])));
				$datafdk1['curjob'] = (string)magic_quote(trim(strip_tags($datafdk1['curjob'])));
				$datafdk1['didong'] =(string) magic_quote(trim(strip_tags($datafdk1['didong'])));
				$datafdk1['dienthoai'] = (string)magic_quote(trim(strip_tags($datafdk1['dienthoai'])));
				$datafdk1['ngaysinh'] = strtotime($datafdk1['ngaysinh']);
				$datafdk1['role'] = 1;
				$datafdk1['com'] = "user";
				$d->setTable('user');
				if($d->insert($datafdk1)){
					$id_user = $d->insert_id;
						$donhangmau = date('dmY').'NN';
						$d->reset();
						$sql = "select id,madonhang from #_donhang where madonhang like '$donhangmau%' order by id desc limit 0,1";
						$d->query($sql);
						$max_order = $d->fetch_array();
						if(empty($max_order['id']))
						{
							$songaunhien = 101;
						}
						else
						{
							(int)$songaunhien =  substr($max_order['madonhang'],10)+1;
						}
						$madonhang = date('dmY').'NN'.$songaunhien;
						if($id>0){
							$get_jobname = get_fetch("select ten from table_product where id='".$id."'");
						}
						$d->reset();
						$d->setTable("donhang");
						$isrt_data = array();
						$isrt_data["madonhang"] = $madonhang;
						$isrt_data["hoten"] = $datafdk1["ho"];
						$isrt_data["ten"] = $datafdk1["ten"];
						$isrt_data["dienthoai"] = $datafdk1["dienthoai"];
						$isrt_data["email"] = $datafdk1["email"];
						$isrt_data["didong"] = $datafdk1["didong"];
						$isrt_data["quoctich"] = $datafdk1["quoctich"];
						$isrt_data["ngaytao"] = time();
						$isrt_data["noidung"] = "Apply job : ".$get_jobname["ten"];
						$isrt_data["tinhtrang"] = 1;
						$isrt_data["ngaysinh"] = $datafdk1['ngaysinh'];
						$isrt_data["ngaycapnhat"] = time();
						$isrt_data["id_sanpham"] = $id;
						$isrt_data["id_user"] = $id_user;
						$file_name = images_name($_FILES['cv2']['name']);
						if($file_att = upload_image("cv2", 'doc|docx|pdf|DOC|DOCX|PDF', _upload_khac_l,$file_name)){
							$isrt_data['nguongoc'] = $file_att;
						}
						$d->insert($isrt_data);
						transfer("Thank you for your apply, we will contact with you as soon as posible!", getCurrentPageURL());
				}
			}
		// [fdk1] => Array
		//         (
		//             [ho] => sur
		//             [ten] => first
		//             [ngaysinh] => 1991-04-28
		//             [quoctich] => viet nam
		//             [dienthoai] => 09869785867
		//             [email] => mail@gmail.com
		//             [didong] => 09869785867
		//             [curjob] => Driver
		//         )

		//     [cv1] => 
		//     [fdk1_val] => 1

		}
	}