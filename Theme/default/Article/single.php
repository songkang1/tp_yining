  
<?php v_template_part(array("name" => "header", "path" => "Public")); ?>
<?php v_template_part(array("name" => "Crumb", "path" => "Public",
    "data" => array(array("name"=>L("L_NAV_ARTICLE"),"path"=>U("Article/Index/index")),array("name" => $article[0]['category'][0]['name'], "path"=> U("Article/Index/index/category/".$article[0]['category'][0]['id'] ) ),
        array("name"=>$article[0]['title']) ) ) ); ?>
<link rel="stylesheet" href="<?php echo v_theme_url() ?>/css/swiper.min.css">
<style> 
.article-title{ text-align: center; border-bottom: 3px #006ea3 solid;}
.article-option{ text-align: center; line-height: 35px;}
.article-body{}

</style> 
<script>$("title").html($("title").html()+"  -  <?php echo  $article[0]['title'];?>");</script>
<div class="container" style="">
    <div class="row">
<!--        <div class="col-md-12" style="margin-bottom:10px; padding: 0px;">
            <img src="http://www.huichuang.net/templates/default/images/new/banner2.gif" width="100%">
        </div>-->
       
            <?php v_template_part(array("name" => "ArticleSiderbar","title"=>L("L_NEWS_CATEGORY"), "path" => "Public")); ?>
        
        <div class="col-md-10 col-xs-10"  style="width: 800px; ">
            <div class="col-md-12 col-xs-12 article-title">
                <h2><?php echo $article[0]['title']?></h2>
            </div>
            <div class="col-md-12  col-xs-12 article-option"> 
                <span><?php echo L("L_TIME");?>:<?php echo date("Y-m-d",$article[0]['created'])?>    <?php echo L("L_CATEGORY");?>:
                    <a href="<?php echo U("Article/Index/index/category/".$article[0]['category'][0]['id'] )?>"><?php echo $article[0]['category'][0]['name']?></a>
                  
                    <div class="bdsharebuttonbox" style="float:right">
<a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></div>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"24"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
     
                </span>
                
                 </div>
            <div class="col-md-12 col-xs-12 article-body">
                    <?php echo html_entity_decode($article[0]['body'])?>
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