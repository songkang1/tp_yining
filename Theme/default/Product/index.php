  
<?php v_template_part(array("name" => "header", "path" => "Public")); ?>
<?php // v_template_part(array("name" => "Crumb", "path" => "Public", "title" => "产品分类管理", "data" => array(array("name" => "产品文类", "path", U("Admin/Article/categorylist")))));             ?>
<?php v_template_part(array("name" => "Crumb", "path" => "Public","data" => array(array("name" => $currcategory['name'], "path"=> U("Product/Index/index/category/".$currcategory['id'] ) ) ) ) ); ?>

<link rel="stylesheet" href="<?php echo v_theme_url() ?>/css/swiper.min.css">
<style> 

</style>
<link rel="stylesheet" href="<?php echo v_theme_url() ?>/css/set2.css"/>
<link rel="stylesheet" href="<?php echo v_theme_url() ?>css/demo.css"/>


<div class="container">
    <div class="row">
<!--        <div class="col-md-12"> 
            <img src="http://www.uniview.com/res/201504/01/20150401_1608007_fenxiao_731950_140445_0.jpg" width="100%"/>
        </div>-->
        <div class="col-xs-12">
            
                <?php v_template_part(array("name" => "ProductSiderbar","title"=>L("L_PRODUCT_CATEGORY"), "path" => "Public")); ?>
            
            <div class="col-xs-10 col-xs-10 product-list">
<!--                <div class="col-md-12" style=" border-bottom: 1px #5AB331 solid; padding: 0px; height: 130px; ">
                    <div class="col-md-2" style="padding:5px;">
                        <img src="<?php echo $currcategory['img'] ?>"  height="110px;">
                    </div>
                    <div class="col-md-10" style="text-align: left; padding-left:30px;">
                        <?php // print_r($currcategory)?>
                        <h3><?php echo $currcategory['name'] ?></h3>
                        <p><?php echo $currcategory['summary'] ?></p>
                    </div>

                </div>-->
                <?php
                $isnull = true;
                foreach ($product as $value) {
                    $isnull = false;
                    ?>
                    <div class="col-md-3 col-xs-3 product-item">

                        <div class="grid" >
                            <figure class="effect-apollo"  style="border:0px #cdcdcd solid">

                                <img src="<?php
                                $arr = explode("||", $value['img']);
                                echo $arr[0]
                                        ?>"  width="170" height="170" style="border:0px;">
                                <figcaption>
                                    <p style="color:#000"> <?php //echo mb_substr($value['summary'], 1, 60, "UTF-8"); //substr($value['summary'], 2);    ?></p>
                                    <a href="<?php echo U("product/index/single/id/" . $value['id']) ?>">View more</a>
                                </figcaption>			
                            </figure>  
                        </div>
                        <div class="caption">

                        </div>

                        <a href="<?php echo U("product/index/single/id/" . $value['id']) ?>"><?php echo mb_substr($value['title'], 0, 13, "UTF-8") ?></a>
                    </div>
                <?php
                }
                if ($isnull) {
                    ?>
                <div class="col-md-12  alert alert-success" style="margin-top:10px;"><?php echo L("L_NOTFOUNT");?></div>
                    <?php
                }
                ?>
                <div class="col-md-12 text-right">
                    <nav>
                        <ul class="pagination">

                            <li><a href="<?php
                                $pages = $page['curr_page'] <= 1 ? $page['curr_page'] : 1;
                                echo U("/Product/Index/index/category/" . $currcategory['id'] . "/p/" . $pages);
                                ?>">&laquo;</a></li>
                                <?php
                                for ($i = 1; $i <= $page['total_page']; $i++) {
                                    $class = "";

                                    if ($page['curr_page'] == $i) {
                                        $class = 'class="active"';
                                    }
                                    ?>


                                <li <?php echo $class; ?>><a href="<?php echo U("/Product/Index/index/category/" . $currcategory['id'] . "/p/" . $i); ?>"  ><?php echo $i; ?></a></li>

                                <?php
                            }
                            ?>
                            <li><a href="<?php
                                $pages = $page['curr_page'] >= 1 ? $page['total_page'] : $page['total_page'];
                                echo U("/Product/Index/index/category/" . $currcategory['id'] . "/p/" . $pages);
                                ?>">&raquo;</a></li> 

                        </ul>
                    </nav>
                </div>

            </div>

        </div>


    </div>
</div>



<?php v_template_part(array("name" => "footer", "path" => "Public")); ?>
