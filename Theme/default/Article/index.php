  
<?php v_template_part(array("name" => "header", "path" => "Public")); ?>
 <?php v_template_part(array("name" => "Crumb", "path" => "Public",
    "data" => array(array("name"=>L("L_NAV_ARTICLE"),"path"=>U("Article/Index/index")),array("name" => $currcategory['name'], "path"=> U("Article/Index/index/category/".$currcategory['id'] ) ) ) ) ); ?>
<link rel="stylesheet" href="<?php echo v_theme_url() ?>/css/swiper.min.css">
<style> 

</style>
<script>$("title").html($("title").html());</script>
<link rel="stylesheet" href="<?php echo v_theme_url() ?>/css/set2.css"/>
<link rel="stylesheet" href="<?php echo v_theme_url() ?>css/demo.css"/>

<div class="container">
    <div class="row">
<!--        <div class="col-md-12" style="margin-bottom:10px; padding: 0px;">
            <img src="http://www.huichuang.net/templates/default/images/new/banner2.gif" width="100%">
        </div>-->
 
      <?php v_template_part(array("name" => "ArticleSiderbar","title"=>L("L_NEWS_CATEGORY"), "path" => "Public")); ?>
           
        <div class="col-md-10 col-xs-10 article-list" >
            <?php
            $isnull = true;
            foreach ($articlelist as $value){   $isnull = false;?>
          
            <div class="col-md-6 col-xs-6"> 
                <div class="col-md-12 col-xs-12 article-list-item">
                    <div class="col-md-6 col-xs-6"  >
                        <img src="<?php
                                $arr = explode("||", $value['img']);
                                echo $arr[0]
                                        ?>" width="100%"/>
                    </div>
                    <div class="col-md-6 col-xs-6">
                        <h4 ><a href="<?php echo U("Article/Index/single/id/".$value['id'])?>"><?php echo mb_substr($value['title'], 0,25,"UTF-8");?></a></h4>
                        <p style="min-height:60px;"><?php echo mb_substr($value['summary'], 0,30,"UTF-8");?>...</p>
                        <p><?php echo date("Y-m-d", $value['created']) ?><span style="float:right"><a href="<?php echo U("Article/Index/single/id/".$value['id'])?>">more</a></span></p>
                    </div>
                </div>
            </div>
            <?php }?>
            <?php if(!$isnull){?>
              <div class="col-md-12 col-xs-12 text-center">
                        <nav>
                            <ul class="pagination">

                                <li><a href="<?php
                                    $pages = $page['curr_page'] <= 1 ? $page['curr_page'] : 1;
                                    echo U("/Article/Index/index/category/" . $currcategory['id'] . "/p/" . $pages);
                                    ?>">&laquo;</a></li>
                                    <?php
                                    for ($i = 1; $i <= $page['total_page']; $i++) {
                                        $class = "";

                                        if ($page['curr_page'] == $i) {
                                            $class = 'class="active"';
                                        }
                                        ?>


                                    <li <?php echo $class; ?>><a href="<?php echo U("/Article/Index/index/category/" . $currcategory['id'] . "/p/" . $i); ?>"  ><?php echo $i; ?></a></li>

                                    <?php
                                }
                                ?>
                                <li><a href="<?php
                                    $pages = $page['curr_page'] >= 1 ? $page['total_page'] : $page['total_page'];
                                    echo U("/Article/Index/index/category/" . $currcategory['id'] . "/p/" . $pages);
                                    ?>">&raquo;</a></li> 

                            </ul>
                        </nav>
                    </div>
            <?php }else{?>
            <div class="col-md-12  alert alert-success"><?php echo L("L_NOTFOUNT");?></div>
            <?php }?>
        </div>
    </div>
</div>



<?php v_template_part(array("name" => "footer", "path" => "Public")); ?>
