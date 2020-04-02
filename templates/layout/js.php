<h1 style="position:absolute; top:-1000px;"><?php if($h1!='')echo $h1;else echo $company['h1'];?></h1><h2 style="position:absolute; top:-1000px;"><?php if($h2!='')echo $h2;else echo $company['h2'];?></h2><h3 style="position:absolute; top:-1000px;"><?php if($h3!='')echo $h3;else echo $company['h3'];?></h3>
<div id="fb-root"></div>
<script src="js/jquery-migrate-3.1.0.min.js" ></script>
<script src="js/lazyload.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/my_script.js"></script>
<?php /* <script src="js/jquery.fancybox.min.js"></script> */?>
<script src="js/slick.min.js"></script>
<?php if($template == "product"){ ?>
  <script src="https://store.doppelherz.vn/assets/1.0/nstSlider/jquery.nstSlider.js"></script>
  <link rel="stylesheet" href="https://store.doppelherz.vn/assets/1.0/nstSlider/jquery.nstSlider.css">
  <script>
    function addCommas(nStr, thousand = ',', decimal = '.') {
        nStr += '';
        x = nStr.split(decimal);
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + thousand + '$2');
        }
        return x1 + x2;
    }
    $(document).ready(function() {
      $('.nstSlider').nstSlider({
          "crossable_handles": false,
          "left_grip_selector": ".leftGrip",
          "right_grip_selector": ".rightGrip",
          "value_bar_selector": ".bar",
          "value_changed_callback": function(cause, leftValue, rightValue) {
              $("#pmin").val(leftValue);
              $("#pmax").val(rightValue);
              $(this).parent().find('.leftLabel').text(addCommas(leftValue, '.', ','));
              $(this).parent().find('.rightLabel').text(addCommas(rightValue, '.', ','));
          }
      });
    });
  </script>
<?php } ?>
<?php if($source == "index"){ ?>
<script src="js/list.min.js"></script>
<link href="trangquantri/js/plugins/multiupload/css/jquery.filer.css" type="text/css" rel="stylesheet" />
  <link href="trangquantri/js/plugins/multiupload/css/themes/jquery.filer-dragdropbox-theme.css" type="text/css" rel="stylesheet" />

  <!-- MultiUpload -->
  <script type="text/javascript" src="trangquantri/js/plugins/multiupload/jquery.filer.min.js"></script>
<?php } ?>
<?php if($deviceType == "computer"){ ?>
  <script src="js/wow.min.js"></script>
  <?php } ?>
<?php if($template=='product_detail' || $template=='product_detail2' || $template=='tour_detail') { ?>
    <script src="magiczoomplus/magiczoomplus.js" ></script>
    
  <?php } ?>
