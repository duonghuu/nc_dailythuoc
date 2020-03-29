<?php  if(!defined('_source')) die("Error");
if(!empty($_POST["nltval"])){
    if($_SESSION['nlttoken'] == $_POST['nlttoken']){ // refresh page
      unset($_SESSION['nlttoken']);
      header('location: '.getCurrentPageURL());
      exit();
    }else{
      $_SESSION['nlttoken'] = $_POST['nlttoken'];
      if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recaptchaResponse_dknt'])) {

          // Build POST request:
          $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
          $recaptcha_secret = $config['recaptcha_secretkey'];
          $recaptcha_response = $_POST['recaptchaResponse_dknt'];

          // Make and decode POST request:
          $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
          $recaptcha = json_decode($recaptcha);

          // Take action based on the score returned:
          if ($recaptcha->score >= 0.5 and $recaptcha->success == true) { 
            $data = $_POST["fid"];
            $email_nhantin = $data['email'];       
            $dienthoai_nhantin = $data['dienthoai'];       
            $diachi_nhantin = $data['diachi'];       
            $ten_nhantin = $data['ten'];       
            $noidung_nhantin = $data['noidung'];       
            $d->reset();
            $sql_kt_mail="SELECT email FROM table_newsletter WHERE email='".$email_nhantin."'";
            $d->query($sql_kt_mail);
            $kt_mail=$d->result_array();
            if(count($kt_mail)>0)
              transfer(_emaildadangky,getCurrentPageURL());
            else{
              $email_nhantin = trim(strip_tags($email_nhantin));
              $email_nhantin = mysql_real_escape_string($email_nhantin);  
              $dienthoai_nhantin = trim(strip_tags($dienthoai_nhantin));
              $dienthoai_nhantin = mysql_real_escape_string($dienthoai_nhantin); 
              $diachi_nhantin = trim(strip_tags($diachi_nhantin));
              $diachi_nhantin = mysql_real_escape_string($diachi_nhantin); 
              $ten_nhantin = trim(strip_tags($ten_nhantin));
              $ten_nhantin = mysql_real_escape_string($ten_nhantin); 
              $noidung_nhantin = trim(strip_tags($noidung_nhantin));
              $noidung_nhantin = mysql_real_escape_string($noidung_nhantin);   
              $sql = "INSERT INTO  table_newsletter (email,dienthoai,diachi,ten,noidung) VALUES ('$email_nhantin','$dienthoai_nhantin','$diachi_nhantin','$ten_nhantin','$noidung_nhantin')";    
              if($d->query($sql)== true)
                transfer(_dangkythanhcong,getCurrentPageURL());
              else
                transfer(_hethongloi,getCurrentPageURL());
            }  
          } else {
            transfer(_xindungspamwebsitechungtoi, getCurrentPageURL());
          }
      }
    }
    //end else
  }

