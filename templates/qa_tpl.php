 <div class="coffeeandfood-bg">
    <h4 class="idx-tit"><span><?= _qahuongdan ?></span></h4>
    <div class="qa-bg">

        <div class="container">
            <div class="qa-flex">
                <?php foreach ($tintuc as $key => $value) {
                    echo '<div class="qa-item"><a href="'.get_url($value).'">
                            <h5><i class="far fa-question-circle"></i> '.$value["ten"].'</h5>
                            <div class="desc">'.$value["mota"].'</div>
                            <button class="btn btn-default" type="button">'._chitiet.'</button>
                        </a></div>';
                } ?>
            </div>
        </div>
    </div>
</div>