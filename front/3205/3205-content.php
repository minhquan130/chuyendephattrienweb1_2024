<?php
$url_host = $_SERVER['HTTP_HOST'];

$pattern_document_root = addcslashes(realpath($_SERVER['DOCUMENT_ROOT']), '\\');

$pattern_uri = '/' . $pattern_document_root . '(.*)$/';

preg_match_all($pattern_uri, __DIR__, $matches);

$url_path = $url_host . $matches[1][0];

$url_path = str_replace('\\', '/', $url_path);
?>
<div class="type-3205">
    <div class='container'>
        <h2 class="tilte">Why Shop with Glowing?</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="wrapper-content">
                    <div class="image">
                        <img src="./images/box-1.png" alt="">
                    </div>
                    <h3 class="tilte">Guaranteed PURE</h3>
                    <p class="content">All Grace formulations adhere to strict purity standards and will never contain harsh or toxic ingredients</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="wrapper-content">
                    <div class="image">
                        <img src="./images/box-2.png" alt="">
                    </div>
                    <h3 class="tilte">Completely Cruelty-Free</h3>
                    <p class="content">All Grace formulations adhere to strict purity standards and will never contain harsh or toxic ingredients</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="wrapper-content">
                    <div class="image">
                        <img src="./images/box-3.jpg" alt="">
                    </div>
                    <h3 class="tilte">Ingredient Sourcing</h3>
                    <p class="content">All Grace formulations adhere to strict purity standards and will never contain harsh or toxic ingredients</p>
                </div>
            </div>
        </div>
        <div class="row list-banner">
            <div class="col-md-6 banner-item">
                <div class="banner banner-left">
                    <div class="tilte-banner">new collection</div>
                    <div class="content-banner">Mountain Pine </br> Bath Oil</div>
                    <button>Explore More</button>
                </div>
            </div>
            <div class="col-md-6 banner-item">
                <div class="banner banner-right">
                    <div class="tilte-banner">25% off Everything</div>
                    <div class="content-banner">Makeup with extended range in <br>
                    colors for every human.</div>
                    <button>Shop Sale</button>
                </div>
            </div>
        </div>
    </div>
</div>