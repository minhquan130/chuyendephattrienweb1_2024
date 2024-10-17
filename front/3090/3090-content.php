<?php
$url_host = $_SERVER['HTTP_HOST'];

$pattern_document_root = addcslashes(realpath($_SERVER['DOCUMENT_ROOT']), '\\');

$pattern_uri = '/' . $pattern_document_root . '(.*)$/';

preg_match_all($pattern_uri, __DIR__, $matches);

$url_path = $url_host . $matches[1][0];

$url_path = str_replace('\\', '/', $url_path);
?>
<div class="type-3090">
    <div class='container'>
        <div class="row col-aic">
            <div class="col-md-6">
                <img src="./images/about.jpg" alt="" class="img-background">
            </div>
            <div class="col-md-6">
                <h3 class="title-h3">Why Choose Us</h3>
                <div class="list-row">
                    <div class="row-content">
                        <span class="icon-content">
                            <i class="fa-solid fa-screwdriver-wrench"></i>
                        </span>
                        <div class="wrapper-content">
                            <h3 class="subtitle-h3">Free Diagnostics</h3>
                            <p class="main-content">Mr.Fixit is a quick and easy way of checking the set up on your Mobile Phones, Desktop & Laptop, Acessories and ect... We done its free of cost.</p>
                        </div>
                    </div>
                    <div class="row-content">
                        <span class="icon-content">
                            <i class="fa-regular fa-thumbs-up"></i>
                        </span>
                        <div class="wrapper-content">
                            <h3 class="subtitle-h3">Quick Repair Process</h3>
                            <p class="main-content">The repair process is fast and convenient & our expert teams of Mr.Fixit repair, If you see a phone symbol in the top left corner of the screen.</p>
                        </div>
                    </div>
                    <div class="row-content">
                        <span class="icon-content">
                            <i class="fa-solid fa-display"></i>
                        </span>
                        <div class="wrapper-content">
                            <h3 class="subtitle-h3">24/7 Customer Support</h3>
                            <p class="main-content">24x7 techsupport is one of the best services in the Mr.Fixit. 24x7 tech support providing quality services at anytime, anywhere in the world.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>