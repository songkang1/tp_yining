<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<style>


    .accordion {

        padding:0px;

        max-width: 360px;


    }

    .accordion .link {
        height:50px;
        cursor: pointer;
        display: block;
        padding: 15px 15px 15px 42px;
        color: #4D4D4D;
        font-size: 14px;
        font-weight: 700;
        border-bottom: 1px solid #CCC;
        position: relative;
        -webkit-transition: all 0.4s ease;
        -o-transition: all 0.4s ease;
        transition: all 0.4s ease;
    }

    .accordion li:last-child .link {
        border-bottom: 0;
    }

    .accordion li i {
        position: absolute;
        top: 16px;
        left: 12px;
        font-size: 18px;
        color: #595959;
        -webkit-transition: all 0.4s ease;
        -o-transition: all 0.4s ease;
        transition: all 0.4s ease;
    }

    .accordion li i.fa-chevron-down {
        right: 12px;
        left: auto;
        font-size: 16px;
    }

    .accordion li.open .link {
        color: #393939;
    }

    .accordion li.open i {
        color: #393939;
    }
    .accordion li.open i.fa-chevron-down {
        -webkit-transform: rotate(180deg);
        -ms-transform: rotate(180deg);
        -o-transform: rotate(180deg);
        transform: rotate(180deg);
    }
    .accordion li.open .submenu{display: block;}

    /**
     * Submenu
     -----------------------------*/
    .submenu {
        display: none;
        /*background: #444359;*/
        font-size: 14px;
        padding:0px;
    }

    .submenu li {
        /*border-bottom: 1px solid #4b4a5e;*/
        padding: 0px;
        margin:0px;
    }

    .submenu a {
        display: block;
        text-decoration: none;
        color: #4D4D4D;
        padding: 12px;
        padding-left: 63px;
        -webkit-transition: all 0.25s ease;
        -o-transition: all 0.25s ease;
        transition: all 0.25s ease;
    }

    .submenu a:hover {
        background: #317fc9;
        color: #FFF;
    }
    .open-active{
        background: #317fc9;
        color: #FFF;}

</style>
<div class="col-md-2  col-xs-2 sider-bar" style=" padding:5px; width:240px;
     background-image: url(<?php echo v_theme_url() ?>/img/arcitle_category_bg_<?php echo LANG_SET;?>.png);
     background-repeat: no-repeat;
     filter:\"progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='scale')\";  
     -moz-background-size:100% 100%;  
     background-size:100% 100%;  " >
    <div class="siderbar" >
        <div class="col-md-12 text-center category-title">
            <?php // echo $data['title'];?>
        </div>
        <!-- Contenedor -->
        <ul id="accordion" class="accordion col-md-12">
            <?php
            $childsid = 0;
            foreach ($categorylist as $category) {
                foreach ($category['childs'] as $childs) {
                    if ($currcategory["id"] == $childs["id"]) {
                        $childsid = $childs["id"];
                    }
                }
            }
            foreach ($categorylist as $value) {
                 $class = "class='open'";
              
                ?>
                <li <?php echo $class; ?>>
                    <!--<div class="link"><a style="color:#393939" href="<?php echo U("Article/Index/Index/category/" . $value['id']) ?>"><?php echo $value['name']; ?></a><i class="fa fa-chevron-down"></i></div>-->
                    <ul class="submenu ">
                        <?php
//                    
                            $class = "";
                             if ($currcategory["id"] == $value["id"]) {
                                $class =  "class='open-active' style='color:#fff'";
                            }
                            ?> 
                        <li><a <?php echo $class;?> href="<?php echo U("Article/Index/Index/category/" . $value['id']); ?>"><?php echo $value['name']; ?></a></li>
                            <?php
//                     
                        ?>

                    </ul>
                </li>
            <?php } ?>

        </ul>
    </div>
     
</div>

<script>
   

    $(function () {
        var Accordion = function (el, multiple) {
            this.el = el || {};
            this.multiple = multiple || false;

            // Variables privadas
            var links = this.el.find('.link');
            // Evento
            links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
        }

        Accordion.prototype.dropdown = function (e) {
            var $el = e.data.el;
            $this = $(this),
                    $next = $this.next();

            $next.slideToggle();
            $this.parent().toggleClass('open');

            if (!e.data.multiple) {
                $el.find('.submenu').not($next).slideUp().parent().removeClass('open');
            }
            ;
        }

        var accordion = new Accordion($('#accordion'), false);
    });
</script>

<!--

<div class="col-md-2 col-xs-2 sider-bar" style=" width:240px;
     background-image: url(<?php echo v_theme_url() ?>/img/arcitle_category_bg_<?php echo LANG_SET;?>.png);
    background-repeat: no-repeat;
     filter:\"progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='scale')\";  
     -moz-background-size:100% 100%;  
     background-size:100% 100%;  " >
    <div class="siderbar" >
        <div class="col-md-12 text-center category-title">
            <?php // echo $data['title'];?>
        </div>
        <ul class="product-nav col-md-10">
            <?php
            foreach ($categorylist as $value) {
                $class = "";
                if ($currcategory["id"] == $value["id"]) {
                    $class = "class='product-nav_active' style='color:#fff'";
                }
                echo '<li><a ' . $class . ' href="' . U("Article/Index/Index/category/" . $value['id']) . '">' . $value['name'] . '</a></li>';
            }
            ?> 
        </ul>
    </div>
    <div class="siderbar col-md-12"> 
        <div class="col-md-12 text-center" style="padding:10px 0px;">
            <img src="<?php echo v_theme_url() ?>/img/qrcode.jpg" width="130"/>
            <small class="text-center"></small>
            <a href="###" class="form-contact"  data-toggle="modal" data-target="#myModal" style=" padding-top:10px;" ><?php echo L("L_SIDER_SENDEMAIL"); ?></a>
        </div>
    </div>
</div>

 Modal 
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo L("L_SIDER_SENDEMAIL"); ?></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="###" method="POST">
                    <div class="form-group">

                        <div class="col-sm-12">
                            <input type="email" class="form-control" name="email" placeholder="<?php echo L("L_SIDER_ENTEREMAIL"); ?>">
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-sm-12">
                            <textarea class="form-control" rows="5" name="body" placeholder="<?php echo L("L_SIDER_FANKUIJIANYI"); ?>"></textarea>  
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <small class="message"></small>
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo L("L_PUBLIC_CANCEL") ?></button>
                <button type="button" class="btn btn-primary form_submit" ><?php echo L("L_PUBLIC_SEND") ?></button>
            </div>
        </div>
    </div>
</div>
<style>

</style>

<script>
    $(".form_submit").click(function () {
        if ($("textarea[name*='body']").val() != "") {
            $.ajax({
                //提交数据的类型 POST GET
                type: "POST",
                //提交的网址
                url: '<?php echo U("SendEmail/Index/send") ?>',
                //提交的数据
                data: {email: $("input[name*='email']").val(), body: $("textarea[name*='body']").val()}, //{Name: "sanmao", Password: "sanmaoword"},
                //返回数据的格式
                datatype: "json", //"xml", "html", "script", "json", "jsonp", "text".
                //在请求之前调用的函数
                beforeSend: function () {
//                   alert("befor");
                    $(".message").html("<?php echo L("L_SIDER_NOWSEND"); ?>");

                },
                success: function (data) {


                    $('#showlodding').modal('hide');
                    if (data == "200") {
                        $(".message").html("<?php echo L("L_SIDER_SENDSUCCESS"); ?>");

                    } else {
                        $(".message").html("<?php echo L("L_SIDER_SENDERRORMESSAGE"); ?>");
                    }

                },
                //调用执行后调用的函数
                complete: function (XMLHttpRequest, textStatus) {

                },
                //调用出错执行的函数
                error: function () {
                    //请求出错处理
//                 alert("error");
                }
            });
        } else {
            $(".message").html("<?php echo L("L_SIDER_ENTERINFO"); ?>");
        }
    });
</script>-->
