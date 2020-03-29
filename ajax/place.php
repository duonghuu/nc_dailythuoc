<?php 
include ("ajax_config.php");
$act =  (string)trim(strip_tags($_POST['act']));

switch($act){
    case "id_list":
        load_list();
        break;
    case "dist":
        load_dist();
        break;
    case "ward":
        load_ward();
        break;
    case "street":
        load_street();
        break;
    default:
        break;
}
function load_list()
{
    $id = (int)($_POST['id']);
    $sql="select id,ten from table_product_list where id_danhmuc='".$id."' and hienthi=1 order by id";     
    $stmt = get_result($sql);
    $str='<option value="">Chọn danh mục</option>';
    foreach ($stmt as $key => $value) {
        $str.='<option value='.$value["id"].'>'.$value["ten"].'</option>';      
    }
    echo $str;
}
function load_dist()
{
    $id_city = (int)($_POST['id_city']);    
    $sql="select id,ten from table_place_dist where id_city='".$id_city."' and hienthi=1 order by id";   
    $stmt = get_result($sql);
    $str='<option value="">Chọn quận/huyện</option>';
    foreach ($stmt as $key => $value) {
        $str.='<option value='.$value["id"].'>'.$value["ten"].'</option>';      
    }
    echo $str;
}
function load_ward()
{
    $id = (int)($_POST['id']);
    $sql="select id,ten from table_place_ward where id_dist='".$id."' and hienthi=1 order by id";     
    $stmt = get_result($sql);
    $str='<option value="">Chọn phường/xã</option>';
    foreach ($stmt as $key => $value) {
        $str.='<option value='.$value["id"].'>'.$value["ten"].'</option>';      
    }
    echo $str;
}
function load_street()
{
    $id = (int)($_POST['id']);
    $sql="select id,ten from table_place_street where id_ward='".$id."' and hienthi=1 order by id";     
    $stmt = get_result($sql);
    $str='<option value="">Chọn đường</option>';
    foreach ($stmt as $key => $value) {
        $str.='<option value='.$value["id"].'>'.$value["ten"].'</option>';      
    }
    echo $str;
}