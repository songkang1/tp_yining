  
<?php v_template_part(array("name" => "header", "path" => "Public")); ?>
<?php v_template_part(array("name" => "Crumb", "path" => "Public", "data" => array(array("name" => L("L_PRODUCT_CATEGORY"), "path" => U("Product/Index/Index/")), array("name" => $product[0]['title'], "path" => "###")))); ?>

<link rel="stylesheet" href="<?php echo v_theme_url() ?>/css/swiper.min.css">
<style> 
    .nav-tabs > li > a{ background-color: #316793; color: #fff;} 
.nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus{ background-color: #316793;color:#fff;}
.nav-tabs > li.active > a, .nav-tabs > li > a:hover, .nav-tabs > li > a:focus{ background-color: #316793;color:#fff;}
</style> 
<script>$("title").html($("title").html() + "  -  <?php echo $product[0]['title']; ?>");</script>
<div class="container" style="">
    <div class="row">
        <!--        <div class="col-md-12 "> 
                    <img src="http://www.uniview.com/res/201504/01/20150401_1608007_fenxiao_731950_140445_0.jpg" width="100%"/>
                </div>-->
        <div class="col-md-12 " >

            <?php v_template_part(array("name" => "ProductSiderbar", "title" => L("L_PRODUCT_CATEGORY"), "path" => "Public")); ?>

            <div class="col-md-10 col-xs-10"  style="width: 800px; ">

                <div class="col-md-12 col-xs-12" style="padding:0px; margin-top: 10px; padding-bottom: 10px; border-bottom:0px #006ea3 solid">

                    <div class="col-md-4 col-xs-4"> 
                        <div class="swiper-container index-swiper-banner  hot-news-banner">
                            <div class="swiper-wrapper ">

                                <?php foreach ($product[0]['img'] as $value) { ?>
                                    <div class="swiper-slide col-md-12" style="padding:10px !important; border: 1px #eee solid">
                                        <img src="<?php echo $value; ?>"  class="col-md-12"  style="max-width:100%;">

                                    </div> 

                                <?php } ?>


                            </div>
                            <div class="swiper-container gallery-thumbs">
                                <div class="swiper-wrapper">
                                    <?php foreach ($product[0]['img'] as $value) { ?>
                                        <div class="swiper-slide"><img src="<?php echo $value; ?>" width="100%" style="max-width:100%;"></div> 
                                    <?php } ?> 
                                </div>
                            </div>

                        </div>
                        <?php // print_r($product[0]['img']); ?>
                        <!--<img src="http://www.uniview.com/res/201406/27/20140627_1603026_DM8500-E_786053_140445_0.jpg" width="100%">-->
                    </div>
                    <div class="col-md-8 col-xs-8" style=" position: relative">
                        <h2><?php echo $product[0]['title'] ?></h2>
                        <!--<h4 style="color:#5ba331">概述</h4>-->
                        <p>
                            <?php echo html_entity_decode($product[0]['summary']) ?>
                        </p>

                    </div>
                    <div class="col-md-12 col-xs-12 text-right"><b><?php echo L("L_NEXT_PRODUCT"); ?>：</b>
                        <?php
                        if ($after['title'] == "") {
                            echo L("L_NEXT_NOTHING");
                        } else {
                            ?>
                            <a href="<?php echo U("product/index/single/id/" . $after['id']) ?>"><?php echo $after['title']; ?></a>

                        <?php } ?> </div>
                </div>
                <div class="col-md-12 col-xs-12">
                    <div class="bdsharebuttonbox" style="float:right">

                        <a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></div>
                    <script>window._bd_share_config = {"common": {"bdSnsKey": {}, "bdText": "", "bdMini": "2", "bdMiniList": false, "bdPic": "", "bdStyle": "0", "bdSize": "24"}, "share": {}};
    with (document)
        0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=' + ~(-new Date() / 36e5)];</script>

                    <div role="tabpanel">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">产品详情</a></li>
                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">视频中心</a></li>
                            <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">产品参数</a></li>
                            <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">车型列表</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home"><?php echo html_entity_decode($product[0]['body']) ?></div>
                            <div role="tabpanel" class="tab-pane" id="profile"><?php echo html_entity_decode($product[0]['movie']) ?></div>
                            <div role="tabpanel" class="tab-pane" id="messages"><?php echo html_entity_decode($product[0]['param']) ?></div>
                            <div role="tabpanel" class="tab-pane" id="settings"><?php echo html_entity_decode($product[0]['catlist']) ?></div>
                        </div>

                    </div>
                    

                </div>



            </div>

        </div>


    </div>
</div>


<!-- Swiper JS -->
<script>

    var news = new Swiper('.hot-news-banner', {
        paginationClickable: true,
//        direction: 'vertical',
        loop: true,
//        autoplay: 1000,
        prevButton: '#hot-news-btn1',
        nextButton: '#hot-news-btn2',
        spaceBetween: 10,
    });
    var galleryThumbs = new Swiper('.gallery-thumbs', {
        spaceBetween: 10,
        centeredSlides: true,
        slidesPerView: 'auto',
        touchRatio: 0.2,
        slideToClickedSlide: true
    });
    news.params.control = galleryThumbs;
    galleryThumbs.params.control = news;

</script>

<?php v_template_part(array("name" => "footer", "path" => "Public")); ?>