if(!empty($_POST["rp2val"])){
    if($_SESSION['rp2token'] == $_POST['rp2token']){ // refresh page
      unset($_SESSION['rp2token']);
      header('location: '.getCurrentPageURL());
      exit();
    }else{
      $_SESSION['rp2token'] = $_POST['rp2token'];
      if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recaptchaResponse2'])) {

          // Build POST request:
          $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
          $recaptcha_secret = $config['recaptcha_secretkey'];
          $recaptcha_response = $_POST['recaptchaResponse2'];

          // Make and decode POST request:
          $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
          $recaptcha = json_decode($recaptcha);

          // Take action based on the score returned:
          if ($recaptcha->score >= 0.5 and $recaptcha->success == true) { 
            $datapost = $_POST["fpu"];
            $data["email"] = (string)trim(strip_tags($datapost['email']));       
            $data["diachi"] = (string)trim(strip_tags($datapost['diachi']));       
            $data["dienthoai"] = (string)trim(strip_tags($datapost['dienthoai']));       
            $data["ten"] = (string)trim(strip_tags($datapost['ten']));  
            // $bacsi = (string)trim(strip_tags($datapost['bacsi']));  
            // $benhvien = (string)trim(strip_tags($datapost['benhvien']));  
            $data['chude'.$lang] = "Liên hệ ".date('d/m/Y h:i:s',time());
            $data['hienthi'] = 0;
            $data['stt'] = 1;
            $data['type'] = 'datban';
           $data['noidung'] = '<div><h2>Thông tin liên hệ</h2>
                         <div style="border-style:solid;border-width:1px 0;border-color:#c3bfbf;">
                          <p><strong style="width:100px;display:inline-block">Khách hàng: </strong>'.$data["ten"].' - SĐT: '.$data["dienthoai"].'</p></div></div>';
            // $data['noidung'] = (string)trim(strip_tags($datapost['note']));  
            $d->reset();
            $d->setTable('lienhe');
            $body = '<table>';
            $body .= '
              <tr>
                <th colspan="2">&nbsp;</th>
              </tr>
              <tr>
                <th colspan="2">Liên hệ từ website '.$company["ten"].'</th>
              </tr>
              <tr>
                <th colspan="2">&nbsp;</th>
              </tr>
              <tr>
                <th>Họ tên :</th><td>'.$data["ten"].'</td>
              </tr>
              <tr>
                <th>Email :</th><td>'.$data["email"].'</td>
              </tr>
              <tr>
                <th>Điện thoại :</th><td>'.$data["dienthoai"].'</td>
              </tr>
              <tr>
                <th>Địa chỉ :</th><td>'.$data["diachi"].'</td>
              </tr>
              <tr>
                <th>Tiêu đề :</th><td>'.$data['chude'.$lang].'</td>
              </tr>
              <tr>
                <th>Nội dung :</th><td>'.$data["noidung"].'</td>
              </tr>';
            $body .= '</table>';
            $to = $company["email"];
            if($d->insert($data)){
              // if(sendEmail($sendType,$to, $from=null, $from_name=$company["ten"], $data['chude'.$lang], $body,$more=array(),$file)){
              //   transfer(_guilienhethanhcong,getCurrentPageURL());  
              // }
              // else{
              //   transfer(_guilienhethatbai,getCurrentPageURL());  
              // }
              $id=mysql_insert_id();
              if (isset($_FILES['files'])) {
               $arr_chuoi = str_replace('"','',$_POST['jfiler-items-exclude-files-0']);
               $arr_chuoi = str_replace('[','',$arr_chuoi);
               $arr_chuoi = str_replace(']','',$arr_chuoi);
               $arr_file_del = explode(',',$arr_chuoi);
               for($i=0;$i<count($_FILES['files']['name']);$i++){
                if($_FILES['files']['name'][$i]!=''){
                  if(!in_array(($_FILES['files']['name'][$i]),$arr_file_del,true))
                  {
                    $file['name'] = $_FILES['files']['name'][$i];
                    $file['type'] = $_FILES['files']['type'][$i];
                    $file['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                    $file['error'] = $_FILES['files']['error'][$i];
                    $file['size'] = $_FILES['files']['size'][$i];
                    $file_name = images_name($_FILES['files']['name'][$i]);
                    $photo = upload_photos($file, _format_duoihinh, _upload_hinhthem_l,$file_name);
                    $data1['photo'] = $photo;
                    $data1['stt'] = $_POST['stthinh'][$i];
                    $data1['type'] = 'datban';
                    $data1['id_hinhanh'] = $id;
                    $data1['hienthi'] = 1;
                    $d->setTable('hinhanh');
                    $d->insert($data1);
                  }
                }
              }
            }
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
  if(!empty($_POST["rp3val"])){
      if($_SESSION['rp3token'] == $_POST['rp3token']){ // refresh page
        unset($_SESSION['rp3token']);
        header('location: '.getCurrentPageURL());
        exit();
      }else{
        $_SESSION['rp3token'] = $_POST['rp3token'];
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recaptcha_response3'])) {

            // Build POST request:
            $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
            $recaptcha_secret = $config['recaptcha_secretkey'];
            $recaptcha_response = $_POST['recaptcha_response3'];

            // Make and decode POST request:
            $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
            $recaptcha = json_decode($recaptcha);

            // Take action based on the score returned:
            if ($recaptcha->score >= 0.5 and $recaptcha->success == true) { 
              $datapost = $_POST["fpu3"];
              $data["email"] = (string)trim(strip_tags($datapost['email']));       
              $data["diachi"] = (string)trim(strip_tags($datapost['diachi']));       
              $data["dienthoai"] = (string)trim(strip_tags($datapost['dienthoai']));       
              $data["ten"] = (string)trim(strip_tags($datapost['ten']));  
              $soban = (string)trim(strip_tags($datapost['dichvu']));  
              $data['chude'.$lang] = "Đặt bàn ".date('d/m/Y h:i:s',time());
              $data['hienthi'] = 0;
              $data['stt'] = 1;
              $data['type'] = 'datban';
              $data['noidung'] = '<div><h2>Nội dung đặt bàn</h2>
              <div style="border-style:solid;border-width:1px 0;border-color:#c3bfbf;">
               <p><strong style="width:100px;display:inline-block">Số bàn:</strong>'.$soban.'</p><p><strong style="width:100px;display:inline-block">Nội dung:</strong>'.(string)trim(strip_tags($datapost['note'])).'</p>   </div></div>';
              // $data['noidung'] = (string)trim(strip_tags($datapost['note']));  
              $d->reset();
              $d->setTable('lienhe');
              $body = '<table>';
              $body .= '
                <tr>
                  <th colspan="2">&nbsp;</th>
                </tr>
                <tr>
                  <th colspan="2">Đặt bàn từ website '.$company["ten"].'</th>
                </tr>
                <tr>
                  <th colspan="2">&nbsp;</th>
                </tr>
                <tr>
                  <th>Họ tên :</th><td>'.$data["ten"].'</td>
                </tr>
                <tr>
                  <th>Email :</th><td>'.$data["email"].'</td>
                </tr>
                <tr>
                  <th>Điện thoại :</th><td>'.$data["dienthoai"].'</td>
                </tr>
                <tr>
                  <th>Số bàn :</th><td>'.$soban.'</td>
                </tr>
                <tr>
                  <th>Tiêu đề :</th><td>'.$data['chude'.$lang].'</td>
                </tr>
                <tr>
                  <th>Nội dung :</th><td>'.$data["noidung"].'</td>
                </tr>';
              $body .= '</table>';
              $to = $company["email"];
              if($d->insert($data)){
                // if(sendEmail($sendType,$to, $from=null, $from_name=$company["ten"], $data['chude'.$lang], $body,$more=array(),$file)){
                //   transfer(_guilienhethanhcong,getCurrentPageURL());  
                // }
                // else{
                //   transfer(_guilienhethatbai,getCurrentPageURL());  
                // }
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


	// $title_cat = _sanphamnoibat;
	// $where = " type='bds-dau-tu' and noibat>0 and hienthi=1 order by stt asc";

	// #Lấy sản phẩm và phân trang
	// $d->reset();
	// $sql = "SELECT count(id) AS numrows FROM #_product where $where";
	// $d->query($sql);	
	// $dem = $d->fetch_array();
	// $totalRows = $dem['numrows'];
	// $page = $_GET['p'];
	// $pageSize = 8;//Số item cho 1 trang
	// $offset = 5;//Số trang hiển thị				
	// if ($page == "")$page = 1;
	// else $page = $_GET['p'];
	// $page--;
	// $bg = $pageSize*$page;		

	// $d->reset();
	// $sql = "select mota$lang as mota,ten$lang as ten,tenkhongdau,id,thumb,photo,type,ngaytao,gia,dientich,diachi,phaply from #_product where $where limit $bg,$pageSize";		
	// $d->query($sql);
	// $spnoibat = $d->result_array();	
	// $url_link = getCurrentPageURL();