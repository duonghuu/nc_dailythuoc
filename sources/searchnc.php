<?php  if(!defined('_source')) die("Error");
// [pmin] => 100
//     [pmax] => 5000
//     [cf] => 51,52
$pmin = (int)$_GET["pmin"]*1000;
$pmax = (int)$_GET["pmax"]*1000;
$cf = (string)$_GET["cf"];
$sf = (string)$_GET["sf"];
$a_cf = explode(",", $cf);
$a_sf = explode(",", $sf);
$where = " (type='".$type."' and hienthi=1 ";
if($pmin > 0) $where .= " and (gia between ".$pmin." and ".$pmax.")";
$where .= ")";
$a_where = array();
if(!empty($a_cf)){
           $s_a_cf = ""; 
           $last_key = key( array_slice( $a_cf, -1, 1, TRUE ) );
           foreach ($a_cf as $key => $value) {
               $s_a_cf .= $value;
               if($key<$last_key){
                   $s_a_cf .=",";
               }
           }
           if(!empty($s_a_cf)){
               $a_where[] = "id_danhmuc in (".$s_a_cf.")";
           }
       }
       if(!empty($a_sf)){
                  $s_a_sf = ""; 
                  $last_key = key( array_slice( $a_sf, -1, 1, TRUE ) );
                  foreach ($a_sf as $key => $value) {
                      $s_a_sf .= $value;
                      if($key<$last_key){
                          $s_a_sf .=",";
                      }
                  }
                  if(!empty($s_a_sf)){
                      $a_where[] = "id_nhasanxuat in (".$s_a_sf.")";
                  }
              }
if(!empty($a_where)){
    $where .= " and (";
    // if(count($a_where) > 1){

    // }else{

    // }
    $s_a_sf = ""; 
    $last_key = key( array_slice( $a_where, -1, 1, TRUE ) );
    foreach ($a_where as $key => $value) {
        $s_a_cl .= $value;
        if($key<$last_key){
            $s_a_cl .=" and ";
        }
    }
    $where .= $s_a_cl;
    $where .= " )";
}
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
