<?php
	include ("ajax_config.php");

	$act =  (string)trim(strip_tags($_POST['act']));

	switch($act){
		case "dathang":
			order();
			break;
		case "delete":
			delete();
			break;
		case "update":
			update();
			break;
		case "tinhship":
			tinhship();
			break;
		default:
			break;
	}

	function order()
	{
		global $d;
		$id = (int) $_POST['id'];
		$size = (string)(trim(strip_tags($_POST['size'])));
		$mausac = (string)(trim(strip_tags($_POST['mausac'])));
		$soluong = (int)$_POST['soluong'];

		addtocart($id,$size,$mausac,$soluong);

		$return['thongbao'] = _sanphamthemvaogiohang.'.<br /><a class="xemgiohang" href="gio-hang.html">'._xemgiohang.'</a>';
		$return['ok'] = '';
		$return['sl'] = count($_SESSION['cart']);
		echo json_encode($return);
	}

	function delete()
		{
			global $d;
			$id = (int)$_POST['id'];
			$size = (int)$_POST['size'];
			$mausac = (int)$_POST['mausac'];
			remove_product($id,$size,$mausac);
			$return['tongtien'] = number_format(get_order_total(),0, ',', '.').' đ';
			$return['sl'] = count($_SESSION['cart']);
			echo json_encode($return);
		}

	function update()
	{
		global $d;
		$soluong = (int)$_POST['soluong'];
		$vitri = (int)$_POST['vitri'];
		$id = (int)$_POST['id'];

		$_SESSION['cart'][$vitri]['qty'] = $soluong;

		$return['tonggia'] = number_format(get_price($id)*$soluong,0, ',', '.').' đ';
		$return['tongtien'] = number_format(get_order_total(),0, ',', '.').' đ';

		echo json_encode($return);
	}
	function tinhship()
	{
		global $d;
		$id = (int)$_POST['id'];
		// $tong_gia = (string)$_POST['tong_gia'];
		$rs_ship = get_fetch("select gia from table_place_dist where id='".$id."'");
		$phiship=$rs_ship['gia'];
		$tonggia=get_order_total()+$phiship;
		$return['price_ship'] = $phiship;
		$return['tonggia'] = $tonggia;
		echo json_encode($return);	
	}
?>