<script>
  <?php if($deviceType == "computer"){ ?>
    new WOW().init();
  <?php } ?>
  var $v_thongbao = '<?= _thongbao ?>';
  var myLazyLoad = new LazyLoad({
   elements_selector: ".lazy"
  });
  function loadData(page,id_tab,loai){
    $.ajax({
      type: "POST",
      dataType:'json',
      url: "paging_ajax/ajax_paging.php",
      data: {page:page,id_danhmuc:loai},
      success: function(msg)
      {
        $(id_tab+' .pagination').remove();
        $(id_tab+' .product-grid').html(msg.spthem);
        $(id_tab).append(msg.morebtn);
        myLazyLoad.update();
        $(id_tab+" .pagination li.active").click(function(){
          var pager = $(this).attr("p");
          var id_danhmucr = $(this).parents().parents().parents().attr("data-rel");
          loadData(pager,id_tab,id_danhmucr);
        });  
      }
    });
  }
  function doEnter(evt){
      var key;
      if(evt.keyCode == 13 || evt.which == 13){
       onSearch(evt);
     }
   }
    function onSearchLoc(evt) {
      var pmin = $('#pmin').val();
      var pmax = $('#pmax').val();
      var cf = $("input[name='cf[]']:checked")
                    .map(function(){return $(this).val();}).get();
      var keyword = "pmin="+pmin;
      keyword += "&pmax="+pmax;
      if(cf.length>0){
        keyword += "&cf="+cf;
      }
      location.href = "tim-kiem-loc/"+keyword;
   }
   function onSearch(evt) {
     var keyword1 = $('.keyword:eq(0)').val();
     var keyword2 = $('.keyword:eq(1)').val();
        // var danhmuc1 = $('.danhmuc1').val();
     if(keyword1=='<?=_nhaptukhoatimkiem?>...')
     {
      keyword = keyword2;
    }
    else
    {
      keyword = keyword1;
    }
    if(keyword=='' || keyword=='<?=_nhaptukhoatimkiem?>...')
    {
      alert('<?=_chuanhaptukhoa?>');
    }
    else{
          // location.href = "tim-kiem.html&keyword="+keyword+"&danhmuc="+danhmuc1;
      location.href = "tim-kiem/keyword="+keyword;
    }
  }
  <?php if($template=='product_detail' || $template=='product_detail2' || $template=='tour_detail') { ?>
     var mzOptions = {
      zoomMode:true,
      zoomPosition: 'inner ',
      onExpandClose: function(){MagicZoom.refresh();}
    };
  <?php } ?>
  $(document).ready(function(){
    $('.timkiem_icon').click(function(event) {
      if($('#search').hasClass('hien')){
        $('#search').removeClass('hien');
      }else{
        $('#search').addClass('hien');
      }
    });
    <?php if($deviceType == "computer"){ ?>
      $('.hoverhori').hover(function() {
          var vitri = $(this).position().top;
          $('.hoverhori> ul').css({
            'top': vitri + 'px'
          })
        });
      $(window).scroll(function(){
        var cach_top = $(window).scrollTop();
        var heaigt_header = $('.hd-bg').height();
        if(cach_top >= heaigt_header){
          $('.nav-bg').css({position: 'fixed', top: '0px', zIndex:99});
          $('.nav-bg').addClass('fixed');
        }else{
          $('.nav-bg').css({position: 'relative', top: 'auto'});
          $('.nav-bg').removeClass('fixed');
        }
      });
    <?php } ?>
  <?php if($source=="index"){ ?>
    $(".spnoibat-main").on({
                beforeChange: function(event, slick, currentSlide, nextSlide){
                  myLazyLoad.update();
                }
              }).slick({
              lazyLoad: 'ondemand',
                   infinite: true,
                   accessibility:false,
                   slidesToShow: 4,    
                   slidesToScroll: 1, 
                   autoplay:true,  
                   autoplaySpeed:3000,  
                   speed:1000,
                   arrows:true, 
                   centerMode:false,  
                   dots:false,  
                   draggable:true,  
                   responsive: [
                  {
                   breakpoint: 800,
                   settings: {
                    slidesToShow: 2,  
                      }
                    },
                    {
                   breakpoint: 500,
                   settings: {
                    slidesToShow: 1,  
                      }
                    }
                    ] 
                  });
      // var options = {
      //     valueNames: [ 'name', 'category' ],
      //     page: 8,
      //     pagination: true
      //   };
        $('.file_input').filer({
          showThumbs: true,
          templates: {
            box: '<ul class="jFiler-item-list"></ul>',
            item: '<li class="jFiler-item">\
            <div class="jFiler-item-container">\
            <div class="jFiler-item-inner">\
            <div class="jFiler-item-thumb">\
            <div class="jFiler-item-status"></div>\
            <div class="jFiler-item-info">\
            <span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name | limitTo: 25}}</b></span>\
            </div>\
            {{fi-image}}\
            </div>\
            <div class="jFiler-item-assets jFiler-row">\
            <ul class="list-inline pull-left">\
            <li><span class="jFiler-item-others">{{fi-icon}} {{fi-size2}}</span></li>\
            </ul>\
            <ul class="list-inline pull-right">\
            <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
            </ul>\
            </div>\<input type="text" name="stthinh[]" class="stthinh" />\
            </div>\
            </div>\
            </li>',
            itemAppend: '<li class="jFiler-item">\
            <div class="jFiler-item-container">\
            <div class="jFiler-item-inner">\
            <div class="jFiler-item-thumb">\
            <div class="jFiler-item-status"></div>\
            <div class="jFiler-item-info">\
            <span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name | limitTo: 25}}</b></span>\
            </div>\
            {{fi-image}}\
            </div>\
            <div class="jFiler-item-assets jFiler-row">\
            <ul class="list-inline pull-left">\
            <span class="jFiler-item-others">{{fi-icon}} {{fi-size2}}</span>\
            </ul>\
            <ul class="list-inline pull-right">\
            <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
            </ul>\
            </div>\<input type="text" name="stthinh[]" class="stthinh" />\
            </div>\
            </div>\
            </li>',
            progressBar: '<div class="bar"></div>',
            itemAppendToEnd: true,
            removeConfirmation: true,
            _selectors: {
              list: '.jFiler-item-list',
              item: '.jFiler-item',
              progressBar: '.bar',
              remove: '.jFiler-item-trash-action',
            }
          },
          addMore: true
        });
        <?php foreach ($product_danhmucnb as $kdm => $vdm) { ?>
        // var listObj = new List('pdm<?= $vdm["tenkhongdau"] ?>', options);
        <?php } ?>
        $(".dichvu-main").on({
            beforeChange: function(event, slick, currentSlide, nextSlide){
              myLazyLoad.update();
            }
          }).slick({
          lazyLoad: 'ondemand', infinite: true, accessibility:false, slidesToShow: 2, slidesToScroll: 2, autoplay:true, autoplaySpeed:3000, speed:1000, arrows:true, rows:2, centerMode:false, dots:false, draggable:true, responsive: [{breakpoint: 800, settings: {slidesToShow: 1, slidesToScroll: 1, } } ] });
        $(".quang-cao2-main").on({
            beforeChange: function(event, slick, currentSlide, nextSlide){
              myLazyLoad.update();
            }
          }).slick({
          lazyLoad: 'ondemand', infinite: true, accessibility:false, slidesToShow: 2, slidesToScroll: 1, autoplay:true, autoplaySpeed:3000, speed:1000, arrows:true, centerMode:false, dots:false, draggable:true, responsive: [{breakpoint: 500, settings: {slidesToShow: 1, } } ] });
           
  <?php } ?>
    $('.doitac-main').on({
    beforeChange: function(event, slick, currentSlide, nextSlide){
      myLazyLoad.update();
    }
  }).slick({
  lazyLoad: 'ondemand', infinite: true, accessibility:false, slidesToShow: 6, slidesToScroll: 1, autoplay:true, autoplaySpeed:3000, speed:1000, arrows:true, centerMode:false, dots:false, draggable:true, responsive: [{breakpoint: 1110, settings: {slidesToShow: 5, } },{breakpoint: 800, settings: {slidesToShow: 4, } },{breakpoint: 430, settings: {slidesToShow: 2, } } ]
      });
  <?php if($template=='product_detail' || $template=='product_detail2' || $template=='tour_detail') { ?>
        $('.slick2').slick({slidesToShow: 1, slidesToScroll: 1, arrows: false, fade: true, autoplay:true, autoplaySpeed:5000, asNavFor: '.slick'});
        $('.slick').slick({slidesToShow: 4, slidesToScroll: 1, asNavFor: '.slick2', dots: false, centerMode: false, focusOnSelect: true, responsive: [{breakpoint: 800, settings: {slidesToShow: 3, slidesToScroll: 1, } }, {breakpoint: 376, settings: {slidesToShow: 2, slidesToScroll: 1, } } ] });
        $('#content_tabs .tab').hide();
        $('#content_tabs .tab:first').show();
        $('#ultabs li:first').addClass('active');
        $('#ultabs li').click(function(){
          var vitri = $(this).data('vitri');
          $('#ultabs li').removeClass('active');
          $(this).addClass('active');
          $('#content_tabs .tab').hide();
          $('#content_tabs .tab:eq('+vitri+')').show();
          return false;
        });
        $('.size').click(function(){
          $('.size').removeClass('active_size');
          $(this).addClass('active_size');
        });
        $('.mausac').click(function(){
          $('.mausac').removeClass('active_mausac');
          $(this).addClass('active_mausac');
        });
        // $('.size').click(function(){
        //  $('.size').removeClass('active_size');
        //  $(this).addClass('active_size');
        // });
        // $('.mausac').click(function(){
        //  $('.mausac').removeClass('active_mausac');
        //  $(this).addClass('active_mausac');
        // });
        $('.cart_popup').click(function(){
          if($('.size').length && $('.active_size').length==false){
            alert('<?=_chonsize?>');
            return false;
          }
          if($('.active_size').length){
            var size = $('.active_size').html();
          }
          else{
            var size = '';
          }
          if($('.mausac').length && $('.active_mausac').length==false){
            alert('<?=_chonmau?>');
            return false;
          }
          if($('.active_mausac').length){
            var mausac = $('.active_mausac').html();
          }
          else{
            var mausac = '';
          }
          var act = "dathang";
          var id = $(this).data('id');
          var soluong = $('.soluong').val();
          if (soluong != undefined){
            soluong = 1;
          }
          if(soluong>0)
          {
            $.ajax({
             type:'post',
             url:'ajax/cart_popup.php',
             data:{id:id,size:size,mausac:mausac,soluong:soluong,act:act},
             beforeSend: function() {
              $('.thongbao').html('<p><img src="images/loader_p.gif"></p>');
            },
            error: function(){
              alert('<?=_hethongloi?>');
            },
            success:function(kq){
              $('body').append('<div class="wap_giohang"></div>');
              $('.wap_giohang').html(kq);
              $('.popup_donhang').fadeIn(300);
              $('body').append('<div id="baophu"></div>').fadeIn(300);
            }
          });
          }
          else
          {
            alert('<?=_nhapsoluong?>');
          }
          return false;
        });
        //Đánh giá sao
        var giatri_default = "<?=$num_danhgiasao?>";
        $('.danhgiasao span:lt('+giatri_default+')').addClass('active');
        $('.danhgiasao span').hover(function(){
          var giatri = $(this).data('value');
          $('.danhgiasao span').removeClass('hover');
          $('.danhgiasao span:lt('+giatri+')').addClass('hover');
        },function(){
          $('.danhgiasao span').removeClass('hover');
        });
        $('.danhgiasao span').click(function(){
          var url = $('.danhgiasao').data('url');
          var giatri = $(this).data('value');
          $.ajax({
            type:'post',
            url:'ajax/danhgiasao.php',
            data:{giatri:giatri,url:url},
            success:function(kq){
              if(kq==1){
                $('.danhgiasao span:lt('+giatri+')').addClass('active');
                alert('<?=_bandanhgia?>: '+giatri+'/10');
                $('.num_danhgia').html(+giatri+'/10');
              }
              else if(kq==2){
                alert('<?=_danhgiaroi?>');
              }
              else{
                alert('<?=_hethongloi?>');
              }
            }
          });
        });
  <?php } ?>
    $('.slideshow-slider-main,.web-slider-main').slick({lazyLoad: 'ondemand', infinite: true, accessibility:false, slidesToShow: 1, slidesToScroll: 1, autoplay:true, autoplaySpeed:3000, speed:1000, arrows:true, centerMode:false, dots:false, draggable:true, });
    $(".video-khac a").click(function(a) {
     $("#iframe").attr("src", "https://www.youtube.com/embed/" + $(this).data("val") + "?autoplay=1"), a.preventDefault()
    });
    $('#lstvideo').change(function(){
     $("#iframe").attr("src","https://www.youtube.com/embed/"+$(this).val()+"?autoplay=1");
    }); 
    $('img').each(function(index, element) {
     if(!$(this).attr('alt') || $(this).attr('alt')=='')
     {
      $(this).attr('alt','<?=$company['ten']?>');
    }
  });
    $( "body" ).on( "click", ".muangay", function() {
      if($('.size').length && $('.active_size').length==false)
      {
        alert('<?=_chonsize?>');
        return false;
      }
      if($('.active_size').length)
      {
        var size = $('.active_size').html();
      }
      else
      {
        var size = '';
      }
      if($('.mausac').length && $('.active_mausac').length==false)
      {
        alert('<?=_chonmau?>');
        return false;
      }
      if($('.active_mausac').length)
      {
        var mausac = $('.active_mausac').html();
      }
      else
      {
        var mausac = '';
      }
      var act = "dathang";
      var id = $(this).data('id');
      var soluong = $('.soluong').val();
      if(soluong==undefined){
        soluong = 1;
      }
      if(soluong>0)
      {
        $.ajax({
          type:'post',
          url:'ajax/cart.php',
          dataType:'json',
          data:{id:id,size:size,mausac:mausac,soluong:soluong,act:act},
          beforeSend: function() {
            $('.thongbao').html('<p><img src="images/loader_p.gif"></p>');
          },
          error: function(){
            add_popup('<?=_hethongloi?>');
          },
          success:function(kq){
            location.href = "gio-hang.html";
            // add_popup(kq.thongbao);
            // $('.giohang_fix span').html(kq.sl);
            // console.log(kq);
          }
        });
      }
      else
      {
        alert('<?=_nhapsoluong?>');
      }
      return false;
    });
    $( "body" ).on( "click", ".dathang", function() {
      if($('.size').length && $('.active_size').length==false)
      {
        alert('<?=_chonsize?>');
        return false;
      }
      if($('.active_size').length)
      {
        var size = $('.active_size').html();
      }
      else
      {
        var size = '';
      }
      if($('.mausac').length && $('.active_mausac').length==false)
      {
        alert('<?=_chonmau?>');
        return false;
      }
      if($('.active_mausac').length)
      {
        var mausac = $('.active_mausac').html();
      }
      else
      {
        var mausac = '';
      }
      var act = "dathang";
      var id = $(this).data('id');
      var soluong = $('.soluong').val();
      if(soluong==undefined){
        soluong = 1;
      }
      if(soluong>0)
      {
        $.ajax({
          type:'post',
          url:'ajax/cart.php',
          dataType:'json',
          data:{id:id,size:size,mausac:mausac,soluong:soluong,act:act},
          beforeSend: function() {
            $('.thongbao').html('<p><img src="images/loader_p.gif"></p>');
          },
          error: function(){
            add_popup('<?=_hethongloi?>');
          },
          success:function(kq){
            add_popup(kq.thongbao);
            $('.giohang_fix span').html(kq.sl);
            console.log(kq);
          }
        });
      }
      else
      {
        alert('<?=_nhapsoluong?>');
      }
      return false;
    });
    if ($(document.body).height() < $(window).height()) {
      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id; js.async=true;
        js.src = "//connect.facebook.net/<?php if($lang=='en')echo 'en_EN';else echo 'vi_VN' ?>/sdk.js#xfbml=1&version=v2.8";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
      $(".codebando").html('<?= $company["bando"] ?>');
      <?php if(!empty($video)){ ?>
        $("#video-idx").html('<iframe id="iframe" src="https://www.youtube.com/embed/<?= getYoutubeIdFromUrl($video[0]["link"]) ?>" frameborder="0" allowfullscreen></iframe>');
      <?php } ?>
    }else{
      
      var fired = false;
      window.addEventListener("scroll", function(){
        if ((document.documentElement.scrollTop != 0 && fired === false) || (document.body.scrollTop != 0 && fired === false)) {
          (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id; js.async=true;
            js.src = "//connect.facebook.net/<?php if($lang=='en')echo 'en_EN';else echo 'vi_VN' ?>/sdk.js#xfbml=1&version=v2.8";
            fjs.parentNode.insertBefore(js, fjs);
          }(document, 'script', 'facebook-jssdk'));
          $(".codebando").html('<?= $company["bando"] ?>');
          <?php if(!empty($video)){ ?>
            $("#video-idx").html('<iframe id="iframe" src="https://www.youtube.com/embed/<?= getYoutubeIdFromUrl($video[0]["link"]) ?>" frameborder="0" allowfullscreen></iframe>');
          <?php } ?>
          fired = true;
        }
      }, true);
    }
  });

  
