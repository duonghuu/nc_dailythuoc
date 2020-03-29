<div class="duan-grid">

  <?php foreach ($tintuc as $key => $value) {
    echo '<div class="duan-item"><a href="'.get_url($value).'"> <figure><img src="'._upload_tintuc_l.$value["thumb"].'" alt="'.$value["ten"].'"></figure><div class="info"><h4>'.$value["ten"].'</h4> <p><i class="fas fa-chart-area"></i> <span>Diện tích: '.$value["link"].'</span></p> <p><i class="fas fa-map-marker-alt"></i> <span>Địa chỉ: '.$value["chucvu"].'</span></p> </div> </a></div>';
  } ?>
</div>