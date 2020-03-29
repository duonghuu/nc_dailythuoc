<div class="tieude_giua"><div><?=$title_cat?></div></div>
<div class="box_container">
<div class="hethong-list">
                    <?php foreach ($tintuc as $key => $value) {
                        echo '<div class="hethong-item">
                            <div class="info">
                                <h6>'.$value["ten"].'</h6>    
                                <p>'._diachi.': '.$value["ten"].'</p>
                                <p>'._dienthoai.': '.$value["ten"].'</p>
                                <a href=""><i class="fas fa-map-marker-alt"></i> Chỉ đường</a>
                            </div>
                            <figure><img class="lazy" data-src="'._upload_tintuc_l.$value["thumb"].'" alt="'.$value["ten"].'"></figure>
                        </div>';
                    } ?>
                </div>
</div>