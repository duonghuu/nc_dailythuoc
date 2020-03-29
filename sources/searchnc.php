<?php  if(!defined('_source')) die("Error");
$location = (int)$_GET["location"];
$specialisms = (int)$_GET["specialisms"];
$job_type = (int)$_GET["job_type"];
$where = " type='".$type."' and hienthi=1 ";
if($location > 0) $where .= " and id_huong='".$location."'";
if($specialisms > 0) $where .= " and id_hientrang='".$specialisms."'";
if($job_type > 0) $where .= " and id_danhmuc='".$job_type."'";
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