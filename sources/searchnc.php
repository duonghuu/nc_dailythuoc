<?php  if(!defined('_source')) die("Error");
// [pmin] => 100
//     [pmax] => 5000
//     [cf] => 51,52
$pmin = (int)$_GET["pmin"]*1000;
$pmax = (int)$_GET["pmax"]*1000;
$cf = (string)$_GET["cf"];
$a_cf = explode(",", $cf);
$where = " type='".$type."' and hienthi=1 ";
if($pmin > 0) $where .= " and (gia between ".$pmin." and ".$pmax.")";
if(count($a_cf) > 0) $where .= " and id_danhmuc in (".$cf.")";
$where .= " order by stt,id desc";

// $dem = get_fetch("SELECT count(id) AS numrows FROM #_product where $where");
// $totalRows = $dem['numrows'];
// $page = $_GET['p'];
// $pageSize = $company['soluong_sp'];
// $offset = 5;
// if ($page == "")$page = 1;
// else $page = $_GET['p'];
// $page--;
// $bg = $pageSize*$page;

// $product = get_result("select *,ten$lang as ten,mota$lang as mota from #_product where $where limit $bg,$pageSize");
// $url_link = getCurrentPageURL();
$product = get_result("select *,ten$lang as ten,mota$lang as mota from #_product where $where");
