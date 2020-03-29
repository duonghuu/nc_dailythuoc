<!-- Bootstrap CSS CDN -->
<link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- Bootstrap CSS local fallback -->
  <script>
    var test = document.createElement("div")
    test.className = "hidden d-none"

    document.head.appendChild(test)
    var cssLoaded = window.getComputedStyle(test).display === "none"
    document.head.removeChild(test)

    if (!cssLoaded) {
        var link = document.createElement("link");

        link.type = "text/css";
        link.rel = "stylesheet";
        link.href = "css/bootstrap.min.css";

        document.head.appendChild(link);
    }
  </script>
<?php /* <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="main.css"> */?>
<link rel="stylesheet" type="text/css" href="main.css">
<?php if($template == "product_detail"){ ?>
<link rel="stylesheet" media="screen" href="magiczoomplus/magiczoomplus.css">
<?php } ?>
<?php /* <link rel="stylesheet" href="css/normalize.css" />

<link rel="stylesheet" href="css/bootstrap.min.css" /> */?>
<?php /* <link rel="stylesheet" href="js/swiper/css/swiper.min.css"> */?>
<?php /* <link rel="stylesheet" href="css/myfonts.css?ver=1" />
<link rel="stylesheet" type="text/css" href="css/slick.css"/>
<link rel="stylesheet" type="text/css" href="css/slick-theme.css"/> */?>
<?php /* <link rel="stylesheet" type="text/css" href="css/jquery.fancybox.min.css"/> */?>
<?php /* <link href="css/css_jssor_slider.css" type="text/css" rel="stylesheet" /> */?>
<?php /* <link href="magiczoomplus/magiczoomplus.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="fontawesome/fontawesome-all.css" type="text/css" rel="stylesheet" /> */?>
<!--
    font-family: 'Oswald', sans-serif;
<link href="Toolstip/tootstip.css" rel="stylesheet" type="text/css" />
-->
<?php /* <link href="css/animate.css" type="text/css" rel="stylesheet" />
<link href="css/default.css?ver=1" type="text/css" rel="stylesheet" />
<link href="style.css?ver=1" type="text/css" rel="stylesheet" />
<link href="main.css?ver=1" type="text/css" rel="stylesheet" /> */?>
<?php if($config['reponsive']==true) { ?>
<?php /* <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"> */?>
<?php /* <link href="css/valak_menu.css?ver=1" type="text/css" rel="stylesheet" />
<link href="media.css" type="text/css" rel="stylesheet" />
 <link href="my-styles.css?ver=1" type="text/css" rel="stylesheet" />  */?>
<?php } else { ?>
<?php /*   <meta name="viewport" content="width=1300"> */?>
<?php } ?>
<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>

