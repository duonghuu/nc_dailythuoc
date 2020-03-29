<?php foreach ($tintuc as $key => $value) {
    $clse = (($key+1)%2 == 0)?'even':'odd';
    $link = get_url($value,$com);
    echo '<div class="supply-item '.$clse.'"><a href="'.$link.'">
            <figure><img src="'._upload_tintuc_l.$value["photo"].'" alt="'.$value["ten"].'"></figure>
            <div class="info"><h3>'.$value["ten"].'</h3><div class="content">'.$value["mota"].'</div></div>
        </a></div>';
} ?>
