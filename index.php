<?php
session_start();
$session=session_id();

@define ( '_template' , './templates/');
@define ( '_source' , './sources/');
@define ( '_lib' , './trangquantri/lib/');
include_once _lib."Mobile_Detect.php";
include_once "breadcrumb.php";
$bread = new breadcrumb();
$detect = new Mobile_Detect;
$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
include_once _lib."config.php";
include_once _lib."constant.php";
require_once _source."lang$lang.php";
$bread->add(_trangchu,$config_url);
include_once _lib."functions.php";
include_once _lib."functions_for.php";
if (version_compare(phpversion(), '7.0.0', '<')) include_once _lib."class.database.php";
else include_once _lib."class.database7.3.php"; 

include_once _lib."functions_user.php";
include_once _lib."functions_giohang.php";
include_once _lib."file_requick.php";
include_once _source."template.php";
include_once _source."counter.php";
$_SESSION['dong'] = lay_banner('dong');
?>
<!doctype html>
<html lang="<?php if($lang=='')echo 'vi';else echo $lang;?>">
<head itemscope itemtype="https://schema.org/WebSite">
    <base href="https://<?=$config_url?>/" />
    <?php include _template."layout/seoweb.php";?>
    <?php include _template."layout/css.php";?>
    <?php /* <style><?php echo file_get_contents('http://'.$config_url.'/css_optimize.php');?></style> */?>
    
    <?=$company['codethem']?>
</head>
<?php //include _template."layout/background.php";?>
<body class="cls<?= $template ?>" data-tit="<?= $source."-".$template ?>" <?=$str_background?>>
    <?=$company['codethem2']?>
    <?php /* <div class="wap_load"><div class="cssload-thecube"><div class="cssload-cube cssload-c1"></div><div class="cssload-cube cssload-c2"></div><div class="cssload-cube cssload-c4"></div><div class="cssload-cube cssload-c3"></div></div></div> */?>
    <div id="wapper"  >
        <?php /* <a href="gio-hang.html" class="giohang_fix"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span><?= count($_SESSION["cart"]) ?></span></a> */?>
        <section class="head-main">
        <?php 
        include _template."layout/header.php";
        include _template."layout/menu_top.php";
        
        
        include _template."layout/valak_menu.php";
        if($source=="index")include _template."layout/slider.php";
        ?>
        <div class="bg-wrap">
            <?php if($template=="tour_detail"){
                echo $bread->display();
            } ?>
            <div class="<?php if($source!="index") echo 'container';  ?>">
                <div class="main_content ">
                    <?php if($source == 'index1') {  ?>
                        
                        <div class="left">
                            <?php include _template."layout/left.php";?>
                        </div><!---END .left-->
                        <div class="right">
                            <?php include _template."layout/right.php";?>
                        </div><!---END .right-->
                    <?php }else{ ?>
                        <div class="full-content">
                            <?php include _template.$template."_tpl.php"; ?>
                        </div>
                    <?php } ?>
                </div><!---END .main_content-->
            </div><!---END .main_content-->
        </div>
        </section>
        <?php 
        
        include _template."layout/doitac.php";
        include _template."layout/footer.php";
        ?>
    </div><!---END .wapper-->
    <!-- Modal -->
    
    <?php if($source=="index"){ 
        foreach ($canbiet as $key => $value) {
        ?>
        <div class="modal fade" id="<?= $value["tenkhongdau"].$value["id"] ?>">
            <div class="modal-dialog">
              <div class="modal-content">
              
                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title"><?= $value["ten"] ?></h4>
                  <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body">
                  <?= $value["noidung"] ?>
                </div>
                
                
              </div>
            </div>
          </div>
    <?php } } ?>
    <?php 
    // include _template."layout/pupop.php";
    //include _template."layout/facebook.php";
    //include _template."layout/phone.php";
    //include _template."layout/chat_facebook.php";
    include _template."layout/phone3.php";
    include _template."layout/phone2.php";
    include _template."layout/js.php";
    ?>
</body>
</html>