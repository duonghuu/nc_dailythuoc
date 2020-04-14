<div class="row mb-5 flex-column-reverse flex-md-row">
    <div class="col-md-3">
                    <form action="tim-kiem-loc/" method="get">
                                          <div class="left-box">
                            <a class="left-box-title" data-toggle="collapse" href="#filter1" role="button" aria-expanded="true" aria-controls="filter1">Danh mục sản phẩm</a>
                            <div id="filter1" class="left-box-content collapse show">
                                <?php foreach ($product_danhmuc as $key => $value) {  ?>
                                    
                                <div class="filter-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" <?= (in_array($value["id"], $a_cf))? 'checked' : '' ?>
                                         name="cf[]" class="custom-control-input category-filter"
                                         value="<?= $value["id"] ?>" id="cf-<?= $value["id"] ?>">
                                        <label class="custom-control-label" for="cf-<?= $value["id"] ?>"><?= $value["ten"] ?></label>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>

                                          <div class="left-box">
                            <a class="left-box-title" data-toggle="collapse" href="#filter2" 
                            role="button" aria-expanded="true" aria-controls="filter2">Danh mục hãng</a>
                            <div id="filter2" class="left-box-content collapse show">
                                <?php foreach ($hang_danhmuc as $key => $value) {  ?>
                                    
                                <div class="filter-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" <?= (in_array($value["id"], $a_sf))? 'checked' : '' ?>
                                         name="sf[]" class="custom-control-input supplier-filter"
                                         value="<?= $value["id"] ?>" id="sf-<?= $value["id"] ?>">
                                        <label class="custom-control-label" for="sf-<?= $value["id"] ?>"><?= $value["ten"] ?></label>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="left-box">
                            <a class="left-box-title" data-toggle="collapse" href="#filter3" role="button" aria-expanded="true" aria-controls="filter3">Giá sản phẩm</a>
                            <div id="filter3" class="left-box-content collapse show">
                                <div class="py-3">Khoảng giá</div>
                                <div class="range-price">
                                    <input type="hidden" name="pmin" id="pmin" value="100">
                                    <input type="hidden" name="pmax" id="pmax" value="5000">
                                    <div class="nstSlider" data-range_min="100" data-range_max="5000" data-cur_min="
                                    <?= (isset($_GET["pmin"]))? $_GET["pmin"]: 100 ?>" 
                                    data-cur_max="<?= (isset($_GET["pmax"]))? $_GET["pmax"]: 5000 ?>">
                                        <div class="bar" ></div>
                                        <div class="leftGrip"></div>
                                        <div class="rightGrip" ></div>
                                    </div>
                                    <div class="labelValue py-3">
                                        Từ <span class="leftLabel">100</span>.000₫ - 
                                        <span class="rightLabel">5.000</span>.000₫
                                    </div>
                                </div>
                                <button type="button" onclick="onSearchLoc();return false;" class="btn btn-pink font-14 font-weight-normal mb-4">Lọc</button>
                            </div>
                        </div>
                        <input type="hidden" name="sort" value="">
                    </form>
                </div>   
    <div class="col-md-9">
        <div class="tieude_giua"><div><?=$title_cat?></div></div>
        <div class="box_container">
        <div class="product-grid">
            <?php foreach ($product as $k => $v) { 
                    showProduct($v);
            } ?>
        </div>
        <div class="pagination"><?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?></div>
        </div>
        
    </div>    
</div>