</script>

              
<!--Tooltip hình ảnh
<script src="js/ImageTooltip.js"></script>
<!--Tooltip hình ảnh-->
<!--Tooltip có nội dung
<script src="Toolstip/ajax.js" ></script>
<script src="Toolstip/ajax-dynamic-content.js" ></script>
<script src="Toolstip/home.js" ></script>
<link href="Toolstip/tootstip.css" rel="stylesheet" type="text/css" />
Tooltip có nội dung-->
<!--lockfixed
<script src="js/jquery.lockfixed.min.js"></script>
<script >
  $(window).load(function(e) {
    (function($) {
        var left_h=$('#left').height();
        var right_h=$('#right').height();
                var footer_h=$('#wap_footer').height();
        if(right_h>left_h)
        {
          $.lockfixed("#left",{offset: {top: 10, bottom: footer_h}});
        }
    })(jQuery);
  });
</script>
<!--lockfixed-->
<!--Cấm click chuột phải-->
<?php /* <script >
  //ondragstart="return false;" ondrop="return false;"; sự kiện thẻ body
  var message="Đây là bản quyền thuộc về <?=$company['ten']?>";
  function clickIE() {
  if (document.all) {(message);return false;}
  }
  function clickNS(e) {
  if (document.layers||(document.getElementById&&!document.all)) {
    if (e.which==2||e.which==3) {alert(message);return false;}}}
    if (document.layers) {document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;}else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;document.onselectstart=clickIE}document.oncontextmenu=new Function("return false")
</script>
<script >
  function disableselect(e){
    return false
  }
  function reEnable(){
    return true
  }
  //if IE4+
  document.onselectstart=new Function ("return false")
  //if NS6
  if (window.sidebar){
    document.onmousedown=disableselect
    document.onclick=reEnable
  }
  </script> */?>
  <!--Cấm click chuột phải-->
  <script src="https://www.google.com/recaptcha/api.js?render=<?=$config['recaptcha_sitekey']?>"></script>
  <script>
    var recaptchaResponse = document.getElementById('recaptchaResponse');
        var recaptchaResponse2 = document.getElementById('recaptchaResponse2');
        var recaptchaResponse3 = document.getElementById('recaptchaResponse3');
        var recaptchaResponse_dknt = document.getElementById('recaptchaResponse_dknt');
        if(recaptchaResponse || recaptchaResponse2 || recaptchaResponse3 || recaptchaResponse_dknt){
          grecaptcha.ready(function () {
            grecaptcha.execute('<?=$config['recaptcha_sitekey']?>', { action: 'contact' }).then(function (token) {
              if(recaptchaResponse){recaptchaResponse.value = token;}
              if(recaptchaResponse2){recaptchaResponse2.value = token;}
              if(recaptchaResponse3){recaptchaResponse3.value = token;}
              if(recaptchaResponse_dknt){recaptchaResponse_dknt.value = token;}
            });
          });
        }

  </script>
  <?php if($id>0 or $source=='about') { ?>
    <script src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-51d3c996345f1d03" async="async"></script>
    <script src="https://sp.zalo.me/plugins/sdk.js"></script>
    <?php } ?>